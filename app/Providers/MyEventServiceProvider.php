<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Illuminate\Support\Facades\Auth;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class MyEventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Event::listen('Aacotroneo\Saml2\Events\Saml2LoginEvent', function (Saml2LoginEvent $event) {
            $messageId = $event->getSaml2Auth()->getLastMessageId();
            // Add your own code preventing reuse of a $messageId to stop replay attacks

            $user = $event->getSaml2User();
            $userData = [
                'id' => $user->getUserId(),
                'attributes' => $user->getAttributes(),
                'assertion' => $user->getRawSamlAssertion()
            ];

//            dd($userData['attributes']);

//            \session(['user_to_save' => $userData['attributes']]);

            $user = User::where('uid', $userData['attributes']['uid'])->first();

//            dd($user);

            if($user){
                session()->flash('status', 'Uspješno ste se prijavili.');
                Auth::login($user);
            }
            else{

                $user = new User;

                $user->name = $userData['attributes']['cn'][0];
                $user->uid = $userData['attributes']['uid'][0];
                $user->email = $userData['attributes']['mail'][0];
                $user->home_org = $userData['attributes']['o'][0];

                $user->save();

                Auth::login($user);

                session()->flash('status', 'Uspješno ste se registrirali za korištenje višestupanjske autentikacije.');
                return redirect('/korisnik');

            }

        });


        Event::listen('Aacotroneo\Saml2\Events\Saml2LogoutEvent', function ($event) {
            Auth::logout();
            Session::save();
        });


    }
}
