<div class="box-body" id="incense-data-table">
    @if(isset($dataTable))
    <table id="incenseTable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="text-center" style="width: 5.00%">STT</th>
            <th class="text-center" style="width: 15.00%">Tên nhóm hương</th>
            <th class="text-center" style="width: 15.00%">Mô tả</th>
            <th class="text-center" style="width: 40.00%">Chi tiết</th>
            <th class="text-center" style="width: 15.00%">Link bài viết</th>
            <th class="text-center" style="width: 10.00%">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $dataTable }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    @endif
</div>
