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

Route::get('/','Web\HomeController@index')->name('index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('system-dashboard')->group(function() {

    /*
    |--------------------------------------------------------------------------
    | Operational Planes Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/get-operational-plans/{type}','User\OperationalPlanes@getPlanesWithType')->name('dashboard.operational.type');
    Route::resource('/operational-plans','User\OperationalPlanes');

    /*
    |--------------------------------------------------------------------------
    | Strategic Routes
    |--------------------------------------------------------------------------
    */


    Route::get('/get-strategic/{type}','User\StrategicController@getStrategicType')->name('dashboard.strategic.type');
    Route::resource('/strategic','User\StrategicController');

    /*
    |--------------------------------------------------------------------------
    | Menu AjaX Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/get-strategic-initiatives-menu/{strategic_goal_id}','Web\AjaxMenuController@getStrategicInitiativesMenus');
    Route::get('/get-strategic-measurement-menu/{strategic_goal_id}','Web\AjaxMenuController@getStrategicMeasurementMenus');
    Route::get('/get-ministerial-initiatives-menu/{measurement_id}','Web\AjaxMenuController@getMinisterialInitiativesMenus');
    Route::get('/get-strategic-initiatives-managements-menu/{strategic_goal_id}','Web\AjaxMenuController@getStrategicInitiativesManagementsMenus');



    Route::get('/','User\HomeController@index')->name('dashboard.index');

    /*
    |--------------------------------------------------------------------------
    | Password Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/password' ,'User\HomeController@showPassword')->name('show.password');
    Route::post('/password/update' ,'User\HomeController@changePassword')->name('update.password');
});

Route::prefix('admin')->group(function() {

    /*
    |--------------------------------------------------------------------------
    | Strategic Plans
    |--------------------------------------------------------------------------
    */

    Route::get('/strategic-plans/{type}','Admin\StrategicPlansController@getPlansWithType')->name('admin.strategic.plans.type');
    Route::get('/strategic-plans/action/accept/{id}','Admin\StrategicPlansController@acceptPlan')->name('admin.strategic.plans.accept');

    /*
    |--------------------------------------------------------------------------
    | Strategic Plans DropDown Menu Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('/strategic-goals-menus','Admin\StrategicGoalsController');
    Route::resource('/initiatives-menus','Admin\InitiativesController');
    Route::resource('/measurement-menus','Admin\MeasurementController');
    Route::resource('/ministerial-initiatives-menus','Admin\MinisterialInitiativesController');
    Route::resource('/strategic-initiatives-menus','Admin\StrategicInitiativesController');


    /*
    |--------------------------------------------------------------------------
    | Users Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/users/{type}','Admin\UsersController@getUsers')->name('admin.users');
    Route::get('/users/details/{id}','Admin\UsersController@getUserDetails')->name('admin.users.details');
    Route::get('/users/action/{action}/{id}','Admin\UsersController@acceptRejectUser')->name('admin.users.action');

    Route::get('/','Admin\HomeController@index')->name('admin.index');
    /*
    |--------------------------------------------------------------------------
    | Auth Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');



});