@extends('layouts.master')
@section('titel', 'News')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-sm-12">
            @foreach($posts as $post)
                <br><br><br>
                @php
                    $postBody = strip_tags($post->body  );
                    $postBody = str_limit(ucfirst($postBody), 220);
                @endphp
                <div class="container">
                    <div class="card " style="color: black;">
                        <img class="card-img-top" src="{{asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$post->image))}}" alt="{{ $post->titel }}" style="width: auto; max-height: 120px">
                        <div class="card-body">
                            <div class="card-title">
                                <a href="{{route('post.show', $post->id)}}"><h4>{{$post->titel}}</h4></a>
                            </div>
                            <p class="card-text">{!! $postBody !!}</p>
                            <small class="post_meta"><a href="{{route('users.show', '1')}}">Snow</a><span> {{ $post->old }}</span></small>
                        </div>
                    </div>

                    <br><br>


                    <div class="card text-center text-light" style="background-color: #8d0b00">
                        <h4 class="card-title mt-1">{{$post->titel}}</h4><br>
                        <div class="card-img" style="">
                            <img class="img-fluid" src="{{asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$post->image))}}"
                                 style="max-height: 140px; width: 100%; "
                            >
                        </div>
                        <p class="card-body">{!! $postBody !!}</p>
                        <small class="text-right pr-2"><a href="{{route('users.show', '1')}}">Snow</a><span> {{ $post->old }}</span></small>
                    </div>
                    @endforeach
                </div>
        </div>

    </div>
@endsection
@section('script')
@endsection