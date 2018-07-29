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

$('#btnCreateNewIncense').click(function(){
    $('#incenseModalCreate').modal('show')
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
                console.log(data);
                $('#incenseModalCreate').modal('hide')
                if(data.status == 'invalid') {
                    swal("", "Tên nhóm hương không được bỏ trống!", "error");
                }
                if(data.status == 'existed') {
                    swal("", "Tên nhóm hương đã tồn tại trong hệ thống!", "error");
                }
                if(data.status == 'success') {
                    swal("", "Thêm nhóm hương thành công!", "success");
                } else if(data.status == 'error') {
                    swal("", "Thêm nhóm hương thất bại!", "error");
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    }
}

/*$("form[name='incenseFormEdit']").validate({
    // Specify validation rules
    rules: {
        name: "required"
    },
    // Specify validation error messages
    messages: {
        name: "Tên nhóm hương không được bỏ trống!"
    },
    submitHandler: function(form) {
        /!** We want to hidden id when edit object in form => No need using normally *!/
        // Will submit automated
        document.incenseFormEdit.id.value = document.getElementById('hiddenEditIncenseID').value;
        form.submit();
    }
});*/
