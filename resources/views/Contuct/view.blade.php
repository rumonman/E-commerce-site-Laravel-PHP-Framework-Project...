@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/user')}}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">List Contuct Message</li>
				</ol>
			</nav>
			<div class="card">
				<div class="card-header bg-success">List Contuct Message</div>
				<div class="card-body">
					@if (session('contuct'))
					<div class="alert alert-danger" role="alert">
						{{ session('contuct') }}
					</div>
					@endif
					
					<table class="table">
						<thead class="bg-primary">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">First Name</th>
								<th scope="col">List Name</th>
								<th scope="col">Subject</th>
								<th scope="col">Message</th>
								<th scope="col">Read Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($allcontucts as $allcontuct)
							<tr class={{($allcontuct->read_status ==1)? 'bg-info':""}}>
								<td>{{$loop->index+1}}</td>
								<td>{{$allcontuct->first_name}}</td>
								<td>{{$allcontuct->last_name }}</td>
								<td>{{$allcontuct->subject}}</td>
								<td>{{$allcontuct->message}}</td>
								<td>{{$allcontuct->read_status}}</td>
								
								<td>
									<div class="btn-group" role="group">
										<a href="{{url('/contuct/message/delete')}}/{{$allcontuct->id}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
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
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection