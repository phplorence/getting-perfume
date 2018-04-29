@extends('layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADMIN
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
        <li><a href="{{ route('admin.super.index') }}"> Danh sách người dùng cấp cao</a></li>
        <li class="active">Thêm mới</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('sweet::alert')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Đăng Ký</h3>
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
                  <form role="form" action="{{ route('admin.super.update') }}" method="post">
                    {{ csrf_field() }}

                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên đăng nhập<span style="color:red;">(*)</span></label>
                        <input name="username" type="text" class="form-control" placeholder="" value="{{ old('username') == null ? $admin->username : old('username')}}">
                        @if ($errors->has('username'))
                          <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu<span style="color:red;">(*)</span></label>
                        <input name="password" id="password" type="password" class="form-control" placeholder="">
                        @if ($errors->has('password'))
                          <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Xác nhận mật khẩu<span style="color:red;">(*)</span></label>
                        <input name="password_confirmation" id="confirm_password" type="password" class="form-control" placeholder="" onkeyup='confirmPassword();'>
                        @if ($errors->has('password_confirmation'))
                          <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                        <span class="help-block" id='message'></span>
                      </div>

                      <div class="form-group">
                        <label>Phân quyền</label>
                        <select name="permission" class="form-control">
                          @unless($roles)
                              <span class="help-block">
                                  <strong>Vui lòng cập nhập vai trò trong hệ thống</strong>
                              </span>
                          @endunless
                          <?php foreach($roles as $role) : ?>
                            <option value="{{ $role->name }}" @if((old('permission') == null ? $admin->user_type : old('permission')) == $role->name) selected @endif> {{ $role->name }} </option>
                          <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ email<span style="color:red;">(*)</span></label>
                        <input name="email" class="form-control" placeholder="" value="{{ old('email') == null ? $admin->email : old('email') }}">
                        @if ($errors->has('email'))
                          <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif
                        </span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input name="full_name" type="text" class="form-control" placeholder="" value="{{ old('full_name') == null ? $admin->full_name : old('full_name') }}"/>
                      </div>

                      <div class="form-group">
                        <div>
                          <label for="exampleInputFile">Giới tính<span style="color:red;">(*)</span></label>
                        </div>
                        <label class="radio-inline">
                          <input type="radio" name="gender" value="Nam" {{ ((old('gender') == null ? $admin->gender : old('gender')) == 'Nam') ? 'checked' : '' }}>Nam
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="gender" value="Nữ" {{ ((old('gender') == null ? $admin->gender : old('gender')) == 'Nữ') ? 'checked' : '' }}>Nữ
                        </label>
                        @if ($errors->has('gender'))
                          <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                          </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input name="address" type="text" class="form-control" placeholder="" value="{{ old('address') == null ? $admin->address : old('address') }}">
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="activate" {{ (old('activate') == null ? $admin->active : old('activate')) ? 'checked' : '' }}> Kích hoạt
                        </label>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input name="phone_number" type="number" class="form-control" placeholder="" value="{{ old('phone_number') == null ? $admin->phone_number : old('phone_number') }}">
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                      </div>

                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
      var confirmPassword = function() {
          if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
              document.getElementById('message').style.color = 'green';
              document.getElementById('message').innerHTML = "<b>Mật khẩu khớp</b>";
          } else {
              document.getElementById('message').style.color = 'red';
              document.getElementById('message').innerHTML = '<b>Mật khẩu không khớp</b>';
          }
      }
  </script>
@endsection

