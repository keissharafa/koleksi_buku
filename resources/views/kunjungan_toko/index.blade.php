<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kunjungan Toko</title>

    <!-- CSS Purple -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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

    <div class="container-fluid page-body-wrapper">

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

                <li class="nav-item {{ Request::is('wilayah') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/wilayah') }}">
                        <span class="menu-title">Wilayah</span>
                        <i class="mdi mdi-map menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('wilayah-axios') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/wilayah-axios') }}">
                        <span class="menu-title">Wilayah (Axios)</span>
                        <i class="mdi mdi-map-outline menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('penjualan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/penjualan') }}">
                        <span class="menu-title">Penjualan</span>
                        <i class="mdi mdi-cart menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('penjualan-axios') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/penjualan-axios') }}">
                        <span class="menu-title">Penjualan (Axios)</span>
                        <i class="mdi mdi-cart-outline menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('barcode-reader') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/barcode-reader') }}">
                        <span class="menu-title">Barcode Reader</span>
                        <i class="fa fa-barcode menu-icon"></i>
                    </a>
                </li>

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

                <!-- TITLE -->
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        Kunjungan Toko
                    </h3>
                </div>

                <!-- LIST TOKO -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">List Toko</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Nama Toko</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Accuracy</th>
                                        <th>Cetak Barcode</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($toko as $item)
                                        <tr>
                                            <td>{{ $item->barcode }}</td>
                                            <td>{{ $item->nama_toko }}</td>
                                            <td>{{ $item->latitude }}</td>
                                            <td>{{ $item->longitude }}</td>
                                            <td>{{ $item->accuracy }} m</td>
                                            <td>
                                                <a href="{{ url('/kunjungan-toko/barcode/' . $item->barcode) }}" 
                                                    target="_blank"
                                                    class="btn btn-gradient-primary btn-sm">
                                                    <i class="fa fa-barcode"></i> Cetak
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                Belum ada data toko
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- INPUT TITIK AWAL -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Input Titik Awal Toko</h4>
                        <p class="card-description">
                            Gunakan tombol Geoloc untuk mengambil latitude, longitude, dan accuracy lokasi toko.
                        </p>

                        <form action="{{ url('/kunjungan-toko/store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Barcode</label>
                                    <input type="text" name="barcode" class="form-control" placeholder="Contoh: TK000001" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" name="nama_toko" class="form-control" placeholder="Nama toko" required>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label>Latitude</label>
                                    <input type="text" id="latitudeAwal" name="latitude" class="form-control" placeholder="Latitude" readonly required>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label>Longitude</label>
                                    <input type="text" id="longitudeAwal" name="longitude" class="form-control" placeholder="Longitude" readonly required>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label>Accuracy</label>
                                    <input type="text" id="accuracyAwal" name="accuracy" class="form-control" placeholder="Accuracy" readonly required>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="button" id="btnGeolocAwal" class="btn btn-gradient-info me-2">
                                    <i class="fa fa-location-arrow"></i> Geoloc
                                </button>

                                <button type="submit" class="btn btn-gradient-primary">
                                    <i class="mdi mdi-content-save"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- TITIK KUNJUNGAN -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Titik Kunjungan</h4>
                        <p class="card-description">
                            Scan barcode toko, lalu ambil lokasi sales untuk validasi kunjungan.
                        </p>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="border rounded p-3 text-center mb-3">
                                    <h5 class="mb-3">Barcode Scanner</h5>

                                    <div id="reader" class="mb-3" style="width:100%; min-height:250px; background:#f8f9fa;">
                                        <div class="text-muted pt-5">
                                            Area scanner barcode
                                        </div>
                                    </div>

                                    <button type="button" id="btnStartScan" class="btn btn-gradient-primary btn-sm">
                                        <i class="fa fa-camera"></i> Mulai Scan
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-7">

                                <div class="alert alert-secondary">
                                    <h5>Data Toko dari Barcode</h5>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Barcode</label>
                                            <input type="text" id="scanBarcode" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>Nama Toko</label>
                                            <input type="text" id="scanNamaToko" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>Latitude Toko</label>
                                            <input type="text" id="scanLatToko" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>Longitude Toko</label>
                                            <input type="text" id="scanLngToko" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>Accuracy Toko</label>
                                            <input type="text" id="scanAccToko" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info">
                                    <h5>Data Titik Kunjungan Sales</h5>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Latitude Sales</label>
                                            <input type="text" id="salesLatitude" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>Longitude Sales</label>
                                            <input type="text" id="salesLongitude" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>Accuracy Sales</label>
                                            <input type="text" id="salesAccuracy" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <button type="button" id="btnAmbilLokasi" class="btn btn-gradient-success">
                                        <i class="fa fa-location-arrow"></i> Ambil Lokasi
                                    </button>
                                </div>

                                <div id="hasilKunjungan" class="alert alert-light border">
                                    Hasil validasi kunjungan akan muncul di sini.
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- JS Purple -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/html5-qrcode"></script>

<script>
function getAccuratePosition(targetAccuracy = 50, maxWait = 20000) {
    return new Promise((resolve, reject) => {
        let bestResult = null;
        const startTime = Date.now();

        const watchId = navigator.geolocation.watchPosition(
            (position) => {
                const acc = position.coords.accuracy;

                if (!bestResult || acc < bestResult.coords.accuracy) {
                    bestResult = position;
                }

                if (acc <= targetAccuracy) {
                    navigator.geolocation.clearWatch(watchId);
                    resolve(bestResult);
                }

                if (Date.now() - startTime >= maxWait) {
                    navigator.geolocation.clearWatch(watchId);

                    if (bestResult) resolve(bestResult);
                    else reject(new Error("Timeout, tidak dapat posisi"));
                }
            },
            (error) => reject(error),
            { enableHighAccuracy: true, maximumAge: 0, timeout: maxWait }
        );
    });
}

// ===============================
// GEOLOC TITIK AWAL TOKO
// ===============================
document.getElementById('btnGeolocAwal').addEventListener('click', async function() {
    Swal.fire({
        title: 'Mengambil lokasi...',
        text: 'Tunggu sampai akurasi terbaik didapatkan',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });

    try {
        const pos = await getAccuratePosition(50);

        document.getElementById('latitudeAwal').value = pos.coords.latitude;
        document.getElementById('longitudeAwal').value = pos.coords.longitude;
        document.getElementById('accuracyAwal').value = pos.coords.accuracy;

        Swal.fire('Berhasil', 'Lokasi toko berhasil diambil', 'success');
    } catch (error) {
        Swal.fire('Error', 'Gagal mengambil lokasi', 'error');
    }
});


// ===============================
// BARCODE SCANNER
// ===============================
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

function getTokoByBarcode(barcode) {
    fetch('/get-toko/' + barcode)
        .then(response => {
            if (!response.ok) {
                throw new Error('Toko tidak ditemukan');
            }

            return response.json();
        })
        .then(data => {
            document.getElementById('scanBarcode').value = data.barcode;
            document.getElementById('scanNamaToko').value = data.nama_toko;
            document.getElementById('scanLatToko').value = data.latitude;
            document.getElementById('scanLngToko').value = data.longitude;
            document.getElementById('scanAccToko').value = data.accuracy;

            document.getElementById('hasilKunjungan').className = 'alert alert-success';
            document.getElementById('hasilKunjungan').innerHTML = `
                <strong>Barcode berhasil discan.</strong><br>
                Data toko ditemukan: ${data.nama_toko}.<br>
                Silakan klik <b>Ambil Lokasi</b> untuk validasi kunjungan sales.
            `;

            Swal.fire({
                icon: 'success',
                title: 'Toko ditemukan',
                text: data.nama_toko,
                timer: 1200,
                showConfirmButton: false
            });
        })
        .catch(error => {
            document.getElementById('scanBarcode').value = barcode;
            document.getElementById('scanNamaToko').value = '';
            document.getElementById('scanLatToko').value = '';
            document.getElementById('scanLngToko').value = '';
            document.getElementById('scanAccToko').value = '';

            document.getElementById('hasilKunjungan').className = 'alert alert-danger';
            document.getElementById('hasilKunjungan').innerHTML = `
                <strong>Barcode tidak ditemukan di database.</strong><br>
                Barcode hasil scan: ${barcode}
            `;

            Swal.fire('Error', 'Toko tidak ditemukan di database', 'error');
        });
}

function haversine(lat1, lon1, lat2, lon2) {
    const R = 6371000; // radius bumi dalam meter

    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;

    const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) *
        Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    return R * c;
}

function onScanSuccess(decodedText) {
    if (!isScanning) return;

    playBeep();
    isScanning = false;

    html5QrCode.stop().then(function() {
        document.getElementById('reader').innerHTML = `
            <div class="text-muted pt-5">
                Scanner berhenti. Data sedang diproses...
            </div>
        `;

        getTokoByBarcode(decodedText);
    }).catch(function(error) {
        console.log(error);
    });
}

document.getElementById('btnStartScan').addEventListener('click', function() {
    if (isScanning) return;

    document.getElementById('reader').innerHTML = '';

    html5QrCode = new Html5Qrcode("reader");

    html5QrCode.start(
        { facingMode: "environment" },
        {
            fps: 10,
            qrbox: { width: 250, height: 150 }
        },
        onScanSuccess
    ).then(function() {
        isScanning = true;

        document.getElementById('hasilKunjungan').className = 'alert alert-info';
        document.getElementById('hasilKunjungan').innerHTML = `
            Scanner berjalan. Arahkan kamera ke barcode toko.
        `;
    }).catch(function(err) {
        console.log(err);

        document.getElementById('hasilKunjungan').className = 'alert alert-danger';
        document.getElementById('hasilKunjungan').innerHTML = `
            Kamera gagal dibuka. Pastikan browser mengizinkan akses kamera.
        `;

        Swal.fire('Error', 'Kamera gagal dibuka. Cek permission kamera.', 'error');
    });

    document.getElementById('btnAmbilLokasi').addEventListener('click', async function() {

    let latToko = Number(document.getElementById('scanLatToko').value);
    let lngToko = Number(document.getElementById('scanLngToko').value);
    let accToko = Number(document.getElementById('scanAccToko').value);

    if (!latToko || !lngToko || !accToko) {
        Swal.fire('Warning', 'Scan barcode toko terlebih dahulu!', 'warning');
        return;
    }

    Swal.fire({
        title: 'Mengambil lokasi sales...',
        text: 'Tunggu sampai akurasi terbaik didapatkan',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });

    try {
        const pos = await getAccuratePosition(50);

        let latSales = pos.coords.latitude;
        let lngSales = pos.coords.longitude;
        let accSales = pos.coords.accuracy;

        document.getElementById('salesLatitude').value = latSales;
        document.getElementById('salesLongitude').value = lngSales;
        document.getElementById('salesAccuracy').value = accSales;

        let jarak = haversine(latToko, lngToko, latSales, lngSales);

        let radiusMaksimal = 300;
        let thresholdEfektif = radiusMaksimal + accToko + accSales;

        if (jarak <= thresholdEfektif) {
            document.getElementById('hasilKunjungan').className = 'alert alert-success';
            document.getElementById('hasilKunjungan').innerHTML = `
                <strong>KUNJUNGAN DITERIMA ✅</strong><br>
                Sales berada dalam radius kunjungan toko.<br><br>

                <b>Jarak aktual:</b> ${jarak.toFixed(2)} meter<br>
                <b>Radius maksimal:</b> ${radiusMaksimal} meter<br>
                <b>Accuracy toko:</b> ${accToko.toFixed(2)} meter<br>
                <b>Accuracy sales:</b> ${accSales.toFixed(2)} meter<br>
                <b>Threshold efektif:</b> ${thresholdEfektif.toFixed(2)} meter
            `;

            Swal.fire('Diterima', 'Kunjungan toko valid', 'success');

        } else {
            document.getElementById('hasilKunjungan').className = 'alert alert-danger';
            document.getElementById('hasilKunjungan').innerHTML = `
                <strong>KUNJUNGAN DITOLAK ❌</strong><br>
                Sales berada di luar radius kunjungan toko.<br><br>

                <b>Jarak aktual:</b> ${jarak.toFixed(2)} meter<br>
                <b>Radius maksimal:</b> ${radiusMaksimal} meter<br>
                <b>Accuracy toko:</b> ${accToko.toFixed(2)} meter<br>
                <b>Accuracy sales:</b> ${accSales.toFixed(2)} meter<br>
                <b>Threshold efektif:</b> ${thresholdEfektif.toFixed(2)} meter
            `;

            Swal.fire('Ditolak', 'Sales berada di luar radius toko', 'error');
        }

    } catch (error) {
        console.log(error);
        Swal.fire('Error', 'Gagal mengambil lokasi sales', 'error');
    }
});
});
</script>

</body>
</html>