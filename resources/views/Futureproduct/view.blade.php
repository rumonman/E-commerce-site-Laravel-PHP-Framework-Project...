@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/user')}}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add Future Product</li>
				</ol>
			</nav>
			<div class="card">
				<div class="card-header bg-success">Future Product Informetion</div>
				<div class="card-body">
					@if (session('fdelete'))
					<div class="alert alert-danger" role="alert">
						{{ session('fdelete') }}
					</div>
					@endif
					
					<table class="table">
						<thead class="bg-primary">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">Future Product Name</th>
								<th scope="col">Future Product Description</th>
								<th scope="col">Future Product Code</th>
								<th scope="col">Future Product Quentity</th>
								<th scope="col">Future Product Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($future_products as $future_product)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td>{{Str::limit($future_product->product_name, 7)}}</td>
								<td>{{Str::limit($future_product->product_description, 20) }}</td>
								<td>{{$future_product->product_code}}</td>
								<td>{{$future_product->product_quentity}}</td>
								<td>
									<img src="{{asset('upload/Futurephotos/best')}}/{{$future_product->product_image}}" alt="Not Found" width="50">
								</td>
								<td>
									<div class="btn-group" role="group">
										<a href="{{url('add/future/product/edit')}}/{{$future_product->id}}"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
										<a href="{{url('/add/future/product/delete')}}/{{$future_product->id}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
									</div>
								</td>
							</tr>
							@empty

							<tr class="text-center bg-success" >
								<td colspan="7">No Data Available in Table </td>
							</tr>

							@endforelse
							
						</tbody>
					</table>
				</div>
			</div>
			<hr>
			<div class="card">
				<div class="card-header bg-danger">Delete Future Product Informetion</div>
				<div class="card-body">
					@if (session('frestore'))
					<div class="alert alert-success" role="alert">
						{{ session('frestore') }}
					</div>
					@endif
					
					@if (session('ffdelete'))
					<div class="alert alert-danger" role="alert">
						{{ session('ffdelete') }}
					</div>
					@endif
					<table class="table">
						<thead class="bg-primary">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">Product Name</th>
								<th scope="col">Product Description</th>
								<th scope="col">Product Code</th>
								<th scope="col">Product Quentity</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($delete_fproducts as $delete_fproduct)
                               <tr>
	                            <td>{{$loop->index+1}}</td>
	                            <td>{{Str::limit($delete_fproduct->product_name,7)}}</td>
	                            <td>{{Str::limit($delete_fproduct->product_description,20)}}</td>
	                            <td>{{$delete_fproduct->product_code}}</td>
	                            <td>{{$delete_fproduct->product_quentity}}</td>
								<td>
									<div class="btn-group" role="group">
										<a href="{{url('add/future/product/restore')}}/{{$delete_fproduct->id}}"><button type="button" class="btn btn-sm btn-success">Restore</button></a>
										<a href="{{url('/future/product/force/delete')}}/{{$delete_fproduct->id}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
									</div>
								</td>
							</tr>
					        @empty
							<tr class="text-center bg-success" >
								<td colspan="7">No Data Available in Table </td>
							</tr>

							@endforelse
							
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4 ">
			<div class="card">
				<div class="card-header bg-success">Add Future Product</div>
				<div class="card-body">
					@if (session('insert'))
					<div class="alert alert-success" role="alert">
						{{ session('insert') }}
					</div>
					@endif
					<form action="{{url('/add/future/product/insert')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Future Product Name</label>
							<input type="text" class="form-control" placeholder="Enter Future Product Name" name="product_name">
						</div>
						<div class="form-group">
							<label> Future Product Description</label>
							<textarea type="text" class="form-control" placeholder="Enter Future Product Description" rows="3" name="product_description"></textarea>
						</div>
						<div class="form-group">
							<label>Future Product Code</label>
							<input type="text" class="form-control" placeholder="Enter Future Product code" name="product_code">
						</div>

						<div class="form-group">
							<label>Future Product Quentity</label>
							<input type="text" class="form-control" placeholder="Enter Future Product Quentity" name="product_quentity">
						</div>
						
						<div class="form-group">
							<label>Future Product Image</label>
							<input type="file" class="form-control" name="product_image">
						</div>

						<div class="form-group">
							<label>Product Small Left Image</label>
							<input type="file" class="form-control" name="product_left_image">
						</div>

						<div class="form-group">
							<label>Product Small Right Image</label>
							<input type="file" class="form-control" name="product_right_image">
						</div>

						<div class="form-group">
							<label>Product Small Up Image</label>
							<input type="file" class="form-control" name="product_up_image">
						</div>

						<div class="form-group">
							<label>Product Small Down Image</label>
							<input type="file" class="form-control" name="product_down_image">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection