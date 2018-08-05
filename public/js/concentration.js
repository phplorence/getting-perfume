/**
 * Created by vuongluis on 8/5/2018.
 */
$(document).ready(function () {
    $('#concentrationTable').dataTable({
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
            url: '/quan-tri/nuoc-hoa/nong-do/loading_concentration',
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "description" },
            { "data": "detail" },
            { "data": "link" },
            { "data": "manipulation", "render": function (id) {
                return '<div class="text-center"><a onclick= "showEditConcentration('+id+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                    +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nong-do/xoa/'+id+'" onclick="deleteConcentrationFunction('+id+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>';
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
    CKEDITOR.replace('concentrationCreate' ,{
        filebrowserUploadUrl : '/admin/panel/upload-image',
        filebrowserImageUploadUrl :  '/admin/panel/upload-image'
    });

    CKEDITOR.replace('concentrationDetailEdit' ,{
        filebrowserUploadUrl : '/admin/panel/upload-image',
        filebrowserImageUploadUrl :  '/admin/panel/upload-image'
    });

    $('.textarea').wysihtml5()
});

$('#btnCreateNewConcentration').click(function(){
    $('#concentrationModalCreate').modal('show')
    $('#concentrationFormCreate').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
});

$('#concentrationFormCreate').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên nồng độ không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#concentrationModalCreate').modal('hide');
        $('#concentrationCreate').val(CKEDITOR.instances.concentrationCreate.getData());
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nong-do',
            method: 'POST',
            dataType: 'json',
            data: $(form).serialize()
        })
            .done(function (data) {
                CKEDITOR.instances.concentrationCreate.setData('', function() {this.checkDirty(); });
                if(data['message']['status'] == 'invalid') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'existed') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'success') {
                    swal("", data['message']['description'], "success");
                    var table = $('#concentrationTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    table.row.add( [
                        data['concentration']['id'],
                        data['concentration']['name'],
                        data['concentration']['description'],
                        data['concentration']['detail'],
                        data['concentration']['link'],
                        function (id) {
                            return '<div class="text-center"><a onclick= "showEditConcentration('+data['concentration']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+data['concentration']['id']+'" onclick="deleteConcentrationFunction('+data['concentration']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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

$('#concentrationFormEdit').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên nồng độ không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#concentrationModalEdit').modal('hide');
        $('#concentrationDetailEdit').val(CKEDITOR.instances.concentrationDetailEdit.getData());
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nong-do/sua',
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
                    var table = $('#concentrationTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    var rows = table.rows().data();
                    for (var i = 0; i < rows.length; i++) {
                        if (rows[i].id == data['concentration']['id']) {
                            table.row( this ).data(
                                [
                                    data['concentration']['id'],
                                    data['concentration']['name'],
                                    data['concentration']['description'],
                                    data['concentration']['detail'],
                                    data['concentration']['link'],
                                    function (id) {
                                        return '<div class="text-center"><a onclick= "showEditConcentration('+data['concentration']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                            +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nong-do/xoa/'+data['concentration']['id']+'" onclick="deleteConcentrationFunction('+data['concentration']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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

function showEditConcentration(id) {
    $.ajax({
        url: '/quan-tri/nuoc-hoa/nong-do/'+id,
        dataType: 'json',
        type:"GET",
        beforeSend: function(){
            $('#modal-loading').modal('show');
            $('#concentrationID').val(id);
        }
    })
        .done(function(concentration){
            $('#concentrationNameEdit').val(concentration['concentration']['name']);
            $('#concentrationDescriptionEdit').val(concentration['concentration']['description']);
            CKEDITOR.instances.concentrationDetailEdit.setData(concentration['concentration']['detail'], function() {this.checkDirty(); });
            $('#concentrationLinkEdit').val(concentration['concentration']['link']);
            $('#modal-loading').modal('hide');
            $('#concentrationModalEdit').modal('show');
        });
}

function deleteConcentrationFunction(id) {
    event.preventDefault();
    swal({
            title: "",
            text: "Bạn có muốn xóa nồng độ này không?",
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
                    url: '/quan-tri/nuoc-hoa/nong-do/xoa/'+id,
                    dataType: 'json',
                    type:"GET",
                    beforeSend: function(){
                    }
                })
                    .done(function(data){
                        if(data['message']['status'] == 'success') {
                            swal("", data['message']['description'], "success");
                            var table = $('#concentrationTable').DataTable();
                            $.fn.dataTable.ext.errMode = 'none';
                            var rows = table.rows().data();
                            for (var i = 0; i < rows.length; i++) {
                                if (rows[i].id == data['concentration']['id']) {
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