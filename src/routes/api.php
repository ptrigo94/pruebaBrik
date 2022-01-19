<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UserController;

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

Route::post('iniciosesion',[UserController::class, 'iniciosesion']);
Route::post('registro',[UserController::class, 'register']);
Route::get('/checkRut/{rut}',[UserController::class,'checkExisteRut']);
Route::get('/checkEmail/{email}',[UserController::class,'checkExisteEmail']);


Route::group(['middleware'=> ["auth:sanctum"]], function(){
    
    //perfil de usuario y logout
    Route::get('user-profile',[UserController::class,'perfil']);
    Route::get('logout',[UserController::class,'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/tareas',[TareaController::class,'index']);
Route::get('/tareas/{id}',[TareaController::class,'show']);
Route::get('/tareas/getbyuser/{id}',[TareaController::class,'getByUserID']);
Route::post('/tareas',[TareaController::class,'create']);
Route::put('/tareas/{id}',[TareaController::class,'update']);
Route::delete('/tareas',[TareaController::class,'destroy']);


Route::post('/usuario/registrarUsuario',[Usercontroller::class,'create']);
/*

Route::post('/tareas',[TareaController::class,index]);
Route::put('/tareas',[TareaController::class,index]);
Route::destroy('/tareas',[TareaController::class,index]);

*/