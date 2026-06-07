<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang - Purple Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<div class="container-scroller">

@include('barang.partials.navbar_sidebar')

<div class="main-panel">
<div class="content-wrapper">

<div class="page-header">
    <h3 class="page-title">Tambah Barang</h3>
</div>

<div class="row">
<div class="col-lg-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">

<h4 class="card-title">Form Tambah Barang</h4>

<form id="formCreateBarang" action="{{ route('barang.store') }}" method="POST">
@csrf

<div class="form-group">
    <label>Nama Barang</label>
    <input type="text" name="nama" class="form-control" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" required>
</div>

<button type="button" id="btnSimpanBarang" class="btn btn-gradient-primary me-2">
        <i class="mdi mdi-content-save"></i> Simpan
</button>

<a href="{{ route('barang.index') }}" class="btn btn-light">
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

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const btn = document.getElementById("btnSimpanBarang");
    const form = document.getElementById("formCreateBarang");

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
</body>
</html>