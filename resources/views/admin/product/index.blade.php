@extends('admin.layout.app')

@section('content')
	<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sản Phẩm</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="m-0 font-weight-bold text-primary">Sản phẩm</h4>
                    </div>
                    <div class=" col-md-6 mt-2 mt-md-0 text-md-right">
                      <a href="{{ route('admin.product.getCreate') }}" class="btn btn-primary">Thêm sản phẩm</a>
                    </div>
                </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Giá gốc (VNĐ)</th>
                        <th>Khuyến mại (%)</th>
                        <th>Giá sau khuyến mại</th>
                        <th>Tình trạng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Thương hiệu</th>
                        <th>Danh mục</th>
                        <th>Giá gốc (VNĐ)</th>
                        <th>Khuyến mại (%)</th>
                        <th>Giá sau khuyến mại</th>
                        <th>Tình trạng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($products as $product)
                        <tr>
                          <td>{{$product->id}}</td>
                          <td>{{$product->name}}</td>
                          <td><img src="{{ url($product->avatar) }}" alt="{{$product->name}}" style="max-width: 120px;"></td>
                          <td>{{$product->brand->name}}</td>
                          <td>{{$product->brand->category->name}}</td>
                          <td>{{number_format($product->price, 0, ',', '.')}}</td>
                          <td>{{$product->sale*100}} %</td>
                          <td class="text-danger">{{number_format($product->price * (1 - $product->sale), 0, ',', '.')}}</td>
                          <td>
                            @if ($product->active == 1)
                              <a href="{{ route('admin.product.getActive', ['id' => $product->id]) }}"><span class="text-success font-weight-bold">Tốt</span></a>
                            @else
                              <a href="{{ route('admin.product.getActive', ['id' => $product->id]) }}"><span class="text-danger font-weight-bold">Ngừng kinh doanh</span></a>
                            @endif
                          </td>
                          <td><a href="{{ route('admin.product.getUpdate', ['id' => $product->id]) }}">Sửa</a></td>
                          <td><a href="{{ route('admin.product.delete', ['id' => $product->id]) }}">Xóa</a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
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