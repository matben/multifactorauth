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
        $this->middleware('auth')->except('activate_module');
    }

    public function show()
    {
        $users_modules = Auth::user()->auth_modules;

        return view('users.show', compact('users_modules'));
    }


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
        $user_mail = Auth::user()->email;


        if (env('APP_ENV') == 'local') {
            return new SendToken($activation_token);
        } else {
            Mail::to($user_mail)
                ->send(new SendToken($activation_token));
        }

        Session::flash('status', 'Na Vašu mail adresu ( ' . Auth::user()->email . ' ) poslan je link za aktivaciju modula za drugi stupanj autentikacije. Molimo Vas da klikom na link aktivirate drugi stupanj autentikacije.');
        return redirect(route('korisnik'));


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



    public function activate_module($token){

        $user_module = User_module::where('activation_token', $token)->first();

        if(isset($user_module)){
            $user_module->active = 1;
            $user_module->save();

            Session::flash('status', 'Uspješno aktiviran modul.');
            return redirect(route('korisnik'));
        }
        else{
            Session::flash('status', 'Nevažeći link');
            return redirect(route('korisnik'));
        }

    }


}
