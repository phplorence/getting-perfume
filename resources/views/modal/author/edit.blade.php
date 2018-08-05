<div class="modal fade" id="authorModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">CẬP NHẬT</h3>
                <form id="authorFormEdit">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà pha chế<span style="color:red;">(*)</span></label>
                            <input type="text" name="name"  class="form-control" id="authorNameEdit">
                            <input type="hidden" id="hiddenEditAuthorID" name="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitEditAuthor">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>