<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Penjualan Axios</title>

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

                <!-- TITLE -->
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-cart-outline"></i>
                        </span>
                        Transaksi Penjualan (AJAX JQuery)
                    </h3>
                </div>

                <!-- CARD -->
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col-md-3">
                                <label>Kode Barang</label>
                                <input type="text" id="kode" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label>Nama Barang</label>
                                <input type="text" id="nama" class="form-control" readonly>
                            </div>

                            <div class="col-md-2">
                                <label>Harga</label>
                                <input type="text" id="harga" class="form-control" readonly>
                            </div>

                            <div class="col-md-2">
                                <label>Jumlah</label>
                                <input type="number" id="jumlah" class="form-control" value="1">
                            </div>

                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" id="btnTambah" class="btn btn-success w-100" disabled>
                                    Tambah
                                </button>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody"></tbody>
                            </table>
                        </div>

                        <div class="text-end mt-3">
                            <h4>Total: <span id="total">0</span></h4>
                        </div>

                        <div class="text-end">
                            <button type="button" id="btnBayar" class="btn btn-primary mt-2">
                                Bayar
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- JS -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {

    // 🔥 GET BARANG - AJAX jQuery
    $('#kode').on('keydown', function(e) {
        if (e.key === 'Enter') {

            e.preventDefault();

            let kode = $(this).val().trim();

            if (!kode) return;

            $.ajax({
                url: '/get-barang/' + kode,
                method: 'GET',

                success: function(res) {
                    $('#nama').val(res.nama);
                    $('#harga').val(res.harga);
                    $('#jumlah').val(1);

                    $('#btnTambah').prop('disabled', false);
                },

                error: function() {
                    Swal.fire('Error', 'Barang tidak ditemukan', 'error');
                    $('#btnTambah').prop('disabled', true);
                }
            });
        }
    });


    // 🔥 TAMBAH
    $('#btnTambah').on('click', function() {

        let kode = $('#kode').val().trim();
        let nama = $('#nama').val().trim();
        let harga = Number($('#harga').val());
        let jumlah = Number($('#jumlah').val());

        if (!kode || !nama || !harga || !jumlah) {
            Swal.fire('Warning', 'Data belum lengkap!', 'warning');
            return;
        }

        let subtotal = harga * jumlah;

        let existing = $(`tr[data-kode="${kode}"]`);

        if (existing.length > 0) {

            let qty = Number(existing.find('.jumlah').text()) + jumlah;

            existing.find('.jumlah').text(qty);
            existing.find('.subtotal').text(qty * harga);

        } else {

let row = `
    <tr data-kode="${kode}">
        <td>${kode}</td>
        <td>${nama}</td>
        <td class="harga">${harga}</td>
        <td class="jumlah">${jumlah}</td>
        <td class="subtotal">${subtotal}</td>
        <td>
            <button type="button" class="btn btn-warning btn-sm btnEdit">Edit</button>
            <button type="button" class="btn btn-danger btn-sm btnHapus">Hapus</button>
        </td>
    </tr>
`;

            $('#tableBody').append(row);
        }

        updateTotal();

        Swal.fire({
            icon: 'success',
            title: 'Ditambahkan',
            timer: 800,
            showConfirmButton: false
        });

        $('#kode').val('');
        $('#nama').val('');
        $('#harga').val('');
        $('#jumlah').val(1);
        $('#btnTambah').prop('disabled', true);
    });


    // 🔥 HAPUS
    $(document).on('click', '.btnHapus', function() {

        let row = $(this).closest('tr');

        Swal.fire({
            title: 'Yakin?',
            icon: 'warning',
            showCancelButton: true
        }).then(function(res) {
            if (res.isConfirmed) {
                row.remove();
                updateTotal();
            }
        });
    });


    // 🔥 EDIT JUMLAH
    $(document).on('click', '.btnEdit', function() {

        let row = $(this).closest('tr');

        let kode = row.children().eq(0).text();
        let nama = row.children().eq(1).text();
        let harga = Number(row.find('.harga').text());
        let jumlahLama = Number(row.find('.jumlah').text());

        Swal.fire({
            title: 'Edit Jumlah Barang',
            html: `
                <div style="text-align:left">
                    <label>Kode Barang</label>
                    <input class="swal2-input" value="${kode}" readonly>

                    <label>Nama Barang</label>
                    <input class="swal2-input" value="${nama}" readonly>

                    <label>Jumlah</label>
                    <input id="editJumlah" type="number" class="swal2-input" value="${jumlahLama}" min="1">
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            preConfirm: function() {
                let jumlahBaru = Number($('#editJumlah').val());

                if (jumlahBaru <= 0 || isNaN(jumlahBaru)) {
                    Swal.showValidationMessage('Jumlah harus lebih dari 0');
                    return false;
                }

                return jumlahBaru;
            }
        }).then(function(result) {
            if (result.isConfirmed) {

                let jumlahBaru = result.value;

                row.find('.jumlah').text(jumlahBaru);
                row.find('.subtotal').text(harga * jumlahBaru);

                updateTotal();

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Jumlah barang berhasil diubah',
                    timer: 1000,
                    showConfirmButton: false
                });
            }
        });
    });


    // 🔥 BAYAR - AJAX jQuery
    $('#btnBayar').on('click', function() {

        let data = [];

        $('#tableBody tr').each(function() {
            data.push({
                kode: $(this).children().eq(0).text(),
                jumlah: Number($(this).find('.jumlah').text()),
                subtotal: Number($(this).find('.subtotal').text())
            });
        });

        let total = Number($('#total').text());

        if (data.length === 0) {
            Swal.fire('Warning', 'Belum ada transaksi!', 'warning');
            return;
        }

        Swal.fire({
            title: 'Loading...',
            allowOutsideClick: false,
            didOpen: function() {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '/penjualan/store',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                data: data,
                total: total
            },

            success: function() {
                Swal.fire('Berhasil', 'Transaksi disimpan', 'success');

                $('#tableBody').html('');
                $('#total').text(0);
            },

            error: function(err) {
                console.log(err);
                Swal.fire('Error', 'Gagal simpan', 'error');
            }
        });
    });


    // 🔥 TOTAL
    function updateTotal() {
        let total = 0;

        $('.subtotal').each(function() {
            total += Number($(this).text());
        });

        $('#total').text(total);
    }

});
</script>

</body>
</html>