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
                                <form action="{{ route('buku.store') }}" method="POST" class="mb-4">
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
                                            <button type="submit" class="btn btn-gradient-primary w-100">
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
        <a href="{{ route('buku.edit', $b->idbuku) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <!-- DELETE -->
        <form action="{{ route('buku.destroy', $b->idbuku) }}"
              method="POST"
              class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-danger btn-sm"
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

</body>
</html>