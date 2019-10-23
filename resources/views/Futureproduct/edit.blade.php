@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 offset-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/user')}}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{url('/add/future/product')}}">Add Future Product</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{$edit_fproduct->product_name}}</li>
				</ol>
			</nav>
			<div class="card">
				<div class="card-header bg-success">Edit Product Informetion</div>
				<div class="card-body">
					@if (session('update'))
					<div class="alert alert-success" role="alert">
						{{ session('update') }}
					</div>
					@endif
					<form action="{{url('/add/future/product/update')}}/{{$edit_fproduct->id}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" class="form-control"  name="product_name" value="{{$edit_fproduct->product_name}}">
						</div>
						<div class="form-group">
							<label>Product Description</label>
							<textarea type="text" class="form-control" rows="3" name="product_description">{{$edit_fproduct->product_description}}</textarea>
						</div>
						<div class="form-group">
							<label>Product Code</label>
							<input type="text" class="form-control" name="product_code" value="{{$edit_fproduct->product_code}}">
						</div>
						<div class="form-group">
							<label>Product Quentity</label>
							<input type="text" class="form-control" name="product_quentity" value="{{$edit_fproduct->product_quentity}}">
						</div>

						<div class="form-group">
							<label>Product Image</label>
							<input type="file" class="form-control" name="product_image">
							<img src="{{asset('upload/Futurephotos/best')}}/{{$edit_fproduct->product_image}}" alt="not fount" width="150">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection