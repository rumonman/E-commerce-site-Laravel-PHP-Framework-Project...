@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/user')}}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add Product</li>
				</ol>
			</nav>
			<div class="card">
				<div class="card-header bg-success">Product Informetion</div>
				<div class="card-body">
					@if (session('delete'))
					<div class="alert alert-danger" role="alert">
						{{ session('delete') }}
					</div>
					@endif
					
					<table class="table">
						<thead class="bg-primary">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">Ca Name</th>
								<th scope="col">Product Name</th>
								<th scope="col">Product Description</th>
								<th scope="col">Product Code</th>
								<th scope="col">Product Price</th>
								<th scope="col">Product Quentity</th>
								<th scope="col">Product Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($all_product as $product)
							<tr>
								<td>{{$loop->index+1}}</td>
								{{-- <td>{{App\Categorie::find($product->category_id)->category_name}}</td> --}}
								<td>{{$product->relationcategory->category_name}}</td>
								<td>{{Str::limit($product->product_name, 7)}}</td>
								<td>{{Str::limit($product->product_description, 20) }}</td>
								<td>{{$product->product_code}}</td>
								<td>{{$product->product_price}}</td>
								<td>{{$product->product_quentity}}</td>
								<td>
									<img src="{{asset('upload/photos/main')}}/{{$product->product_image}}" alt="Not Found" width="40">
								</td>
								<td>
									<div class="btn-group" role="group">
										<a href="{{url('add/product/edit')}}/{{$product->id}}"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
										<a href="{{url('/product/soft/delete')}}/{{$product->id}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
									</div>
								</td>
							</tr>
							@empty

							<tr class="text-center bg-success" >
								<td colspan="9">No Data Available in Table </td>
							</tr>

							@endforelse
							
						</tbody>
					</table>
					{{$all_product->links()}}
				</div>
			</div>
			<hr>
			<div class="card">
				<div class="card-header bg-success">Product Informetion</div>
				<div class="card-body">
					@if (session('restore'))
					<div class="alert alert-success" role="alert">
						{{ session('restore') }}
					</div>
					@endif
					
					@if (session('pdelete'))
					<div class="alert alert-danger" role="alert">
						{{ session('pdelete') }}
					</div>
					@endif
					<table class="table">
						<thead class="bg-primary">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">Product Name</th>
								<th scope="col">Product Description</th>
								<th scope="col">Product Code</th>
								<th scope="col">Product Price</th>
								<th scope="col">Product Quentity</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($delete_products as $delete_product)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td>{{Str::limit($delete_product->product_name, 7)}}</td>
								<td>{{Str::limit($delete_product->product_description, 20) }}</td>
								<td>{{$delete_product->product_code}}</td>
								<td>{{$delete_product->product_price}}</td>
								<td>{{$delete_product->product_quentity}}</td>
								<td>
									<div class="btn-group" role="group">
										<a href="{{url('product/soft/restore')}}/{{$delete_product->id}}"><button type="button" class="btn btn-sm btn-success">Restore</button></a>
										<a href="{{url('product/permanent/delete')}}/{{$delete_product->id}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
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
		<div class="col-md-3 ">
			<div class="card">
				<div class="card-header bg-success">Add Product</div>
				<div class="card-body">
					@if (session('insert'))
					<div class="alert alert-success" role="alert">
						{{ session('insert') }}
					</div>
					@endif
		<form action="{{url('/add/product/insert')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Category Name</label>
							<select class="form-control" name="category_id">
								<option value="">-Select One-</option>
								@foreach($categotyes as $categoty)
                                <option value="{{$categoty->id}}">{{$categoty->category_name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label>Product Name</label>
							<input type="text" class="form-control" placeholder="Enter Product Name" name="product_name">
						</div>

						<div class="form-group">
							<label>Product Description</label>
							<textarea type="text" class="form-control" placeholder="Enter Product Description" rows="3" name="product_description"></textarea>
						</div>
						<div class="form-group">
							<label>Product Code</label>
							<input type="text" class="form-control" placeholder="Enter Product code" name="product_code">
						</div>
						<div class="form-group">
							<label>Product Price</label>
							<input type="text" class="form-control" placeholder="Enter Product Price" name="product_price">
						</div>
						<div class="form-group">
							<label>Product Quentity</label>
							<input type="text" class="form-control" placeholder="Enter Product Quentity" name="product_quentity">
						</div>
						<div class="form-group">
							<label>Product Image</label>
							<input type="file" class="form-control" name="product_image">
						</div>

						<div class="form-group">
							<label>Product Left Image</label>
							<input type="file" class="form-control" name="product_left_image">
						</div>

						<div class="form-group">
							<label>Product Right Image</label>
							<input type="file" class="form-control" name="product_right_image">
						</div>

						<div class="form-group">
							<label>Product Up Image</label>
							<input type="file" class="form-control" name="product_up_image">
						</div>

						<div class="form-group">
							<label>Product Down Image</label>
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