$(document).ready(function () {
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('incenseCreate')
        CKEDITOR.replace('incenseDetailEdit')
        CKEDITOR.replace('editor1')
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    });

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
            url: "{!! route('admin.perfume.incense.index.incenseDataTables') !!}",
            type: "GET"
        },

        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "description" },
            { "data": "detail" },
            { "data": "link" },
            { "data": "manipulation", "render": function ( id) {
                return '<div class="text-center"><a onclick= "showEditIncense('+id+')"><img src="{{URL::asset(img/icon-control/icon_edit.svg)}}"  width="24px" height="24px" alt="Update Icon"></a>'
                +'<span>  </span>'+'<a href="/quan-tri/nuoc-hoa/nhom-huong/xoa/'+id+'" onclick="deleteIncenseFunction('+id+')"><img src="{{URL::asset(img/icon-control/icon_delete.svg)}}"  width="24px" height="24px" alt="Update Icon"></a></div>';
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

$(document).on('click', '#btnSubmitNewIncense', function (event) {
    event.preventDefault();
   var form = $(this).closest('form');
   var formData = form.serializeArray();
   console.log(formData);
   $.ajax({
       url: '/quan-tri/nuoc-hoa/nhom-huong',
       method: 'POST',
       dataType: 'html',
       data: formData
   })
       .done(function (data) {
            console.log(data);
            $('#incense-data-table').html(data);
       })
       .fail(function (error) {

       });
});