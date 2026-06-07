<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'harga' => 'required|numeric',
        ]);

        Barang::create($request->only('nama', 'harga'));

        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->only('nama', 'harga'));

        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Barang::destroy($id);

        return redirect()->route('barang.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function printLabel(Request $request)
    {
        $request->validate([
            'barang'  => 'required|array',
            'start_x' => 'required|integer|min:1|max:5',
            'start_y' => 'required|integer|min:1|max:8',
        ]);

        $barang    = Barang::whereIn('id_barang', $request->barang)->get();
        $generator = new BarcodeGeneratorPNG();

        // Inisialisasi grid 8 baris × 5 kolom
        $labels = [];
        for ($row = 1; $row <= 8; $row++) {
            for ($col = 1; $col <= 5; $col++) {
                $labels[$row][$col] = null;
            }
        }

        $currentRow = (int) $request->start_y;
        $currentCol = (int) $request->start_x;

        foreach ($barang as $item) {
            if ($currentRow > 8) break;

            $item->barcode = base64_encode(
                $generator->getBarcode(
                    (string) $item->id_barang,
                    $generator::TYPE_CODE_128
                )
            );

            $labels[$currentRow][$currentCol] = $item;

            $currentCol++;
            if ($currentCol > 5) {
                $currentCol = 1;
                $currentRow++;
            }
        }

        $pdf = Pdf::loadView('barang.print', compact('labels'))
            ->setPaper([0, 0, 612, 936]) // A4
            ->setOptions(['dpi' => 150, 'isHtml5ParserEnabled' => true]);

        return $pdf->stream('label-barang.pdf');
    }
}