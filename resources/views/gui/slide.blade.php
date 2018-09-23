<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 8/25/2018
 * Time: 12:53 PM
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
                Slide Ảnh
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
                        <div class="thumbnail"><img src="{{URL::asset('img/4.png')}}" />
                            <div class="caption">
                                <h3>Khuyến mãi cực sốc</h3>
                                <p>Nước Hoa giá sỉ - bán buôn nước hoa - chuyên cung cấp phân phối sỉ nước hoa - nguồn hàng nước hoa </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
    <!-- /.content-wrapper -->
    @include('modal.author.create')
    @include('modal.author.edit')
    @include('modal.dialog.loading')
@endsection
@section('script')
    <script src="{{ URL::asset('js/author.js') }}"></script>
@endsection

