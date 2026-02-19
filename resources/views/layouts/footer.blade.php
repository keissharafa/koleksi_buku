      </div> {{-- content-wrapper --}}

      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
            Copyright © 2023 BootstrapDash
          </span>
        </div>
      </footer>

    </div> {{-- main-panel --}}
</div> {{-- page-body-wrapper --}}
</div> {{-- container-scroller --}}

{{-- JAVASCRIPT GLOBAL --}}
<script src="{{ asset('dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('dist/assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('dist/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('dist/assets/js/misc.js') }}"></script>
<script src="{{ asset('dist/assets/js/settings.js') }}"></script>
<script src="{{ asset('dist/assets/js/todolist.js') }}"></script>
<script src="{{ asset('dist/assets/js/jquery.cookie.js') }}"></script>

{{-- JAVASCRIPT PAGE --}}
@stack('script')

</body>
</html>
