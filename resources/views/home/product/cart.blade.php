@extends('home.layout.app')

@section('title')
    Giỏ hàng
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Giỏ Hàng</h4>
            </div>
        </div>
        @foreach ($items as $item)
        	<div class="row mt-4">
	            <div class="col-4">
	                <img src="{{ url($item->options->avatar) }}" alt="" class="img-fluid">
	            </div>
	            <div class="col-8 mt-3 mt-md-0">
	                <h5>{{ $item->name }}</h5>
	                <h6 class="d-inline pr-4">Đơn Giá: {{ number_format($item->price, 0, ',', '.') }} VNĐ</h6>
	                <div class="product_count mt-3">
	                    <input type="number" name="qty" id="qty" value="{{ $item->qty }}" class="input-text qty" onchange="updateCart(this.value, '{{ $item->rowId }}')">
	                </div>
	                <h6>Thành tiền: {{ number_format($item->price*$item->qty, 0, ',', '.') }} VNĐ</h6>
	                <a href="{{ route('getRemoveCart', ['id'=>$item->rowId]) }}" class="mt-3">Xóa</a>
	            </div>
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
        @endforeach
        
        <div class="row">
            <div class="col-12">
                <h6>Tổng: {{ $total }} VNĐ</h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h6>Thông tin khách hàng</h6>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Anh</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Chị</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8 col-lg-6">
                        <input type="text" class="form-control" name="" id="" placeholder="Họ và tên">
                    </div>
                    <div class="form-group col-md-8 col-lg-6">
                        <input type="text" class="form-control" name="" id="" placeholder="Số điện thoại">
                    </div>
                </div>
                <hr>
                <div class=" d-flex align-items-center">
                    <a class="btn btn-outline-primary" href="{{ route('getAllProduct') }}">Tiếp tục mua hàng</a>
                    <a class="btn btn-success ml-3" href="#">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
	<script>
		function updateCart(qty, rowId) {
			$.get(
				'{{ url('updateCart') }}',
				{qty:qty, rowId:rowId},
				function() {
					location.reload();
				}
			);
		}
	</script>
@endsection