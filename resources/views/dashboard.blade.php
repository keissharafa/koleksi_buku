@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>
        Dashboard Koleksi Buku
    </h3>
</div>

{{-- CARD JUMLAH DATA --}}
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card bg-gradient-info text-white">
            <div class="card-body">
                <h4>Total Kategori</h4>
                <h2>{{ $kategori->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card bg-gradient-success text-white">
            <div class="card-body">
                <h4>Total Buku</h4>
                <h2>{{ $buku->count() }}</h2>
            </div>
        </div>
    </div>
</div>

{{-- TABEL KATEGORI --}}
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kategori</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategori as $k)
                        <tr>
                            <td>{{ $k->idkategori }}</td>
                            <td>{{ $k->nama_kategori }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">Belum ada kategori</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- TABEL BUKU --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Buku</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($buku as $b)
                        <tr>
                            <td>{{ $b->kode }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->pengarang }}</td>
                            <td>{{ $b->nama_kategori }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada buku</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
