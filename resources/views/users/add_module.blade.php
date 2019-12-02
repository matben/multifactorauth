@extends('layouts.app')

@section('content')

{{--    {{dd($_GET)}}--}}

    <div class="card">

        <div class="card-body">

            <div class="alert alert-primary" role="alert" align="center">
                <h1>Dodavanje modula za drugi stupanj autentikacije</h1>
            </div>


            <table class="table table-striped">

                <tr>
                    <th>Ime i prezime:</th>
                    <td>{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <th>Korisnička oznaka:</th>
                    <td>{{Auth::user()->hrEduPersonUniqueID}}</td>
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


            {!! Form::open(['url' => 'spremi_modul']) !!}


            <div class="form-group">

                <input type="hidden" name="mid" value="{{$_GET['mid']}}">
                <input type="hidden" name="returnTo" value="{{$_GET['returnTo']}}">
                <input type="hidden" name="spid" value="{{$_GET['spid']}}">

                @if($_GET['mid'] == 1)
                    <label for="exampleInputEmail1">Yubikey ključ</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="xxxxxxx123456789" name="key" required>
                    <small id="emailHelp" class="form-text text-muted">Unesite ključ kojim ste se registrirali na
                        Yubikey servisu.
                    </small>
                @elseif($_GET['mid'] == 2)
                    <label for="exampleInputEmail1">Broj mobitela</label>
                    <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="0911234567" name="key" required>
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
