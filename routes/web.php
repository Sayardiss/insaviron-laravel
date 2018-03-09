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

Route::get('/', ['as' => 'home', function () {
  //LanguageSwitcher::setLanguage('fr');

    return view('index');
}]);

Route::get('/apropos', ['as' => 'about-us', function () {
    return view('about-us');
}]);

Route::get('/infos', ['as' => 'infos', function () {
    return view('infos');
}]);

Route::get('/inscription', ['as' => 'inscription', function () {
    return view('inscription');
}]);

// Route::get('/news', ['as' => 'news', function () {
//     return view('news');
// }]);

Route::get('/gallery', ['as' => 'gallery', function () {
  //LanguageSwitcher::setLanguage('fr');
    return view('gallery');
}]);

// Route::get('/contact', ['as' => 'contact', function () {
//     return view('contact');
// }]);


Route::get('contact', 'ContactController@getContact')->name('contact');
Route::post('contact', 'ContactController@postContact');


Route::resource('news', 'PostsController');


Route::resource('sponsors', 'SponsorsController'); // Uniquement pour administration, pas besoin d'index
Route::resource('results', 'ResultsController'); // Uniquement pour administration, pas besoin d'index


Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

////// EXEMPLES D'UTILISATION

// // Aller chercher le controller dans WelcomeController
// Route::get('index', 'WelcomeController@index');
//
//
//
// Route::get('/toto', function () {
//     return redirect('foo');
// });
//
// Route::get('foo', function () {
//     return Response::make('Hello error', 500);
// });
//
//
// // Paramètre à une vue PHP
// Route::get('article/{n}', function($n) {
//     return view('article')->with('numero', $n);
//     //ou return view('article')->withNumero($n);
//     //ou return view('article', ['numero' => $n]);
// })->where('n', '[0-9]+');
//
// Route::get('articlecontroller/{n}', 'ArticleController@show')->where('n', '[0-9]+');
//
//
// Route::get('{n}', function($n) {
// 	return 'Je suis la page ' . $n . ' !';
// })->where('n', '[1-3]');
//
// Route::get('facture/{n}', function($n) {
//     return view('facture')->withNumero($n);
// })->where('n', '[0-9]+');
//
//
// //// Partie formulaires
// Route::get('users', 'UsersController@getInfos');
// Route::post('users', 'UsersController@postInfos');
//
// // implicite (RESTful) doesn't work
// //Route::resource('users', 'UsersController');
//
// //// Partie validation
// Route::get('contact', 'ContactController@getForm');
// Route::post('contact', 'ContactController@postForm');
//
// Route::get('photo', 'PhotoController@getForm');
// Route::post('photo', 'PhotoController@postForm');
//
// //Migrations
// Route::get('email', 'EmailController@getForm');
// Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);
//
//
// // Ressources 1/2
// Route::resource('user', 'UserController');

// Partie authentification
Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
