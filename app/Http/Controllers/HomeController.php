<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index()
//    {
//        return view('home');
//    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     * redirekcija korisnika ovisno dal je registriran ili se tek treba registrirati
     */
    public function prijava(Request $request)
    {
        if (Auth::check()) {
            $request->session()->flash('status', 'Uspješna prijava.');
            return redirect()->route('korisnik');
        } else {
            return redirect()->route('prijava_korisnika');
        }
    }


    public function create(){
        $user_to_save = Session::get('user_to_save');
//            Session::forget('user_to_save');
        return view('users.prijava')->with('user_to_save', $user_to_save);
    }


    public function store(Request $request){

//        $rules = [
//            'token_mfa' => 'required|numeric|digits_between:7,17',
//            'mobile_phone' => 'required|numeric|regex:/(0)[0-9]{8,9}/'
//        ];
//
//        $messages = [
//            'mobile_phone.required' => 'Obvezno unijeti broj mobilnog uređaja',
//            'mobile_phone.numeric'  => 'Broj mobitela može se sastojati samo od brojeva',
//            'mobile_phone.digits_between'  => 'Broj mobitela terba sadržavati između 9 i 10 znamenki',
//            'mobile_phone.regex'  => 'Neispravan format broja mobilnog uređaja',
//
//            'token_mfa.required'  => 'Obvezno unijeti token',
//            'token_mfa.digits_between'  => 'Token može sadržavati između 7 i 17 znamenki',
//            'token_mfa.numeric'  => 'Token može sadržavati samo brojeve',
//        ];

//        $this->validate($request, $rules, $messages);

        $user = new User;

        $user->name = $request->displayName;
        $user->uid = $request->uid;
        $user->email = $request->email;
        $user->home_org = $request->home_org;
//        $user->token_mfa = $request->token_mfa;
//        $user->mobile_phone = $request->mobile_phone;


        $user->save();

        Auth::login($user);

        $request->session()->flash('status', 'Uspješno ste se registrirali za korištenje višestupanjske autentikacije.');
        return redirect('/korisnik');

    }


}
