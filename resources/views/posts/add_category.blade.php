@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{route('all.category')}}">All Category</a>
        <div class="my-5">
        <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('store.category')}}" method="post">
            @csrf
                <div class="form-floating">
                    <input class="form-control" id="name" type="text" placeholder="Enter post title" name="name">
                    <label for="name">Category Name</label>
                </div>

                <div class="form-floating">
                    <input class="form-control" id="name" type="text" placeholder="Enter post title" name="slug">
                    <label for="name">Slug Name</label>
                </div>
               
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection