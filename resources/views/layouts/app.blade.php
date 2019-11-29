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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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


                    <br><br><br><br><br><br><br><br><br><br>

                </div>


                {{--<div class="heightfix"></div>--}}

            </div>
        </div>


    </main>
    @include('layouts.partials.footer')
</div>

</body>
</html>
