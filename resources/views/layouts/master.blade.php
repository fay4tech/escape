<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts/partials/_head')

    <body>
        @include('layouts/partials/_navbar')
        <div class=" col-12 hovereffect text-center mb-2" >
            <img src="{!! url(env('LOGO_IMG')) !!}" alt="logo" class="img-fluid" style="height:80px;">
            <a href="{!! url(env('APP_URL')) !!}">
                <div class="card-img-overlay justify-content-end" style="max-height:90px">
                    <div class="card-text border-0 bg-semitransparent text-center">
                    </div>
                </div>
            </a>
        </div>

        @include('layouts.partials._flash')
        @yield('content')

        @include('layouts.partials._footer')

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        @yield('script')

    </body>
</html>
