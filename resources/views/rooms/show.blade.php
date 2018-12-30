@extends('layouts.master')
@section('titel', "Mission $room->name")
@section('og')
<meta property="og:url"           content="{{url("rooms/$room->id")}}" />
<meta property="og:type"          content="Escape Game Blog" />
<meta property="og:title"         content="Mission {{$room->name}}" />
<meta property="og:description"   content="{!! str_limit(ucfirst(strip_tags(htmlspecialchars_decode($room->pitch_fr))), 110) !!}" />
<meta property="og:image"         content="{!! asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$room->image)) !!}" />  
@endsection
@php
    $pitch = 'pitch_'.config('app.locale');
    $theme = 'theme_'.config('app.locale');
    $resum = 'resum_'.config('app.locale');
    $avis = 'avis_'.config('app.locale');
    $positive = 'positive_'.config('app.locale');
    $negative = 'negative_'.config('app.locale');
@endphp
@section('content')
    @if($room->activ === 0 && (!Auth()->check() || !auth()->user()->lvl >= 8))
        <div class="container-fluid">
            <div class="alert alert-danger text-center h3">
                -- <span class="text-dark">{{ $room->name }}</span> --
                <br>
                @lang('Avis non disponible pour le moment')
            </div>
            {{-- Pub Google --}}
            <div class="row">
                <div class="col-sm-12 mt-2" style="margin-bottom: 30px; z-index:10">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Escape -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-8411028629670447"
                         data-ad-slot="9328971908"
                         data-ad-format="auto"
                         data-full-width-responsive="true">
                    </ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            {{-- End Pub Google--}}
            <div class="row align-items-center  justify-content-center">
                <div clas="col-md-3"></div>
                <div class="col-md-6 col-sm-12">
                    <img class="rounded mx-auto d-block" src="https://i.gifer.com/QDWt.gif" alt="coming soon" style="width:100%">
                </div>
                <div class="col-md-3"></div>
            </div>
            {{-- Pub Google --}}
            <div class="row">
                <div class="col-sm-12 mt-2" style="margin-bottom: 30px; z-index:10">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Escape -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-8411028629670447"
                         data-ad-slot="9328971908"
                         data-ad-format="auto"
                         data-full-width-responsive="true">
                    </ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            {{-- End Pub Google--}}
        </div>
    @else
        <div class="alert-info container-fluid">
            <div class="row">
                @if($room->activ == '0')
                    <div class="text-center alert alert-danger h4 mx-auto mt-2"> Cette salle n&#39;est pas visible</div>
                @endif
                <div class="col-md-12 mt-3">
                    <h2 class="text-center text-info">
                        <strong>@lang('Mission'): {{ucfirst($room->name)}}</strong>
                    </h2>
                </div>
                <div>
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fserial-escapers.com%2Frooms%2F{{$room->id}}&width=132&layout=button_count&action=like&size=small&show_faces=false&share=true&height=46&appId=1681451685436806" width="132" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>
                </div>
            <div class="row">
                <div class="col-md-3 d-flex">
                    <dl>
                    @if($room->company()->first()->country != null)
                        <dt>
                            <span class="badge badge-pill d-flex float-right"><img src="{{asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','','flags/48/'. $room->company()->first()->country .'.png'))}}"></span>
                        </dt>
                    @endif
                        <dt>
                            @lang('Nom')
                        </dt>
                        <dd>
                            {{ucfirst($room->name)}}
                        </dd>
                        <dt>
                            @lang('Thématique')
                        </dt>
                        <dd>
                            {{ucfirst($room->$theme)}}
                        </dd>
                        <dt>
                            @lang('Nombre de joueurs')
                        </dt>
                        <dd>
                            @lang('Min') = {{$room->minplayers}} , @lang('Max') = {{$room->maxplayers}}
                        </dd>
                        <div class="row">
                            <div class="col ml-auto">
                                <dt>
                                    @lang('Niveau')
                                </dt>
                                <dd>
                                    {{$roomLvl}}
                                </dd>
                            </div>
    
                            <div class="col ml-auto">
                                <dt>
                                    @lang('Taux de réussite')
                                </dt>
                                <dd>
                                    @if($room->success != null)
                                        {{$room->success}}%
                                    @else
                                        N/A
                                    @endif
                                </dd>
                            </div>
                            <div class="col ml-auto">
                                <dt>
                                    @lang('Temps de jeu')
                                </dt>
                                <dd>
                                    {{$room->timeplay}} mn
                                </dd>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <dt>
                                    @lang('Enseigne'):
                                </dt>
                                <dd>
                                    @if(strtolower($company->name) != "n/a")
                                        <a href="{{url('companies/'.$company->id)}}">{{ucfirst($company->name)}}</a>
                                    @else
                                        <p>{{ucfirst($company->name)}}</p>
                                    @endif
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>
                <div class="col-md-6">
                    <div class="float-sm-right w-50 mt-0">
                        {{-- pur le lien aprer evois ajouter app/public/ dans asset--}}
                        <img id="myImg" src="{!! asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$room->image)) !!}" class="img-thumbnail" alt="{{ucfirst($room->name)}}"/>
                        <!-- The Modal -->
                        <div id="myModal" class="modal" style="z-index: 20">
    
                            <!-- The Close Button -->
                            <span class="close">&times;</span>
    
                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01" src="#" alt="{{$room->name}}">
    
                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                        </div>
                    </div>
                        <h5> <strong>@lang('Description')</strong></h5>
                    <p>
                        {!! $room->$pitch !!}
                    </p>
                </div>
                {{-- Div -- edit delete Super Admin--}}
                <div class="col-md-3">
                    @if (Auth::check() && auth()->user()->lvl > 8)
                            <div class="well">
                                <dl class="dl-horizontal">
                                    <dt>@lang('Créé le'):</dt>
                                    <dd>{{date('j-m-Y H:i', strtotime($room->created_at))}}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>@lang('Mise à jour le'):</dt>
                                    <dd>{{date('j-m-Y H:i', strtotime($room->updated_at))}}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>@lang('Mise à jour par'):</dt>
                                    @if($room->editor == null)
                                    <dd>@lang('Personne')</dd>
                                    @else                               
                                    <dd class="text-success h5">{{ $room->editor}}</dd>
                                    @endif
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>
                                        @if($room->correction == 0 || $room->correction == null)
                                        <dd class="text-danger"><i class="fa fa-times-circle fa-2x"></i> <span class="font-weight-bold h4 ">@lang('Pas Corrigé')</span> <i class="fa fa-times-circle fa-2x"></i></dd>
                                        @else                               
                                        <dd class="text-success"><i class="fa fa-check-circle fa-2x"></i> <span class="font-weight-bold h4 ">@lang('Corrigé')</span> <i class="fa fa-check-circle fa-2x"></i></dd>
                                        @endif
                                    </dt>
                                </dl>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{url("rooms/$room->id/edit")}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <div class="col-sm-6">
                                        @if (auth()->user()->lvl == 10 )
                                            {{--Delete btn with confirmation JQuery--}}
                                            <button type="submit" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-o"></i></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-dark">
                                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Confirmation') <i class="fa fa-trash-o"></i></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
        
                                                        <div class="modal-body text-dark">
                                                            @lang('Vous voulez vraiment supprimer la mission:') <span class="text-danger">{{$room->name}}</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('Annuler') <i class="fa fa-trash-o"></i></button>
                                                            {!! Form::open(['route' => ['rooms.destroy', $room->id], 'method' => 'DELETE', 'id' => 'confirm_delete' ]) !!}
                                                            <button type="submit" class="btn btn-danger">@lang('Confirmer') <i class="fa fa-trash-o"></i></button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--Edn delete btn--}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                    @else                
                        {{-- Pub Google --}}
                        <div class="row">
                            <div class="col-sm-12 mt-2" style="margin-bottom: 30px; z-index:10">
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- Escape -->
                                <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-client="ca-pub-8411028629670447"
                                    data-ad-slot="9328971908"
                                    data-ad-format="auto"
                                    data-full-width-responsive="true">
                                </ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>
                    {{-- End Pub Google--}}
                    @endif
                </div>
    
                {{-- End Div -- edit delete Super Admin--}}
            </div>
            @if($room->dispo_id !== null)
                <div class="col-md-12">
                    {{-- Div de escape.paris --}}
                    <div class="escape-point-paris" data-id="{{$room->dispo_id}}" data-theme="serial">
                        <p><h6>@lang('Serial-Escapers vous aident à choisir la salle,')</h6></p>
                        <div class="escape-point-paris-teasafter">
                            <a href="https://escapeplanner.fr" title="Réservation Escape Game Paris" target="_blank"><img src="https://escapeplanner.fr/res/escape-planner-logo-blog2.png" alt="Réservation Escape Game Paris"></a><span class="h6"> @lang('à trouver une dispo :')</span>
                        </div>
                        <div class="escape-point-paris-ifr">@lang('Chargement des disponibilités en cours...')</div>
                    </div>
                </div>
            @endif
            @if($room->wins == 1 || $room->wins == 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info mb-0">
                            <h4 class="text-center"><strong>@lang('Notre expérience!')</strong></h4>
                        </div>
                        @if($room->wins == 1)
                            <div class="alert alert-danger mb-0">
                                <h4 class="text-center"><strong>@lang('On a perdu')</strong></h4>
                            </div>
                        @elseif($room->wins == 0)
                            <div class="alert alert-success mb-0">
                                <h4 class="text-center"><strong>@lang('On a gagné')</strong></h4>
                            </div>
                        @else
                            <div class="alert alert-info mb-0">
                                <h4 class="text-center"><strong>@lang('À venir')</strong></h4>
                            </div>
                            <div class="col-12 text-center center-block">
                                <a href="{{ URL::previous() }}" class="btn btn-primary">@lang('Retour')</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-secondary mb-0 h6 text-center">
                                @if($room->playDate !== null)
                                    <div class="col-3  d-inline-flex" style="min-width: 200px"><strong>@lang('Nous avons joué le:') {!! Carbon\Carbon::parse($room->playDate)->format('d-m-Y') !!}</strong></div>
                                @else
                                    {{-- <div class="col-3 col-xs-12 d-inline-flex"><strong>Nous avons joué le: </strong>N/A</div> --}}
                                @endif
                                <div class="col-4 d-inline-flex" style="min-width: 200px"><strong>@lang('Nous l\'avons faite en') <span class="text-primary"> {{$room->timePlayMax}}</span> @lang('minutes')</strong></div>
                                <div class="col-4 d-inline-flex" style="min-width: 200px"><strong>@lang('La Team:')<br>  {!! ucfirst($room->teams) !!} </strong></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="card-body text-center"><h4><strong>@lang('Note globale:') <span class="text-primary">{{$globalNotes}}/{{$division}}</span></strong></h4>
                        <p>
                            <a class="btn btn-primary btn-sm rounded-circle" data-toggle="collapse" href="#enigmes" role="button" aria-expanded="false" aria-controls="enigmes" title="Click moi pour plus de Detaille">
                                @lang('Enigmes')
                            </a>
                            <a class="btn btn-primary btn-sm rounded-circle" data-toggle="collapse" href="#immersions" role="button" aria-expanded="false" aria-controls="immersions" title="Click moi pour plus de Detaille">
                                @lang('Immersion')
                            </a>
                            <a class="btn btn-primary btn-sm rounded-circle" data-toggle="collapse" href="#autre" role="button" aria-expanded="false" aria-controls="autre" title="Click moi pour plus de Detaille">
                                @lang('Autres critères')
                            </a>
                        </p>
                        <div class="collapse float-left" id="enigmes">
                            <div class="card card-body text-dark">
                                <strong>@lang('Cohérence') : </strong> {{$room->enigmas}}/10<br>
                                <strong>@lang('Enchainement') : </strong>{{$room->enigmas_ench}}/10<br>
                                <strong>@lang('Quantité / Temps / Joueurs') : </strong>{{$room->enigmas_quant}}/10<br>
                                <strong>@lang('Originalité') : </strong>{{$room->enigmas_orig}}/10
                            </div>
                        </div>
                        <div class="collapse float-left" id="immersions">
                            <div class="card card-body text-dark">
                                <strong>@lang('Décors') : </strong>{{$room->immersion}}/10<br>
                                <strong>@lang('Ambiance') : </strong>{{$room->immersion_ambi}}/10<br>
                                <strong>@lang('Histoire / Pitch') : </strong>{{$room->immersion_hist}}/10<br>
                            </div>
                        </div>
                        <div class="collapse float-left" id="autre">
                            <div class="card card-body text-dark">
                                <strong>@lang('Divertissement') : </strong>{{$room->divertissement}}/10<br>
                                <strong>@lang('MJ / Aides / (Dé)Brief') : </strong>{{$room->note_mj}}/10<br>
                                <strong>@lang('Fouille') : </strong>{{$room->search}}/10
                            </div>
                        </div>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: {{$globalNotes * 5 }}%" aria-valuenow="{{$globalNotes * 5 }}" aria-valuemin="4" aria-valuemax="100">
                                <strong class="text-warning"></strong>
                            </div>
                            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: {{100 - ($globalNotes * 5) }}%" aria-valuenow="{{100 - ($globalNotes * 5) }}" aria-valuemin="0" aria-valuemax="100">
                                @if($globalNotes == null)
                                    @lang('Pas de note')
                                @endif
                            </div>
                        </div>
                        {{--
                            @php $rating = ($globalNotes / 20) * 5 ; @endphp
                            @foreach(range(1,5) as $i)
                                <span class="fa ml-1" style="width: 0.9em; color: #1dff13">
                                    @if($rating >0)
                                        @if($rating >0.5)
                                            <i class="fas fa-star fa-xs"></i>
                                        @else
                                            <i class="fas fa-star-half fa-xs"></i>
                                        @endif
                                    @endif
                                    @php $rating--; @endphp
                                </span>
                            @endforeach
                            --}}
                    </div>
                </div>
                <div class="row">
                    <div class="alert-info col-md-12 ">
                        <h2>
                            <strong>@lang('Notre avis:')</strong>
                        </h2>
                            {!! $room->$avis !!}
                    </div>
                </div>
                <div class="row">
                    <div class="alert-success col-md-6">
                        <p><i class="fa fa-smile-o fa-2x" aria-hidden="true"></i><strong> + @lang('On a aimé') + </strong> <i class="fa fa-smile-o fa-2x" aria-hidden="true"></i></p>
                        <p>{!! $room->$positive !!}</p>
                    </div>
                    <div class="alert-danger col-md-6">
                        <p><i class="fa fa-frown-o fa-2x" aria-hidden="true"></i><strong> - @lang('On n’a pas aimé') - </strong><i class="fa fa-frown-o fa-2x" aria-hidden="true"></i></p>
                        <p>{!! $room->$negative !!}</p><br>
                    </div>
                </div>
            @endif
            {{-- Pub --}}
            <div class="row">
                <div class="col-sm-12 mt-2" style="margin-bottom: 30px; z-index:10">
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
            </div>{{-- End pub--}}
                <div class="row">
                        <iframe class="mx-auto" src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fserial-escapers.com%2Frooms%2F{{$room->id}}&width=132&layout=button_count&action=like&size=small&show_faces=false&share=true&height=46&appId=1681451685436806" width="132" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>
                </div>
            <div class="row">
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-circle mx-auto btn-sm">@lang('Retour')</a>
                
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script src="/js/image.js"></script>
@endsection