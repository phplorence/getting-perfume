/**
 * Created by vuongluis on 7/22/2018.
 */

$(function () {
    CKEDITOR.replace('incenseCreate' ,{
        filebrowserUploadUrl : '/admin/panel/upload-image',
        filebrowserImageUploadUrl :  '/admin/panel/upload-image'
    });

    CKEDITOR.replace('incenseDetailEdit' ,{
        filebrowserUploadUrl : '/admin/panel/upload-image',
        filebrowserImageUploadUrl :  '/admin/panel/upload-image'
    });
    $('.textarea').wysihtml5()
});

$(document).ready(function () {
    $('#incenseTable').dataTable({
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
            url: '/quan-tri/nuoc-hoa/nhom-huong/loading_incense',
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "description" },
            { "data": "detail" },
            { "data": "link" },
            { "data": "manipulation", "render": function (id) {
                return '<div class="text-center"><a onclick= "showEditIncense('+id+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+id+'" onclick="deleteIncenseFunction('+id+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>';
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
});

/** VALIDATE JQUERY CLIENT */
$("#incenseFormCreate").validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên nhóm hương không được bỏ trống!"
    }
});

function submitNewIncense(){
    if($('#incenseFormCreate').valid()){
        event.preventDefault();
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nhom-huong',
            method: 'POST',
            dataType: 'json',
            data: $('#incenseFormCreate').serialize()
        })
            .done(function (data) {
                $('#incenseModalCreate').modal('hide')
                if(data['message']['status'] == 'invalid') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'existed') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'success') {
                    swal("", data['message']['description'], "success");
                    var table = $('#incenseTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    table.row.add( [
                        data['incense']['id'],
                        data['incense']['name'],
                        data['incense']['description'],
                        data['incense']['detail'],
                        data['incense']['link'],
                        function (id) {
                            return '<div class="text-center"><a onclick= "showEditIncense('+data['incense']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                            +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+data['incense']['id']+'" onclick="deleteIncenseFunction('+data['incense']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
                    ]).draw();
                } else if(data.status == 'error') {
                    swal("", data['message']['description'], "error");
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    }
}

function showEditIncense(id) {
    $.ajax({
        url: '/quan-tri/nuoc-hoa/nhom-huong/'+id,
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

$("#incenseFormEdit").validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên nhóm hương không được bỏ trống!"
    }
});

function submitUpdateIncense(){
    if($('#incenseFormEdit').valid()){
        event.preventDefault();
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nhom-huong/sua',
            method: 'POST',
            dataType: 'json',
            data: $('#incenseFormEdit').serialize()
        })
            .done(function (data) {
                $('#incenseFormEdit').modal('hide')
                if(data['message']['status'] == 'invalid') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'existed') {
                    swal("", data['message']['description'], "error");
                }
                // if(data['message']['status'] == 'success') {
                //     swal("", data['message']['description'], "success");
                //     var table = $('#incenseTable').DataTable();
                //     $.fn.dataTable.ext.errMode = 'none';
                //     table.row.add( [
                //         data['incense']['id'],
                //         data['incense']['name'],
                //         data['incense']['description'],
                //         data['incense']['detail'],
                //         data['incense']['link'],
                //         function (id) {
                //             return '<div class="text-center"><a onclick= "showEditIncense('+data['incense']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                //                 +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+data['incense']['id']+'" onclick="deleteIncenseFunction('+data['incense']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
                //     ]).draw();
                // } else if(data.status == 'error') {
                //     swal("", data['message']['description'], "error");
                // }
            })
            .fail(function (error) {
                console.log(error);
            });
    }
}