<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\User_module;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendToken;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $users_modules = Auth::user()->auth_modules;
//        dd($users_modules);

        return view('users.show', compact('users_modules'));
    }

//    public function edit($id)
//    {
//
//        return view('users.edit', compact('user'));
//
//    }


//    public function update($id, Request $request)
//    {

//        $rules = [
//            'token_mfa' => 'required|numeric|digits_between:7,17',
//            'mobile_phone' => 'required|numeric|regex:/(0)[0-9]{8,}/|digits_between:9,10'
//        ];
//
//        $messages = [
//            'mobile_phone.required' => 'Obvezno unijeti broj mobilnog uređaja',
//            'mobile_phone.numeric' => 'Broj mobitela može se sastojati samo od brojeva',
//            'mobile_phone.digits_between' => 'Broj mobitela može sadržavati između 9 i 10 znamenki',
//            'mobile_phone.regex' => 'Neispravan format broja mobilnog uređaja',
//
//            'token_mfa.required' => 'Obvezno unijeti token',
//            'token_mfa.digits_between' => 'Token može sadržavati između 7 i 17 znamenki',
//            'token_mfa.numeric' => 'Token može sadržavati samo brojeve',
//        ];

//        $this->validate($request, $rules, $messages);

//        $user = User::find($id);

//        $user->name = $request->displayName;
//        $user->uid = $request->uid;
//        $user->email = $request->email;
//        $user->home_org = $request->home_org;
//        $user->token_mfa = $request->token_mfa;
//        $user->mobile_phone = $request->mobile_phone;
//
//
//        $user->save();
//
//        $request->session()->flash('status', 'Uspješno ste promijenili podatke o korisniku.');
//        return redirect('/korisnik');
//
//    }


    public function create_auth_module()
    {
        return view('users.add_module');
    }


    public function store_auth_module(Request $request)
    {
        $user_module = new User_module;

        $user_module->user_id = Auth::id();
        $user_module->hrEduPersonUniqueID = Auth::user()->hrEduPersonUniqueID;
        $user_module->module_id = $request->mid;
        $user_module->resource_id = $request->spid;
        $user_module->key = $request->key;
        $user_module->activation_token = str_random(40);

        $user_module->save();

        $activation_token = $user_module->activation_token;
//        Mail::to('mbencic@srce.hr')
//            ->send(new SendToken(1));

        return new SendToken($activation_token);

        Session::flash('status', 'Na Vašu mail adresu ( '.Auth::user()->email.' ) poslan je link za aktivaciju modula za drugi stupanj autentikacije. Molimo Vas da klikom na link aktivirate drugi stupanj autentikacije.');
        return redirect(route('korisnik'));

//        $url = $request->returnTo;
//        return Redirect::to($url);

    }



    public function destroy_module($id)
    {

        // delete
        $user_module = User_module::find($id);
        $user_module->delete();

        // redirect
        Session::flash('status', 'Uspješno obrisan modul!');
        return redirect(route('korisnik'));

    }


}
