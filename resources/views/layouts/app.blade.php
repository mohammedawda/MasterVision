@include('includes.header')

<!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
@yield('content')

<script src={{asset('frontend/js/jquery.min.js')}}></script>
<script src={{asset('frontend/js/popper.js')}}></script>
<script src={{asset('frontend/js/bootstrap.min.js')}}></script>
<script src={{asset('frontend/js/validate.min.js')}}></script>
<script src={{asset('frontend/js/main.js')}}></script>


<!-- END PAGE LEVEL JS-->
@yield('scripts')
@stack('scripts')

</body>
</html>
