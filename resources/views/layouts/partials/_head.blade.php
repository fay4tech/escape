<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Serial Escapers blog pour les fans des escape games. Escape blog &#8211; Chroniques de nos échappées belles&#8230; Tests et avis d'escape games.">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-46273242-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-46273242-2');
    </script>
    @yield('tiny')
    {{--Bootstrap style--}}
    <link rel="icon" href="{{url('images/default/logo.ico')}}" type="image/ico" sizes="16x16">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/stylesheet.css" type="text/css" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/image.css">
    <link rel="stylesheet" href="https://escapeplanner.fr/blogajax.php?file=css&theme=serial">
    <script src="https://escapeplanner.fr/blogajax.php?file=js&theme=serial"></script>
    @yield('css')
    <title>@yield('titel', 'Escape Game')</title>
    @yield('og')
</head>
