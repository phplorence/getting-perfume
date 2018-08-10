<div class="modal fade" id="perfumeModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">CẬP NHẬT</h3>
                <form id="perfumeFormEdit">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm<span style="color:red;">(*)</span></label>
                            <input type="text" name="name" class="form-control" id="nameEdit" placeholder="" value="">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id = "editor1Edit" name="description" class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                        <div class="form-group">
                            <h3 class="box-title">Thông tin chi tiết sản phẩm
                                <small>CK Editor có hổ trợ định dạng page. Cách sử dụng xem thêm ở đây: <a href="www.google.com" href="blank">Support</a></small>
                            </h3>
                            <textarea id = "editor2Edit"  name="detail" class="form-control" rows="5"></textarea>
                        </div>

                        <label for="exampleInputEmail1">Giá gốc sản phẩm<span style="color:red;">(*)</span></label>
                        <div class="input-group">
                            <input type="number" name="original_price" id="original_price_edit" class="form-control" placeholder="" value="">
                            <span class="input-group-addon">VND</span>
                        </div>

                        <label for="exampleInputEmail1">Giá gốc khuyến mãi<span style="color:red;">(*)</span></label>
                        <div class="input-group">
                            <input type="number" name="promotion_price" id="promotion_price_edit" class="form-control" placeholder="" value="">
                            <span class="input-group-addon">VND</span>
                        </div>

                        <label for="exampleInputEmail1">Dung tích</label>
                        <div class="input-group">
                            <input type="number" name="dore" id="doreEdit" class="form-control" placeholder="" value="">
                            <span class="input-group-addon">ml</span>
                        </div>

                        <div id="ajax_concentrationx" class="form-group">
                            <label>Nồng độ</label>
                            <select id="concentration" class="form-control">
                                <option></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ngày phát hành</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="date_created" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Hạn sử dụng</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="date_expiration" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div>
                        </div>

                        <div id="ajax_incensex" class="form-group">
                            <label>Nhóm hương</label>
                            <select name="incense" id="incense" class="form-control select2" multiple="multiple"
                                    style="width: 100%;">
                                <option></option>
                            </select>
                        </div>

                        <div id="ajax_stylex" class="form-group">
                            <label>Phong cách</label>
                            <select name="style" id="style" class="form-control select2" multiple="multiple"
                                    style="width: 100%;">
                                <option></option>
                            </select>
                        </div>

                        <div id="ajax_authorx" class="form-group">
                            <label>Nhà pha chế</label>
                            <select id="author" class="form-control">
                                <option></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option>Còn hàng</option>
                                <option>Hết hàng</option>
                            </select>
                        </div>

                        <label for="exampleInputEmail1">Số lượng</label>
                        <div class="form-group">
                            <input name="count" type="number" class="form-control" placeholder="">
                        </div>

                        <div id="ajax_typeperfumex" class="form-group">
                            <label>Loại sản phẩm (Nhãn hiệu)</label>
                            <select id="typeperfume" class="form-control">
                                <option></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="exampleInputFile">Giới tính</label>
                            </div>
                            <label class="radio-inline">
                                <input type="radio" name="optradio" value="Nam" checked>Nam
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optradio" value="Nữ">Nữ
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optradio" value="Nam và Nữ">Nam và Nữ
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Xuất xứ</label>
                            <select name="country" class="form-control">
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Chọn tập tin ảnh</label>
                            <input name="image" type="file" id="exampleInputFile">
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