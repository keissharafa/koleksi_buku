<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiToko;
use Barryvdh\DomPDF\Facade\Pdf;
use Picqer\Barcode\BarcodeGeneratorPNG;

class KunjunganTokoController extends Controller
{
    public function index()
    {
        $toko = LokasiToko::all();

        return view('kunjungan_toko.index', compact('toko'));
    }

    public function storeToko(Request $request)
    {
        LokasiToko::create([
            'barcode' => $request->barcode,
            'nama_toko' => $request->nama_toko,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'accuracy' => $request->accuracy,
        ]);

        return redirect('/kunjungan-toko');
    }

    public function getToko($barcode)
    {
        $toko = LokasiToko::where('barcode', $barcode)->first();

        if (!$toko) {
            return response()->json(null, 404);
        }

        return response()->json($toko);
    }

    public function cetakBarcode($barcode)
{
    $toko = LokasiToko::where('barcode', $barcode)->firstOrFail();

    $generator = new BarcodeGeneratorPNG();

    $barcodeImage = base64_encode(
        $generator->getBarcode($toko->barcode, $generator::TYPE_CODE_128)
    );

    $pdf = Pdf::loadView('kunjungan_toko.barcode', compact('toko', 'barcodeImage'))
        ->setPaper('A6', 'portrait');

    return $pdf->stream('barcode-toko-' . $toko->barcode . '.pdf');
}
}