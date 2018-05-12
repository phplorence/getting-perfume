<div class="modal fade" id="styleModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">CẬP NHẬT</h3>
                <form name="styleFormEdit"  role="form" action="{{ route('admin.perfume.style.update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên phong cách<span style="color:red;">(*)</span></label>
                            <input type="text" name="name"  class="form-control" id="styleNameEdit">
                            <input type="hidden" id="hiddenEditStyleID" name="id">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="" id="styleDescriptionEdit"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Chi tiết</label>
                            <textarea name="detail" class="form-control" rows="5" placeholder="" id="styleDetailEdit"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên bài viết</label>
                            <input type="text" name="link" class="form-control" id="styleLinkEdit">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitEditStyle">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>