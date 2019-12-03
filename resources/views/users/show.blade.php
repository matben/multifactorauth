@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">


            @if (session('aktivacija'))

                <div class="alert alert-success" role="alert" align="center">
                    <h1>{{ session('aktivacija') }}</h1>
                </div>

            @else
                <div class="alert alert-primary" role="alert" align="center">
                    <h1>Moji podaci</h1>
                </div>

            @endif


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
        </div>
    </div>



    @if (session('aktivacija'))

        <hr>

        <div class="card">
            <div class="card-body">


                <div class="alert alert-primary" role="alert" align="center">
                    <h1>Dodani modul</h1>
                </div>


                <table class="table table-striped">

                    <tr>
                        <th>Modul</th>
                        <th>Ključ</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>{{$user_module->module_name->name}}</td>
                        <td>{{$user_module->key}}</td>

                        <td>
                            @if($user_module->active == null)

                                <button disabled type="submit" class="btn btn-danger mb-2 btn-sm">neaktivan modul
                                </button>

                            @else

                                <button disabled type="submit" class="btn btn-success mb-2 btn-sm">aktivan modul
                                </button>

                            @endif
                        </td>
                    </tr>

                </table>
            </div>
        </div>

    @endif







    {{--<hr>--}}

    {{--@if($users_modules->isEmpty())--}}

    {{--<div class="alert alert-warning" role="alert" align="center">--}}
    {{--<h2>S Vašim korisničkim računom nema povezanih modula za višestupanjsku autentikaciju.</h2>--}}
    {{--</div>--}}

    {{--@else--}}

    {{--<div class="card">--}}
    {{--<div class="card-body">--}}
    {{--<div class="alert alert-info" role="alert" align="center">--}}
    {{--<h2>Moduli višestupanjske autentikacije povezane s Vašim korisničkim--}}
    {{--računom--}}
    {{--</h2>--}}
    {{--</div>--}}


    {{--<table class="table table-striped">--}}

    {{--<tr>--}}
    {{--<th>Naziv modula</th>--}}
    {{--<th>Povezano sa resursom</th>--}}
    {{--<th>Ključ</th>--}}
    {{--<th></th>--}}
    {{--</tr>--}}


    {{--@foreach ($users_modules as $users_module)--}}
    {{--<tr>--}}
    {{--<td>{{ $users_module->module_name->name }}</td>--}}
    {{--                            <td>{{ $users_module->resource_id }}</td>--}}
    {{--<td>{{ $users_module->key }}</td>--}}
    {{--<td>--}}


    {{--<div align="center">--}}
    {{--<a class="btn btn-primary btn-sm"--}}
    {{--href="{{route('obrisi_modul', $users_module->id)}}"--}}
    {{--role="button">Zatraži brisanje</a>--}}


    {{--@if($users_module->active == null)--}}

    {{--<button disabled type="submit" class="btn btn-danger mb-2 btn-sm">neaktivan modul</button>--}}

    {{--@else--}}

    {{--{{Form::open(['method'  => 'DELETE', 'route' => ['obrisi_modul', $users_module->id]])}}--}}
    {{--<button type="submit" class="btn btn-primary mb-2 btn-sm">Obriši</button>--}}
    {{--<button type="submit" class="btn btn-primary mb-2 btn-sm" onclick="alert('jeste li sigurni da želite obrisati modul?')">Obriši</button>--}}
    {{--{{Form::close()}}--}}

    {{--@endif--}}

    {{--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"--}}
    {{--data-target="#myModal">Zatraži brisanje--}}
    {{--</button>--}}
    {{--</div>--}}

    {{--</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}

    {{--</table>--}}

    {{--</div>--}}
    {{--</div>--}}

    {{--@endif--}}


    {{--<script>--}}

    {{--$('#myModal').on('shown.bs.modal', function () {--}}
    {{--$('#myInput').trigger('focus')--}}
    {{--})--}}

    {{--</script>--}}

    {{--<div id="myModal" class="modal" tabindex="-1" role="dialog">--}}
    {{--<div class="modal-dialog" role="document">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<h5 class="modal-title">Potvrda brisanja</h5>--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--<span aria-hidden="true">&times;</span>--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--<div class="modal-body">--}}
    {{--<p>Jeste li sigurni da želite obrisati drugi stupanj autentikacije.</p>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<button type="button" class="btn btn-danger" href="{{route('obrisi_modul', $users_module->id)}}">obriši</button>--}}
    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">zatvori</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection
