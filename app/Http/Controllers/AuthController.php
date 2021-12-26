<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        /**
         * Fitur Register
         * Ambil input name, email, dan password
         * Input data ke database menggunakan user model
         */

         $input = [
             'name' => $request->name,
             'email' => $request->email,
             'password'=> Hash::make($request->password)
         ];

         $user = User::create($input);

         $data = [
             'message' => 'Register is succesfully'
         ];

         return response()->json($data, 200);


    }


    public function login(Request $request)
    {
        /**
         * Fitur Login
         * Ambil input email dan password dari user
         * Ambil input email dan password dari database berdasarkan email
         * Bandingkan data input user dan data dari database
         */

         $input = [
             'email' => $request->email,
             'password' => $request->password
         ];

         $user = User::where('email', $input['email'])->first();

         $isLoginSuccessfully = ($input['email'] == $user->email && Hash::check($input['password'], $user->password));
         if ($isLoginSuccessfully) {
             $token = $user->createToken('auth_token');
             
             $data = [
                 'message' => 'Login successfully',
                 'token' => $token->plainTextToken
             ];
 
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Login is invalid'
            ];

            return response()->json($data, 401);
        }
    }
}
