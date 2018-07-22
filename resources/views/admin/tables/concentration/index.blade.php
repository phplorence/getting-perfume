@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    @include('sweet::alert');
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                NỒNG ĐỘ
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
                        <div class="box-header">
                            <h3 class="box-title">Danh sách nồng độ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 5.00%">STT</th>
                                    <th class="text-center" style="width: 15.00%">Tên nồng độ</th>
                                    <th class="text-center" style="width: 15.00%">Mô tả</th>
                                    <th class="text-center" style="width: 40.00%">Chi tiết</th>
                                    <th class="text-center" style="width: 15.00%">Link bài viết</th>
                                    <th class="text-center" style="width: 10.00%">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @unless($concentrations)
                                    <span class="help-block">
                                      <strong>Vui lòng cập nhập người dùng cấp cao</strong>
                                    </span>
                                @endunless
                                <?php foreach($concentrations as $concentration) : ?>
                                <tr>
                                    <td class="text-center">{{ ++$indexArr }}</td>
                                    <td class="text-center">{{ $concentration->name }}</td>
                                    <td>{{ $concentration->description }}</td>
                                    <td>{{ $concentration->detail }}</td>
                                    <td class="text-center">{{ $concentration->link }}</td>
                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#formConcentration" data-whatever="{{ $concentration->id }}"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="{{ route('admin.perfume.concentration.delete', $concentration->id) }}"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

