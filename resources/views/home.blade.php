@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center"><h1>Moji podaci</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">

                            <tr>
                                <td>Ime i prezime:</td>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td>Korisnička oznaka</td>
                                <td>{{Auth::user()->uid}}</td>
                            </tr>
                            <tr>
                                <td>Matična ustanova:</td>
                                <td>Sveučilišni računski centar - SRCE</td>
                            </tr>
                            <tr>
                                <td>Mobilni telefon:</td>
                                <td>0915618108</td>
                            </tr>
                            <tr>
                                <td>Adresa:</td>
                                <td>Mače 29b</td>
                            </tr>
                            <tr>
                                <td>Token:</td>
                                <td>1703985123654789</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td align="center" td colspan="2"><button type="button" class="btn btn-info">Uredi podatke</button></td>
                            </tr>




                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
