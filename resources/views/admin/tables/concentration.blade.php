<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 5/1/2018
 * Time: 12:22 AM
 */
?>
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
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên nồng độ</th>
                                    <th class="text-center">Mô tả</th>
                                    <th class="text-center">Chi tiết</th>
                                    <th class="text-center">Link bài viết</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasman</td>
                                    <td>Internet Explorer 5.1</td>
                                    <td>Mac OS 7.6-9</td>
                                    <td></td>
                                    <td>1</td>
                                    <td class="text-center">
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>
                                        <a href="#"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}" width="24px" height="24px" alt="Delete Icon"></a>
                                    </td>
                                </tr>
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
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên nồng độ</label>
                                            <input type="text" style="text-transform: uppercase" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label>Mô tả<span style="color:red;">(*)</span></label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <h3 class="box-title">Thông tin chi tiết sản phẩm<span style="color:red;">(*)</span>
                                                <small>CK Editor có hổ trợ định dạng page. Cách sử dụng xem thêm ở đây: <a href="www.google.com" href="blank">Support</a></small>
                                            </h3>
                                            <textarea id = "editor1"  name="editor1" class="form-control" rows="5" id="comment">{{ old('detail') }}</textarea>
                                            @if ($errors->has('detail'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('detail') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Liên bài viết</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
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
    <!-- /.content-wrapper -->
@endsection

