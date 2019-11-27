@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header" align="center"><h2>Dodavanje modula za drugi stupanj autentikacije</h2></div>

        <div class="card-body">


            <table class="table table-striped">

                <tr>
                    <th>Ime i prezime:</th>
                    <td>{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <th>Korisnička oznaka:</th>
                    <td>{{Auth::user()->uid}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <th>Matična ustanova:</th>
                    <td>{{Auth::user()->home_org}}</td>
                </tr>

            </table>

            <hr>


            @if(Session::get('id_modula') == 1)

            @elseif(Session::get('id_modula') == 1)

            @elseif(Session::get('id_modula') == 1)
            @endif

            {!! Form::open(['url' => 'spremi_korisnika']) !!}
            <div class="form-group">
                <label for="exampleInputEmail1">Yubikey ključ</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="xxxxxxx123456789">
                <small id="emailHelp" class="form-text text-muted">Unesite ključ kojim ste se registrirali na Yubikey
                    servisu.
                </small>
            </div>


            <div align="center">
                <button type="submit" class="btn btn-primary mb-2">Spremi</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>


@endsection
