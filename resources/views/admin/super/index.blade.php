@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cấp Cao
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{  route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Cấp cao</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tất cả</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Tìm kiếm theo tên">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><a href="{{ route('admin.super.create') }}"><i class="fa fa-user-plus"></i></a></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                  <tr class="perfume_table_header">
                    <th class="text-center" style="width: 2.00%">STT </th>
                    <th class="text-center" style="width: 8.00%">Tên đăng nhập</th>
                    <th class="text-center" style="width: 6.00%">Phân quyền</th>
                    <th class="text-center" style="width: 10.00%">Email</th>
                    <th class="text-center" style="width: 14.00%">Họ và tên</th>
                    <th class="text-center" style="width: 7.00%">Giới tính</th>
                    <th class="text-center" style="width: 18.00%">Địa chỉ</th>
                    <th class="text-center" style="width: 5.00%">Trạng thái</th>
                    <th class="text-center" style="width: 10.00%">Số điện thoại</th>
                    <th class="text-center" style="width: 10.00%">Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  @unless($admins)
                    <span class="help-block">
                      <strong>Vui lòng cập nhập người dùng cấp cao</strong>
                    </span>
                  @endunless
                  <?php foreach($admins as $admin) : ?>
                  <tr>
                      <td class="text-center">{{ ++$indexArr }}</td>
                      <td><a href="read-mail.html">{{ $admin->username }}</a></td>
                      <td class="text-center"><b>{{ $admin->user_type }}</b></td>
                      <td class="text-center">{{ $admin->email }}</td>
                      <td class="text-center">{{ $admin->full_name }}</td>
                      <td class="text-center">{{ $admin->gender }}</td>
                      <td><i>{{ $admin->address }}</i></td>
                      <td class="text-center">
                        @if($admin->active == "on")
                          <a href="#"><i class="fa fa-circle text-blue"></i></a></td>
                        @else
                          <a href="#"><i class="fa fa-circle text-red"></i></a></td>
                        @endif
                      <td class="text-center">{{ $admin->phone_number }}</td>
                      <td class="text-center">
                        <a href="{{ route('admin.super.detail', $admin->id) }}"><img src="{{URL::asset('img/icon-control/icon_update.png')}}" class="img-circle" alt="Update Icon"></a>
                        <a href="{{ route('admin.super.detail', $admin->id) }}"><img src="{{URL::asset('img/icon-control/icon_delete.png')}}" class="img-circle" alt="Delete Icon"></a>
                      </td>
                   </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection