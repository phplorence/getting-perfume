<div class="modal fade" id="superModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="box-title" style="margin-top: -2px;" id="exampleModalLabel">CẬP NHẬT</h3>
                <form id="superFormEdit">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên đăng nhập<span style="color:red;">(*)</span></label>
                            <input name="username" id="usernameEdit" type="text" class="form-control" placeholder="" value="">
                            <input type="hidden" id="superID">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu<span style="color:red;">(*)</span></label>
                            <input name="password" id="password_edit" type="password" class="form-control" placeholder="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Xác nhận mật khẩu<span style="color:red;">(*)</span></label>
                            <input name="password_confirmation" id="confirm_password_edit" type="password" class="form-control" placeholder="" onkeyup='confirmPassword();'>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                            <span class="help-block" id='message'></span>
                        </div>

                        <div class="form-group">
                            <label>Phân quyền</label>
                            <select name="user_type" id="user_type_edit" class="form-control">
                                <option value="SuperAdmin">SuperAdmin</option>
                                <option value="Admin">Admin</option>
                                <option value="Partner">Partner</option>
                                <option value="User">User</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ email<span style="color:red;">(*)</span></label>
                            <input name="email" class="form-control" id="emailEdit" placeholder="" value="">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <input name="full_name" type="text" id="full_name_edit" class="form-control" placeholder="" value=""/>
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="exampleInputFile">Giới tính</label>
                            </div>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="Nam" checked>Nam
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="Nữ">Nữ
                            </label>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="address_edit" placeholder="" value="">
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" name="activate" id="activate"> Kích hoạt
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input name="phone_number" type="number" id="phone_number_edit" class="form-control" placeholder="" value="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Chọn tập tin ảnh</label>
                            <input name="image" type="file">
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>