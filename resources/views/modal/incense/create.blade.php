<div class="modal fade" id="incenseModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">THÊM MỚI NHÓM HƯƠNG</h3>
                <form name="incenseFormCreate">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhóm hương<span style="color:red;">(*)</span></label>
                            <input name="incense_name" type="text" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="incense_description" class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                        <div class="form-group">
                            <label class="box-title">Chi tiết</label>
                            <textarea id="incenseCreate" name="incense_detail" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên bài viết</label>
                            <input type="text" name="incense_link" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitNewIncense">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>