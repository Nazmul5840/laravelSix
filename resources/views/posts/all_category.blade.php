@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-12">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{route('all.category')}}">All Category</a>
        <div class="my-5">
        	<table class="table table-bordered">
		        <thead>
		          <tr>
		            <th scope="col">SL</th>
		            <th scope="col">Category Name</th>
		            <th scope="col">Slug Name</th>
		            <th scope="col">Created At</th>
		            <th scope="col">Actions</th>
		          </tr>
		        </thead>

		        @foreach($category as $row)
		          <tr> 
		            <td>{{$row->id}}</td>
		            <td>{{$row->name}}</td>
		            <td>{{$row->slug}}</td>
		            <td>{{$row->created_at}}</td>

		            <td>
		              <a class="btn btn-primary" href="{{URL::to('viewCategory/'.$row->id)}}"><i class="far fa-eye"></i></a>

		              <a class="btn btn-success" href="{{URL::to('edit/category/'.$row->id)}}"><i class="fas fa-edit"></i></a>
		            <a class="btn btn-danger" href="{{URL::to('deleteCategory/'.$row->id)}}" id="delete" onclick="dltfunction()"><i class="far fa-trash-alt"></i></a>
		            </td>
		          </tr>
		          @endforeach
		      </table>
        
        </div>
    </div>
</div>
@endsection
