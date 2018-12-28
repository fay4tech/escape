@extends('layouts.master')
@section('titel', 'Missions')
@php
    $pitch = 'pitch_'.config('app.locale');
    $theme = 'theme_'.config('app.locale');
    $resum = 'resum_'.config('app.locale');
    $avis = 'avis_'.config('app.locale');
    $positive = 'positive_'.config('app.locale');
    $negative = 'negative_'.config('app.locale');
@endphp
@section('content')
<div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2&appId=1681451685436806&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-3 col-sm-12" style="font-size: 10px;">
                        @if (Auth::check() && Auth::user()->lvl >= 8)
                            <a href="{{url('/')}}" class="btn btn-success btn-sm {{ $toutes or "" }}">Toutes</a>
                            <a href="{{route('admintoguest')}}" class="btn btn-info btn-sm {{ $visible or "" }}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                            <a href="{{ route('adminonlyhiden')}}" class="btn btn-danger btn-sm {{ $hiden or "" }}" ><i class="fa fa-eye-slash fa-lg" aria-hidden="true"></i></a>
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-12 mx-auto d-block text-center">
                        <a href="{{route('share.index')}}"></a>
                        {{$rooms->links()}}
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <div class="row">
                            @foreach($rooms as $key => $room)
                            <a href="{{route('rooms.show', $room->id)}}" style="text-decoration: none; cursor: url(images/default/key32.png), auto; color: white;" data-toggle="tooltip" data-html="true" data-placement="top" title="{{$room->$resum}}">
                                <div class="card-body col-xl-4 col-lg-5 my-2 pb-2 text-center col-md-6 col-sm-12" style="max-height:350px;">
                                    <img class="card-img-top img-responsive" alt="{{$room->name}}" src="{{asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$room->image))}}" style="width: auto; max-height: 130px;" />
                                    <div class="card-block">
                                        <div class="col-md-11">
                                            <h5 class="card-title" style="height: 40px">{{$room->name}}</h5>
                                        </div>
                                        <div class="card-text" style="min-height: 95px;">
                                            @php
                                                $roomPitch = strip_tags($room->$pitch);
                                                $roomPitch = str_limit(ucfirst($roomPitch), 110);
                                            @endphp
                                            {!!$roomPitch!!}
                                        </div>
                                        <div class="align-content-lg-end">
                                                @foreach($notes as $note)
                                                    @if($note->id == $room->id)
                                                        @if($note->globalNote != 0)
                                                            <span class="badge badge-leight badge-pill float-left" data-toggle="tooltip" data-html="true" data-placement="top" title="
                                                            Enigmas: {{($note->enigmas + $note->enigmas_ench + $note->enigmas_quant + $note->enigmas_orig)/2 }}/{{$division}} <br>
                                                            Immersion: {{($note->immersion + $note->immersion_ambi + $note->immersion_hist)/2}}/15<br>
                                                            Autres critères: {{($note->search + $note->divertissement + $note->note_mj)/2}}/15">
                                                            {{$note->globalNote}}/{{$division}}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-leight badge-pill float-left" data-toggle="tooltip" data-html="true" data-placement="top" title="Pas encore testé">Bientôt</span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if(Auth::check() && Auth::user()->lvl == 10)
                                                    <span class="badge badge-success badge-pill float-right text-warning">{{$room->views}} Vues</span>
                                                    @if($room->correction == 0) 
                                                        <span class="badge badge-danger badge-pill d-flex justify-content-center">Pas encore Corrigé</span>
                                                    @else
                                                        <span class="badge badge-info badge-pill d-flex justify-content-center">Corrigé</span>
                                                    @endif
                                                    @if($room->activ == 0) 
                                                        <span class="badge badge-danger badge-pill d-flex justify-content-center">Caché</span>
                                                    @else
                                                        <span class="badge badge-info badge-pill d-flex justify-content-center">Visible</span>
                                                    @endif                                                    
                                                @endif
                                            <a href="{{route('rooms.show', $room->id)}}" class="btn btn-primary btn embed-responsive align-bottom pb-0" style="cursor: url(images/default/key32.png), auto;">@lang('En savoir plus')</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @if($loop->last)
                                <div class="card-body col-xl-4 col-lg-5 my-2 pb-2 text-center col-md-6 col-sm-12" style="max-height:350px;">
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
                            @endif
                        @endforeach
                    </div>
                </div>
                    {{-- The best -- div --}}
                    <div class="card-body col-md-3 col-sm-12 mx-auto text-center">
                        {{-- Facebook  --}}
                        <div class="fb-page my-2 mx-sm-auto card-bloc align-items-center justify-content-centerk" data-href="https://www.facebook.com/Serial-Escapers-292018441527145/" data-tabs="timeline, messages" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false">
                            <blockquote cite="https://www.facebook.com/Serial-Escapers-292018441527145/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/Serial-Escapers-292018441527145/">Serial-Escapers</a>
                            </blockquote>
                        </div>
                        {{-- Facebook end --}}
                        <div class="list-group text-left mt-2" id="best-view">
                            <div class="list-group-item list-group-item-secondary">
                                @lang('Les 10 Missions les plus vues')
                            </div>
                            @foreach($bestViews as $best)
                                <a 
                                    href="{{route('rooms.show', $best->id)}}" 
                                    class="list-group-item list-group-item-action active justify-content-between">{{ str_limit(ucfirst($best->name),23)}} 
                                    <span class="badge badge-light badge-pill float-right">{{$best->views}} Vues</span>
                                </a>
                            @endforeach
                        </div>
                        <div class="list-group text-left mt-2" id="best-note">
                            <div class="list-group-item list-group-item-secondary">
                                @lang('Les 10 Missions les mieux notés')
                            </div>
                                @foreach($bestNotes as $best)
                                        {{-- Rate Stars --}}
                                        @php $rating = $best->globalNote / 4 ; @endphp
                                    <a 
                                        href="{{route('rooms.show', $best->id)}}" 
                                        class="list-group-item list-group-item-action active justify-content-between"
                                        data-toggle="tooltip" 
                                        data-placement="top" 
                                        title="{{$best->globalNote}}/{{$division}}"
                                    >{{str_limit(ucfirst($best->name), 23)}}
                                        <div class="btn-outline-primary float-right">
                                            @foreach(range(1,5) as $i)
                                                <span class="fa-stack btn-outline-primary" style="width: 0.7em; color: yellow">
                                                @if($rating >0)
                                                        @if($rating >0.5)
                                                            <i class="fa fa-star fa-xs"></i>
                                                        @else
                                                            <i class="fa fa-star-half fa-xs"></i>
                                                        @endif
                                                    @endif
                                                    @php $rating--; @endphp
                                            </span>
                                            @endforeach
                                        </div>
                                        {{--end of rate strars--}}
                                    </a>
                                @endforeach
                        </div>
                    </div>
                    {{-- end The best -- div --}}
                </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6 mx-auto d-block mt-4">
                                {{$rooms->links()}}
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('layouts.partials._select_script')
    <script src="/js/tooltip.js"></script>
    <script src="/js/app.js"></script>
@endsection