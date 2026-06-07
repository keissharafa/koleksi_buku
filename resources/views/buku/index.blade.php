<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Buku - Purple Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>
<body>
<div class="container-scroller">

    <!-- NAVBAR -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand brand-logo" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" />
            </a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">

        <!-- SIDEBAR -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

                {{-- Profile --}}
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" />
                            <span class="login-status online"></span>
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                            <span class="text-secondary text-small">Admin</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>

                {{-- Dashboard --}}
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>

                {{-- Kategori --}}
                <li class="nav-item {{ Request::is('kategori*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <span class="menu-title">Kategori</span>
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                </li>

                {{-- Buku --}}
                <li class="nav-item {{ Request::is('buku*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('buku.index') }}">
                        <span class="menu-title">Buku</span>
                        <i class="mdi mdi-book-open-variant menu-icon"></i>
                    </a>
                </li>

                {{-- Barang --}}
                <li class="nav-item {{ Request::is('barang*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('barang.index') }}">
                        <span class="menu-title">Barang</span>
                        <i class="mdi mdi-package-variant menu-icon"></i>
                    </a>
                </li>

                {{-- Generate PDF --}}
                <li class="nav-item {{ Request::is('pdf*') ? 'active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#pdfMenu" aria-expanded="false">
                        <span class="menu-title">Generate PDF</span>
                        <i class="fa fa-certificate menu-icon"></i>
                    </a>
                    <div class="collapse {{ Request::is('pdf*') ? 'show' : '' }}" id="pdfMenu">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/pdf/sertifikat') }}">
                                    <i class="fa fa-id-card me-2"></i> Sertifikat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/pdf/pengumuman') }}">
                                    <i class="fa fa-envelope me-2"></i> Pengumuman
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Wilayah --}}
                <li class="nav-item {{ Request::is('wilayah') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/wilayah') }}">
                        <span class="menu-title">Wilayah</span>
                        <i class="mdi mdi-map menu-icon"></i>
                    </a>
                </li>

                {{-- Wilayah (Axios) --}}
                <li class="nav-item {{ Request::is('wilayah-axios') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/wilayah-axios') }}">
                        <span class="menu-title">Wilayah (Axios)</span>
                        <i class="mdi mdi-map-outline menu-icon"></i>
                    </a>
                </li>

                {{-- Penjualan --}}
                <li class="nav-item {{ Request::is('penjualan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/penjualan') }}">
                        <span class="menu-title">Penjualan</span>
                        <i class="mdi mdi-cart menu-icon"></i>
                    </a>
                </li>

                {{-- Penjualan (Axios) --}}
                <li class="nav-item {{ Request::is('penjualan-axios') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/penjualan-axios') }}">
                        <span class="menu-title">Penjualan (Axios)</span>
                        <i class="mdi mdi-cart-outline menu-icon"></i>
                    </a>
                </li>

                {{-- Praktikum JS --}}
                <li class="nav-item {{ Request::is('modul4*') ? 'active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#praktikumMenu" aria-expanded="false">
                        <span class="menu-title">Praktikum JS</span>
                        <i class="mdi mdi-code-tags menu-icon"></i>
                    </a>
                    <div class="collapse {{ Request::is('modul4*') ? 'show' : '' }}" id="praktikumMenu">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/modul4/barang-table') }}">
                                    <i class="mdi mdi-table me-2"></i> HTML Table
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/modul4/barang-datatable') }}">
                                    <i class="mdi mdi-database me-2"></i> DataTables
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/modul4/kota') }}">
                                    <i class="mdi mdi-map-marker me-2"></i> Kota
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Barcode Reader --}}
                <li class="nav-item {{ Request::is('barcode-reader') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/barcode-reader') }}">
                        <span class="menu-title">Barcode Reader</span>
                        <i class="fa fa-barcode menu-icon"></i>
                    </a>
                </li>

            </ul>
        </nav>
        
        <!-- MAIN PANEL -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header">
                    <h3 class="page-title"> Daftar Buku </h3>
                </div>

                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-0">Tabel Buku</h4>
                                </div>

                                <!-- FORM TAMBAH -->
                                <form id="formTambahBuku" action="{{ route('buku.store') }}" method="POST" class="mb-4">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" name="kode" class="form-control" placeholder="Kode" required>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" required>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="idkategori" class="form-control" required>
                                                <option value="">-- Pilih Kategori --</option>
                                                @foreach($kategori as $k)
                                                    <option value="{{ $k->idkategori }}">
                                                        {{ $k->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="btnTambahBuku" class="btn btn-gradient-primary w-100">
                                                + Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- TABEL -->
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
<tbody>
@forelse($buku as $index => $b)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $b->kode }}</td>
    <td>{{ $b->judul }}</td>
    <td>{{ $b->pengarang }}</td>
    <td>
        <label class="badge badge-info">
            {{ $b->nama_kategori }}
        </label>
    </td>
    <td>
        <!-- EDIT -->
        <button type="button"
            class="btn btn-warning btn-sm btnEditBuku"
            data-url="{{ route('buku.edit', $b->idbuku) }}">
                Edit
        </button>

        <!-- DELETE -->
        <form action="{{ route('buku.destroy', $b->idbuku) }}"
              method="POST"
              class="d-inline">
            @csrf
            @method('DELETE')
<button type="button"
        class="btn btn-danger btn-sm btnDeleteBuku"
        onclick="return confirm('Yakin ingin menghapus buku ini?')">
    Hapus
</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">
        Belum ada data buku
    </td>
</tr>
@endforelse
</tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                        Copyright © {{ date('Y') }}
                    </span>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>

<script>

document.addEventListener("DOMContentLoaded", function(){

/* =========================
   TAMBAH BUKU
========================= */

const btnTambah = document.getElementById("btnTambahBuku");
const formTambah = document.getElementById("formTambahBuku");

btnTambah.addEventListener("click", function(){

    if(!formTambah.checkValidity()){
        formTambah.reportValidity();
        return;
    }

    btnTambah.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
    btnTambah.disabled = true;

    setTimeout(function(){
        formTambah.submit();
    },300);

});


/* =========================
   DELETE BUKU
========================= */

document.querySelectorAll(".btnDeleteBuku").forEach(function(btn){

    btn.addEventListener("click", function(){

        const form = btn.closest("form");

        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menghapus...';
        btn.disabled = true;

        setTimeout(function(){
            form.submit();
        },300);

    });

});

});

</script>

<script>

/* =========================
   EDIT BUKU
========================= */

document.querySelectorAll(".btnEditBuku").forEach(function(btn){

    btn.addEventListener("click", function(){

        const url = btn.dataset.url;

        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Membuka...';
        btn.disabled = true;

        setTimeout(function(){
            window.location.href = url;
        },300);

    });

});

</script>
</body>
</html>