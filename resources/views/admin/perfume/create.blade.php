@extends('layouts.master')
@section('content')
  @include('sweet::alert');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chuyên Trang Nước Hoa
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="{{ route('admin.perfume.index') }}" target="blank"> Nước hoa</a></li>
        <li class="active">Thêm mới</li>
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
                  <form role="form" action="{{ route('admin.perfume.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm<span style="color:red;">(*)</span></label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label>Mô tả<span style="color:red;">(*)</span></label>
                        <textarea name="description" class="form-control" rows="3" placeholder="">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                          <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <h3 class="box-title">Thông tin chi tiết sản phẩm<span style="color:red;">(*)</span>
                          <small>CK Editor có hổ trợ định dạng page. Cách sử dụng xem thêm ở đây: <a href="www.google.com" href="blank">Support</a></small>
                        </h3>
                        <textarea id = "editor1"  name="editor1" class="form-control" rows="5" id="comment">{{ old('detail') }}</textarea>
                        @if ($errors->has('detail'))
                          <span class="help-block">
                            <strong>{{ $errors->first('detail') }}</strong>
                        </span>
                        @endif
                      </div>

                      <label for="exampleInputEmail1">Giá gốc sản phẩm<span style="color:red;">(*)</span></label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" value="{{ old('original_price') }}">
                        <span class="input-group-addon">VND</span>
                        @if ($errors->has('original_price'))
                          <span class="help-block">
                            <strong>{{ $errors->first('original_price') }}</strong>
                          </span>
                        @endif
                      </div>

                      <label for="exampleInputEmail1">Giá gốc khuyến mãi<span style="color:red;">(*)</span></label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" value="{{ old('promotion_price') }}">
                        <span class="input-group-addon">VND</span>
                        @if ($errors->has('promotion_price'))
                          <span class="help-block">
                            <strong>{{ $errors->first('promotion_price') }}</strong>
                        </span>
                        @endif
                      </div>

                      <label for="exampleInputEmail1">Dung tích<span style="color:red;">(*)</span></label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" value="{{ old('dore') }}">
                        <span class="input-group-addon">ml</span>
                        @if ($errors->has('dore'))
                          <span class="help-block">
                            <strong>{{ $errors->first('dore') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label>Nồng độ<span style="color:red;">(*)</span></label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Ngày phát hành<span style="color:red;">(*)</span></label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Hạn sử dụng<span style="color:red;">(*)</span></label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Nhóm hương<span style="color:red;">(*)</span></label>
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
                        <label>Phong cách<span style="color:red;">(*)</span></label>
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
                        <label>Nhà pha chế<span style="color:red;">(*)</span></label>
                        <select class="form-control">
                          <option>Alberto Morillas</option>
                          <option>Alberto Morillas</option>
                          <option>Alberto Morillas</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Trạng thái<span style="color:red;">(*)</span></label>
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
                        <label>Loại sản phẩm (Nhãn hiệu)<span style="color:red;">(*)</span></label>
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
                        <label>Xuất xứ<span style="color:red;">(*)</span></label>
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

