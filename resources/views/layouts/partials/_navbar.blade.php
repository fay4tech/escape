<nav class="navbar navbar-expand-md fixed-top navbar-dark mb-0" style="background-color: #000000;">
    <a class="navbar-brand" href="{{url('/')}}">{{env('APP_NAME')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-light" id="navbarCollapse">
        <ul class="navbar-nav mr-auto text-light">
            {{-- Menu Rooms and Companies --}}
            @if (Auth::check() && auth()->user()->lvl == 10)
                <li class="nav-item dropdown ml-md-auto text-light">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">@lang('Missions')</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/')}}">@lang('Missions')</a>
                        <a class="dropdown-item" href="{{url('/rooms/create')}}">@lang('Créer')</a>
                    </div>
                </li>
                <li class="nav-item dropdown ml-md-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">@lang('Enseignes')</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{url('/companies')}}">@lang('Enseignes')</a>
                        <a class="dropdown-item" href="{{url('/companies/create')}}">@lang('Créer')</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">@lang('Qui sommes nous?')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/notation')}}">@lang('Notation')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin')}}">Admin <span class="badge badge-success">{{\App\User::newUser()}}</span></a>
                </li>
                <li class="pt-1">                    
                    <a  href="{{route('share.index')}}"><h6><span class="badge badge-info"><i class="fa fa-eye"></i> {{\App\Room::share()}} </span></h6></a>
                </li>
                <li class="pt-1 pl-1">
                    <a href="{{route('share.show', '-')}}"><h6><span class="badge badge-danger"><i class="fa fa-eye-slash"></i> {{\App\Room::noShare()}} </span></h6></a>
                </li>
                <li class="pl-3">
                    @foreach(config('app.locales') as $locale)
                        @if($locale != session('locale'))
                            <a href="{{ route('language', $locale) }}">
                                <span class="badge badge-secondary">
                                    <img alt="{{ session('locale') }}"
                                         src="{!! asset('storage/' . env('PATH_ON_SERVER_FAY') . 'flag/'. $locale . '.png') !!}"/>
                                    <i class="fa fa-language fa-lg text-dark" aria-hidden="true"></i>
                                </span>
                            </a>
                        @endif
                    @endforeach
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/rooms')}}">@lang('Missions')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/companies')}}">@lang('Enseignes')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">@lang('Qui sommes nous?')</a>
                </li>
                {{--
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/notation')}}">Notation</a>
                </li>
                --}}
                <li>
                    @foreach(config('app.locales') as $locale)
                        @if($locale != session('locale'))
                            <a href="{{ route('language', $locale) }}">
                                <img alt="{{ session('locale') }}"
                                     src="{!! asset('storage/' . env('PATH_ON_SERVER_FAY') . 'flag/'. $locale . '.png') !!}"/>
                            </a>
                        @endif
                    @endforeach
                </li>
            @endif
        </ul>
        <button class="btn btn-sm btn-outline-primary my-2 my-sm-0 mr-3" type="submit" onclick="location.href = '{{url('/search/filter')}}';">@lang('Filtres')</button>
        <form class="form-inline mr-4" action="{{url('search')}}" method="GET">
            @csrf
            <input class="btn btn-sm form-control mr-sm-2" type="text" placeholder="@lang('Recherche')" aria-label="Search" name="search" id="search" style="max-width:100px">
            <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>

        @auth
            <div class="btn-group dropdown mr-lg-5">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('Salut') {{auth()->user()->name}}
                </button>

                <div class="dropdown-menu float-left" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('users.index')}}">@lang('Profil')</a>
                    <a class="dropdown-item" href="{{route('users.edit', auth()->user()->id)}}">@lang('Editer le profil')</a>
                    <a class="dropdown-item" href="{{route('changePassword')}}">@lang('Editer le password')</a>
                    <a class="dropdown-item" href="{{route('logout')}}">@lang('Déconnecter')</a>
                </div>
            </div>
        @else
            <a href="{{route('login')}}" class="btn btn-sm btn-secondary float-right ml-2">@lang('Connexion')</a>
            <a href="{{route('register')}}" class="btn btn-sm btn-secondary float-right ml-2">@lang("S’enregistrer")</a>
        @endauth

    </div>
</nav>
