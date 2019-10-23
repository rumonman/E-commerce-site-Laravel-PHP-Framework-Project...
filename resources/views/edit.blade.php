@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header bg-success">Edit User Informetion</div>
				<div class="card-body">
					@if (session('edit'))
					<div class="alert alert-success" role="alert">
						{{ session('edit') }}
					</div>
					@endif
					<form action="{{url('/user/edit/update')}}/{{$user_edit->id}}" method="post">
						@csrf
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" value="{{$user_edit->name}}">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="email" value="{{$user_edit->email}}">
						</div>
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection