{{--@extends('layouts.app')--}}

{{--@section('content')--}}

    {{--<div class="card">--}}
        {{--<div class="card-header" align="center"><h2>Registracija korisnika</h2></div>--}}

        {{--<div class="card-body">--}}

            {{--{!! Form::open(['url' => 'spremi_korisnika']) !!}--}}
            {{--<div class="form-group row">--}}
                {{--<label for="displayName" class="col-sm-4 col-form-label">Ime i Prezime</label>--}}
                {{--<div class="col-sm-8">--}}
                    {{--<input type="text" readonly class="form-control" id="displayName" name="displayName"--}}
                           {{--value="{{$user_to_save['cn'][0]}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group row">--}}
                {{--<label for="uid" class="col-sm-4 col-form-label">Korisnička oznaka</label>--}}
                {{--<div class="col-sm-8">--}}
                    {{--<input type="text" readonly class="form-control" id="uid" name="uid"--}}
                           {{--value="{{$user_to_save['hrEduPersonUniqueID'][0]}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group row">--}}
                {{--<label for="email" class="col-sm-4 col-form-label">Email</label>--}}
                {{--<div class="col-sm-8">--}}
                    {{--<input type="text" readonly class="form-control" id="email" name="email"--}}
                           {{--value="{{$user_to_save['mail'][0]}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group row">--}}
                {{--<label for="home_org" class="col-sm-4 col-form-label">Matična ustanova</label>--}}
                {{--<div class="col-sm-8">--}}
                    {{--<input type="text" readonly class="form-control" id="home_org" name="home_org"--}}
                           {{--value="{{$user_to_save['o'][0]}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group row">--}}
                {{--<label for="token_mfa" class="col-sm-4 col-form-label">Token</label>--}}
                {{--<div class="col-sm-8">--}}
                    {{--<input type="text" class="form-control {{ $errors->has('token_mfa') ? 'is-invalid' : '' }}" id="token_mfa" placeholder="token" name="token_mfa"--}}
                           {{--value="{{ old('token_mfa') }}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group row">--}}
                {{--<label for="mobile_phone" class="col-sm-4 col-form-label">Mobilni telefon</label>--}}
                {{--<div class="col-sm-8">--}}
                    {{--<input type="tel" class="form-control {{ $errors->has('mobile_phone') ? 'is-invalid' : '' }}" id="mobile_phone"--}}
                           {{--placeholder="broj mobilnog uređaja (format: 0911234567)"--}}
                           {{--name="mobile_phone" value="{{ old('mobile_phone') }}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div align="center">--}}
                {{--<button type="submit" class="btn btn-primary mb-2">Spremi</button>--}}
            {{--</div>--}}

            {{--{!! Form::close() !!}--}}


        {{--</div>--}}
    {{--</div>--}}

{{--@endsection--}}
