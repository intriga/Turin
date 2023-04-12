<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turin | Intriga</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,600,700,700i&amp;subset=cyrillic,greek-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalemate&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="{{ asset('frontend/assets/dist/css/style.min.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('styles')
</head>

<body>

    @yield('content')

    <script src="{{ asset('frontend/assets/dist/js/bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/dist/js/scripts.js') }}"></script>

    @stack('scripts')
</body>

</html>