<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SAMUDRA</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->  
        {!! Html::style( 'assets/theme/bootstrap/css/bootstrap.min.css' ); !!}
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->  
        {!! Html::style( 'assets/theme/dist/css/AdminLTE.min.css' ); !!}
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        {!! Html::style( 'assets/theme/dist/css/skins/_all-skins.min.css' ); !!}
        <!-- iCheck -->
        {!! Html::style( 'assets/theme/plugins/iCheck/flat/blue.css' ); !!}
        <!-- Morris chart -->
        {!! Html::style( 'assets/theme/plugins/morris/morris.css' ); !!}
        <!-- jvectormap -->
        {!! Html::style( 'assets/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.css' ); !!}
        <!-- Date Picker -->
        {!! Html::style( 'assets/theme/plugins/datepicker/datepicker3.css' ); !!}
        <!-- Daterange picker -->
        {!! Html::style( 'assets/theme/plugins/daterangepicker/daterangepicker.css' ); !!}
        <!-- Datetime picker -->
        {!! Html::style( 'assets/theme/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css' ); !!}
        <!-- bootstrap wysihtml5 - text editor -->
        {!! Html::style( 'assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ); !!}
        {!! Html::style( 'assets/theme/plugins/select2/select2.min.css' ); !!}
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 2.2.3 -->
        {!! Html::script( 'assets/theme/plugins/jQuery/jquery-2.2.3.min.js' ); !!}
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
        {!! Html::script( 'assets/theme/bootstrap/js/bootstrap.min.js' ); !!}
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>SL</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>SAMLOG</b>  </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>                    
                    @include( 'template.top-nav' )
                </nav>
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            @include( 'template.left-nav' )

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
               <section class="content-header">
                    @yield('header')
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    @include('errors.error')
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include( 'template.footer' )


        </div>
        <!-- ./wrapper -->


        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        {!! Html::script( 'assets/theme/plugins/morris/morris.min.js' ); !!}
        <!-- Sparkline -->
        {!! Html::script( 'assets/theme/plugins/sparkline/jquery.sparkline.min.js' ); !!}
        <!-- jvectormap -->
        {!! Html::script( 'assets/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ); !!}
        {!! Html::script( 'assets/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ); !!}
        <!-- Repeater -->
        <!--{!! Html::script( 'assets/repeater/jquery.repeater.js' ); !!}-->
        <!-- jQuery Knob Chart -->
        {!! Html::script( 'assets/theme/plugins/knob/jquery.knob.js' ); !!}
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        {!! Html::script( 'assets/theme/plugins/daterangepicker/daterangepicker.js' ); !!}
        <!-- datepicker -->
        {!! Html::script( 'assets/theme/plugins/datepicker/bootstrap-datepicker.js' ); !!}
        <!-- datetimepicker -->
        {!! Html::script( 'assets/theme/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js' ); !!}
        <!-- Bootstrap WYSIHTML5 -->
        {!! Html::script( 'assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ); !!}
        <!-- Slimscroll -->
        {!! Html::script( 'assets/theme/plugins/slimScroll/jquery.slimscroll.min.js' ); !!}
        <!-- FastClick -->
        {!! Html::script( 'assets/theme/plugins/fastclick/fastclick.js' ); !!}
        <!-- AdminLTE App -->
        {!! Html::script( 'assets/theme/dist/js/app.min.js' ); !!}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {!! Html::script( 'assets/theme/dist/js/pages/dashboard.js' ); !!}
        <!-- AdminLTE for demo purposes -->
        {!! Html::script( 'assets/theme/dist/js/demo.js' ); !!}
        {!! Html::script( 'assets/theme/plugins/select2/select2.min.js' ); !!}
        {!! Html::script( 'assets/theme/plugins/autonumeric/autoNumeric.min.js' ); !!}
    </body>
</html>
