<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 4/21/2018
 * Time: 10:30 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chuyên Trang Nước Hoa</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{URL::asset('components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::asset('components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{URL::asset('components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::asset('css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{URL::asset('components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{URL::asset('components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{URL::asset('components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL::asset('components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{URL::asset('js/manipulation_control.js')}}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('partials.admin.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('partials.admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    @include('partials.admin.footer')
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    @include('modal.concentration')
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="{{URL::asset('components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{URL::asset('components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- jQuery Validation -->
<script src="{{URL::asset('js/jquery.validate.js')}}"></script>
<script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ URL::asset('components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ URL::asset('components/raphael/raphael.min.js')}}"></script>
<script src="{{ URL::asset('components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('components/moment/min/moment.min.js')}}"></script>
<script src="{{URL::asset('components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('js/pages/dashboard.js')}}"></script>
{{--<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('js/demo.js')}}"></script>--}}
<!-- CK Editor -->
<script src="{{ URL::asset('components/ckeditor/ckeditor.js') }}"></script>
<!-- InputMask -->
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
@yield('script')
<script src="{{ URL::asset('js/style.js') }}"></script>
<script src="{{ URL::asset('js/author.js') }}"></script>
<script src="{{ URL::asset('js/type.js') }}"></script>
<script>
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
$(document).ready(function () {
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()
    });

    $('#btnCreateNewStyle').click(function(){
        $('#styleModalCreate').modal('show')
    });

    $('#btnCreateNewAuthor').click(function(){
        $('#authorModalCreate').modal('show')
    });

    $('#btnCreateNewTypePerfume').click(function(){
        $('#typePerfumeModalCreate').modal('show')
    });

    $(function() {
        $("form[name='styleFormCreate']").validate({
            // Specify validation rules
            rules: {
                name: "required"
            },
            // Specify validation error messages
            messages: {
                name: "Tên phong cách không được bỏ trống!"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        $("form[name='styleFormEdit']").validate({
            // Specify validation rules
            rules: {
                name: "required"
            },
            // Specify validation error messages
            messages: {
                name: "Tên phong cách không được bỏ trống!"
            },
            submitHandler: function(form) {
                /** We want to hidden id when edit object in form => No need using normally */
                // Will submit automated
                document.incenseFormEdit.id.value = document.getElementById('hiddenEditStyleID').value;
                form.submit();
            }
        });
    });

    // AUTHOR
    $(function() {
        $("form[name='authorFormCreate']").validate({
            // Specify validation rules
            rules: {
                name: "required"
            },
            // Specify validation error messages
            messages: {
                name: "Nhà pha chế không được bỏ trống!"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        $("form[name='authorFormEdit']").validate({
            // Specify validation rules
            rules: {
                name: "required"
            },
            // Specify validation error messages
            messages: {
                name: "Nhà pha chế không được bỏ trống!"
            },
            submitHandler: function(form) {
                /** We want to hidden id when edit object in form => No need using normally */
                // Will submit automated
                document.authorFormEdit.id.value = document.getElementById('hiddenEditAuthorID').value;
                form.submit();
            }
        });
    });

    // TYPE PERFUME
    $(function() {
        $("form[name='typePerfumeFormCreate']").validate({
            // Specify validation rules
            rules: {
                name: "required"
            },
            // Specify validation error messages
            messages: {
                name: "Tên loại hương không được bỏ trống!"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        $("form[name='typePerfumeFormEdit']").validate({
            // Specify validation rules
            rules: {
                name: "required"
            },
            // Specify validation error messages
            messages: {
                name: "Tên loại hương không được bỏ trống!"
            },
            submitHandler: function(form) {
                /** We want to hidden id when edit object in form => No need using normally */
                // Will submit automated
                document.authorFormEdit.id.value = document.getElementById('hiddenEditTypePerfumeID').value;
                form.submit();
            }
        });
    });

    function showEditIncense(id) {
        $.ajax({
            url:'{!! url('quan-tri/nuoc-hoa/nhom-huong')!!}'+'/'+id,
            dataType: 'json',
            type:"GET",
            beforeSend: function(){
                $('#hiddenEditIncenseID').val(id);
                $('#modal-loading').modal('show');
            }
        })
            .done(function(incense){
                $('#incenseNameEdit').val(incense['incense']['name']);
                $('#incenseDescriptionEdit').val(incense['incense']['description']);
                CKEDITOR.instances.incenseDetailEdit.setData(incense['incense']['detail'], function() {this.checkDirty(); });
                $('#incenseLinkEdit').val(incense['incense']['link']);
                $('#modal-loading').modal('hide');
                $('#incenseModalEdit').modal('show');
            });
    }

    function showEditStyle(id) {
        $.ajax({
            url:'{!! url('quan-tri/nuoc-hoa/phong-cach')!!}'+'/'+id,
            dataType: 'json',
            type:"GET",
            beforeSend: function(){
                $('#hiddenEditStyleID').val(id);
                $('#modal-loading').modal('show');
            }
        })
            .done(function(style){
                $('#styleNameEdit').val(style['style']['name']);
                $('#styleDescriptionEdit').val(style['style']['description']);
                CKEDITOR.instances.styleDetailEdit.setData(style['style']['detail'], function() {this.checkDirty(); });
                $('#styleLinkEdit').val(style['style']['link']);
                $('#modal-loading').modal('hide');
                $('#styleModalEdit').modal('show');
            });
    }

    function showEditAuthor(id) {
        $.ajax({
            url:'{!! url('quan-tri/nuoc-hoa/nha-pha-che')!!}'+'/'+id,
            dataType: 'json',
            type:"GET",
            beforeSend: function(){
                $('#hiddenEditAuthorID').val(id);
                $('#modal-loading').modal('show');
            }
        })
            .done(function(author){
                $('#authorNameEdit').val(author['author']['name']);
                $('#modal-loading').modal('hide');
                $('#authorModalEdit').modal('show');
            });
    }

    function showEditTypePerfume(id) {
        $.ajax({
            url:'{!! url('quan-tri/nuoc-hoa/loai-nuoc-hoa')!!}'+'/'+id,
            dataType: 'json',
            type:"GET",
            beforeSend: function(){
                $('#hiddenEditTypePerfumeID').val(id);
                $('#modal-loading').modal('show');
            }
        })
            .done(function(typeperfume){
                $('#typePerfumeNameEdit').val(typeperfume['typeperfume']['name']);
                $('#modal-loading').modal('hide');
                $('#typePerfumeModalEdit').modal('show');
            });
    }

    function deleteIncenseFunction(id) {
        event.preventDefault();
        swal({
                title: "",
                text: "Bạn có muốn xóa nhóm hương này không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy bỏ",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location =  '{{ url('/quan-tri/nuoc-hoa/nhom-huong/xoa/')}}' +'/'+ id;
                }
            });
    }

    function deleteStyleFunction(id) {
        event.preventDefault();
        swal({
                title: "",
                text: "Bạn có muốn xóa phong cách này không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy bỏ",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location =  '{{ url('/quan-tri/nuoc-hoa/phong-cach/xoa/')}}' +'/'+ id;
                }
            });
    }

    function deleteAuthorFunction(id) {
        event.preventDefault();
        swal({
                title: "",
                text: "Bạn có muốn xóa nhà pha chế này không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy bỏ",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location =  '{{ url('/quan-tri/nuoc-hoa/nha-pha-che/xoa/')}}' +'/'+ id;
                }
            });
    }

    function deleteTypePerfumeFunction(id) {
        event.preventDefault();
        swal({
                title: "",
                text: "Bạn có muốn xóa loại nước hoa này không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy bỏ",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location =  '{{ url('/quan-tri/nuoc-hoa/loai-nuoc-hoa/xoa/')}}' +'/'+ id;
                }
            });
    }

    function deleteSuperFunction(id) {
        event.preventDefault();
        swal({
                title: "",
                text: "Bạn có muốn xóa tài khoản này không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy bỏ",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location =  '{{ url('/quan-tri/cap-cao/xoa/')}}' +'/'+ id;
                }
            });
    }
});
</script>
</body>
</html>

