@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-12">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{route('all.category')}}">All Category</a>
        <div class="my-5">
        	<h6>{{$post->name}}</h6>
        	<h3>{{$post->title}}</h3>
        	<p>{{$post->details}}</p>
        	<img src="{{URL::to($post->image)}}">
        </div>
    </div>
</div>
@endsection