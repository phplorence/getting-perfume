/**
 * Created by vuongluis on 7/28/2018.
 */
$(document).ready(function () {
    $('#typePerfumeTable').dataTable({
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
            url: '/quan-tri/nuoc-hoa/loai-nuoc-hoa/loading_typeperfume',
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "manipulation", "render": function ( id) {
                return '<div class="text-center"><a onclick= "showEditTypePerfume('+id+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/loai-nuoc-hoa/xoa/'+id+'" onclick="deleteTypePerfumeFunction('+id+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>';
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

$('#btnCreateNewTypePerfume').click(function(){
    $('#typePerfumeModalCreate').modal('show')
    $('#typePerfumeFormCreate').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
});

$('#typePerfumeFormCreate').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên loại nước hoa không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#typePerfumeModalCreate').modal('hide');
        $.ajax({
            url: '/quan-tri/nuoc-hoa/loai-nuoc-hoa',
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
                    var table = $('#typePerfumeTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    table.row.add( [
                        data['typeperfume']['id'],
                        data['typeperfume']['name'],
                        function (id) {
                            return '<div class="text-center"><a onclick= "showEditTypePerfume('+data['typeperfume']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/loai-nuoc-hoa/xoa/'+data['typeperfume']['id']+'" onclick="deleteTypePerfumeFunction('+data['typeperfume']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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

$('#typePerfumeFormEdit').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên loại nước hoa không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#typePerfumeModalEdit').modal('hide');
        $.ajax({
            url: '/quan-tri/nuoc-hoa/loai-nuoc-hoa/sua',
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
                    var table = $('#typePerfumeTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    var rows = table.rows().data();
                    for (var i = 0; i < rows.length; i++) {
                        if (rows[i].id == data['typeperfume']['id']) {
                            table.row( this ).data(
                                [
                                    data['typeperfume']['id'],
                                    data['typeperfume']['name'],
                                    function (id) {
                                        return '<div class="text-center"><a onclick= "showEditTypePerfume('+data['typeperfume']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                            +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/loai-nuoc-hoa/xoa/'+data['typeperfume']['id']+'" onclick="deleteTypePerfumeFunction('+data['typeperfume']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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

function showEditTypePerfume(id) {
    $.ajax({
        url: '/quan-tri/nuoc-hoa/loai-nuoc-hoa/'+id,
        dataType: 'json',
        type:"GET",
        beforeSend: function(){
            $('#modal-loading').modal('show');
            $('#hiddenEditTypePerfumeID').val(id);
        }
    })
        .done(function(typeperfume){
            $('#typePerfumeNameEdit').val(typeperfume['typeperfume']['name']);
            $('#modal-loading').modal('hide');
            $('#typePerfumeModalEdit').modal('show');
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
                $.ajax({
                    url: '/quan-tri/nuoc-hoa/loai-nuoc-hoa/xoa/'+id,
                    dataType: 'json',
                    type:"GET",
                    beforeSend: function(){
                    }
                })
                    .done(function(data){
                        if(data['message']['status'] == 'success') {
                            swal("", data['message']['description'], "success");
                            var table = $('#typePerfumeTable').DataTable();
                            $.fn.dataTable.ext.errMode = 'none';
                            var rows = table.rows().data();
                            for (var i = 0; i < rows.length; i++) {
                                if (rows[i].id == data['typeperfume']['id']) {
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
