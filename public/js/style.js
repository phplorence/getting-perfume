/**
 * Created by vuongluis on 7/28/2018.
 */
$(document).ready(function () {
    $('#styleTable').dataTable({
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
            url: '/quan-tri/nuoc-hoa/phong-cach/loading_style',
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "description" },
            { "data": "detail" },
            { "data": "link" },
            { "data": "manipulation", "render": function (id) {
                return '<div class="text-center"><a onclick= "showEditStyle('+id+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/phong-cach/xoa/'+id+'" onclick="deleteStyleFunction('+id+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>';
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
    CKEDITOR.replace('styleCreate' ,{
        filebrowserUploadUrl : '/admin/panel/upload-image',
        filebrowserImageUploadUrl :  '/admin/panel/upload-image'
    });

    CKEDITOR.replace('styleDetailEdit' ,{
        filebrowserUploadUrl : '/admin/panel/upload-image',
        filebrowserImageUploadUrl :  '/admin/panel/upload-image'
    });

    $('.textarea').wysihtml5()
});

$('#btnCreateNewStyle').click(function(){
    $('#styleModalCreate').modal('show');
    $('#styleFormCreate').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea').val('');
});

$('#styleFormCreate').validate({
    rules: {
        name: "required"
    },
    messages: {
        name: "Tên phong cách không được bỏ trống!"
    },
    submitHandler: function(form) {
        event.preventDefault();
        $('#styleModalCreate').modal('hide');
        $('#styleCreate').val(CKEDITOR.instances.styleCreate.getData());
        $.ajax({
            url: '/quan-tri/nuoc-hoa/phong-cach',
            method: 'POST',
            dataType: 'json',
            data: $(form).serialize()
        })
            .done(function (data) {
                CKEDITOR.instances.styleCreate.setData('', function() {this.checkDirty(); });
                if(data['message']['status'] == 'invalid') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'existed') {
                    swal("", data['message']['description'], "error");
                }
                if(data['message']['status'] == 'success') {
                    swal("", data['message']['description'], "success");
                    var table = $('#styleTable').DataTable();
                    $.fn.dataTable.ext.errMode = 'none';
                    table.row.add( [
                        data['style']['id'],
                        data['style']['name'],
                        data['style']['description'],
                        data['style']['detail'],
                        data['style']['link'],
                        function (id) {
                            return '<div class="text-center"><a onclick= "showEditStyle('+data['style']['id']+')"><img src="/img/icon-control/icon_edit.svg"  width="24px" height="24px" alt="Update Icon"></a>'
                                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/phong-cach/xoa/'+data['style']['id']+'" onclick="deleteStyleFunction('+data['style']['id']+')"><img src="/img/icon-control/icon_delete.svg"  width="24px" height="24px" alt="Update Icon"></a></div>'}
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
