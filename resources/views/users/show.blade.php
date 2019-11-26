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

            </table>

            {{--<div align="center"><a class="btn btn-primary" href="{{route('uredi_korisnika', Auth::user()->id)}}"--}}
            {{--role="button">Uredi</a>--}}
            {{--</div>--}}

        </div>

        <hr>

        @if($users_modules->isEmpty())

            <div class="card-header" align="center">
                <div class="alert alert-warning" role="alert">
                    <h1>S Vašim korisničkim računom nema povezanih modula za višestupanjsku autentikaciju..</h1>
                </div>
            </div>

            {{--<div class="alert alert-warning" role="alert">--}}
            {{--<h1>S Vašim korisničkim računom nema povezanih modula za višestupanjsku autentikaciju..</h1>--}}
            {{--</div>--}}

        @else




            <div class="card-header" align="center">
                <div class="alert alert-info" role="alert">
                    <h1>Višestupanjske autentikacije povezane s Vašim korisničkim
                        računom
                    </h1>
                </div>
            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <tr>
                        <th>Naziv modula</th>
                        <th>Povezano sa resursom</th>
                        <th>Ključ</th>
                        <th></th>
                    </tr>


                    @foreach ($users_modules as $users_module)
                        <tr>
                            <td>{{ $users_module->module_name->name }}</td>
                            <td>{{ $users_module->resource_id }}</td>
                            <td>{{ $users_module->key }}</td>
                            <td>Zatraži brisanje</td>
                        </tr>
                    @endforeach


                </table>

                {{--<div align="center"><a class="btn btn-primary" href="{{route('uredi_korisnika', Auth::user()->id)}}"--}}
                {{--role="button">Uredi</a>--}}
                {{--</div>--}}

            </div>

        @endif

    </div>
@endsection
