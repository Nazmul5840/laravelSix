@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-12">
        <a class="btn btn-success" href="{{route('post')}}">Write Post</a>
       	<a class="btn btn-primary" href="{{route('allPost')}}">All Post</a>
        <div class="my-5">
        	<table class="table table-bordered">
		        <thead>
		          <tr>
		            <th scope="col">SL</th>
		            <th scope="col">Category Name</th>
		            <th scope="col">Title</th>
		            <th scope="col">Details</th>
		            <th scope="col">Image</th>
		            <th scope="col">Actions</th>
		          </tr>
		        </thead>

		        @foreach($post as $row)
		        <tr>
		        	<td>{{$row->id}}</td>
		        	<td>{{$row->name}}</td>
		        	<td style="width:200px;">{{$row->title}}</td>
		        	<td style="width:300px;">{{$row->details}}</td>
		        	<td><img src="{{URL::to($row->image)}}" style="height:50px; width:70px"></td>
		        	<td>
		        		<a class="btn btn-primary" href="{{URL::to('viewPost/'.$row->id)}}"><i class="far fa-eye"></i></a>

		              	<a class="btn btn-success" href="{{URL::to('postEdit/'.$row->id)}}"><i class="fas fa-edit"></i></a>
		            	<a class="btn btn-danger" id="delete" href="{{URL::to('postDelete/'.$row->id)}}" onclick="dltfunction({{$row->id}})"><i class="far fa-trash-alt"></i></a>
		        	</td>
		        </tr>
		        @endforeach
		  
		      </table>
        
        </div>
    </div>
</div>
@endsection
