<div class="modal fade" id="typePerfumeModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">THÊM MỚI</h3>
                <form name="typePerfumeFormCreate" action="{{ route('admin.perfume.typeperfume.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại nước hoa<span style="color:red;">(*)</span></label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitNewTypePerfume">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>