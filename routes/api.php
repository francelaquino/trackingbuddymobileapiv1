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


Route::group(['prefix'=>'member'],function()
{
Route::get('test',['uses'=>'MemberController@test']);
    Route::get('getmemberinfo/{uid}',['uses'=>'MemberController@getmemberinfo']);
    Route::get('getmembers/{uid}',['uses'=>'MemberController@getmembers']);
    Route::post('register',['uses'=>'MemberController@register']);
    Route::post('updateprofile',['uses'=>'MemberController@updateprofile']);
    Route::post('generateinvititationcode',['uses'=>'MemberController@generateinvititationcode']);
    Route::post('addmember',['uses'=>'MemberController@addmember']);
    Route::post('deletemember',['uses'=>'MemberController@deletemember']);
    
    
});


Route::group(['prefix'=>'place'],function()
{
    Route::post('addplace',['uses'=>'PlaceController@addplace']);
    
    
});


Route::group(['prefix'=>'group'],function()
{
    Route::post('addgroup',['uses'=>'GroupController@addgroup']);
    
});
