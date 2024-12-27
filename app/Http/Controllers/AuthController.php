<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        // validacion de los datos
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
         // crear un nuevo usuario
         $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
         ]);
         //generar token
         $token = $user->createToken('authToken')->plainTextToken;
         return response()->json(['message' => 'usuario registrado', 'token' => $token], 200);

    }
    public function login(Request $request){ // recibe tambien una peticion
        $credentials = $request->only('email', 'password'); // solo le interesa el mail y pswd

        if(Auth::attempt($credentials)){ //si credenciales válidas....
            $user = Auth::user();         // carga datos de usuario
            $token = $user->createToken('authToken')->plainTextToken;  // genera un nuevo token
            return response()->json(['message' => 'Login ok', 'token' => $token], 200);
        }
        else{
            return response()->json(['message' => 'Login Error'], 401);
        }
    }
    public function user(Request $request){ // devuelve la inf del usuario logeado
        $user = $request->user(); 
        if($user){
            return response()->json([
                'name'=> $user->name, 
                'email' => $user-> email,
            ], 200);
        }
        else{
            return response()->json(['messaje' => 'Usuario no autenticado'], 401);
        }
    }
    public function logout(){
//        Auth::guard('web')->logout();
        $respuesta = response()->json(['message' => 'Ha salido correctamente']);
        return $respuesta;
    }
}
