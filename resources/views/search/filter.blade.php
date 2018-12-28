@extends('layouts.master')
@section('titel', 'Filter')
@section('content')
    @if(Session::has('message'))
        <p class=" text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <h1 class="text-center badge-secondary">Filter</h1>
    <div class="container">
        <div class="row">
            <form action="{{url('search/filter')}}" method="post" >
                {{csrf_field()}}
                <table class="form-group">
                    <tr class="col-6">
                        <select class="form-control" name="category1" id="category1" required>
                            @foreach($lands as $land)
                                <option value="{{$land}}">{{ucfirst($land)}}</option>
                            @endforeach
                        </select>
                    </tr>
                    <tr>
                        <select disabled="disabled" class="subcat form-control" id="category2" name="category2" required>
                            <option value>Sélectionner</option>
                            @foreach($lands as $land)
                                <optgroup data-rel="{{$land}}">
                                @foreach($city as $value)
                                    @if($land == $value['land'])
                                        <option value="{{$value['city']}}">{{ucfirst($value['city'])}}</option>
                                    @endif
                                @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </tr>
                    <tr>
                        <select disabled="disabled" class="subcat form-control" id="category3" name="category3" required>
                            <option value>Sélectionner</option>
                            @foreach($lands as $land)
                                <optgroup data-rel="{{$land}}">
                                    <option value="word">Toutes catégories</option>
                                    <option value="name">Nom</option>
                                    <option value="theme">Thème</option>
                                    <option value="pitch">Pitch</option>
                                    <option value="avis">Avis</option>
                                    <option value="note">Note /20</option>
                                    <option value="price">Prix €</option>
                                </optgroup>
                            @endforeach
                        </select>
                    </tr>
                </table>
                <div class="form-group">
                    <label for="search">Rechercher <i class="fa fa-filter "></i></label>
                    <input id="search" name="search" placeholder="Search" class="form-control here" type="text" required>
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
            @if($results != null)
                    <div class="list-group ml-5
                        @if ($count > 8)
                            pre-scrollable
                        @endif
                        " style="max-height: 450px">
                        <div class="list-group-item list-group-item-secondary">
                            @if($column == 'price')
                                Il y a {{$count}} enseignes proposant des missions a moins de "{{ucfirst($search)}}€"
                            @elseif($column == 'note')
                                Il y a {{$count}} missions avec une note supérieure à "{{ucfirst($search)}}"
                            @else
                                Il y a le mot "{{ucfirst($search)}}" ici
                            @endif
                        </div>
                            @foreach($results as $result)
                                <a href="{{url($table.'/'. $result->id)}}" class="list-group-item list-group-item-action active justify-content-between" >{{str_limit($result->name, 23)}}
                                    <div class="btn-outline-primary text-white float-right">
                                        @if($column == 'price')
                                            <i data-toggle="tooltip" data-placement="top" title="Price Max: {{$result->pricemax}} - Min: {{$result->pricemin}}">Max: {{$result->pricemax}}€ / Min: {{($result->pricemin)}}€"</i>
                                        @elseif($column == 'note')
                                        @php $rating = $result->note / 4 ; @endphp
                                            @foreach(range(1,5) as $i)
                                                <span class="fa-stack btn-outline-primary" data-toggle="tooltip" data-placement="top" title="{{$result->note}}/20" style="width: 0.9em; color: yellow">
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
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                    </div>
            @endif
        </div>
    </div>
    @php
    unset($_SESSION);
    @endphp
@endsection
@section('script')
    @include('layouts.partials._select_script')
    <script src="/js/tooltip.js"></script>
@endsection