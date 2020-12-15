
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/',['as'=>'MyRoute',function(){
	return view('index');
}]);

Auth::routes();
Route::get('home',function()
{
	return redirect()->route('MyRoute');
});
// Route::get('home', 'HomeController@index')

// Route::get('tasks/index',['as'=>'tasks.index','uses'=>'TaskController@index']);

Route::get('artists/index',['as'=>'artists.index','uses'=>'ArtistCtrl@index']);

Route::resource('artists','ArtistCtrl');

Route::get('singers/index',['as'=>'singers.index','uses'=>'SingerCtrl@index']);

Route::resource('/singers','SingerCtrl');

Route::resource('/musics','MusicCtrl');

Route::resource('/songuk','UkMusicCtrl');

Route::resource('/songvn','VnMusicCtrl');

Route::resource('/songnew','NewMusicCtrl');

Route::resource('/trutinh','TrutinhMusicCtrl');