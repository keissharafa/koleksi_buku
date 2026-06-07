<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Wilayah Indonesia (Axios)</title>

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
            Data Wilayah (Axios)
        </h3>
    </div>

    <!-- CARD -->
    <div class="card">
        <div class="card-body">

            <div class="form-group mb-3">
                <label>Provinsi</label>
                <select id="provinsi" class="form-control">
                    <option value="">Pilih Provinsi</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Kota</label>
                <select id="kota" class="form-control">
                    <option value="">Pilih Kota</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Kecamatan</label>
                <select id="kecamatan" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>

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

<!-- AXIOS -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $('select').change(function() {
    $(this).css('color', '#000'); // hanya untuk styling select yang sudah dipilih, agar teksnya berwarna hitam
});
// LOAD PROVINSI
document.addEventListener("DOMContentLoaded", function() {

    axios.get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
        .then(function(response) { //.then() dijalankan kalau request berhasil, response adalah data yang dikirim server
            let data = response.data;

            data.forEach(function(item) {
                document.getElementById('provinsi').innerHTML += // axios pakai selector elemnt native JS
                    `<option value="${item.id}">${item.name}</option>`;
            });
        })
        .catch(function(error) { //.catch() dijalankan kalau request gagal, error adalah pesan error dari server
            console.log(error);
        });

});

// PROVINSI → KOTA
document.getElementById('provinsi').addEventListener('change', function() { // event dropdown axios pakai addEventListener native JS
    let id = this.value;

    document.getElementById('kota').innerHTML = '<option>Pilih Kota</option>';
    document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';

    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
        .then(function(response) { //.then() dijalankan kalau request berhasil, response adalah data yang dikirim server
            response.data.forEach(function(item) {
                document.getElementById('kota').innerHTML += 
                    `<option value="${item.id}">${item.name}</option>`;
            });
        });
});

// 🔥 KOTA → KECAMATAN
document.getElementById('kota').addEventListener('change', function() {
    let id = this.value;

    document.getElementById('kecamatan').innerHTML = '<option>Pilih Kecamatan</option>';
    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';

    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
        .then(function(response) {
            response.data.forEach(function(item) {
                document.getElementById('kecamatan').innerHTML += 
                    `<option value="${item.id}">${item.name}</option>`;
            });
        });
});

// 🔥 KECAMATAN → KELURAHAN
document.getElementById('kecamatan').addEventListener('change', function() {
    let id = this.value;

    document.getElementById('kelurahan').innerHTML = '<option>Pilih Kelurahan</option>';

    axios.get(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
        .then(function(response) {
            response.data.forEach(function(item) {
                document.getElementById('kelurahan').innerHTML += 
                    `<option value="${item.id}">${item.name}</option>`;
            });
        });
});
</script>

</body>
</html>