@extends('admin.layout.login')

@section('content')
	<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-6">
          <div class="card">
            <div class="card-header text-center">Đăng nhập</div>
            <div class="card-body">
              <form action="{{ route('admin.login.postLogin') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label>Mật khẩu:</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                	<div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="checkbox1">
					    <label class="form-check-label" for="checkbox1">Lưu mật khẩu</label>
					 </div>
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection