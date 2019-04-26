@extends('admin.layout.app')

@section('content')
	<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thương hiệu</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary">Thêm thương hiệu</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('admin.brand.postCreate') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="category_id">Danh mục</label>
                      <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $cate)
                          <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tên thương hiệu:</label>
                      <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group text-right">
                      <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Thương hiệu</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Tên thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Số sản phẩm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Tên thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Số sản phẩm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($brands as $brand)
                        <tr>
                          <td>{{ $brand->name }}</td>
                          <td>{{ $brand->category->name }}</td>
                          <td>{{ $brand->product->count() }}</td>
                          <th><a href="{{ route('admin.brand.getUpdate', ['id' => $brand->id]) }}">Sửa</a></th>
                          <th><a href="{{ route('admin.brand.delete', ['id' => $brand->id]) }}">Xóa</a></th>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
          </div>
            
        </div>
        <!-- /.container-fluid -->
@endsection

@section('script')
  <script>
      $(document).ready(function() {
        $('#dataTable').DataTable();
      });
  </script>
@endsection