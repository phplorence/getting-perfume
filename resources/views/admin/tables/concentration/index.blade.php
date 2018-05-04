@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    @include('sweet::alert');
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Nồng độ
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{  route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $concentration->id }}"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="{{ route('admin.perfume.concentration.delete', $concentration->id) }}"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-body">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Thêm mới thông tin</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="{{ route('admin.perfume.concentration.store') }}">
                                    {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên nồng độ<span style="color:red;">(*)</span></label>
                                            <input name="name" type="text" class="form-control" id="i_name" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="description" id="i_description" class="form-control" rows="3" placeholder="">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <h3 class="box-title">Thông tin chi tiết sản phẩm</h3>
                                            <textarea id = "editor1"  name="detail" class="form-control" rows="5" id="comment">{{ old('detail') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Liên bài viết</label>
                                            <input type="text" name="link" class="form-control" id="i_link" value="{{ old('link') }}">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                                    </div>
                                </form>
                            </div>
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
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function (event){
            var id = $(event.relatedTarget).data('whatever')
            alert("Id"+id)
            $(this).find('.m_name input').text("NGUYEN VAN VUONG")
        })
    </script>
    <!-- /.content-wrapper -->
@endsection

