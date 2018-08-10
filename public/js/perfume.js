/**
 * Created by vuongluis on 8/6/2018.
 */
$(document).ready(function () {
    $('#perfumeTable').dataTable({
        "pageLength": 18,
        "lengthMenu": [[5,10,15,-1], [5,10,15,'All']],
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        "processing": true,
        "serverSide": true,

        "ajax": {
            url: '/quan-tri/nuoc-hoa/loading_perfume',
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "original_price" },
            { "data": "promotion_price" },
            { "data": "dore" },
            { "data": "typeofProduct" },
            { "data": "status" },
            { "data": "count" },
            { "data": "path_image" },
            { "data": "manipulation", "render": function (id) {
                return '<div class="text-center"><a onclick= "showEditPerfume('+id+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                    +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/xoa/'+id+'" onclick="deletePerfumeFunction('+id+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>';
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

$(function () {
    CKEDITOR.replace('editor1' ,{
        filebrowserUploadUrl : '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl :  '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images'
    });

    CKEDITOR.replace('editor2' ,{
        filebrowserUploadUrl : '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl :  '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images'
    });

    CKEDITOR.replace('editor1Edit' ,{
        filebrowserUploadUrl : '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl :  '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images'
    });

    CKEDITOR.replace('editor2Edit' ,{
        filebrowserUploadUrl : '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl :  '../components/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images'
    });
    $('.textarea').wysihtml5()
});

$('#btnCreateNewPerfume').click(function(){
    $('#perfumeModalCreate').modal('show')
    $('#perfumeFormCreate').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
    $.ajax({
        url: '/quan-tri/nuoc-hoa/nong-do/all',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: "POST",
        beforeSend: function(){
        }
    })
        .done(function(data){
            $('#ajax_concentration').replaceWith(data['html']);
        });

    $.ajax({
        url: '/quan-tri/nuoc-hoa/nhom-huong/all',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: "POST",
        beforeSend: function(){
        }
    })
        .done(function(data){
            $('#ajax_incense').replaceWith(data['html']);
            $('.select2').select2();
        });

    $.ajax({
        url: '/quan-tri/nuoc-hoa/phong-cach/all',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: "POST",
        beforeSend: function(){
        }
    })
        .done(function(data){
            $('#ajax_style').replaceWith(data['html']);
            $('.select2').select2();
        });

    $.ajax({
        url: '/quan-tri/nuoc-hoa/loai-nuoc-hoa/all',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: "POST",
        beforeSend: function(){
        }
    })
        .done(function(data){
            $('#ajax_typeperfume').replaceWith(data['html']);
        });

    $.ajax({
        url: '/quan-tri/nuoc-hoa/nha-pha-che/all',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: "POST",
        beforeSend: function(){
        }
    })
        .done(function(data){
            $('#ajax_author').replaceWith(data['html']);
        });
});

$('#perfumeFormCreate').validate({
    rules: {
        name: "required",
    },
    messages: {
        name: "Tên nước hoa không được bỏ trống!",
    },
});

$(document).ready(function () {
    $('#perfumeFormCreate').on('submit', function (event) {
        if (!$(this).valid()) return false;
        event.preventDefault();
        $('#editor1').val(CKEDITOR.instances.editor1.getData());
        $('#editor2').val(CKEDITOR.instances.editor2.getData());
        $('#perfumeModalCreate').modal('hide');
        var formData = new FormData(this);

        $(document).on('change', '#concentration', function() {
            var value = $(this).val();
            formData.append('concentration', value);
        });

        $(document).on('change', '#author', function() {
            var value = $(this).val();
            formData.append('author', value);
        });

        $(document).on('change', '#typeperfume', function() {
            var value = $(this).val();
            formData.append('typeperfume', value);
        });

        $(document).on('change', '#status', function() {
            var value = $(this).val();
            formData.append('status', value);
        });

        $(document).on('change', '#country', function() {
            var value = $(this).val();
            formData.append('country', value);
        });

        formData.append('incense', $('#incense').val());
        formData.append('style', $('#style').val());
        formData.append('gender', $('input[name=optradio]:checked').val());

        $.ajax({
            url: '/quan-tri/nuoc-hoa',
            method: "POST",
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (data) {
                CKEDITOR.instances.editor1.setData('', function() {this.checkDirty(); });
                CKEDITOR.instances.editor2.setData('', function() {this.checkDirty(); });
                if(data['message']['status'] == 'invalid') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'existed') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'success') {
                    swal("", data['message']['description'], "success");
                    var table = $('#perfumeTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    var rows = table.rows().data();
                    for (var i = 0; i < rows.length; i++) {
                        table.row( this ).data(
                            [
                                data['perfume']['id'],
                                data['perfume']['name'],
                                data['perfume']['original_price'],
                                data['perfume']['promotion_price'],
                                data['perfume']['dore'],
                                data['perfume']['typeofProduct'],
                                data['perfume']['status'],
                                data['perfume']['count'],
                                data['perfume']['path_image'],
                                function (id) {
                                    return '<div class="text-center"><a onclick= "showEditPerfume('+data['perfume']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                        +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+data['perfume']['id']+'" onclick="deletePerfumeFunction('+data['perfume']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
                            ]
                        ).draw();
                    }
                } else if(data.status == 'error') {
                    swal("", data['message']['description'], "error");
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    });

    /*$('#perfumeFormEdit').on('submit', function (event) {
        if (!$(this).valid()) return false;
        event.preventDefault();
        $('#editor1').val(CKEDITOR.instances.editor1.getData());
        $('#editor2').val(CKEDITOR.instances.editor2.getData());
        $('#perfumeModalEdit').modal('hide');
        var formData = new FormData(this);

        $(document).on('change', '#concentration', function() {
            var value = $(this).val();
            formData.append('concentration', value);
        });

        $(document).on('change', '#author', function() {
            var value = $(this).val();
            formData.append('author', value);
        });

        $(document).on('change', '#typeperfume', function() {
            var value = $(this).val();
            formData.append('typeperfume', value);
        });

        $(document).on('change', '#status', function() {
            var value = $(this).val();
            formData.append('status', value);
        });

        $(document).on('change', '#country', function() {
            var value = $(this).val();
            formData.append('country', value);
        });

        formData.append('incense', $('#incense').val());
        formData.append('style', $('#style').val());
        formData.append('gender', $('input[name=optradio]:checked').val());

        $.ajax({
            url: '/quan-tri/nuoc-hoa',
            method: "POST",
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (data) {
                console.log(data);
                CKEDITOR.instances.editor1.setData('', function() {this.checkDirty(); });
                CKEDITOR.instances.editor2.setData('', function() {this.checkDirty(); });
                if(data['message']['status'] == 'invalid') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'existed') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'success') {
                    swal("", data['message']['description'], "success");
                    var table = $('#perfumeTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    var rows = table.rows().data();
                    for (var i = 0; i < rows.length; i++) {
                        table.row( this ).data(
                            [
                                data['perfume']['id'],
                                data['perfume']['name'],
                                data['perfume']['original_price'],
                                data['perfume']['promotion_price'],
                                data['perfume']['dore'],
                                data['perfume']['typeofProduct'],
                                data['perfume']['status'],
                                data['perfume']['count'],
                                data['perfume']['path_image'],
                                function (id) {
                                    return '<div class="text-center"><a onclick= "showEditPerfume('+data['perfume']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                        +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+data['perfume']['id']+'" onclick="deletePerfumeFunction('+data['perfume']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
                            ]
                        ).draw();
                    }
                } else if(data.status == 'error') {
                    swal("", data['message']['description'], "error");
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    });*/
});

function showEditPerfume(id) {

    $.ajax({
        url: '/quan-tri/nuoc-hoa/'+id,
        dataType: 'json',
        type:"GET",
        beforeSend: function(){
            $.ajax({
                url: '/quan-tri/nuoc-hoa/nong-do/all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: "POST",
                beforeSend: function(){
                }
            })
                .done(function(data){
                    $('#ajax_concentrationx').replaceWith(data['html']);
                });

            $.ajax({
                url: '/quan-tri/nuoc-hoa/nhom-huong/all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: "POST",
                beforeSend: function(){
                }
            })
                .done(function(data){
                    $('#ajax_incensex').replaceWith(data['html']);
                    $('.select2').select2();
                });

            $.ajax({
                url: '/quan-tri/nuoc-hoa/phong-cach/all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: "POST",
                beforeSend: function(){
                }
            })
                .done(function(data){
                    $('#ajax_stylex').replaceWith(data['html']);
                    $('.select2').select2();
                });

            $.ajax({
                url: '/quan-tri/nuoc-hoa/loai-nuoc-hoa/all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: "POST",
                beforeSend: function(){
                }
            })
                .done(function(data){
                    $('#ajax_typeperfumex').replaceWith(data['html']);
                });

            $.ajax({
                url: '/quan-tri/nuoc-hoa/nha-pha-che/all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: "POST",
                beforeSend: function(){
                }
            })
                .done(function(data){
                    $('#ajax_authorx').replaceWith(data['html']);
                });
            $('#modal-loading').modal('show');
            /*$('#perfumeID').val(id);*/
        }
    })
        .done(function(perfume){
            console.log(perfume);
            $('#nameEdit').val(perfume['perfume']['name']);
            CKEDITOR.instances.editor1Edit.setData(perfume['perfume']['description'], function() {this.checkDirty(); });
            CKEDITOR.instances.editor2Edit.setData(perfume['perfume']['detail'], function() {this.checkDirty(); });
            $('#original_price_edit').val(+perfume['perfume']['original_price']);
            $('#promotion_price_edit').val(+perfume['perfume']['promotion_price']);
            $('#doreEdit').val(+perfume['perfume']['dore']);
            $("#concentration option[value="+perfume['perfume']['concentration']+"]").prop("selected", "selected");
            /** date-created */
            $("#author option[value="+perfume['perfume']['bartender']+"]").prop("selected", "selected");
            $('#modal-loading').modal('hide');
            $('#perfumeModalEdit').modal('show');
        });
}