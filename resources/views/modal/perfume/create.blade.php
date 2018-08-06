<div class="modal fade" id="perfumeModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">THÊM MỚI</h3>
                <form id="perfumeFormCreate">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm<span style="color:red;">(*)</span></label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="">
                        </div>

                        <div class="form-group">
                            <label>Mô tả<span style="color:red;">(*)</span></label>
                            <textarea name="description" class="form-control" rows="3" placeholder=""></textarea>
                        </div>

                        <div class="form-group">
                            <h3 class="box-title">Thông tin chi tiết sản phẩm
                                <small>CK Editor có hổ trợ định dạng page. Cách sử dụng xem thêm ở đây: <a href="www.google.com" href="blank">Support</a></small>
                            </h3>
                            <textarea id = "editor1"  name="editor1" class="form-control" rows="5" id="comment"></textarea>
                        </div>

                        <label for="exampleInputEmail1">Giá gốc sản phẩm<span style="color:red;">(*)</span></label>
                        <div class="input-group">
                            <input type="number" name="original_price" class="form-control" placeholder="" value="">
                            <span class="input-group-addon">VND</span>
                        </div>

                        <label for="exampleInputEmail1">Giá gốc khuyến mãi<span style="color:red;">(*)</span></label>
                        <div class="input-group">
                            <input type="number" name="promotion_price" class="form-control" placeholder="" value="">
                            <span class="input-group-addon">VND</span>
                        </div>

                        <label for="exampleInputEmail1">Dung tích<span style="color:red;">(*)</span></label>
                        <div class="input-group">
                            <input type="number" name="dore" class="form-control" placeholder="" value="">
                            <span class="input-group-addon">ml</span>
                        </div>

                        <div id="ajax_concentration" class="form-group">
                            <label>Nồng độ</label>
                            <select class="form-control">
                                <option></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ngày phát hành</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Hạn sử dụng</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                            </div>
                        </div>

                        <div id="ajax_incense" class="form-group">
                            <label>Nhóm hương<span style="color:red;">(*)</span></label>
                            <select class="form-control select2" multiple="multiple"
                                    style="width: 100%;">
                                <option></option>
                            </select>
                        </div>

                        <div id="ajax_style" class="form-group">
                            <label>Phong cách<span style="color:red;">(*)</span></label>
                            <select class="form-control select2" multiple="multiple"
                                    style="width: 100%;">
                                <option></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nhà pha chế</label>
                            <select class="form-control">
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control">
                                <option>Còn hàng</option>
                                <option>Hết hàng</option>
                            </select>
                        </div>

                        <label for="exampleInputEmail1">Số lượng<span style="color:red;">(*)</span></label>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label>Loại sản phẩm (Nhãn hiệu)</label>
                            <select class="form-control">
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="exampleInputFile">Giới tính<span style="color:red;">(*)</span></label>
                            </div>
                            <label class="radio-inline">
                                <input type="radio" name="optradio">Nam
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optradio">Nữ
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optradio">Nam và Nữ
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Xuất xứ</label>
                            <select class="form-control">
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                                <option>Alberto Morillas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Chọn tập tin ảnh</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Vui lòng chọn ảnh mô tả sản phẩm và tải lên.</p>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>