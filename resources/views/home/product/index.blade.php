@extends('home.layout.app')

@section('title')
  Sản phẩm
@endsection

@section('content')
      <!-- ================ category section start ================= -->      
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Danh mục</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
                  	@foreach ($categories as $category)
                  		<li class="filter-list">
	                      <a href="{{ route('getCategory', ['id' => $category->id]) }}">{{$category->name}}</a>
	                      <ul class="pl-4">
	                      	@foreach ($category->brand as $brand)
	                      		<li><a href="{{ route('getBrand', ['id' => $brand->id]) }}">{{ $brand->name }}</a></li>
	                      	@endforeach
	                      </ul>
	                    </li>
                  	@endforeach
                    
                  </ul>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            <div>
              <div class="input-group filter-bar-search">
                <input type="text" placeholder="Search">
                <div class="input-group-append">
                  <button type="button"><i class="ti-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
              @foreach ($products as $product)
              	<div class="col-md-6 col-lg-4">
	                <div class="card text-center card-product">
	                  <div class="card-product__img">
	                    <a href="{{ route('showSingle', ['id' => $product->id]) }}"><img class="card-img" src="{{ url($product->avatar) }}" alt="{{$product->name}}"></a>
	                  </div>
	                  <div class="card-body">
	                    <p>{{$product->brand->name}}</p>
	                    <h4 class="card-product__title"><a href="{{ route('showSingle', ['id' => $product->id]) }}">{{$product->name}}</a></h4>
                      @if ($product->sale > 0)
                            <p class="card-product__price die">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                        @endif
                        <p class="card-product__price text-danger">{{ number_format($product->price * (1 - $product->sale), 0, ',', '.') }} VNĐ</p>
	                  </div>
	                </div>
	              </div>
              @endforeach
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
  <!-- ================ category section end ================= -->  

@include('home.include.email')
@endsection
@section('script')
{{-- expr --}}
@endsection