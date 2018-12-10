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
Route::get('/word','Web\HomeController@getWordDocument')->name('word');
Route::get('/pdf','Web\HomeController@getPDF')->name('pdf');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
*/

Route::get('/get-departments-by-id/{manag_id}','Web\AjaxController@getDepartmentById');

/*
|--------------------------------------------------------------------------
| Reporting Routes
|--------------------------------------------------------------------------
*/

Route::get('/operational-plan-report/{id}}','Web\HomeController@getOperationalPlanReport')->name('report.operational.plan');
Route::get('/strategic-plan-report/{id}}','Web\HomeController@getStrategicPlanReport')->name('report.strategic.plan');
Route::get('/swat-report/{id}}','Web\HomeController@getSwatReport')->name('report.swat.plan');
Route::get('/risks-report/{id}}','Web\HomeController@getRisksReport')->name('report.risks.plan');
Route::get('/research-report/{id}}','Web\HomeController@getResearchReport')->name('report.research.plan');


Route::prefix('system-dashboard')->group(function() {

    /*
    |--------------------------------------------------------------------------
    | Educational Research Forms Routes نماذج البحوث التربوية
    |--------------------------------------------------------------------------
    */
    Route::get('/get-educational-research/{type}','User\EducationalResearchController@getFormsWithType')->name('dashboard.educational-research.type');
    Route::resource('/educational-research','User\EducationalResearchController');


    /*
    |--------------------------------------------------------------------------
    | Operational Planes Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/get-risks-forms/{type}','User\RisksFormController@getFormsWithType')->name('dashboard.risks-forms.type');
    Route::resource('/risks-forms','User\RisksFormController');

    /*
   |--------------------------------------------------------------------------
   | Operational Planes Routes
   |--------------------------------------------------------------------------
   */
    Route::get('/get-swat-forms/{type}','User\SwatController@getFormsWithType')->name('dashboard.swat.type');
    Route::resource('/swat','User\SwatController');


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
    | Plans Models Roles نماذج الخطط
    |--------------------------------------------------------------------------
    */

    Route::resource('plans-models','Admin\PlansModelsController');

    /*
    |--------------------------------------------------------------------------
    | Admins Roles
    |--------------------------------------------------------------------------
    */

    Route::resource('roles','Admin\AdminRolesController');

    /*
    |--------------------------------------------------------------------------
    | Educational Research Forms
    |--------------------------------------------------------------------------
    */

    Route::get('/educational-research-forms/details/{id}','Admin\EducationalResearchController@getFormDetails')->name('admin.educational-research.details');
    Route::get('/educational-research-forms/{type}','Admin\EducationalResearchController@getFormsWithType')->name('admin.educational-research.type');
    Route::get('/educational-research-forms/action/accept/{id}','Admin\EducationalResearchController@acceptForm')->name('admin.educational-research.accept');

    /*
    |--------------------------------------------------------------------------
    | Risks Forms
    |--------------------------------------------------------------------------
    */

    Route::get('/risks-forms/details/{id}','Admin\RisksFormsController@getFormDetails')->name('admin.risks.details');
    Route::get('/risks-forms/{type}','Admin\RisksFormsController@getFormsWithType')->name('admin.risks.type');
    Route::get('/risks-forms/action/accept/{id}','Admin\RisksFormsController@acceptForm')->name('admin.risks.accept');


    /*
    |--------------------------------------------------------------------------
    | Swat Forms
    |--------------------------------------------------------------------------
    */

    Route::get('/swat-forms/details/{id}','Admin\SwatController@getFormDetails')->name('admin.swat.details');
    Route::get('/swat-forms/{type}','Admin\SwatController@getFormsWithType')->name('admin.swat.type');
    Route::get('/swat-forms/action/accept/{id}','Admin\SwatController@acceptForm')->name('admin.swat.accept');


    /*
    |--------------------------------------------------------------------------
    | Operational Planes
    |--------------------------------------------------------------------------
    */

    Route::get('/operational-plans/details/{id}','Admin\OperationalPlanesController@getPlanDetails')->name('admin.operational.plans.details');
    Route::get('/operational-plans/{type}','Admin\OperationalPlanesController@getPlansWithType')->name('admin.operational.plans.type');
    Route::get('/operational-plans/action/accept/{id}','Admin\OperationalPlanesController@acceptPlan')->name('admin.operational.plans.accept');

    /*
    |--------------------------------------------------------------------------
    | Strategic Plans
    |--------------------------------------------------------------------------
    */
    Route::get('/strategic-plans/details/{id}','Admin\StrategicPlansController@getPlanDetails')->name('admin.strategic.plans.details');
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
    Route::resource('/management-menus','Admin\ManagementController');
    Route::resource('/department-menus','Admin\DepartmentController');


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