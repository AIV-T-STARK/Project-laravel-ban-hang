@extends('home.layout.app')
@section('content')
<!--================ Hero banner start =================-->
<section class="hero-banner">
    <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
            <div class="col-5 d-none d-sm-block">
                <div class="hero-banner__img">
                    <img class="img-fluid" src="{{ asset('asset/home/img/home/hero-banner.png') }}" alt="hero-banner">
                </div>
            </div>
            <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                <div class="hero-banner__content">
                    <h4>Shop is fun</h4>
                    <h1>Browse Our Premium Product</h1>
                    <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
                    <a class="button button-hero" href="#">Khám phá ngay</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Hero banner start =================-->
<!-- ================ trending product section start ================= -->  
<section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
            <h2><span class="section-intro__style">Sản phẩm </span>bán chạy</h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <a href="{{ route('showSingle', ['id' => $product->id]) }}">
                            <img class="card-img" src="{{ url($product->avatar) }}" alt="{{$product->name}}">
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-product__title"><a href="{{ route('showSingle', ['id' => $product->id]) }}">{{$product->name}}</a></h4>
                        <p class="card-product__price">{{$product->price}} VNĐ</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ================ trending product section end ================= -->  
<!-- ================ Blog section start ================= -->  
<section class="blog">
    <div class="container">
        <div class="section-intro pb-60px">
            <h2><span class="section-intro__style">Tin tức </span>mới nhất</h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="card card-blog">
                    <div class="card-blog__img">
                        <img class="card-img rounded-0" src=" {{ asset('asset/home/img/blog/blog1.png') }} " alt="">
                    </div>
                    <div class="card-body">
                        <ul class="card-blog__info">
                            <li><a href="#">By Admin</a></li>
                            <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                        </ul>
                        <h4 class="card-blog__title"><a href="#">The Richland Center Shooping News and weekly shooper</a></h4>
                        <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                        <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="card card-blog">
                    <div class="card-blog__img">
                        <img class="card-img rounded-0" src=" {{ asset('asset/home/img/blog/blog2.png') }} " alt="">
                    </div>
                    <div class="card-body">
                        <ul class="card-blog__info">
                            <li><a href="#">By Admin</a></li>
                            <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                        </ul>
                        <h4 class="card-blog__title"><a href="#">The Shopping News also offers top-quality printing services</a></h4>
                        <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                        <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="card card-blog">
                    <div class="card-blog__img">
                        <img class="card-img rounded-0" src=" {{ asset('asset/home/img/blog/blog3.png') }} " alt="">
                    </div>
                    <div class="card-body">
                        <ul class="card-blog__info">
                            <li><a href="#">By Admin</a></li>
                            <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                        </ul>
                        <h4 class="card-blog__title"><a href="#">Professional design staff and efficient equipment you’ll find we offer</a></h4>
                        <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                        <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ Blog section end ================= -->  
@include('home.include.email')
@endsection
@section('script')
{{-- expr --}}
@endsection