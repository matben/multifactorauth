<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm border">

    <a class="navbar-brand" href="{{route('korisnik')}}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Authentication Links -->

            @guest

                @if(Route::currentRouteName() != 'prijava_korisnika')
                    {{--                    <a href="{{ route('saml2_login', 'test') }}">Prijava</a>--}}
                    <button class="btn navbar-btn" type="button" value="Input Button"
                            onclick="location.href = '{{ route('saml2_login', 'test') }}';">
                        <i class="fas fa-sign-in-alt"></i> Prijava
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                    </button>

                @endif


            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user"></i>
                        {{ Auth::user()->name }}

                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        {{--profil--}}
                        @if(Route::currentRouteName() == '/')
                            <a class="dropdown-item" href="{{ route('korisnik') }}">{{ __('Profil') }}</a>
                        @endif
                        {{--odjava--}}
                        <a class="dropdown-item" href="{{ route('saml2_logout', 'test') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Odjava') }}
                        </a>
                        <form id="logout-form" action="{{ route('saml2_logout', 'test') }}" method="GET"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
