/**
 * Created by vuongluis on 7/22/2018.
 */
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

$('#btnCreateNewIncense').click(function(){
    $('#incenseModalCreate').modal('show')
});

$('#incenseFormCreate').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên nhóm hương không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#incenseModalCreate').modal('hide');
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nhom-huong',
            method: 'POST',
            dataType: 'json',
            data: $(form).serialize()
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
});

function showEditIncense(id) {
    $.ajax({
        url: '/quan-tri/nuoc-hoa/nhom-huong/'+id,
        dataType: 'json',
        type:"GET",
        beforeSend: function(){
            $('#modal-loading').modal('show');
        }
    })
        .done(function(incense){
            $('#incenseID').val(id);
            $('#incenseNameEdit').val(incense['incense']['name']);
            $('#incenseDescriptionEdit').val(incense['incense']['description']);
            CKEDITOR.instances.incenseDetailEdit.setData(incense['incense']['detail'], function() {this.checkDirty(); });
            $('#incenseLinkEdit').val(incense['incense']['link']);
            $('#modal-loading').modal('hide');
            $('#incenseModalEdit').modal('show');
        });
}

$('#incenseFormEdit').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên nhóm hương không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#incenseModalEdit').modal('hide');
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nhom-huong/sua',
            method: 'POST',
            dataType: 'json',
            data: $(form).serialize()
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
                    var table = $('#incenseTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    console.log();
                    var rows = table.rows().data();
                    for (var i = 0; i < rows.length; i++) {
                        if (rows[i].id == data['incense']['id']) {
                            table.row( this ).data(
                                [
                                    data['incense']['id'],
                                    data['incense']['name'],
                                    data['incense']['description'],
                                    data['incense']['detail'],
                                    data['incense']['link'],
                                    function (id) {
                                        return '<div class="text-center"><a onclick= "showEditIncense('+data['incense']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                            +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+data['incense']['id']+'" onclick="deleteIncenseFunction('+data['incense']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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
    }
});