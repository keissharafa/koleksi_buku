<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Barang - Purple Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<div class="container-scroller">

<div class="main-panel">
<div class="content-wrapper">

<div class="page-header">
    <h3 class="page-title">Edit Barang</h3>
</div>

<div class="row">
<div class="col-lg-8 grid-margin stretch-card">
<div class="card">
<div class="card-body">

<h4 class="card-title">Form Edit Barang</h4>

<form id="formEditBarang" action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
@csrf
@method('PUT')

<div class="form-group">
    <label>ID Barang</label>
    <input type="text" class="form-control" value="{{ $barang->id_barang }}" disabled>
</div>

<div class="form-group">
    <label>Nama Barang</label>
    <input type="text" name="nama" class="form-control"
           value="{{ $barang->nama }}" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control"
           value="{{ $barang->harga }}" required>
</div>

<button type="button" id="btnUpdateBarang" class="btn btn-gradient-success me-2">
        <i class="mdi mdi-pencil"></i> Update
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

    const btn = document.getElementById("btnUpdateBarang");
    const form = document.getElementById("formEditBarang");

    btn.addEventListener("click", function(){

        // cek validasi input
        if(!form.checkValidity()){
            form.reportValidity();
            return;
        }

        // ubah button jadi spinner
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memperbarui...';

        // disable button supaya tidak double submit
        btn.disabled = true;

        // delay kecil supaya spinner terlihat
        setTimeout(function(){
            form.submit();
        },300);

    });

});
</script>
</body>
</html>