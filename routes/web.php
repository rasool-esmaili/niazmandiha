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



Route::get('/showtest', 'test@showtest');
Route::get('/test', 'test@test');

Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'],function (){
    Route::get('/new', 'controller@getnewpost');
    Route::post('/new', 'storeController@postnewpost');
    Route::get('/user', 'controller@user');
    Route::get('user/markpost', 'userController@showmarkpost');
    Route::get('/user/recentlypost', 'userController@recentlypost');
    Route::get('/user/setting', 'userController@setting');
    Route::post('/user/setting', 'userController@updatesetting');
    Route::get('/user/delete/{id}', 'editPostController@delete');

    Route::get('/user/delete/photo/', 'editPostController@deletePhoto');

    Route::get('/user/update/{id}', 'editPostController@update');
});



Route::get('/user/admin/verify', 'adminController@showpost')->middleware('admin','auth');
Route::get('/user/admin/verify/{id}', 'adminController@verify')->middleware('admin','auth');
Route::get('/user/superadmin/addadmin', 'AddAdminController@showuser')->middleware('SuperAdmin','auth');
Route::get('/user/superadmin/addadmin/{id}', 'AddAdminController@addadmin')->middleware('SuperAdmin','auth');


Route::get('/user/mark', 'userController@markpost');



//Route::get('/', function () {
//    $agahi=\App\Post::all()->where('verification', 1);
//    return view('home', compact('agahi'));
//});

Route::get('/', 'controller@home');


Route::get('/search/fulltext', 'FullTextSearchController@Search');


Route::get('/search/estates', 'ORMsearchcontroller@estrates');
Route::get('/search/electronics', 'ORMsearchcontroller@electronic');
Route::get('/search/vehicles', 'ORMsearchcontroller@vehicle');



Route::get('/{id}', 'controller@show');
Route::get('/categories/{what}', 'categoriesController@categories');



//start :
//      show page style and delet photo
//upload ax in update post
//filde tel dar register kardan
//setting user password

// ghesmate search  #ok
//front-end         #ok


///bugs
// vaghti error mide to sabte agahi 2bar sabt mishe va validate nashodan vorodi  #ok

//kar nakrdan linkhaye keshoi  #ok
//



//optional :
//social Authentication


//test nahai :


// store controller validation                  #ok
// editPostController  delete post and photo    #ok
// editPostController  update post and photo




