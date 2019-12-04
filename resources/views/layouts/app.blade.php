<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e7264f84ed.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>


<div id="app">

    @include('layouts.partials.header')
    @include('layouts.partials.navbar')


    <main class="py-4">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    @include('layouts.partials.alerts')

                    {{--sadržaj--}}
                    @yield('content')


                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                </div>


                {{--<div class="heightfix"></div>--}}

            </div>
            </div>
        </div>


    </main>
    @include('layouts.partials.footer')

</div>


</body>
</html>
