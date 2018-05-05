<div class="modal-dialog" role="document" id="formIncenseCreate">
    <div class="modal-content">
        <div class="modal-body">
            <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">CẬP NHẬT NỒNG ĐỘ</h3>
            <form role="form" method="post" action="{{ route('admin.perfume.concentration.store') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên nồng độ<span style="color:red;">(*)</span></label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" id="m_description" class="form-control" rows="3"
                                  placeholder=""></textarea>
                    </div>

                    <div class="form-group">
                        <h3 class="box-title">Thông tin chi tiết sản phẩm</h3>
                        <textarea id="incenseCreate" name="detail" class="form-control" rows="5"
                                  id="m_comment"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Liên bài viết</label>
                        <input type="text" name="link" class="form-control" id="m_link">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>