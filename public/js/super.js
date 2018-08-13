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
            { "data": "activate" },
            { "data": "phone_number" },
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
        password: "required",
        password_confirmation: "required",
        email: "required",
    },
    messages: {
        username: "Tên đăng nhập không được bỏ trống!",
        password: "Mật khẩu không được bỏ trống!",
        password_confirmation: "Xác nhận mật khẩu không được bỏ trống!",
        email: "Địa chỉ email không được bỏ trống!",

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
                            data['admin']['id'],
                            data['admin']['username'],
                            data['admin']['user_type'],
                            data['admin']['email'],
                            data['admin']['full_name'],
                            data['admin']['activate'],
                            data['admin']['phone_number'],
                            data['admin']['path_image'],
                            function (id) {
                                return '<div class="text-center"><a onclick= "showEditSuper(' + data['admin']['id'] + ')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                    + '<span>  </span>' + '<a href="/quan-tri/cap-cao/xoa/' + data['admin']['id'] + '" onclick="deleteSuperFunction(' + data['admin']['id'] + ')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'
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

var confirmPassword = function() {
    if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = "<b>Mật khẩu khớp</b>";
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = '<b>Mật khẩu không khớp</b>';
    }
};

function showEditSuper(id) {
    $.ajax({
        url: '/quan-tri/cap-cao/chi-tiet/'+id,
        dataType: 'json',
        type:"GET",
        beforeSend: function(){
            $('#modal-loading').modal('show');
            $('#superID').val(id);
        }
    })
        .done(function(perfume){
            $('#usernameEdit').val(perfume['admin']['username']);
            // $('#original_price_edit').val(+perfume['perfume']['original_price']);
            // $('#promotion_price_edit').val(+perfume['perfume']['promotion_price']);
            // $('#doreEdit').val(+perfume['perfume']['dore']);
            // $("#concentration option[value=\""+perfume['perfume']['concentration']+"\"]").prop("selected", "selected");
            // if (perfume['perfume']['date_created'] != null ) {
            //     var date_created_format = perfume['perfume']['date_created'].substring(8, 10) + "/" + perfume['perfume']['date_created'].substring(5, 7) + "/" + perfume['perfume']['date_created'].substring(0, 4);
            //     $("#date_created").val("\""+date_created_format+"\"");
            // }
            // if (perfume['perfume']['date_expiration'] != null) {
            //     var date_expiration_format = perfume['perfume']['date_expiration'].substring(8, 10) + "/" + perfume['perfume']['date_expiration'].substring(5, 7) + "/" + perfume['perfume']['date_expiration'].substring(0, 4);
            //     $("#date_expiration").val("\""+date_expiration_format+"\"");
            // }
            // $("#author option[value=\""+perfume['perfume']['bartender']+"\"]").prop("selected", "selected");
            // $("#status option[value=\""+perfume['perfume']['status']+"\"]").prop("selected", "selected");
            // $("#country option[value=\""+perfume['perfume']['country']+"\"]").prop("selected", "selected");
            // $("#typeperfume option[value=\""+perfume['perfume']['typeofProduct']+"\"]").prop("selected", "selected");
            // $("input[name=optradio][value=\"" + perfume['perfume']['gender'] + "\"]").prop('checked', true);
            //
            // var incenses = perfume['perfume']['groupofincense'];
            // if (incenses != null) {
            //     $.each(incenses.split(","), function(i,e){
            //         $("#incense option[value=\"" + e + "\"]").prop("selected", "selected");
            //     });
            // }
            //
            // var styles = perfume['perfume']['style'];
            // if (styles != null) {
            //     $.each(styles.split(","), function(i,e){
            //         $("#style option[value=\"" + e + "\"]").prop("selected", "selected");
            //     });
            // }
            // if (perfume['perfume']['path_image'] == null || perfume['perfume']['path_image'] == '') {
            //     $('#photo').attr('src', location.protocol + '//' + location.host+'/img/'+'image_place_holder.png');
            // } else {
            //     $('#photo').attr('src', location.protocol + '//' + location.host+'/perfume/'+perfume['perfume']['path_image']);
            // }
            $('#modal-loading').modal('hide');
            $('#superModalEdit').modal('show');
        });
}

function deleteSuperFunction(id) {
    event.preventDefault();
    swal({
            title: "",
            text: "Bạn có muốn xóa người dùng này không?",
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
                    url: '/quan-tri/cap-cao/xoa/'+id,
                    dataType: 'json',
                    type:"GET",
                    beforeSend: function(){
                    }
                })
                    .done(function(data){
                        if(data['message']['status'] == 'success') {
                            swal("", data['message']['description'], "success");
                            var table = $('#superTable').DataTable();
                            $.fn.dataTable.ext.errMode = 'none';
                            var rows = table.rows().data();
                            for (var i = 0; i < rows.length; i++) {
                                if (rows[i].id == data['admin']['id']) {
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