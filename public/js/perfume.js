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
                $('#incense').val('');
                $('#style').val('');
                document.getElementById("exampleInputFile").value = "";
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
                    table.row.add(
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
                                    +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/xoa/'+data['perfume']['id']+'" onclick="deletePerfumeFunction('+data['perfume']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
                        ]
                    ).draw();
                } else if(data.status == 'error') {
                    swal("", data['message']['description'], "error");
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    });

    $('#perfumeFormEdit').on('submit', function (event) {
        if (!$(this).valid()) return false;
        event.preventDefault();
        $('#editor1Edit').val(CKEDITOR.instances.editor1Edit.getData());
        $('#editor2Edit').val(CKEDITOR.instances.editor2Edit.getData());
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
        formData.append('id', $('#perfumeID').val());

        $.ajax({
            url: '/quan-tri/nuoc-hoa/sua',
            method: "POST",
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (data) {
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
                        if (rows[i].id == data['perfume']['id']) {
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
                    }
                } else if(data.status == 'error') {
                    swal("", data['message']['description'], "error");
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    });
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
            $('#perfumeID').val(id);
        }
    })
        .done(function(perfume){
            $('#nameEdit').val(perfume['perfume']['name']);
            console.log(perfume['perfume']['count']);
            $('#countEdit').val(+perfume['perfume']['count']);
            CKEDITOR.instances.editor1Edit.setData(perfume['perfume']['description'], function() {this.checkDirty(); });
            CKEDITOR.instances.editor2Edit.setData(perfume['perfume']['detail'], function() {this.checkDirty(); });
            $('#original_price_edit').val(+perfume['perfume']['original_price']);
            $('#promotion_price_edit').val(+perfume['perfume']['promotion_price']);
            $('#doreEdit').val(+perfume['perfume']['dore']);
            $("#concentration option[value="+perfume['perfume']['concentration']+"]").prop("selected", "selected");
            if (perfume['perfume']['date_created'] != null ) {
                var date_created_format = perfume['perfume']['date_created'].substring(8, 10) + "/" + perfume['perfume']['date_created'].substring(5, 7) + "/" + perfume['perfume']['date_created'].substring(0, 4);
                $("#date_created").val("\""+date_created_format+"\"");
            }
            if (perfume['perfume']['date_expiration'] != null) {
                var date_expiration_format = perfume['perfume']['date_expiration'].substring(8, 10) + "/" + perfume['perfume']['date_expiration'].substring(5, 7) + "/" + perfume['perfume']['date_expiration'].substring(0, 4);
                $("#date_expiration").val("\""+date_expiration_format+"\"");
            }
            $("#author option[value="+perfume['perfume']['bartender']+"]").prop("selected", "selected");
            $("#status option[value=\""+perfume['perfume']['status']+"\"]").prop("selected", "selected");
            $("#typeperfume option[value=\""+perfume['perfume']['typeofProduct']+"\"]").prop("selected", "selected");
            $("input[name=optradio][value=\"" + perfume['perfume']['gender'] + "\"]").prop('checked', true);

            var incenses = perfume['perfume']['groupofincense'];
            if (incenses != null) {
                $.each(incenses.split(","), function(i,e){
                    $("#incense option[value=\"" + e + "\"]").prop("selected", "selected");
                });
            }

            var styles = perfume['perfume']['style'];
            if (styles != null) {
                $.each(styles.split(","), function(i,e){
                    $("#style option[value=\"" + e + "\"]").prop("selected", "selected");
                });
            }
            if (perfume['perfume']['path_image'] == null || perfume['perfume']['path_image'] == '') {
                $('#photo').attr('src', location.protocol + '//' + location.host+'/img/'+'image_place_holder.png');
            } else {
                $('#photo').attr('src', location.protocol + '//' + location.host+'/perfume/'+perfume['perfume']['path_image']);
            }

            $('#modal-loading').modal('hide');
            $('#perfumeModalEdit').modal('show');
        });
}

function deletePerfumeFunction(id) {
    event.preventDefault();
    swal({
            title: "",
            text: "Bạn có muốn xóa nước hoa này không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Xóa",
            cancelButtonText: "Hủy bỏ",
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                $.ajax({
                    url: '/quan-tri/nuoc-hoa/xoa/'+id,
                    dataType: 'json',
                    type:"GET",
                    beforeSend: function(){
                    }
                })
                    .done(function(data){
                        if(data['message']['status'] == 'success') {
                            swal("", data['message']['description'], "success");
                            var table = $('#perfumeTable').DataTable();
                            $.fn.dataTable.ext.errMode = 'none';
                            var rows = table.rows().data();
                            for (var i = 0; i < rows.length; i++) {
                                if (rows[i].id == data['perfume']['id']) {
                                    table.row(this).remove().draw();
                                }
                            }
                        }
                        if(data['message']['status'] == 'error') {
                            swal("", data['message']['description'], "error");
                        }
                    })
                    .fail(function (error) {
                        console.log(error);
                    });
            }
        });
}