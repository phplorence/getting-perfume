<div class="modal fade" id="concentrationModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">CẬP NHẬT</h3>
                <form id="concentrationFormEdit">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhóm hương<span style="color:red;">(*)</span></label>
                            <input type="text" name="name"  class="form-control" id="concentrationNameEdit">
                            <input type="hidden" name="id" id="concentrationID" value="">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="" id="concentrationDescriptionEdit"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Chi tiết</label>
                            <textarea name="detail" class="form-control" rows="5" placeholder="" id="concentrationDetailEdit"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên bài viết</label>
                            <input type="text" name="link" class="form-control" id="concentrationLinkEdit">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>