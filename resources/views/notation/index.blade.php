@extends('layouts.master')
@section('titel', 'Notation')
@section('content')
    <div class="container-fluid">
        <div class="row pt-lg-2">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="">
                    {{-- <img src='{!! url($text->image) !!}' class="rounded float-right img-thumbnail mx-4" alt="sherlokoms" style="width: 20%"> --}}
                    <h1 class="display-4">Notation!</h1>
                    <p class="lead">{!! $text->titel !!}</p>                    
                    @if (Auth::check() && auth()->user()->lvl > 8)
                        <a href="{{url("notation/$text->id/edit")}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    @endif
                    <hr class="my-4">
                    {{-- 
                        <p><h1>Under Construction</h1></p> 
                        <img src='{!! url('images/default/construction.gif') !!}' class="rounded img-thumbnail" alt="construction" style="width: 25%"> 
                        --}}
                       @if($text->text == null)
                        <div class="col-12 lead text-center">
                            <img src='{!! url('images/default/construction.gif') !!}' class="rounded img-thumbnail" alt="construction" style="width: 25%"> 
                       @else
                        <div class="col-12 lead text-justify"  style="font-size: 15px;">
                            {!! $text->text !!}
                       @endif
                    </div>                    
                </div>

            </div>
            <div class="col-md-2"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Escape -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8411028629670447"
                     data-ad-slot="9328971908"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script></div>
        </div>
        {{-- Pub Block --}}
        <div class="row">
            <div class="col-sm-12 mt-2" style="margin-bottom: 30px; z-index:10">
               
            </div>
        </div>
        {{-- End Pub Block--}}
    </div>
@endsection
