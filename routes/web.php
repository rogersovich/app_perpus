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
});

// Route::get('/pages', function(){
// 	return view('layouts.pages.index');
// });

// Route::get('/admin', function () {
//     return view('layouts.admin.index');
// });

// Route::get('/home', 'HomeController@index')->name('home');

// Route untuk user yang baru register
Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
	Route::get('/', function(){
		$data['role'] = \App\UserRole::whereUserId(Auth::id())->get();
		return view('home', $data);
	});


	Route::post('upgrade', function(Request $request){
		//dd('apa');
		if($request->ajax()){
			$msg['success'] = 'false';
			$user = \App\User::find($request->id);
			dd($user);
			if($user)
				$user->putRole($request->level);
				$msg['success'] = 'true';
			return response()
				->json($msg);
		}
	});
});

// Route untuk user yang admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function(){
	Route::get('/', function(){
		$data['users'] = \App\User::whereDoesntHave('roles')->get();
		return view('layouts.admin.index', $data);
	});
});

// Route untuk user yang member
Route::group(['prefix' => 'member', 'middleware' => ['auth','role:member']], function(){
	Route::get('/', function(){
		return view('layouts.pages.index');
	});
});

Auth::routes();
