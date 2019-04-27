<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>aShark Shop - Home</title>
	<!-- <link rel="icon" href="img/Fevicon.png" type="image/png"> -->
  <link rel="stylesheet" href="{{ asset('asset/home/vendors/bootstrap/bootstrap.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('asset/home/vendors/fontawesome/css/all.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('asset/home/vendors/themify-icons/themify-icons.css') }} ">
  <link rel="stylesheet" href="{{ asset('asset/home/vendors/nice-select/nice-select.css') }} ">
  <link rel="stylesheet" href="{{ asset('asset/home/vendors/owl-carousel/owl.theme.default.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('asset/home/vendors/owl-carousel/owl.carousel.min.css') }} ">

  <link rel="stylesheet" href="{{ asset('asset/home/css/style.css') }} ">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('asset/home/img/logo.png') }} " alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>

              <li class="nav-item"><a class="nav-link" href="{{ route('getAllProduct') }}">Sản phẩm</a></li>

              <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Blog</a></li>

              <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Giới thiệu</a></li>
              
              <li class="nav-item"><a class="nav-link" href="contact.html">Liên hệ</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item">
              	<div class="input-group filter-bar-search">
                  <input type="text" placeholder="Search">
                </div>
              </li>
              <li class="nav-item">
              	<a href="{{ route('getShowCart') }}">
              		<i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{Cart::count()}}</span>
              	</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->

  <main class="site-main">
    
	@yield('content')
  </main>


  <!--================ Start footer Area  =================-->	
	<footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap justify-content-between">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">aShark</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no 
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
							</p>
						</div>
					</div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-footer-widget tp_widgets">
              <h4 class="footer_title">Liên hệ</h4>
              <div class="ml-40">
                <p class="sm-head">
                  <span class="fa fa-location-arrow"></span>
                  Head Office
                </p>
                <p>123, Main Street, Your City</p>
  
                <p class="sm-head">
                  <span class="fa fa-phone"></span>
                  Phone Number
                </p>
                <p>
                  +123 456 7890 <br>
                  +123 456 7890
                </p>
  
                <p class="sm-head">
                  <span class="fa fa-envelope"></span>
                  Email
                </p>
                <p>
                  free@infoexample.com <br>
                  www.infoexample.com
                </p>
              </div>
            </div>
          </div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Theo dõi</h4>
							<ul class="list">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">TW</a></li>
								<li><a href="#">Youtube</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-right">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



  <script src="{{ asset('asset/home/vendors/jquery/jquery-3.2.1.min.js') }} "></script>
  <script src="{{ asset('asset/home/vendors/bootstrap/bootstrap.bundle.min.js') }} "></script>
  <script src="{{ asset('asset/home/vendors/skrollr.min.js') }} "></script>
  <script src="{{ asset('asset/home/vendors/owl-carousel/owl.carousel.min.js') }} "></script>
  <script src="{{ asset('asset/home/vendors/nice-select/jquery.nice-select.min.js') }} "></script>
  <!-- <script src="vendors/jquery.ajaxchimp.min.js"></script> -->
  <!-- <script src="vendors/mail-script.js"></script> -->
  <script src="{{ asset('asset/home/js/main.js') }} "></script>

  @yield('script')
</body>
</html>