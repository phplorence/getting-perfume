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

    <!-- Control Sidebar -->
    @include('partials.admin.setting.sidebar')
    <!-- /.control-sidebar -->

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
<!-- jvectormap -->
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('js/demo.js')}}"></script>
<!-- CK Editor -->
<script src="{{ URL::asset('components/ckeditor/ckeditor.js') }}"></script>
<!-- InputMask -->
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()
    })

    $(document).ready(function(){
        $('#incenseTable').dataTable({
            "pageLength": 10,
            "lengthMenu": [[5,10,15,-1], [5,10,15,'All']],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,

            "ajax": {
                url: "{!! route('admin.perfume.incense.index.incenseDataTables') !!}",
                type: "GET"
            },

            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "description" },
                { "data": "detail" },
                { "data": "link" },
                { "render": function (id) {
                    return '<div class="text-center"><a onclick= "showViewAnnouncement(".$id.")"><img src="{{URL::asset('img/icon-control/icon_edit.svg')}}"  width="24px" height="24px" alt="Update Icon"></a>'
                        +'<span>  </span>'+'<a onclick= "showViewAnnouncement(".$id.")"><img src="{{URL::asset('img/icon-control/icon_delete.svg')}}"  width="24px" height="24px" alt="Update Icon"></a></div>';
                }}
            ],

            "language": {
                "lengthMenu": "Hiển thị các bản ghi _MENU_ trên mỗi trang",
                "zeroRecords": "Không tìm thấy - xin lỗi",
                "info": "Hiển thị _START_ đến _END_ trong số _TOTAL_ mục",
                "infoEmpty": "Không có bản ghi nào",
                "search": "Tìm kiếm: ",
                "paginate": {
                    "previous": "Trước",
                    "next": "Sau"
                },
                "infoFiltered": "(được lọc từ tổng số bản ghi _MAX_)"
            }

        });
    });

    $('#btnCreateNewIncense').click(function(){
        $('#incenseModalCreate').modal('show')
        CKEDITOR.replace('incenseCreate')
    });

    $('#btnSubmitNewIncense').click(function () {
        $('#incenseFormCreate').valid();
    });

    $('#incenseFormCreate').validate({
        rules: {
            name: {
                required: true,
                maxlength:50
            }
        },
        messages:{
            name: {
                required:"Tiêu đề không được để trống và có độ dài dưới 50 ký tự"
            },
        },
        success:function() {

        }
    });

</script>
</body>
</html>

