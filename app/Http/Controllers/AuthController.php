<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
         * Membuat Fitur Register
         */
    public function register(Request $request)
    {
        /*
         *  menangkap input name, email dan password
         */

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
         /*
         *  menginsert data ke table user
         */
        User::create($input);
        $data = [
            'message' => 'Register is successfully'
        ];
        return response()->json($data, 200);
    }


    /*
         * Membuat Fitur Login
         */
    public function login(Request $request)
    {
        /*
         * Menangkap input name, email dan password dari user
         */
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

         /*
         * Menangkap input name, email dan password dari database berdasarkan email
         */
        if (Auth::attempt($input)) {
            $user = User::where('email', $input['email'])->first();

            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login is successfully',
                'token' => $token->plainTextToken
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Login is invalid'
            ];

            return response()->json($data, 401);
        }
    }
}