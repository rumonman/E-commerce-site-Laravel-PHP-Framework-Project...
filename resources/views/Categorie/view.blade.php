@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">Add Categorie</div>
                <div class="card-body">
                    @if (session(''))
                    <div class="alert alert-success" role="alert">
                        {{ session('') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Manu Statas</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($all_categorys as $category)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{($category->manu_status == 1) ? 'YES' : 'NO'}}</td>

                                <td>{{$category->created_at->format('d-m-Y h:i:s A')}}
                                 <hr>
                                 {{$category->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{url('change/button/status')}}/{{$category->id}}"><button type="button" class="btn btn-sm btn-primary">Change</button></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center bg-success" >
                                <td colspan="4">No Data Available in Table </td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success">Add Categorie</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                     
                     @if($errors->all())
                     <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                         <li> {{$error}}</li>
                        @endforeach
                     </div>
                     @endif

                    <form action="{{url('/add/product/categorie/insert')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" >
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="manu_status" value="1" id="manu"> <label for="manu">Use The Manu</label> 
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection