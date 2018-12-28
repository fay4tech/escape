@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="/css/404.css">
@endsection
@section('titel', '404 Page Not Found Error')
@section('content')
    <div class="text-wrapper">
        <div class="title" data-content="404">
            404
        </div>

        <div class="subtitle">
            Oops, the page you're looking for doesn't exist.
        </div>

        <div class="buttons">
            <a class="button" href="{{url('rooms/')}}">Go to homepage</a>
        </div>
        
{{-- Pub --}} 
<div id="pub"> 
    <div class="col-sm-12 mt-2" style="margin-bottom: 30px; z-index:10"> 
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
    </script> 
    <!-- Escape --> 
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8411028629670447" 
    data-ad-slot="9328971908" data-ad-format="auto" data-full-width-responsive="true">
    </ins> 
    <script> 
    (adsbygoogle = window.adsbygoogle || []).push({}); 
    </script> 
    </div> 
</div>
{{-- End pub--}}
    </div>
@endsection