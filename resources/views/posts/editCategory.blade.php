@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{route('all.category')}}">All Category</a>
        <div class="my-5">

            <form action="{{url('update/category/'.$category->id)}}" method="post">
            @csrf
                <div class="form-floating">
                    <input class="form-control" id="name" type="text" name="name" value="{{$category->name}}">
                    <label for="name">Category Name</label>
                </div>

                <div class="form-floating">
                    <input class="form-control" id="name" type="text" name="slug" value="{{$category->slug}}">
                    <label for="name">Slug Name</label>
                </div>
               
                <br>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection