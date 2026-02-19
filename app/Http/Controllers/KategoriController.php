<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = DB::table('kategori')->get();  // ← kategori (singular)
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100'
        ]);

        DB::table('kategori')->insert([  // ← kategori
            'nama_kategori' => $request->nama_kategori,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('idkategori', $id)->first();  // ← kategori
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100'
        ]);

        DB::table('kategori')->where('idkategori', $id)->update([  // ← kategori
            'nama_kategori' => $request->nama_kategori,
            'updated_at' => now()
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('kategori')->where('idkategori', $id)->delete();  // ← kategori
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}