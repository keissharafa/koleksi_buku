<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barcode Reader</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<div class="container-scroller">

    {{-- =============================== --}}
    {{-- NAVBAR --}}
    {{-- =============================== --}}
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
    {{-- END NAVBAR --}}

    {{-- =============================== --}}
    {{-- PAGE BODY --}}
    {{-- =============================== --}}
    <div class="container-fluid page-body-wrapper">

        {{-- =============================== --}}
        {{-- SIDEBAR --}}
        {{-- =============================== --}}
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
        {{-- END SIDEBAR --}}

        {{-- =============================== --}}
        {{-- MAIN PANEL --}}
        {{-- =============================== --}}
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="page-header mb-4">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="fa fa-barcode"></i>
                        </span>
                        Barcode Reader
                    </h3>
                </div>

                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-3">Scan Barcode Label Barang</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div id="reader" style="width: 100%; max-width: 500px;"></div>

                                <button type="button" id="btnStart" class="btn btn-primary mt-3">
                                    Mulai Scan
                                </button>
                                <button type="button" id="btnReset" class="btn btn-warning mt-3">
                                    Scan Ulang
                                </button>
                            </div>

                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5>Hasil Scan</h5>

                                        <div class="form-group">
                                            <label>ID Barang</label>
                                            <input type="text" id="id_barang" class="form-control" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" id="nama" class="form-control" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga Barang</label>
                                            <input type="text" id="harga" class="form-control" readonly>
                                        </div>

                                        <div id="status" class="mt-3 text-muted">
                                            Scanner belum berjalan.
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
        {{-- END MAIN PANEL --}}

    </div>
    {{-- END PAGE BODY --}}

</div>
{{-- END container-scroller --}}

{{-- JS --}}
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
let html5QrCode;
let isScanning = false;

function playBeep() {
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = audioCtx.createOscillator();
    const gainNode = audioCtx.createGain();
    oscillator.connect(gainNode);
    gainNode.connect(audioCtx.destination);
    oscillator.frequency.value = 1000;
    oscillator.type = 'sine';
    gainNode.gain.setValueAtTime(0.2, audioCtx.currentTime);
    oscillator.start();
    oscillator.stop(audioCtx.currentTime + 0.15);
}

function getBarang(kode) {
    $.ajax({
        url: '/get-barang/' + kode,
        method: 'GET',
        success: function(res) {
            $('#id_barang').val(res.id_barang);
            $('#nama').val(res.nama);
            $('#harga').val('Rp ' + Number(res.harga).toLocaleString('id-ID'));
            $('#status').html('<span class="text-success">Barcode berhasil dibaca.</span>');
        },
        error: function() {
            $('#id_barang').val(kode);
            $('#nama').val('-');
            $('#harga').val('-');
            $('#status').html('<span class="text-danger">Barang tidak ditemukan di database.</span>');
        }
    });
}

function onScanSuccess(decodedText) {
    if (!isScanning) return;
    playBeep();
    isScanning = false;
    html5QrCode.stop().then(function() {
        $('#status').html('<span class="text-info">Scanner berhenti. Mengambil data barang...</span>');
        getBarang(decodedText);
    }).catch(function(error) {
        console.log(error);
    });
}

$('#btnStart').click(function() {
    if (isScanning) return;
    $('#status').text('Scanner berjalan. Arahkan kamera ke barcode label.');
    html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start(
        { facingMode: "environment" },
        { fps: 10, qrbox: { width: 250, height: 150 } },
        onScanSuccess
    ).then(function() {
        isScanning = true;
    }).catch(function(err) {
        console.log(err);
        $('#status').html('<span class="text-danger">Kamera gagal dibuka. Cek permission kamera.</span>');
    });
});

$('#btnReset').click(function() {
    $('#id_barang').val('');
    $('#nama').val('');
    $('#harga').val('');
    $('#status').text('Scanner siap digunakan ulang.');
    if (html5QrCode && isScanning) {
        html5QrCode.stop().then(function() {
            isScanning = false;
        });
    }
});
</script>

</body>
</html>