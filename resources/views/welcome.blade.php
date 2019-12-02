@extends('layouts.app')

@section('content')

    <div class="card">


        <div class="card-body">

            <div class="alert alert-info" role="alert" align="center">
                <h3>Vrste dostupnih autentikacija za drugi stupanj</h3>
            </div>

            <ul class="list-group">
                <li class="list-group-item">Google Authenticator</li>
                <li class="list-group-item">yubico yubikey</li>
                <li class="list-group-item">AAI@EduHr SMS</li>
                <li class="list-group-item">AAI@EduHr SimpleSQL</li>
            </ul>

        </div>

        <div class="card-body">

            <div class="alert alert-info" role="alert" align="center">
                <h3>Usluge koje koriste višestupanjsku autentikaciju</h3>
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

        </div>

    </div>
@endsection
