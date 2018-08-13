<!DOCTYPE html>
<html lang="en">
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
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body class="body">
  @include('sweet::alert');
  <div class="login_wrapper" id="jslogin">
    <div class="col-md-6 formLogin">
      <h2>Hệ Thống Quản Trị</h2>
      <p>Thực hiện chức năng quản trị của website. Tài khoản được cung cấp bởi admin (<strong>Hường Tấn Phong</strong>)</p>
      <form id="loginForm">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
          <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="row">
          <div class="col-xs-5">
            <button type="submit" class="btn buttonLogin">LOGIN</button>
          </div>
        </div>
      </form>
      <div class="row social-network">
        <div class="col-md-4">
          <p style="margin-right: 0px;">Hoặc </p>
        </div>
        <div class="col-md-8">
          <p class="pull-right" style="margin-right: 24px;">
            <a href="#" class="fa fa-facebook socialLogin"></a>
            <a href="#" class="fa fa-twitter socialLogin"></a>
            <a href="#" class="fa fa-google-plus socialLogin"></a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 imgWelcome">
    </div>
  </div>
  <!-- jQuery 3 -->
  <script src="{{URL::asset('components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery.validate.js')}}"></script>
  <script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{URL::asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
  <script>

    jQuery.validator.addMethod("validateEmail", function (value, element) {
        if (/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "Email address is not valid!");

    $('#loginForm').validate({
        rules: {
            email: {
                validateEmail: true,
                required: true
            },
            password: {
                required: true
            }
        },
    });
    $(document).ready(function () {
        $('#loginForm').on('submit', function (event) {
            if (!$(this).valid()) return false;
            event.preventDefault();
            $.ajax({
                url: '{{route("admin.login.submit")}}',
                method: 'POST',
                dataType: 'json',
                data: $(this).serialize()
            })
                .done(function (data) {
                    if(data['message']['status'] == 'success') {
                        window.location.href="http://localhost:8000/quan-tri";
                    }
                    if(data['message']['status'] == 'error') {
                        swal("", data['message']['description'], "error");
                        $('#email').val(data['profile']['email']);
                        $('#password').val(data['profile']['password']);
                    }
                })
                .fail(function (error) {
                    console.log(error);
                });
        });

        $('#jslogin').css({
            'margin': ($(window).height()-480)/2 + "px auto",
            'width':'60%'
        });
    });
  </script>
</body>
</html>