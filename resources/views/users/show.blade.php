@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header" align="center"><h1>Moji podaci</h1></div>

        <div class="card-body">

            <table class="table table-striped">

                <tr>
                    <td>Ime i prezime:</td>
                    <td>{{Auth::user()->name}}</td>
                </tr>
                <tr>
                    <td>Korisnička oznaka:</td>
                    <td>{{Auth::user()->uid}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <td>Matična ustanova:</td>
                    <td>{{Auth::user()->home_org}}</td>
                </tr>
                <tr>
                    <td>Token:</td>
                    <td>{{Auth::user()->token_mfa}}</td>
                </tr>
                <tr>
                    <td>Mobilni telefon:</td>
                    <td>{{Auth::user()->mobile_phone}}</td>
                </tr>
            </table>

            <div align="center"><a class="btn btn-primary" href="{{route('uredi_korisnika', Auth::user()->id)}}"
                                   role="button">Uredi</a>
            </div>

        </div>
    </div>
@endsection
