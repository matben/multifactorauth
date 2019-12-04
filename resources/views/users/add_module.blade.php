@extends('layouts.app')


@php

    function createSecret($secretLength = 16) {
    $validChars = _getBase32LookupTable();
    unset($validChars[32]);
    $secret = '';
    for ($i = 0; $i < $secretLength; $i++) {
    $secret .= $validChars[array_rand($validChars)];
    }
    return $secret;
    }

    function getQRCodeGoogleUrl($name, $secret) {
    $urlencoded = urlencode('otpauth://totp/'.$name.'?secret='.$secret.'');
    return
    'https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl='.$urlencoded.'';
    }

    function _getBase32LookupTable() {
    return array(
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', //  7
        'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', // 15
        'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', // 23
        'Y', 'Z', '2', '3', '4', '5', '6', '7', // 31
        '='  // padding char
               );
    }

    $secret = createSecret();

@endphp


@section('content')

    {{--    {{dd($_GET)}}--}}

    <div class="card">

        <div class="card-body">

            <div class="alert alert-primary" role="alert" align="center">
                <h1>Dodavanje modula za drugi stupanj autentikacije</h1>
            </div>


            {{--<table class="table table-striped">--}}

            {{--<tr>--}}
            {{--<th>Ime i prezime:</th>--}}
            {{--<td>{{Auth::user()->name}}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<th>Korisnička oznaka:</th>--}}
            {{--<td>{{Auth::user()->hrEduPersonUniqueID}}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<th>Email:</th>--}}
            {{--<td>{{Auth::user()->email}}</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<th>Matična ustanova:</th>--}}
            {{--<td>{{Auth::user()->home_org}}</td>--}}
            {{--</tr>--}}

            {{--</table>--}}

            {{--<hr>--}}


            {!! Form::open(['url' => 'spremi_modul']) !!}


            <div class="form-group">

                <input type="hidden" name="mid" value="{{$_GET['mid']}}">
                <input type="hidden" name="returnTo" value="{{$_GET['returnTo']}}">
                <input type="hidden" name="spid" value="{{$_GET['spid']}}">

                @if($_GET['mid'] == 1)
                    <label for="key">Broj mobitela</label>
                    <input type="tel" class="form-control" id="key_tel" aria-describedby="emailHelp"
                           placeholder="+385911234567" name="key" required>
                    <small id="key" class="form-text text-muted">Broj mobitela za primanje koda za drugi stupanj
                        autentikacije.
                    </small>
                @elseif($_GET['mid'] == 2)
                    <label for="key">TOTP</label>
                    <input type="text" class="form-control" id="key_QR" aria-describedby="emailHelp"
                           placeholder="" name="key" required value="{{$secret}}">
                    <small id="key" class="form-text text-muted">Unesite token
                    </small>

                    <br>

                    <div class="card">
                        <div class="card-body" align="center">

                            @php


                                echo "<strong>Vaš tajni kod je</strong>: $secret<br/>"; echo "<strong>QR Code</strong>: <br />";

                                $qr_path = getQRCodeGoogleUrl("IDP_2fa-dev", $secret); echo "<img src='$qr_path' />";



                            @endphp

                        </div>
                    </div>

                @elseif($_GET['mid'] == 3)
                    <label for="key">Yubikey ključ</label>
                    <input type="text" class="form-control" id="key" aria-describedby="emailHelp"
                           placeholder="xxxxxxx123456789" name="key" required value="">
                    <small id="key" class="form-text text-muted">aktiviraj yubikey ključ
                    </small>
                @endif

            </div>


            <div align="center">
                <button type="submit" class="btn btn-primary mb-2">Spremi</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <script>
        window.onload = function() {
            document.getElementById("key").focus();
        }
    </script>


@endsection
