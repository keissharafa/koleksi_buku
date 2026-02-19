<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
    $buku = DB::table('buku')
        ->join('kategori', 'buku.idkategori', '=', 'kategori.idkategori')
        ->select('buku.*', 'kategori.nama_kategori')
        ->get();

    $kategori = DB::table('kategori')->get();

    return view('buku.index', compact('buku', 'kategori'));
    }

    public function create()
    {
        $kategori = DB::table('kategori')->get();
        return view('buku.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:20',
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'idkategori' => 'required'
        ]);

        DB::table('buku')->insert([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'idkategori' => $request->idkategori,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = DB::table('buku')->where('idbuku', $id)->first();
        $kategori = DB::table('kategori')->get();

        return view('buku.edit', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:20',
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'idkategori' => 'required'
        ]);

        DB::table('buku')->where('idbuku', $id)->update([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'idkategori' => $request->idkategori,
            'updated_at' => now()
        ]);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('buku')->where('idbuku', $id)->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}
