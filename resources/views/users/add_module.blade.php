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


            {!! Form::open(['url' => 'spremi_korisnika']) !!}


            <div class="form-group">

                @if($_GET['id_modula'] == 1)
                    <label for="exampleInputEmail1">Yubikey ključ</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="xxxxxxx123456789">
                    <small id="emailHelp" class="form-text text-muted">Unesite ključ kojim ste se registrirali na
                        Yubikey servisu.
                    </small>
                @elseif($_GET['id_modula'] == 2)
                    <label for="exampleInputEmail1">Broj mobitela</label>
                    <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="0911234567">
                    <small id="emailHelp" class="form-text text-muted">Broj mobitela za primanje koda za drugi stupanj
                        autentikacije.
                    </small>
                @endif

            </div>


            <div align="center">
                <button type="submit" class="btn btn-primary mb-2">Spremi</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>


@endsection
