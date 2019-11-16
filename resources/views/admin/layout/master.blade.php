<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @yield('page_title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('admin0/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin0/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('admin0/bower_components/Ionicons/css/ionicons.min.css')}}">
    
    <link rel="stylesheet"
        href="{{asset('admin0/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    {{-- slect2 --}}
    <link rel="stylesheet" href="{{asset('admin0/plugins/select2/select2.min.css')}}">
    
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin0/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('admin0/dist/css/skins/_all-skins.min.css')}}">
    {{-- css here --}}
    
    @yield('style')
    {{-- .css --}}
</head>


<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('admin.layout.header')
       
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            {{-- content here --}}
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>

        
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    @include('ckfinder::setup')

    
    <!-- jQuery 3 -->
    <script src="{{asset('admin0/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin0/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('admin0/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    {{-- JS APP --}}
    <script src="{{asset('admin0/dist/js/adminlte.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('admin0/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin0/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin0/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin0/plugins/sweet_alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('admin0/js/main.js')}}"></script>
    <!-- CK Editor -->
    <script src="{{asset('admin0/bower_components/ckeditor/ckeditor.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/ckfinder/ckfinder.js')}}"></script>
    <script>
        CKFinder.config( { connectorPath: '/ckfinder/connector' } );
    </script>
    {{-- js here --}}
    @yield('js')
    {{-- .js --}}
</body>

</html>