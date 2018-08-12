@extends('layouts.master')
@section('content')
  @include('sweet::alert');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADMIN
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="{{ route('admin.super.index') }}"> Danh sách người dùng cấp cao</a></li>
        <li class="active">Thêm mới</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('sweet::alert')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Đăng Ký</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!-- Lorence code -->
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
      var confirmPassword = function() {
          if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
              document.getElementById('message').style.color = 'green';
              document.getElementById('message').innerHTML = "<b>Mật khẩu khớp</b>";
          } else {
              document.getElementById('message').style.color = 'red';
              document.getElementById('message').innerHTML = '<b>Mật khẩu không khớp</b>';
          }
      }
  </script>
@endsection

