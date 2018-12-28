@extends('layouts.master')
@section('titel', 'Enseignes')
@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2&appId=1681451685436806&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            @foreach($companies as $key => $company)
                             <a href="{{route('companies.show', $company->id)}}" style="text-decoration: none; cursor: url(images/default/key32.png), auto; color: white;"> 
                                <div class="card-body col-md-4 mb-2 pb-2 text-center" style="min-height:400px">
                                    <div class="card-img h-auto" style="min-height: 140px">
                                        <img class="card-img-top img-responsiv h-50" alt="{{$company->name}}" src="{{asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$company->image))}}" style="width: auto; max-height: 130px; max-width: 295px;"/>
                                    </div>
                                    <div class="card-block">
                                        <div class="col-md-11">
                                            <h5 class="card-title"style="height: 40px">{{ucfirst($company->name)}}</h5>
                                        </div>
                                        <div class="card-text" style="min-height: 95px;">
                                            @php
                                                $companyAvis = strip_tags($company->avis  );
                                                $companyAvis = str_limit(ucfirst($companyAvis), 110);
                                            @endphp
                                            {!!$companyAvis!!}
                                        </div>
                                        <div class="align-content-lg-end">
                                            <a href="{{route('companies.show', $company->id)}}" class="btn btn-primary btn embed-responsive align-bottom" style="cursor: url(images/default/key32.png), auto;"> @lang('En savoir plus')</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                                @if($loop->iteration % 12 == 0)
                                    <div class="card-body col-md-4 mb-2 pb-2" style="min-height:400px; ">
                                        <div class"card-block>
                                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                            <ins class="adsbygoogle"
                                                 style="display:block"
                                                 data-ad-format="fluid"
                                                 data-ad-layout-key="-f1+5r+5a-db+57"
                                                 data-ad-client="ca-pub-8411028629670447"
                                                 data-ad-slot="1202120470"></ins>
                                            <script>
                                                 (adsbygoogle = window.adsbygoogle || []).push({});
                                            </script>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="card-body col-md-3  text-center float-right">
                        
                        {{-- Facebook  --}}
                        <div class="fb-page card-block my-2 mx-sm-auto align-items-center justify-content-center" data-href="https://www.facebook.com/Serial-Escapers-292018441527145/" data-tabs="timeline, messages" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false">
                            <blockquote cite="https://www.facebook.com/Serial-Escapers-292018441527145/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/Serial-Escapers-292018441527145/">Serial-Escapers</a>
                            </blockquote>
                        </div>
                        {{-- Facebook end --}}
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Escape -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-8411028629670447"
                             data-ad-slot="9328971908"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
