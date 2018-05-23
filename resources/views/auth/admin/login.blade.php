<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{URL::asset('components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::asset('components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::asset('plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="background-color: #fff;">
  <div class="login-logo">
    <a href="{{ url('/admin') }}"><b><img src="{{URL::asset('img/user3-128x128.jpg')}}" class="img-circle" alt="User Image"></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>
    @include('sweet::alert');
    <form action="{{ route('admin.login.submit') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input name="email" class="form-control" placeholder="Vui lòng nhập địa chỉ mail" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Vui lòng nhập mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-7">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ đăng nhập
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- Hoặc -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">Tôi quên mật khẩu của tôi</a><br>
    <a href="{{ url('/register') }}" class="text-center">Đăng ký thành viên mới</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{URL::asset('components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
