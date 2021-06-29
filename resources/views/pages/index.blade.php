@extends('welcome')

@section('content')
	<div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($post as $row)
                    <div class="post-preview">
                        
                            <a href="{{URL::to('viewDetails/'.$row->id)}}"><img src="{{URL::to($row->image)}}" height="300" width="300"></a>
                            <a href="{{URL::to('viewDetails/'.$row->id)}}"><h2 class="post-title">{{$row->title}}</h2></a>
                            <a href="{{URL::to('viewDetails/'.$row->id)}}"><h3 class="post-subtitle">{{$row->slug}}</h3></a>
                       
                    </div>

                    <hr class="my-4" />
                    @endforeach

                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4">{{$post->links()}}</div>
                </div>
            </div>
@endsection