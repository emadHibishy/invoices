<!--=================================
 footer -->


<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{ asset('backend/assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- plugins-jquery -->
<script src="{{ asset('backend/assets/js/plugins-jquery.js') }}"></script>

<!-- plugin_path -->
<script>var plugin_path = "{{ asset("/backend/assets/js") }}/";</script>

<!-- chart -->
<script src="{{ asset('backend/assets/js/chart-init.js') }}"></script>

{{--<!-- calendar -->--}}
<script src="{{ asset('backend/assets/js/calendar.init.js') }}"></script>

<!-- charts sparkline -->
<script src="{{ asset('backend/assets/js/sparkline.init.js') }}"></script>

<!-- charts morris -->
<script src="{{ asset('backend/assets/js/morris.init.js') }}"></script>

<!-- datepicker -->
<script src="{{ asset('backend/assets/js/datepicker.js') }}"></script>

<!-- sweetalert2 -->
<script src="{{ asset('backend/assets/js/sweetalert2.js') }}"></script>

<!-- toastr -->
<script src="{{ asset('backend/assets/js/toastr.js') }}"></script>

<!-- validation -->
<script src="{{ asset('backend/assets/js/validation.js') }}"></script>

<!-- lobilist -->
<script src="{{ asset('backend/assets/js/lobilist.js') }}"></script>

<!-- custom -->
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>

@yield('js')

</body>
</html>
