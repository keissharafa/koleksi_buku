<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Barang - Purple Admin</title>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Layout Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

<div class="container-scroller">

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">

            <a class="navbar-brand brand-logo" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
            </a>

            <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo">
            </a>

        </div>

        <div class="navbar-menu-wrapper d-flex align-items-stretch">

            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item nav-profile dropdown">

                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

                        <div class="nav-profile-img">
                            <img src="{{ asset('assets/images/faces/face1.jpg') }}">
                            <span class="availability-status online"></span>
                        </div>

                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                        </div>

                    </a>

                    <div class="dropdown-menu navbar-dropdown">

                        <a class="dropdown-item"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                            <i class="mdi mdi-logout me-2 text-primary"></i>
                            Logout

                        </a>

                        <form id="logout-form"
                              action="{{ route('logout') }}"
                              method="POST"
                              class="d-none">
                            @csrf
                        </form>

                    </div>

                </li>

            </ul>

        </div>

    </nav>


    <div class="container-fluid page-body-wrapper">

        <!-- ================= SIDEBAR ================= -->
<!-- SIDEBAR -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
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

                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('kategori*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <span class="menu-title">Kategori</span>
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('buku*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('buku.index') }}">
                        <span class="menu-title">Buku</span>
                        <i class="mdi mdi-book-open-variant menu-icon"></i>
                    </a>
                </li>

<li class="nav-item {{ Request::is('barang*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('barang.index') }}">
        <span class="menu-title">Barang</span>
        <i class="mdi mdi-package-variant menu-icon"></i>
    </a>
</li>

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

                <li class="nav-item {{ Request::is('wilayah*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/wilayah') }}">
            <span class="menu-title">Wilayah</span>
            <i class="mdi mdi-map menu-icon"></i>
        </a>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="{{ url('/wilayah-axios') }}">
        <span class="menu-title">Wilayah (Axios)</span>
        <i class="mdi mdi-map-outline menu-icon"></i>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ url('/penjualan') }}">
        <span class="menu-title">Penjualan</span>
        <i class="mdi mdi-cart menu-icon"></i>
    </a>
</li>

                <li class="nav-item {{ Request::is('praktikum*') ? 'active' : '' }}">
    <a class="nav-link" data-bs-toggle="collapse" href="#praktikumMenu" aria-expanded="false">
        <span class="menu-title">Praktikum JS</span>
        <i class="mdi mdi-code-tags menu-icon"></i>
    </a>

    <div class="collapse {{ Request::is('praktikum*') ? 'show' : '' }}" id="praktikumMenu">
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

<li class="nav-item {{ Request::is('barcode-reader') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/barcode-reader') }}">
                        <span class="menu-title">Barcode Reader</span>
                        <i class="fa fa-barcode menu-icon"></i>
                    </a>
                </li>

            </ul>
        </nav>


        <!-- ================= MAIN PANEL ================= -->
        <div class="main-panel">

            <div class="content-wrapper">

                <div class="page-header">
                    <h3 class="page-title">Daftar Barang</h3>
                </div>


                <div class="card">
                    <div class="card-body">

                        <!-- ================= FORM TAMBAH ================= -->
                        <form id="formTambahBarang" action="{{ route('barang.store') }}" method="POST" class="mb-4">

                            @csrf

                            <div class="row">

                                <div class="col-md-5">
                                    <input type="text"
                                           name="nama"
                                           class="form-control"
                                           placeholder="Nama Barang"
                                           required>
                                </div>

                                <div class="col-md-5">
                                    <input type="number"
                                           name="harga"
                                           class="form-control"
                                           placeholder="Harga"
                                           required>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" id="btnTambahBarang" class="btn btn-gradient-primary w-100">
                                        + Tambah
                                    </button>
                                </div>

                            </div>

                        </form>


                        <!-- ================= FORM CETAK LABEL ================= -->
                        <form id="formCetakLabel" action="{{ route('barang.print') }}"
                              method="POST"
                              target="_blank">

                            @csrf

                            <div class="row mb-3">

                                <div class="col-md-2">
                                    <label>X</label>
                                    <input type="number"
                                           name="start_x"
                                           class="form-control"
                                           min="1"
                                           max="5"
                                           value="1">
                                </div>

                                <div class="col-md-2">
                                    <label>Y</label>
                                    <input type="number"
                                           name="start_y"
                                           class="form-control"
                                           min="1"
                                           max="8"
                                           value="1">
                                </div>

                                <div class="col-md-3 align-self-end">
                                    <button type="button" id="btnCetakLabel" class="btn btn-danger">
                                        🖨 Cetak Label
                                    </button>
                                </div>

                            </div>


                            <!-- ================= TABLE SELECT BARANG ================= -->
                            <div class="table-responsive">

                                <table id="barangTable" class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th>Pilih</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($barang as $b)

                                            <tr>

                                                <td>
                                                    <input type="checkbox"
                                                           name="barang[]"
                                                           value="{{ $b->id_barang }}">
                                                </td>

                                                <td>{{ $b->id_barang }}</td>

                                                <td>{{ $b->nama }}</td>

                                                <td>
                                                    <span class="badge badge-info">
                                                        Rp {{ number_format($b->harga,0,',','.') }}
                                                    </span>
                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </form>


                        <hr class="my-4">


                        <!-- ================= TABLE CRUD ================= -->
                        <div class="table-responsive">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach($barang as $b)

                                        <tr>

                                            <td>{{ $b->id_barang }}</td>

                                            <td>{{ $b->nama }}</td>

                                            <td>
                                                Rp {{ number_format($b->harga,0,',','.') }}
                                            </td>

                                            <td>

                                                <a href="{{ route('barang.edit',$b->id_barang) }}"
                                                   class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <form action="{{ route('barang.destroy',$b->id_barang) }}"
                                                      method="POST"
                                                      class="d-inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin hapus?')">
                                                        Hapus
                                                    </button>

                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

            </div>


            <footer class="footer text-center">
                Copyright © {{ date('Y') }}
            </footer>

        </div>

    </div>

</div>

<!-- JS -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>

$(document).ready(function () {

    var table = $('#barangTable').DataTable({
        pageLength: 5
    });

    /* ===============================
       FIX: Checkbox pagination problem
       =============================== */

    $('form[action="{{ route('barang.print') }}"]').on('submit', function () {

        var form = this;

        // ambil semua row dari semua halaman DataTables
        var rows = table.rows().nodes();

        $('input[type="checkbox"]', rows).each(function () {

            // jika checkbox tidak ada di DOM halaman aktif
            if (!$.contains(document, this)) {

                // tambahkan ke form supaya ikut terkirim
                $(form).append($(this));

            }

        });

    });

});

</script>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const btn = document.getElementById("btnTambahBarang");
    const form = document.getElementById("formTambahBarang");

    btn.addEventListener("click", function(){

        if(!form.checkValidity()){
            form.reportValidity();
            return;
        }

        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
        btn.disabled = true;

        setTimeout(function(){
            form.submit();
        },300);

    });

});

</script>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const btn = document.getElementById("btnCetakLabel");
    const form = document.getElementById("formCetakLabel");

    btn.addEventListener("click", function(){

        if(!form.checkValidity()){
            form.reportValidity();
            return;
        }

        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mencetak...';
        btn.disabled = true;

        setTimeout(function(){
            form.submit();
        },300);

    });

});

</script>
</body>
</html>