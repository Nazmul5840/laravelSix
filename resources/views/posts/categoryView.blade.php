@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-12">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{route('all.category')}}">All Category</a>
        <div class="my-5">
        	<ol>
        		<li>Category Name: {{$category->name}}</li>
        		<li>Category Slug: {{$category->slug}}</li>
        		<li>Created at: {{$category->created_at}}</li>
        	</ol>
        
        </div>
    </div>
</div>
@endsection