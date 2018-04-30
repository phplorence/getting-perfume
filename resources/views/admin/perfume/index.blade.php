@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Lorence code -->
    <section class="content-header">
      <h1>
        Chuyên Trang Nước Hoa
        <small>Dữ liệu nước hoa được cập nhật tại đây</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="{{ route('admin.dashboard') }}" target="blank"> Bài Viết</a></li>
        <li class="active">Nước Hoa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Chi tiết thông tin tất cả sản phẩm nước hoa</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="mailbox-controls">
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><a href="{{ route('admin.perfume.index') }}"><i class="fa fa-refresh"></i></a></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><a href="{{ route('admin.perfume.create') }}">
                        <i class="fa fa-user-plus"></i></a>
                </button>
                <div class="pull-right">
                    11/250
                    <div class="btn-group">
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
                      <th class="text-center" style="width: 10.00%">Tên sản phẩm</th>
                      <th class="text-center" style="width: 8.00%">Giá gốc</th>
                      <th class="text-center" style="width: 10.00%">Giá khuyến mãi</th>
                      <th class="text-center" style="width: 6.00%">Dung tích</th>
                      <th class="text-center" style="width: 8.00%">Loại sản phẩm</th>
                      <th class="text-center" style="width: 8.00%">Trạng thái</th>
                      <th class="text-center" style="width: 8.00%">Số lượng</th>
                      <th class="text-center" style="width: 8.00%">Hình ảnh</th>
                      <th class="text-center" style="width: 10.00%">Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td class="text-center"> 1</td>
                      <td class="title">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml </td>
                      <td class="original_price text-center">495.000 đ </td>
                      <td class="promotion_price text-center">365.000 đ </td>
                      <td class="text-center">5ml </td>
                      <td class="text-center">Versace </td>
                      <td class="text-center">Còn hàng</td>
                      <td class="text-center">12</td>
                      <td class="text-center"> <img src="{{URL::asset('img/Versace.jpg')}}" width="120px" height="120px" /></td>
                      <td class="text-center">
                          <a href="#"><img src="{{URL::asset('img/icon-control/icon_update.png')}}" class="img-circle" alt="Update Icon"></a>
                          <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.png')}}" class="img-circle" alt="Delete Icon"></a>
                      </td>
                  </tr>
                  </tbody>
              </table>
                <!-- /.table -->
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
