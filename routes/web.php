<?php
namespace App;

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
 return view ('welcome');
})->name('welcom');

Route::get('/test/{id}',function($id){
    return 'test'.$id;
   })->name('test');


// all route  only acesss controller or method  in folder name Front;

Route::namespace('Front')->group(function(){

Route::get('/web','UserController@users');
});

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/','Front\UserController@users');
    Route::get('/test1','Front\UserController@users');
    Route::get('/test2');
    Route::get('/test3');
    Route::get('/test4');

});

// Route::group(['prefix'=>'/users','middleware'=>'auth'],function(){

// Route::get('/test1','Front\UserController@users');
// Route::get('/test2');
// Route::get('/test3');
// Route::get('/test4');

// });


Route::group(['namespace'=>'dashboard','prefix'=>'admins'],function () {

    Route::get('/users1','AdminController@showName')->middleware('auth');
    Route::get('/users2','AdminController@showName2');
    Route::get('/users3','AdminController@showName3');
    Route::get('/users4','AdminController@showName4');
    Route::get('/users5','AdminController@showName5');
});

Route::namespace('dashboard')->group(function(){

    Route::resource('testresoures','FrontsiteController');



});


Route::get('/testpage/{id}','dashboard\FrontsiteController@show');


Route::get('/adminpage','dashboard\AdminController@showName5');
Route::get('/landingpage','dashboard\AdminController@landingpage');

// Route::get('/adminpage',function(){

//    $data['id'] = 5;
//    $data['name'] = 'ahmed';
//    //Passing Data  2- way
//     // return view('admin.home')->with(['name'=>'Ahmed','age'=>'21 ']);
//     return view('admin.home',$data);
// });




Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
