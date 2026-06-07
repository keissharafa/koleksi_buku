<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku - Purple Admin</title>

    <!-- Purple CSS -->
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
                <h3 class="page-title">
                    Edit Buku
                </h3>
            </div>

            <div class="row">
                <div class="col-lg-8 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">
                                Form Edit Buku
                            </h4>

                            <form id="formEditBuku"
                                  action="{{ route('buku.update',$buku->idbuku) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Kode</label>

                                    <input
                                        type="text"
                                        name="kode"
                                        value="{{ old('kode',$buku->kode) }}"
                                        class="form-control"
                                        required
                                    >
                                </div>


                                <div class="form-group">
                                    <label>Judul</label>

                                    <input
                                        type="text"
                                        name="judul"
                                        value="{{ old('judul',$buku->judul) }}"
                                        class="form-control"
                                        required
                                    >
                                </div>


                                <div class="form-group">
                                    <label>Pengarang</label>

                                    <input
                                        type="text"
                                        name="pengarang"
                                        value="{{ old('pengarang',$buku->pengarang) }}"
                                        class="form-control"
                                        required
                                    >
                                </div>


                                <div class="form-group">
                                    <label>Kategori</label>

                                    <select name="idkategori"
                                            class="form-control"
                                            required>

                                        @foreach($kategori as $k)

                                            <option
                                                value="{{ $k->idkategori }}"
                                                {{ $k->idkategori == $buku->idkategori ? 'selected' : '' }}
                                            >
                                                {{ $k->nama_kategori }}
                                            </option>

                                        @endforeach

                                    </select>
                                </div>


                                <div class="mt-3">

                                    <a href="{{ route('buku.index') }}"
                                       class="btn btn-light">
                                        Kembali
                                    </a>

                                    <button
                                        type="button"
                                        id="btnUpdateBuku"
                                        class="btn btn-gradient-success"
                                    >
                                        <i class="mdi mdi-content-save"></i>
                                        Update
                                    </button>

                                </div>

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


<!-- JS Purple -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const btn  = document.getElementById("btnUpdateBuku");
    const form = document.getElementById("formEditBuku");

    btn.addEventListener("click", function () {

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        btn.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span>Memperbarui...';

        btn.disabled = true;

        setTimeout(function () {
            form.submit();
        }, 300);

    });

});

</script>

</body>
</html>