<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
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
        <!-- iCheck -->		  
        {!! Html::style( 'assets/theme/plugins/iCheck/square/blue.css' ); !!}
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            @include('errors.error')
            @yield('content')
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        {!! Html::script( 'assets/theme/plugins/jQuery/jquery-2.2.3.min.js' ); !!}
        <!-- Bootstrap 3.3.6 -->
        {!! Html::script( 'assets/theme/bootstrap/js/bootstrap.min.js' ); !!}
        <!-- iCheck -->
        {!! Html::script( 'assets/theme/plugins/iCheck/icheck.min.js' ); !!}
        <script>
            $(function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
