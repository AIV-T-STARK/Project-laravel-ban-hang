@extends('admin.layout.app')

@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thương hiệu</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
          	<div class="col-lg-5">
          		<div class="card shadow mb-4">
          			<div class="card-header py-3">
          				<h4 class="m-0 font-weight-bold text-primary">Sửa thương hiệu: </h4>
          			</div>
          			<div class="card-body">
          				<form action="{{ route('admin.brand.postUpdate', ['id'=> $brand->id]) }}" method="post">
          					@csrf
	                        <div class="form-group">
		                      <label for="category_id">Danh mục</label>
		                      <select class="form-control" name="category_id" id="category_id">
		                        @foreach ($categories as $cate)
		                          <option value="{{$cate->id}}" @if ($cate->id === $brand->category_id)
		                          	selected
		                          @endif
		                          	>
		                          	{{$cate->name}}
		                          </option>
		                        @endforeach
		                      </select>
		                    </div>
          					<div class="form-group">
          						<label>Tên thương hiệu:</label>
          						<input type="text" name="name" id="name" class="form-control" value="{{ $brand->name }}">
          					</div>
          					<div class="form-group text-right">
                      			<a href="{{ route('admin.brand.index') }}" class="btn btn-info">Hủy</a>
          						<button type="submit" class="btn btn-primary">Cập nhập</button>
          					</div>
          				</form>
          			</div>
          		</div>
          	</div>
          </div>
            
            {{--  --}}
            </div>
          </div>
@endsection