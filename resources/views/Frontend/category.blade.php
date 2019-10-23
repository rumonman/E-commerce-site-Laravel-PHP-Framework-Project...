@extends('layouts.frontend')
@section('content')

	<div class="page-info-section page-info-big">
		<div class="container">
			<h2>Dresses</h2>
			<div class="site-breadcrumb">
				<a href="">Home</a> / 
				<span>Dresses</span>
			</div>
			<img src="{{asset('frontend/img/categorie-page-top.png')}}" alt="" class="cata-top-pic">
		</div>
	</div>
	


	<!-- Page -->
	<div class="page-area categorie-page spad">
		<div class="container">
			<div class="categorie-filter-warp">
				<p>Showing 12 results</p>
				<div class="cf-right">
					<div class="cf-layouts">
						<a href="#"><img src="{{asset('frontend/img/icons/layout-1.png')}}" alt=""></a>
						<a class="active" href="#"><img src="{{asset('frontend/img/icons/layout-2.png')}}" alt=""></a>
					</div>
					<form action="#">
						<select>
							<option>Color</option>
						</select>
						<select>
							<option>Brand</option>
						</select>
						<select>
							<option>Sort by</option>
						</select>
					</form>
				</div>
			</div>
			<div class="row">
				@foreach($c_products as $c_product)
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="{{asset('upload/photos/main')}}/{{$c_product->product_image}}" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{asset('frontend/img/icons/eye.png')}}" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{asset('frontend/img/icons/heart.png')}}" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>{{$c_product->product_name}}</h6>
							<p>{{$c_product->product_price}}</p>
							<a href="{{url('product/details')}}/{{$c_product->id}}" class="site-btn btn-line">DETAILS</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="site-pagination">
				<span class="active">01.</span>
				<a href="">02.</a>
				<a href="">03.</a>
				<a href="">04.</a>
				<a href="">05.</a>
				<a href="">06</a>
			</div>
		</div>
	</div>
	<!-- Page -->

@endsection