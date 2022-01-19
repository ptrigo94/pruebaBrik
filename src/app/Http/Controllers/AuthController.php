<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function registrar (Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string|min:6',
            'apellido'=>'required|string',
            'rut'=>'required|string|unique:users'
            
        ]);

        $usuario = new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'apellido'=>$request->apellido,
            'rut'=>$request->rut


        ]);
        $response;
        if ($usuario->save()) {
           $response= response()->json(['message'=>'Usuario registrado!'],200);
         } else {
            $response= response()->json(['message'=>'Ya existe un usuario con este Rut/email'],400);
        }
        return $response;
        
        
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|string'
        ]);
        $credenciales = request(['email','password']);


        if (!Auth::attempt($credenciales)) {
            return response()->json(['message'=>'usuario o contraseña incorrectos']); 
        }
        $user =$request->user();
        $tokenResult = $User->createToken('Token de acceso Personal');
        $token = $tokenResult->token;
        $token->expires_at= Carbon::now()->addweeks(1);
        $token->save();
        return response()->json(['data'=> [
            'user'-> Auth::user(),
            'access_token' => $tokenResult->accessToken,
            'token_type'=>'Bearer',
            'expires_at' =>Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]]);




    }
}
