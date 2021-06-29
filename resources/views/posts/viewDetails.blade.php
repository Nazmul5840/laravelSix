@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-12">
        <a class="btn btn-info" href="{{URL::to('/')}}">Back</a>
        <div class="my-5">
        	<h3>{{$post->title}}</h3>
        	<img src="{{URL::to($post->image)}}">
        	<p>{{$post->details}}</p>
        </div>
    </div>
</div>
@endsection