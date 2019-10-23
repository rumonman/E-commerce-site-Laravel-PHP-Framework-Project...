@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 offset-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/user')}}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{url('/add/product')}}">Add Product</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{$single_product_info->product_name}}</li>
				</ol>
			</nav>
			<div class="card">
				<div class="card-header bg-success">Edit Product Informetion</div>
				<div class="card-body">
					@if (session('edit'))
					<div class="alert alert-success" role="alert">
						{{ session('edit') }}
					</div>
					@endif
					<form action="{{url('add/product/update')}}/{{$single_product_info->id}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" class="form-control"  name="product_name" value="{{$single_product_info->product_name}}">
						</div>
						<div class="form-group">
							<label>Product Description</label>
							<textarea type="text" class="form-control" rows="3" name="product_description">{{$single_product_info->product_description}}</textarea>
						</div>
						<div class="form-group">
							<label>Product Code</label>
							<input type="text" class="form-control" name="product_code" value="{{$single_product_info->product_code}}">
						</div>
						<div class="form-group">
							<label>Product Price</label>
							<input type="text" class="form-control" name="product_price" value="{{$single_product_info->product_price}}">
						</div>
						<div class="form-group">
							<label>Product Quentity</label>
							<input type="text" class="form-control" name="product_quentity" value="{{$single_product_info->product_quentity}}">
						</div>

						<div class="form-group">
							<label>Product Image</label>
							<input type="file" class="form-control" name="product_image">
							<img src="{{asset('upload/photos/main')}}/{{$single_product_info->product_image}}" alt="not fount" width="150">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection