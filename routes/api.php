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
    Route::get('getmembernotification/{uid}',['uses'=>'MemberController@getmembernotification']);
    Route::get('getmembers/{uid}',['uses'=>'MemberController@getmembers']);
    Route::post('register',['uses'=>'MemberController@register']);
    Route::post('updateprofile',['uses'=>'MemberController@updateprofile']);
    Route::post('generateinvititationcode',['uses'=>'MemberController@generateinvititationcode']);
    Route::post('addmember',['uses'=>'MemberController@addmember']);
    Route::post('addgroupmember',['uses'=>'MemberController@addgroupmember']);
    Route::post('removegroupmember',['uses'=>'MemberController@removegroupmember']);
    Route::post('deletemember',['uses'=>'MemberController@deletemember']);
    
    
    
});


Route::group(['prefix'=>'place'],function()
{
    Route::get('getplaces/{uid}',['uses'=>'PlaceController@getplaces']);
    Route::get('getPlaceNotification/{owneruid}/{placeid}/{useruid}',['uses'=>'PlaceController@getPlaceNotification']);
    Route::post('deleteplace',['uses'=>'PlaceController@deleteplace']);
    Route::post('saveplace',['uses'=>'PlaceController@saveplace']);
    Route::post('updateplace',['uses'=>'PlaceController@updateplace']);
    Route::post('savenotification',['uses'=>'PlaceController@savenotification']);
   
    
    
});


Route::group(['prefix'=>'group'],function()
{
    Route::get('getgroups/{uid}',['uses'=>'GroupController@getgroups']);
    Route::get('getmembergroup/{uid}',['uses'=>'GroupController@getmembergroup']);
    Route::get('getmembers/{groupid}/{membmeruid}',['uses'=>'GroupController@getmembers']);
    Route::post('addgroup',['uses'=>'GroupController@addgroup']);
    Route::post('updategroup',['uses'=>'GroupController@updategroup']);
    Route::post('deletegroup',['uses'=>'GroupController@deletegroup']);
    
    
    
});
