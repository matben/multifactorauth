@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header" align="center">

            <div class="alert alert-primary" role="alert">
                <h2>Registracija korisnika za korištenje višestupanjske autentikacije aai@edu sustava</h2>
            </div>

        </div>

        <div class="card-body">

            {{--<div class="content">--}}
            {{--<div class="title m-b-md">--}}
            {{--<h3>Vrste dostupnih autentikacija za drugi stupanj:</h3>--}}
            {{--</div>--}}


            <div class="card-header" align="center">

                <div class="alert alert-secondary" role="alert">
                    <h2>Vrste dostupnih autentikacija za drugi stupanj</h2>
                </div>

            </div>


            <ul class="list-group">
                <li class="list-group-item">Google Authenticator</li>
                <li class="list-group-item">yubico yubikey</li>
                <li class="list-group-item">AAI@EduHr SMS</li>
                <li class="list-group-item">AAI@EduHr SimpleSQL</li>
            </ul>

            {{--</div>--}}

        </div>

        <div class="card-body">

            {{--<div class="content">--}}
            {{--<div class="title m-b-md">--}}
                {{--<h3>Usluge koje koriste višestupanjsku autentikaciju:--}}
            {{--</div>--}}

            <div class="card-header" align="center">

                <div class="alert alert-secondary" role="alert">
                    <h2>Usluge koje koriste višestupanjsku autentikaciju</h2>
                </div>

            </div>

            <ul class="list-group">
                <li class="list-group-item">web usluga 1</li>
                <li class="list-group-item">web usluga 2</li>
                <li class="list-group-item">web usluga 3</li>
                <li class="list-group-item">web usluga 4</li>
                <li class="list-group-item">web usluga 5</li>
                <li class="list-group-item">web usluga 6</li>
                <li class="list-group-item">web usluga 7</li>
            </ul>

            {{--</div>--}}


        </div>

    </div>
@endsection
