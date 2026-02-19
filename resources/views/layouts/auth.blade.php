@include('layouts.header')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')