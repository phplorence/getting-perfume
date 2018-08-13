@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  @include('sweet::alert');
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CẤP CAO
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{  route('admin.dashboard') }}"><i class="fas fa-home"></i> Trang chủ</a></li>
        <li class="active">Nước hoa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <button id="btnCreateNewSuper" type="button" class="btn btn-default btn-sm">Thêm mới</button>
            <div class="box-body">
              <table id="superTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" style="width: 2.00%">STT </th>
                  <th class="text-center" style="width: 12.00%">Tên đăng nhập</th>
                  <th class="text-center" style="width: 10.00%">Phân quyền</th>
                  <th class="text-center" style="width: 6.00%">Email</th>
                  <th class="text-center" style="width: 14.00%">Họ và tên</th>
                  <th class="text-center" style="width: 5.00%">Trạng thái</th>
                  <th class="text-center" style="width: 10.00%">Số điện thoại</th>
                  <th class="text-center" style="width: 10.00%">Ảnh</th>
                  <th class="text-center" style="width: 10.00%">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('modal.super.create')
  @include('modal.super.edit')
  @include('modal.dialog.loading')
@endsection
@section('script')
  <script src="{{ URL::asset('js/super.js') }}"></script>
@endsection


