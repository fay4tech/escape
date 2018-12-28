@extends('layouts.master')
@section('titel', 'Name News')
@section('content')
    <div class="container">
        <div class="col-md-8 col-sm-12">
                <div class="jumbotron  justify-content-around mt-3" style="background-color: #4c110f">
                    <div class="text-light">
                        <h4 class="text-center">{{$post->titel}}</h4><br>
                        <p>{!! $post->body !!}</p>
                        <p>{{$post->corection}}</p>
                        <a href="{{route('post.index')}}" class="btn btn-primary btn embed-responsive align-bottom pb-0" >@lang('Retournez')</a>

                    </div>
                </div>
        </div>
    </div>
@endsection
@section('script')
@endsection