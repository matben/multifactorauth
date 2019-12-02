<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
})->name('/');

//Route::get('/home', 'HomeController@index')->name('home');


/**
 * ruta za redirekciju korisnika ovisno o tome dal je registriran ili se treba registrirati
 */
//Route::get('/prijava', 'HomeController@prijava')->name('prijava');


//registracija neprijavljenog korisnika
//Route::get('/prijava_korisnika', 'HomeController@create')->name('prijava_korisnika');
//Route::post('/spremi_korisnika', 'HomeController@store')->name('spremi_korisnika');

Route::get('/aktiviraj_modul/{token}', 'UserController@activate_module')->name('aktiviraj_modul');



/**
 * korisnici
 */

//prikaz konkretnog/logiranog korisnika
Route::get('/korisnik', 'UserController@show')->name('korisnik');
//forma za uređivanje postoječeg korisnika
//Route::get('/korisnik/{user}/uredi', 'UserController@edit')->name('uredi_korisnika');
//ažuriranje podataka o korisniku
//Route::patch('/korisnik/{user}/', 'UserController@update')->name('azuriraj_korisnika');


//dodaj autentikacijski modul za viši stupanj korisniku
Route::get('/dodaj_modul', 'UserController@create_auth_module')->name('dodaj_modul');

Route::post('/spremi_modul', 'UserController@store_auth_module')->name('spremi_modul');

Route::delete('/obrisi_modul/{user_module}', 'UserController@destroy_module')->name('obrisi_modul');

