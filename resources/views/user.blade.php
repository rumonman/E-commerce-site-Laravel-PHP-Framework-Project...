@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header bg-success">User Informetion</div>
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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_users as $all_user)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$all_user->name}}</td>
                                <td>{{$all_user->email}}</td>
                                <td>
                                    
                                    <a href="{{url('user/edit')}}/{{$all_user->id}}" class="btn btn-sm btn-primary" role="button">Edit</a>
                                    <a href="{{url('user/delete')}}/{{$all_user->id}}" class="btn btn-sm btn-danger" role="button">Delete</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header bg-danger">Delete User Informetion</div>
                <div class="card-body">
                    @if (session('restor'))
                    <div class="alert alert-success" role="alert">
                        {{ session('restor') }}
                    </div>
                    @endif

                     @if (session('force'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('force') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restors as $restor)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$restor->name}}</td>
                                <td>{{$restor->email}}</td>
                                <td>
                                    <a href="{{url('user/delete/rtestor')}}/{{$restor->id}}" class="btn btn-sm btn-primary" role="button">Restore</a>
                                    <a href="{{url('/user/force/delete')}}/{{$restor->id}}" class="btn btn-sm btn-danger" role="button">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection