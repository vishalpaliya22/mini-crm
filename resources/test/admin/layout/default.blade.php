<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Meta Data --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
    
    {{-- Favicon --}}
    {{-- <link rel="shortcut icon" href="{{ asset('vendor/media/logos/favicon.ico') }}" /> --}}
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/jqvmap/jqvmap.min.css') }}">
    

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">



    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('vendor/plugins/summernote/summernote-bs4.min.css') }}">
    @yield('styles')
    
</head>
<!-- <body class="hold-transition sidebar-mini layout-fixed"> -->
<body class="hold-transition sidebar-mini">
    {{-- wrapper --}}
    <div class="wrapper">
        {{-- Preloader --}}
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('vendor/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>
        @include('admin.layout._header')    
        @include('admin.layout._aside')    
        @yield('content')  
        @include('admin.layout._footer')    
        {{-- Control Sidebar --}}
        <aside class="control-sidebar control-sidebar-dark">
            {{-- Control sidebar content goes here --}}
        </aside>
        {{-- /.control-sidebar --}}
    </div>
    {{-- ./wrapper --}}      
 
<!-- jQuery -->
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('vendor/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('vendor/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('vendor/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('vendor/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('vendor/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('vendor/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('vendor/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('vendor/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('vendor/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('vendor/dist/js/adminlte.js') }}"></script>
<!-- <script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('vendor/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('vendor/dist/js/pages/dashboard.js') }}"></script>
@yield('scripts')
</body>
</html>