<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan.index');
    }

    public function axios()
    {
        return view('penjualan.axios');
    }

    public function store(Request $request)
{
    $data = $request->data;

    // simpan penjualan
    $penjualan = Penjualan::create([
        'total' => $request->total,
        'timestamp' => now()
    ]);

    // simpan detail
    foreach ($data as $item) {
        PenjualanDetail::create([
            'id_penjualan' => $penjualan->id_penjualan,
            'id_barang' => $item['kode'],
            'jumlah' => $item['jumlah'],
            'subtotal' => $item['subtotal']
        ]);
    }

    return response()->json(['success' => true]);
}
}