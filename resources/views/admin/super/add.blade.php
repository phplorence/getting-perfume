@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tạo mới tài khoản quản trị (ADMIN)
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="post.html" target="blank"> Bài Viết</a></li>
        <li class="active">Thêm mới người dùng cấp cao</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Nhập thông tin chi tiết người dùng cấp cao</h3>

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
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" placeholder="">
                      </div>

                      <div class="form-group">
                        <label>Phân loại</label>
                        <select class="form-control">
                          <option>Editor</option>
                          <option>Admin</option>
                          <option>Author</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ email</label>
                        <input type="email" class="form-control" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" class="form-control" placeholder="">
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
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" class="form-control" placeholder="">
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Kích hoạt
                        </label>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="number" class="form-control" placeholder="">
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
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

