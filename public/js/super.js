/**
 * Created by vuongluis on 8/11/2018.
 */
$(document).ready(function () {
    $('#superTable').dataTable({
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
            url: '/quan-tri/cap-cao/loading_super',
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "username" },
            { "data": "user_type" },
            { "data": "email" },
            { "data": "full_name" },
            { "data": "phone_number" },
            { "data": "address" },
            { "data": "path_image" },
            { "data": "manipulation", "render": function (id) {
                return '<div class="text-center"><a onclick= "showEditSuper('+id+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                    +'<span>  </span>'+'<a href="/quan-tri/cap-cao/xoa/'+id+'" onclick="deleteSuperFunction('+id+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>';
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

$('#btnCreateNewSuper').click(function(){
    $('#superModalCreate').modal('show')
    $('#superFormCreate').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
});

$('#superFormCreate').validate({
    rules: {
        username: "required",
    },
    messages: {
        username: "Tên đăng nhập không được bỏ trống!",
    },
});

$(document).ready(function () {
    $('#superFormCreate').on('submit', function (event) {
        if (!$(this).valid()) return false;
        event.preventDefault();
        $('#superModalCreate').modal('hide');
        var formData = new FormData(this);
        formData.append('user_type', $('#user_type').val());
        formData.append('gender', $('input[name=gender]:checked').val());
        $.ajax({
            url: '/quan-tri/cap-cao',
            method: "POST",
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (data) {
                console.log(data);
                $('#user_type').val('');
                if (data['message']['status'] == 'invalid') {
                    swal("", data['message']['description'], "error");
                }
                if (data['message']['status'] == 'existed') {
                    swal("", data['message']['description'], "error");
                }
                if (data['message']['status'] == 'success') {
                    swal("", data['message']['description'], "success");
                    var table = $('#superTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    table.row.add(
                        [
                            data['super']['id'],
                            data['super']['username'],
                            data['super']['user_type'],
                            data['super']['email'],
                            data['super']['full_name'],
                            data['super']['phone_number'],
                            data['super']['address'],
                            data['super']['path_image'],
                            function (id) {
                                return '<div class="text-center"><a onclick= "showEditSuper(' + data['super']['id'] + ')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                    + '<span>  </span>' + '<a href="/quan-tri/nuoc-hoa/xoa/' + data['super']['id'] + '" onclick="deleteSuperFunction(' + data['super']['id'] + ')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'
                            }
                        ]
                    ).draw();
                } else if (data.status == 'error') {
                    swal("", data['message']['description'], "error");
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    });

});