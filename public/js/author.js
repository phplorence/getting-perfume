/**
 * Created by vuongluis on 7/28/2018.
 */
$(document).ready(function () {
    $('#authorTable').dataTable({
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
            url: '/quan-tri/nuoc-hoa/nha-pha-che/loading_author',
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "manipulation", "render": function ( id) {
                return '<div class="text-center"><a onclick= "showEditAuthor('+id+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nha-pha-che/xoa/'+id+'" onclick="deleteAuthorFunction('+id+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>';
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

$('#btnCreateNewAuthor').click(function(){
    $('#authorModalCreate').modal('show');
    $('#authorFormCreate').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
});

$('#authorFormCreate').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên tác giả không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#authorModalCreate').modal('hide');
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nha-pha-che',
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
                    var table = $('#authorTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    table.row.add( [
                        data['author']['id'],
                        data['author']['name'],
                        function (id) {
                            return '<div class="text-center"><a onclick= "showEditAuthor('+data['author']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nha-pha-che/xoa/'+data['author']['id']+'" onclick="deleteAuthorFunction('+data['author']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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

$('#authorFormEdit').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên nhà pha chế không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#authorModalEdit').modal('hide');
        $.ajax({
            url: '/quan-tri/nuoc-hoa/nha-pha-che/sua',
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
                    var table = $('#authorTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    var rows = table.rows().data();
                    for (var i = 0; i < rows.length; i++) {
                        if (rows[i].id == data['author']['id']) {
                            table.row( this ).data(
                                [
                                    data['author']['id'],
                                    data['author']['name'],
                                    function (id) {
                                        return '<div class="text-center"><a onclick= "showEditAuthor('+data['author']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                            +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nha-pha-che/xoa/'+data['author']['id']+'" onclick="deleteAuthorFunction('+data['author']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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

function showEditAuthor(id) {
    $.ajax({
        url: '/quan-tri/nuoc-hoa/nha-pha-che/'+id,
        dataType: 'json',
        type:"GET",
        beforeSend: function(){
            $('#modal-loading').modal('show');
            $('#hiddenEditAuthorID').val(id);
        }
    })
        .done(function(author){
            $('#authorNameEdit').val(author['author']['name']);
            $('#modal-loading').modal('hide');
            $('#authorModalEdit').modal('show');
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
                $.ajax({
                    url: '/quan-tri/nuoc-hoa/nha-pha-che/xoa/'+id,
                    dataType: 'json',
                    type:"GET",
                    beforeSend: function(){
                    }
                })
                    .done(function(data){
                        if(data['message']['status'] == 'success') {
                            swal("", data['message']['description'], "success");
                            var table = $('#authorTable').DataTable();
                            $.fn.dataTable.ext.errMode = 'none';
                            var rows = table.rows().data();
                            for (var i = 0; i < rows.length; i++) {
                                if (rows[i].id == data['author']['id']) {
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
