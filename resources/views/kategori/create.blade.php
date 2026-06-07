<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Kategori - Purple Admin</title>
    
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
        
        <!-- Navbar -->
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
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown">
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
            </div>
        </nav>
        
        <div class="container-fluid page-body-wrapper">
            
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
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
            
            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    
                    <div class="page-header">
                        <h3 class="page-title"> Tambah Kategori </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('kategori.index') }}">Kategori</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Form Tambah Kategori</h4>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form id="formTambahKategori" action="{{ route('kategori.store') }}" method="POST">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori</label>
                                            <input type="text" 
                                                   name="nama_kategori" 
                                                   class="form-control" 
                                                   value="{{ old('nama_kategori') }}"
                                                   placeholder="Masukkan nama kategori"
                                                   required>
                                        </div>

                                        <button type="button" class="btn btn-gradient-primary me-2 btn-submit">
                                            Simpan
                                        </button>
                                        <a href="{{ route('kategori.index') }}" 
                                           class="btn btn-light">
                                            Batal
                                        </a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center">
                        <span class="text-muted text-center d-block">
                            Copyright © {{ date('Y') }}
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>

    <script>

document.addEventListener("DOMContentLoaded", function () {

    const btn  = document.querySelector(".btn-submit");
    const form = document.getElementById("formTambahKategori");

    btn.addEventListener("click", function () {

        // cek validasi HTML5
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // ubah tombol jadi spinner
        btn.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';

        // disable tombol supaya tidak double submit
        btn.disabled = true;

        // submit form
        setTimeout(function () {
            form.submit();
        }, 300);

    });

});

</script>
</body>
</html>
