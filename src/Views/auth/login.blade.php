<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
{!! Html::style('assets/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
<!-- Font Awesome -->
{!! Html::style('assets/adminLTE/bower_components/font-awesome/css/font-awesome.min.css') !!}
<!-- Ionicons -->
{!! Html::style('assets/adminLTE/bower_components/Ionicons/css/ionicons.min.css') !!}
<!-- Theme style -->
{!! Html::style('assets/adminLTE/dist/css/AdminLTE.min.css') !!}
<!-- iCheck -->
{!! Html::style('assets/adminLTE/plugins/iCheck/square/blue.css') !!}
<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background:{!! config('loginoz.background') !!}; background-image: url({!! config('loginoz.background-img')!!}); background-size: cover;">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>{!! config('templeta.title') !!}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="background: {!! config('loginoz.background-login-body') !!}">
        <p class="login-box-msg">Iniciar sesión</p>

        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Usuario" value="{{ old('email') }}" name="email" required autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> No cerrar sesión
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
{!! Html::script('assets/adminLTE/bower_components/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{!! Html::script('assets/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- iCheck -->
{!! Html::script('assets/adminLTE/plugins/iCheck/icheck.min.js') !!}
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
