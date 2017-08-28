<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::resource('admin/articles', 'ArticleControllerApi');
Route::resource('admin/evenements', 'EvenementController');
Route::get('users/current', 'UserController@current');

Route::resource('comments', 'CommentController');


Route::get('admin/evenements/{id}/comments', 'EvenementController@getComments');


Route::get('admin/getAllCategoriesArticle', 'ArticleControllerApi@getAllCategoriesArticle');
Route::get('admin/getAllCategoriesEvenement', 'EvenementController@getAllCategoriesEvenement');
Route::get('admin/getCurrentAssociation', 'AssociationController@getCurrentAssociation');

Route::post('inscription', 'InscriptionController@inscription');
Route::post('desinscription', 'InscriptionController@desinscription');


