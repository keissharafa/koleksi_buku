@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Buku</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('buku.update', $buku->idbuku) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text" name="kode"
                                   value="{{ old('kode', $buku->kode) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul"
                                   value="{{ old('judul', $buku->judul) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pengarang</label>
                            <input type="text" name="pengarang"
                                   value="{{ old('pengarang', $buku->pengarang) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="idkategori" class="form-control" required>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->idkategori }}"
                                        {{ $k->idkategori == $buku->idkategori ? 'selected' : '' }}>
                                        {{ $k->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
