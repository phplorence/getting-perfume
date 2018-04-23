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
            <button class="btn btn-default" type="button"><a href="{{ route('admin.perfume.add') }}" target="_blank">Thêm Sản Phẩm</button>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr class="perfume_table_header">
                          <th class="text-center" style="width: 2.00%">STT </th>
                          <th class="text-center" style="width: 10.00%">Tên sản phẩm</th>
                          <th class="text-center" style="width: 18.00%">Mô tả</th>
                          <th class="text-center" style="width: 30.00%">Chi tiết</th>
                          <th class="text-center" style="width: 8.00%">Giá gốc</th>
                          <th class="text-center" style="width: 10.00%">Giá khuyến mãi</th>
                          <th class="text-center" style="width: 6.00%">Dung tích</th>
                          <th class="text-center" style="width: 8.00%">Loại sản phẩm</th>
                          <th class="text-center" style="width: 8.00%">Hình ảnh</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="text-center"> 1</td>
                          <td class="title">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml </td>
                          <td>Nước hoa mini Versace bright absolu chai màu hồng đậm, Cảm nhận sử quyến rũ và mùi hương tỏa ra hiện đại của Versace absolu Hồng Đậm .. </td>
                          <td>Nước hoa mini Versace bright absolu còn có cái tên gọi ngắn gọn hơn đó là Versace hồng đậm. Versace  cho ra rất nhiều phiên bản nước hoa trong đó với phiên bản bright thì các thiết kế chai giống nhau và cách để mọi người có thể nhận diện
                              là dựa vào màu chai của sản phẩm để đặt tên cho Versace bright absolu là hồng đậm. </td>
                          <td class="original_price text-center">495.000 đ </td>
                          <td class="promotion_price text-center">365.000 đ </td>
                          <td class="text-center">5ml </td>
                          <td class="text-center">Versace </td>
                          <td class="text-center"> <img src="{{URL::asset('img/Versace.jpg')}}" width="120px" height="120px" /></td>
                      </tr>
                      <tr>
                          <td class="text-center"> 1</td>
                          <td class="title">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml </td>
                          <td>Nước hoa mini Versace bright absolu chai màu hồng đậm, Cảm nhận sử quyến rũ và mùi hương tỏa ra hiện đại của Versace absolu Hồng Đậm .. </td>
                          <td>Nước hoa mini Versace bright absolu còn có cái tên gọi ngắn gọn hơn đó là Versace hồng đậm. Versace  cho ra rất nhiều phiên bản nước hoa trong đó với phiên bản bright thì các thiết kế chai giống nhau và cách để mọi người có thể nhận diện
                              là dựa vào màu chai của sản phẩm để đặt tên cho Versace bright absolu là hồng đậm. </td>
                          <td class="original_price text-center">495.000 đ </td>
                          <td class="promotion_price text-center">365.000 đ </td>
                          <td class="text-center">5ml </td>
                          <td class="text-center">Versace </td>
                          <td class="text-center"> <img src="{{URL::asset('img/Versace.jpg')}}" width="120px" height="120px" /></td>
                      </tr>
                      <tr>
                          <td class="text-center"> 1</td>
                          <td class="title">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml </td>
                          <td>Nước hoa mini Versace bright absolu chai màu hồng đậm, Cảm nhận sử quyến rũ và mùi hương tỏa ra hiện đại của Versace absolu Hồng Đậm .. </td>
                          <td>Nước hoa mini Versace bright absolu còn có cái tên gọi ngắn gọn hơn đó là Versace hồng đậm. Versace  cho ra rất nhiều phiên bản nước hoa trong đó với phiên bản bright thì các thiết kế chai giống nhau và cách để mọi người có thể nhận diện
                              là dựa vào màu chai của sản phẩm để đặt tên cho Versace bright absolu là hồng đậm. </td>
                          <td class="original_price text-center">495.000 đ </td>
                          <td class="promotion_price text-center">365.000 đ </td>
                          <td class="text-center">5ml </td>
                          <td class="text-center">Versace </td>
                          <td class="text-center"> <img src="{{URL::asset('img/Versace.jpg')}}" width="120px" height="120px" /></td>
                      </tr>
                      <tr>
                          <td class="text-center"> 1</td>
                          <td class="title">Nước hoa mini Versace bright absolu ( Hồng Đậm ) 5ml </td>
                          <td>Nước hoa mini Versace bright absolu chai màu hồng đậm, Cảm nhận sử quyến rũ và mùi hương tỏa ra hiện đại của Versace absolu Hồng Đậm .. </td>
                          <td>Nước hoa mini Versace bright absolu còn có cái tên gọi ngắn gọn hơn đó là Versace hồng đậm. Versace  cho ra rất nhiều phiên bản nước hoa trong đó với phiên bản bright thì các thiết kế chai giống nhau và cách để mọi người có thể nhận diện
                              là dựa vào màu chai của sản phẩm để đặt tên cho Versace bright absolu là hồng đậm. </td>
                          <td class="original_price text-center">495.000 đ </td>
                          <td class="promotion_price text-center">365.000 đ </td>
                          <td class="text-center">5ml </td>
                          <td class="text-center">Versace </td>
                          <td class="text-center"> <img src="{{URL::asset('img/Versace.jpg')}}" width="120px" height="120px" /></td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
