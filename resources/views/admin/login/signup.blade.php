@extends('admin.layout.login')

@section('content')
	<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-6">
          <div class="card">
            <div class="card-header text-center">Đăng ký</div>
            <div class="card-body">
              <form action="#" method="post">
              	<div class="form-group">
                  <label>Họ và tên:</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label>Mật khẩu:</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nhập lại mật khẩu:</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection