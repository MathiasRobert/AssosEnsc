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
    return view('pages.home');
});

Route::get('users', ['uses' => 'UsersController@index']);
Route::get('users/create', ['uses' => 'UsersController@create']);
Route::post('users', ['uses' => 'UsersController@store']);

Route::get('asso/{diminutif}', ['uses' => 'AssociationController@index']);

Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin', ['uses' => 'AdminController@dashboard'])->name('admin');
    Route::get('admin/association/{tab}', ['uses' => 'AdminController@association'])->name('admin.association');
    Route::put('admin/association/{id}', ['uses' => 'AssociationController@update'])->name('association.update');
    Route::resource('admin/articles', 'ArticleController', ['except' => ['show']]);
    Route::resource('admin/evenements', 'EvenementController', ['except' => ['show']]);
    Route::resource('admin/membres', 'MembreController', ['except' => ['show', 'index']]);

});


//POUR TEST
Route::get('logintest', function() {
    $user = App\User::where('email', 'bde@ensc.fr')->first();
    Auth::login($user);
    return redirect('/');
})->name('logintest');
