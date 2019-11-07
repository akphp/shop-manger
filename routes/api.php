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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login' , 'AdminAuth@login');

    Route::post('register' , 'AdminAuth@register');

});



Route::group(['prefix' => 'admin'], function () {

 
    // Route::group(['middleware' => ['auth:admin']], function () {
            
    Route::apiResource('plan', 'PlanController');

    Route::post('plan/active/{plan}', 'PlanController@AcivePlan');
    
     Route::apiResource('user-group', 'UserGroupController');
     Route::apiResource('plan-offer', 'PlanOfferController');

    
    // });

});


Route::apiResource('languages', 'LanguageController');
Route::apiResource('country', 'CountryController');
Route::apiResource('city', 'CityController');
Route::apiResource('constant', 'ConstantController');


