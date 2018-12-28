@extends('layouts.master')
@section('titel', "Enseignes: $company->name")
@section('content')
    <div class="container-fluid h-100" id='cent'>
        <div class="alert alert-info text-center">
            <h2><strong>@lang('Enseigne') : {{$company->name}}</strong></h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <dl>
                    <address>
                        <strong>{{$company->name}}.</strong><br>
                        <i class="fa fa-home text-danger"></i> {{ucfirst($company->adress)}}<br>
                        {{$company->zip}}, {{ucfirst($company->city)}}, {{ucfirst($company->region)}} <br>
                        {{ucfirst($company->country)}}<br>
                        <abbr title="Phone"><i class="fa fa-phone text-danger"></i> @lang('Tel'):</abbr> {{$company->tel}}<br>
                        <abbr title="email"><i class="fa fa-envelope-o text-danger"></i> @lang('E-mail'):</abbr> {{$company->email}}<br>
                        {{-- put out http:// from company url --}}
                        @php
                            $url = str_replace( parse_url( $company->url, PHP_URL_SCHEME ) . '://', '', $company->url );
                        @endphp
                        <abbr title="web"><i class="fa fa-globe text-danger"></i> @lang('Web'):</abbr> <a href='http://{!! $url !!}' target="_blank">{{$url}}</a>
                    </address>
                    
                    
                        <dt>
                            @if($company->open !== null && $company->close == null ) @lang('Ils ouvrent à') @endif
                            @if($company->open !== null && $company->close !== null ) @lang('Ils ouvrent de') @endif
                            @if($company->open == null && $company->close !== null ) @lang('Ils ferment') @endif
                            @if($company->open !== null) {{ date('G:i', strtotime($company->open)) }}  @endif
                            @if($company->close !== null) @lang('à') {{ date('G:i', strtotime($company->close)) }} @endif
                        </dt>
                    <br>
                    <dt>
                        @lang('Fourchette de prix')
                    </dt>
                    <dd>
                        @lang('Min') = {{number_format($company->pricemin, 2 , ',', '.')}}€ , @lang('Max') = {{number_format($company->pricemax, 2, ',', '.')}}€
                    </dd>
                    <dt>
                        @lang('Offres spéciales')
                    </dt>
                    <dd>
                        @if($company->sale == null)
                            @lang('Aucune offre disponible en ce moment.')
                        @else
                            {!!$company->sale!!}
                        @endif
                    </dd>
                </dl>
            </div>
            
            <div class="col-md-6">
                <div class="col-md-auto">
                    <div class="float-right w-50">
                        <img id="myImg" src="{{asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$company->image))}}" class="img-thumbnail" alt="{{ucfirst($company->name)}}"/>
                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                        </div>
                    </div>
                    <h2>
                        <h5> <strong>@lang('Notre avis')</strong></h5>
                    </h2>
                    <p>
                        {!!$company->avis!!}
                    </p>
                </div>
                <div>
                    <br>
                    <a href="{{ URL::previous() }}" class="btn btn-primary">@lang('Retour')</a>
                </div>
            </div>
            {{-- Div -- edit delete Super Admin--}}
            @if (Auth::check() && auth()->user()->lvl >= 8)
                <div class="col-md-2">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <dt>@lang('créé le'):</dt>
                            <dd>{{date('j-m-Y H:i', strtotime($company->created_at))}}</dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>@lang('Mise à jour le'):</dt>
                            <dd>{{date('j-m-Y H:i', strtotime($company->updated_at))}}</dd>
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                @if (auth()->user()->lvl > 8 || auth()->user()->company_id == $company->id)
                                <a href="{{url("companies/$company->id/edit")}}" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i></a>
                                @endif
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
                                                        @lang('Vous voulez vraiment supprimer l\'enseignes:') <span class="text-danger">{{$company->name}}</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('Annulez') <i class="fa fa-trash-o"></i></button>
                                                        {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'Delete', 'id' => 'confirm_delete' ]) !!}
                                                        <button type="submit" class="btn btn-danger">@lang('Confirmer') <i class="fa fa-pencil"></i></button>
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
                </div>
            @else                
                {{-- Pub Google --}}
                    <div class="col-md-2" style="margin-top:10px; margin-bottom: 110px; index:10; max-height:200px;">
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
                {{-- End Pub Google--}}
            @endif
            {{-- End Div --edit delete Super Admin--}}
        </div>
        <dt>
            @lang('On trouve :number missions chez eux', ['number' => $company->roomNb])
        </dt>
        <dt>
            @lang('On a fait') {{$count}}
            @if($count > 1)
                @lang('Missions')
            @else
                @lang('Mission')
            @endif
            <div class="btn-group">
                <button type="button" class="btn btn-danger btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('Mission')
                </button>
                <div class="dropdown-menu">
                    @foreach($rooms as $room)
                        <a class="dropdown-item" href="{{url("rooms/". $room->id)}}">{{$room->name}}</a>
                    @endforeach
                </div>
            </div>
        </dt>
        <div class="row">
            <div class="col-8">
                @foreach ($rooms as $room)
                    <div class="col-lg-auto col-xs-5 m-2 pull-right">
                        <div class="thumbnail">
                            <a href="{{route('rooms.show', $room->id)}}">
                            <img class="rounded mx-auto d-block img-thumbnail" src="{{asset('storage/' . env('PATH_ON_SERVER_FAY') . str_replace('public','',$room->image))}}" alt="{{ucfirst($room->name)}}" style="width:200px; max-heigh: 150px">
                            <div class="caption">
                                <p class="text-light text-center">{{ucfirst($room->name)}}</p>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    {{-- Pub Google --}}
    <div class="row">
            <div class="col-sm-12 mt-2 text-center" style="margin-bottom: 30px; z-index:10; max-width:800px;">
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
    {{-- End Pub Google--}}
@endsection
@section('script')
    <script src="/js/image.js"></script>
@endsection
