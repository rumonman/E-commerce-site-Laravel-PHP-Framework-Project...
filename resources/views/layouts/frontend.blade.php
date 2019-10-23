<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>The Plaza - eCommerce</title>
	<meta charset="UTF-8">
	<meta name="description" content="The Plaza eCommerce Template">
	<meta name="keywords" content="plaza, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="{{asset('frontend/img/favicon.ico')}}" rel="shortcut icon"/>

	<link href="{{asset('https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}"/>

</head>
<body>
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<header class="header-section header-normal">
		<div class="container-fluid">
			<div class="site-logo">
				<img src="{{asset('frontend/img/logo.png')}}" alt="logo">
			</div>
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-right">
				<a href="{{url('add/card/details')}}" class="card-bag"><img src="{{asset('frontend/img/icons/bag.png')}}" alt=""><span>{{App\Card::where('customer_ip',$_SERVER['REMOTE_ADDR'])->sum('product_quantity')}}</span></a>
				<a href="#" class="search"><img src="{{asset('frontend/img/icons/search.png')}}" alt=""></a>
			</div>
			
			<ul class="main-menu">
                <li><a href="{{url('/')}}">Home</a></li>
                 @php
                $menus= App\Categorie::where('manu_status',1)->get();
                 @endphp
                 @foreach($menus as $menu)
                <li><a href="{{url('category/wise/product')}}/{{$menu->id}}">{{$menu->category_name}}</a></li>
                 @endforeach
                <li><a href="{{url('/contuct')}}">Contact</a></li>
                <li><a href="{{url('http://localhost:8000/login')}}">Login</a></li>
                <li><a href="{{url('http://localhost:8000/register')}}">Register</a></li>
            </ul>
		</div>
	</header>

    @yield('content')
	
	 <section class="footer-top-section home-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-sm-12">
                    <div class="footer-widget about-widget">
                        <img src="{{asset('frontend/img/logo.png')}}" class="footer-logo" alt="">
                        <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                        <div class="cards">
                            <img src="{{asset('frontend/img/cards/5.png')}}" alt="">
                            <img src="{{asset('frontend/img/cards/4.png')}}" alt="">
                            <img src="{{asset('frontend/img/cards/3.png')}}" alt="">
                            <img src="{{asset('frontend/img/cards/2.png')}}" alt="">
                            <img src="{{asset('frontend/img/cards/1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">usefull Links</h6>
                        <ul>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Bloggers</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Sitemap</h6>
                        <ul>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Bloggers</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Shipping & returns</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Track Orders</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h6 class="fw-title">Contact</h6>
                        <div class="text-box">
                            <p>Plaza Company Ltd </p>
                            <p>Uttara, Dhaka, Bangladesh </p>
                            <p>+8801717877561</p>
                            <p>theplazaltd.bd@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <footer class="footer-section">
        <div class="container">
            <p class="copyright">

Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | The Plaza <i class="fa fa-heart-o" aria-hidden="true"></i>  by  <a href="" target="_blank"> Engr. Md. Rezwanul Islam Rumon</a>

</p>
        </div>
    </footer>

    <script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('frontend/js/sly.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    </body>
</html>