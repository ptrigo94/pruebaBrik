<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;;
 



class UserController extends Controller
{
    public function register(Request $request){




        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string|confirmed',
            
            'apellido'=>'required|string',
            'rut'=>'required|string|unique:users'
            
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $user->apellido=$request->apellido;
        $user->rut=$request->rut;
        $user->save();

        return response()->json([
            "status"=>1,
            "msg"=>"Registro Exitoso",
        ]);


    }

    public function checkExisteRut($rut){
        $usuario = User::where('rut',$rut)->paginate();
        if (count($usuario)<>0) {
            return response()->json([
                "status"=>1,
                "msg"=>"Rut ya registrado"]);
        }
        else{
            return response()->json([
                "status"=>1,
                "msg"=>"Rut No Existe"]);
        }

    }
    public function checkExisteEmail($email){
        $usuario = User::where('email',$email)->paginate();
        if (count($usuario)<>0) {
            return response()->json([
                "status"=>1,
                "msg"=>"E-mail ya registrado"]);
        }
        else{
            return response()->json([
                "status"=>0,
                "msg"=>"Correo no existe"]);
        }

    }
    public function iniciosesion(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string',            
        ]);



        $user= User::where("email","=",$request->email)->first();

        if (isset($user->id)) {
            if (Hash::check($request->password,$user->password)) {
                #creacion de token

             $token   = $user->createToken("auth_token")->plainTextToken;
             return response()->json([
                "status"=>1,
                "msg"=>"Inicio de sesión Exitoso",
                "access_token" => $token
            ]);
            }else{
                return response()->json([
                    "status"=>0,
                    "msg"=>"Contraseña Incorrecta."]);
            }
        } else{
            return response()->json([
                "status"=>0,
                "msg"=>"Correo no existe"],404);
        }

    }
    public function userProfile(){
        
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status"=>0,
            "msg" => "Cierre de sesión"
        ]);
    }

}
