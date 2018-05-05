<div class="modal fade" id="incenseModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">THÊM MỚI NHÓM HƯƠNG</h3>
                <form id="incenseFormCreate" role="form" method="post" action="{{ route('admin.perfume.concentration.store') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhóm hương<span style="color:red;">(*)</span></label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                        <div class="form-group">
                            <label class="box-title">Chi tiết</label>
                            <textarea id="incenseCreate" name="detail" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên bài viết</label>
                            <input type="text" name="link" class="form-control">
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