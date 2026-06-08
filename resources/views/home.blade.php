<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Purple Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
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
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <div class="nav-profile-img">
                            <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown">
                        <a class="dropdown-item"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PAGE BODY -->
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

                {{-- Kunjungan Toko --}}
                <li class="nav-item {{ Request::is('kunjungan-toko') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/kunjungan-toko') }}">
                        <span class="menu-title">Kunjungan Toko</span>
                        <i class="fa fa-map-marker menu-icon"></i>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- MAIN PANEL -->
        <div class="main-panel">
            <div class="content-wrapper">

                <!-- PAGE HEADER -->
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-home"></i>
                        </span>
                        Dashboard
                    </h3>
                </div>

                <!-- TOP SUMMARY CARDS -->
                <div class="row">
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" />
                                <h4 class="font-weight-normal mb-3">
                                    Selamat Datang
                                    <i class="mdi mdi-account-circle mdi-24px float-end"></i>
                                </h4>
                                <h2 class="mb-5">{{ Auth::user()->name }}</h2>
                                <h6 class="card-text">Selamat, anda berhasil login 🎉</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" />
                                <h4 class="font-weight-normal mb-3">
                                    Total Fitur
                                    <i class="mdi mdi-view-dashboard mdi-24px float-end"></i>
                                </h4>
                                <h2 class="mb-5">12</h2>
                                <h6 class="card-text">Fitur praktikum terintegrasi</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                                <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" />
                                <h4 class="font-weight-normal mb-3">
                                    Status Project
                                    <i class="mdi mdi-check-circle mdi-24px float-end"></i>
                                </h4>
                                <h2 class="mb-5">Aktif</h2>
                                <h6 class="card-text">Project Laravel berhasil dijalankan</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RESUME PROJECT -->
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="mdi mdi-file-document-box text-primary me-2"></i>
                                    Ringkasan Keseluruhan Sistem
                                </h4>

                                <p class="card-description">
                                    Aplikasi ini merupakan project praktikum Framework Laravel yang berisi beberapa studi kasus,
                                    mulai dari CRUD dasar, integrasi template Purple Admin, generate PDF, barcode, AJAX, Axios,
                                    payment gateway, akses kamera, geolocation, hingga fitur kunjungan toko.
                                </p>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="bg-gradient-primary text-white">
                                                <th style="width: 50px;">No</th>
                                                <th>Modul / Fitur</th>
                                                <th>Deskripsi Singkat</th>
                                                <th style="width: 220px;">Akses Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Dashboard & Layout Purple Admin</td>
                                                <td>Implementasi template Purple Admin dengan navbar, sidebar, content, footer, dan active menu.</td>
                                                <td>
                                                    <a href="{{ route('home') }}" class="btn btn-gradient-primary btn-sm">Dashboard</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Kategori</td>
                                                <td>CRUD data kategori buku dengan fitur tambah, edit, hapus, dan tampilan data.</td>
                                                <td>
                                                    <a href="{{ route('kategori.index') }}" class="btn btn-gradient-primary btn-sm">Kategori</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Buku</td>
                                                <td>CRUD data koleksi buku yang terhubung dengan kategori melalui relasi database.</td>
                                                <td>
                                                    <a href="{{ route('buku.index') }}" class="btn btn-gradient-primary btn-sm">Buku</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>Barang & Label Harga</td>
                                                <td>CRUD barang, trigger kode barang, DataTables, dan cetak label harga PDF untuk kertas Tom & Jerry.</td>
                                                <td>
                                                    <a href="{{ route('barang.index') }}" class="btn btn-gradient-primary btn-sm">Barang</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Generate PDF</td>
                                                <td>Generate dokumen PDF seperti sertifikat landscape dan pengumuman portrait menggunakan DomPDF.</td>
                                                <td>
                                                    <a href="{{ url('/pdf/sertifikat') }}" class="btn btn-gradient-info btn-sm mb-1">Sertifikat</a>
                                                    <a href="{{ url('/pdf/pengumuman') }}" class="btn btn-gradient-info btn-sm mb-1">Pengumuman</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>6</td>
                                                <td>Wilayah AJAX</td>
                                                <td>Dropdown bertingkat provinsi, kota, kecamatan, dan kelurahan menggunakan AJAX jQuery.</td>
                                                <td>
                                                    <a href="{{ url('/wilayah') }}" class="btn btn-gradient-primary btn-sm">Wilayah</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>7</td>
                                                <td>Wilayah Axios</td>
                                                <td>Dropdown bertingkat wilayah Indonesia menggunakan Axios dan response JSON dari API.</td>
                                                <td>
                                                    <a href="{{ url('/wilayah-axios') }}" class="btn btn-gradient-primary btn-sm">Wilayah Axios</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>8</td>
                                                <td>POS Penjualan AJAX</td>
                                                <td>Transaksi penjualan dengan input kode barang, tambah item, edit jumlah, hapus item, total, dan simpan ke database.</td>
                                                <td>
                                                    <a href="{{ url('/penjualan') }}" class="btn btn-gradient-success btn-sm">Penjualan</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>9</td>
                                                <td>POS Penjualan Axios</td>
                                                <td>Versi POS menggunakan Axios untuk mengambil data barang dan menyimpan transaksi penjualan.</td>
                                                <td>
                                                    <a href="{{ url('/penjualan-axios') }}" class="btn btn-gradient-success btn-sm">Penjualan Axios</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>10</td>
                                                <td>Praktikum JavaScript</td>
                                                <td>Implementasi HTML Table, DataTables CRUD, selector, event, modal edit, dan select kota.</td>
                                                <td>
                                                    <a href="{{ url('/modul4/barang-table') }}" class="btn btn-gradient-warning btn-sm mb-1">HTML Table</a>
                                                    <a href="{{ url('/modul4/barang-datatable') }}" class="btn btn-gradient-warning btn-sm mb-1">DataTables</a>
                                                    <a href="{{ url('/modul4/kota') }}" class="btn btn-gradient-warning btn-sm mb-1">Kota</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>11</td>
                                                <td>Barcode Reader</td>
                                                <td>Scan barcode barang menggunakan kamera browser dan menampilkan data barang dari database.</td>
                                                <td>
                                                    <a href="{{ url('/barcode-reader') }}" class="btn btn-gradient-danger btn-sm">Barcode Reader</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>12</td>
                                                <td>Kunjungan Toko</td>
                                                <td>Scan barcode toko, ambil lokasi sales, hitung jarak dengan Haversine, dan validasi kunjungan diterima atau ditolak.</td>
                                                <td>
                                                    <a href="{{ url('/kunjungan-toko') }}" class="btn btn-gradient-danger btn-sm">Kunjungan Toko</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- QUICK ACCESS + PROGRESS -->
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="mdi mdi-link-variant text-primary me-2"></i>
                                    Quick Access
                                </h4>

                                <p class="card-description">
                                    Shortcut menuju halaman-halaman utama pada sistem praktikum.
                                </p>

                                <div class="d-flex flex-wrap">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-gradient-primary btn-sm mb-2 me-2">Kategori</a>
                                    <a href="{{ route('buku.index') }}" class="btn btn-gradient-primary btn-sm mb-2 me-2">Buku</a>
                                    <a href="{{ route('barang.index') }}" class="btn btn-gradient-primary btn-sm mb-2 me-2">Barang</a>
                                    <a href="{{ url('/wilayah') }}" class="btn btn-gradient-info btn-sm mb-2 me-2">Wilayah</a>
                                    <a href="{{ url('/wilayah-axios') }}" class="btn btn-gradient-info btn-sm mb-2 me-2">Wilayah Axios</a>
                                    <a href="{{ url('/penjualan') }}" class="btn btn-gradient-success btn-sm mb-2 me-2">Penjualan</a>
                                    <a href="{{ url('/penjualan-axios') }}" class="btn btn-gradient-success btn-sm mb-2 me-2">Penjualan Axios</a>
                                    <a href="{{ url('/barcode-reader') }}" class="btn btn-gradient-danger btn-sm mb-2 me-2">Barcode Reader</a>
                                    <a href="{{ url('/kunjungan-toko') }}" class="btn btn-gradient-danger btn-sm mb-2 me-2">Kunjungan Toko</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="mdi mdi-chart-bar text-primary me-2"></i>
                                    Grafik Ringkas Progress
                                </h4>

                                <p class="card-description">
                                    Persentase ringkas berdasarkan kelompok fitur yang sudah diimplementasikan.
                                </p>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <span>CRUD & Database</span>
                                        <span>100%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <span>AJAX & Axios</span>
                                        <span>100%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <span>PDF & Barcode</span>
                                        <span>100%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <span>Geolocation & Scanner</span>
                                        <span>100%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 100%"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between">
                                        <span>SSE & NFC</span>
                                        <span>Parsial / terpisah</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 65%"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- INFORMATION -->
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="mdi mdi-information-outline text-primary me-2"></i>
                                    Informasi Project
                                </h4>

                                <p>
                                    Project ini menggunakan Laravel sebagai framework backend dan Purple Admin sebagai template antarmuka.
                                    Beberapa fitur menggunakan teknologi pendukung seperti JavaScript, jQuery, AJAX, Axios, DomPDF,
                                    barcode generator, HTML5 QRCode scanner, SweetAlert2, dan Geolocation API.
                                </p>

                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <i class="mdi mdi-database text-primary" style="font-size: 32px;"></i>
                                                <h5 class="mt-2">Database</h5>
                                                <p class="text-muted mb-0">Kategori, buku, barang, transaksi, customer, lokasi toko.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <i class="mdi mdi-code-tags text-success" style="font-size: 32px;"></i>
                                                <h5 class="mt-2">Frontend</h5>
                                                <p class="text-muted mb-0">Blade, Bootstrap, Purple Admin, JavaScript, jQuery.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <i class="mdi mdi-file-pdf text-danger" style="font-size: 32px;"></i>
                                                <h5 class="mt-2">PDF & Barcode</h5>
                                                <p class="text-muted mb-0">Generate PDF, label harga, barcode barang dan toko.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <i class="mdi mdi-map-marker text-warning" style="font-size: 32px;"></i>
                                                <h5 class="mt-2">Geolocation</h5>
                                                <p class="text-muted mb-0">Validasi lokasi sales terhadap lokasi toko.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center d-block">
                        Copyright &copy; {{ date('Y') }}
                    </span>
                </div>
            </footer>

        </div>
    </div>
</div>

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

</body>
</html>