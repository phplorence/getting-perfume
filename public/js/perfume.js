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
});

$('#perfumeFormCreate').validate({
    rules: {
        name: "required",
        description: "required",
        original_price: "required",
        promotion_price: "required",
        dore: "required"
    },
    messages: {
        name: "Tên sản phẩm không được bỏ trống!",
        description: "Mô tả sản phẩm không được bỏ trống!",
        original_price: "Vui lòng nhập giá gốc sản phẩm!",
        promotion_price: "Vui lòng nhập giá khuyến mãi",
        dore: "Vui lòng nhập dung tích"
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