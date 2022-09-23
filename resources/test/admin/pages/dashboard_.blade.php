{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        @include('admin.pages.widgets._widget-1')
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            @include('admin.pages.widgets._widget-2')
                            <!-- /.card -->

                            <!-- DIRECT CHAT -->
                            @include('admin.pages.widgets._widget-3')
                            <!--/.direct-chat -->

                            <!-- TO DO List -->
                            @include('admin.pages.widgets._widget-4')
                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">
                            <!-- Map card -->
                            @include('admin.pages.widgets._widget-5')
                            <!-- /.card -->

                            <!-- solid sales graph -->
                            @include('admin.pages.widgets._widget-6')
                            <!-- /.card -->

                            <!-- Calendar -->
                            @include('admin.pages.widgets._widget-7')
                            <!-- /.card -->
                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <!-- <script src="{{ asset('js/admin.pages/widgets.js') }}" type="text/javascript"></script> -->
    
    <!-- jQuery -->
    <!-- <script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script> -->


   
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('vendor/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('vendor/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    
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




    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('vendor/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('vendor/dist/js/pages/dashboard.js') }}"></script>


@endsection
