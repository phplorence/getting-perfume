<div class="modal fade" id="authorModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">THÊM MỚI</h3>
                <form name="authorFormCreate" action="{{ route('admin.perfume.author.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà pha chế<span style="color:red;">(*)</span></label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitNewAuthor">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>