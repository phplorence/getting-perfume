@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    @include('sweet::alert');
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                NƯỚC HOA
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
                        <button id="btnCreateNewPerfume" type="button" class="btn btn-default btn-sm">Thêm mới</button>
                        <div class="box-body">
                            <table id="perfumeTable" class="table table-bordered table-striped">
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
                                    <td></td>
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
@endsection
@section('script')
    <script src="{{ URL::asset('js/perfume.js') }}"></script>
@endsection