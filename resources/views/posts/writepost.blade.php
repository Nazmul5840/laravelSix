@extends('welcome')

@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <a class="btn btn-success" href="{{route('add.category')}}">Add Category</a>
        <a class="btn btn-info" href="{{route('all.category')}}">All Category</a>
        <a class="btn btn-primary" href="{{route('allPost')}}">All Post</a>
        <div class="my-5">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{route('storePost')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-floating">
                    <input class="form-control" type="text" name="title" placeholder="Enter post title" required!>
                    <label for="name">Title</label>
                </div>
                <br>

                <div class="form-group">
			      <label for="cat" name="categoryId">Select Category</label>
			      <select class="form-select" aria-label="Default select example" id="id" name="category_id">
                    @foreach($category as $row)
					  <option value="{{$row->id}}">{{$row->name}}</option>

                    @endforeach
				</select>
    			</div>

                <br>

                <div class="form-floating">
                    <input class="form-control" type="file" name="image"/>
                    <label for="phone">Image</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" name="details" placeholder="Enter post details" style="height: 12rem" data-sb-validations="required"></textarea>
                    <label for="message">Details</label>
                </div>
                <br />
                <!-- Submit Button-->
                <button class="btn btn-primary text-uppercase" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection