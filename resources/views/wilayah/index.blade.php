<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Wilayah Indonesia</title>

    <!-- CSS Purple -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<div class="container mt-5">

    <!-- TITLE -->
    <div class="page-header mb-4">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-map"></i>
            </span>
            Data Wilayah
        </h3>
    </div>

    <!-- CARD -->
    <div class="card">
        <div class="card-body">

            <!-- PROVINSI -->
            <div class="form-group mb-3">
                <label>Provinsi</label>
                <select id="provinsi" class="form-control">
                    <option value="">Pilih Provinsi</option>
                </select>
            </div>

            <!-- KOTA -->
            <div class="form-group mb-3">
                <label>Kota</label>
                <select id="kota" class="form-control">
                    <option value="">Pilih Kota</option>
                </select>
            </div>

            <!-- KECAMATAN -->
            <div class="form-group mb-3">
                <label>Kecamatan</label>
                <select id="kecamatan" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>

            <!-- KELURAHAN -->
            <div class="form-group mb-3">
                <label>Kelurahan</label>
                <select id="kelurahan" class="form-control">
                    <option value="">Pilih Kelurahan</option>
                </select>
            </div>

        </div>
    </div>

</div>

<!-- JS Purple -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('select').change(function() {
    $(this).css('color', '#000');
});

$(document).ready(function() {

    // 🔹 LOAD PROVINSI
    $.get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(data) { // $.get() adalah tipe AJAX jQuery untuk melakukan request GET ke URL, data adalah response dari server (ambil data dari API tanpa reload halaman)
        data.forEach(function(item) {
            $('#provinsi').append(`<option value="${item.id}">${item.name}</option>`); // append() untuk menambahkan option ke select provinsi, item.id sebagai value dan item.name sebagai teks yang ditampilkan
        });
    });

    // 🔹 PROVINSI → KOTA // event dropdown ajax pke jquery
    $('#provinsi').change(function() { // #provinsi adalah seelctor provinsi, change adalah event yang trigger saat user memilih option baru
        let id = $(this).val(); //select by ID, val() untuk mengambil value dari option yang dipilih (id provinsi)

        $('#kota').html('<option>Pilih Kota</option>'); //#kota adalah selector kota
        $('#kecamatan').html('<option>Pilih Kecamatan</option>'); //#kecamatan adalah selector kecamatan
        $('#kelurahan').html('<option>Pilih Kelurahan</option>'); //#kelurahan adalah selector kelurahan

        $.get(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`, function(data) {
            data.forEach(function(item) {
                $('#kota').append(`<option value="${item.id}">${item.name}</option>`); // bagian yg menambahkan kota baru berdasarkan provinsi baru yang dipilih, item.id sebagai value dan item.name sebagai teks yang ditampilkan
            });
        });
    });

    // 🔹 KOTA → KECAMATAN
    $('#kota').change(function() {
        let id = $(this).val();

        $('#kecamatan').html('<option>Pilih Kecamatan</option>');
        $('#kelurahan').html('<option>Pilih Kelurahan</option>');

        $.get(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`, function(data) {
            data.forEach(function(item) {
                $('#kecamatan').append(`<option value="${item.id}">${item.name}</option>`);
            });
        });
    });

    // 🔹 KECAMATAN → KELURAHAN
    $('#kecamatan').change(function() {
        let id = $(this).val();

        $('#kelurahan').html('<option>Pilih Kelurahan</option>');

        $.get(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`, function(data) {
            data.forEach(function(item) {
                $('#kelurahan').append(`<option value="${item.id}">${item.name}</option>`);
            });
        });
    });

});
</script>

</body>
</html>