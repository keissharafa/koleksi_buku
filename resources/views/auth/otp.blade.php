@extends('layouts.auth')

@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <h4>Masukkan Kode OTP. Kode bisa diakses pada akun gmail anda.</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="otp"
                       class="form-control form-control-lg text-center"
                       maxlength="6"
                       placeholder="------"
                       required>
            </div>

            <div class="mt-3 d-grid">
                <button type="button" class="btn btn-primary btn-lg btn-submit">
                    Verifikasi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const btn = document.querySelector(".btn-submit");

    btn.addEventListener("click", function(){

        let form = btn.closest("form");

        // cek required input
        if(!form.checkValidity()){
            form.reportValidity();
            return;
        }

        // ubah button jadi spinner
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memverifikasi...';

        // disable button supaya tidak double submit
        btn.disabled = true;

        // submit form
        form.submit();

    });

});
</script>
@endsection
