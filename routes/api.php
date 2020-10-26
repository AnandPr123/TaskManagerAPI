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
Route::post('/teams', 'TeamController@index');
Route::get('/teams/{id}', 'TeamController@getTeam');
Route::post('/teams/{id}/member', 'MemberController@addMember');
Route::delete('/teams/{id}/members/{id2}', 'MemberController@deleteMember');
Route::get('/teams/​{id}/tasks', 'TaskController@getTasks');
Route::post('/teams/​{id}/tasks', 'TaskController@addTask');
Route::get('/teams/​{id1}/tasks/{id2}', 'TaskController@getTask');
Route::patch('/teams/​{id1}/tasks/{id2}', 'TaskController@patchTask');
Route::get('/teams/​{id1}/members/{id2}/tasks/', 'TaskController@memberTasks');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
https: //github.com/Gyan843/TaskManagerAPI.git
