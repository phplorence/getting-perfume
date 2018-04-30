@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chuyên Trang Nước Hoa
        <small>Dữ liệu nước hoa được cập nhật tại đây</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="post.html" target="blank"> Bài Viết</a></li>
        <li class="active">Thêm Mới Nước Hoa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Nhập chi tiết thông tin sản phẩm mới</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!-- Lorence code -->
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                  <form role="form">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                      </div>
                      <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>

                      <div class="form-group">
                        <h3 class="box-title">Thông tin chi tiết sản phẩm
                          <small>CK Editor có hổ trợ định dạng page. Cách sử dụng xem thêm ở đây: <a href="www.google.com" href="blank">Support</a></small>
                        </h3>
                        <textarea id = "editor1"  name="editor1" class="form-control" rows="5" id="comment"></textarea>
                        <!-- /. tools -->
                      </div>

                      <label for="exampleInputEmail1">Giá gốc sản phẩm</label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="">
                        <span class="input-group-addon">VND</span>
                      </div>

                      <label for="exampleInputEmail1">Giá gốc khuyến mãi</label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="">
                        <span class="input-group-addon">VND</span>
                      </div>

                      <label for="exampleInputEmail1">Dung tích</label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="">
                        <span class="input-group-addon">ml</span>
                      </div>

                      <div class="form-group">
                        <label>Nồng độ</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
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

                      <div class="form-group">
                        <label>Nhóm hương</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Phong cách</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
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

                      <label for="exampleInputEmail1">Số lượng</label>
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
                          <label for="exampleInputFile">Giới tính</label>
                        </div>
                        <label class="radio-inline">
                          <input type="radio" name="optradio">Nam
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="optradio">Nữ
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
                  </form>
              </div>
            </div>
          </div>
      </div>
      <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

