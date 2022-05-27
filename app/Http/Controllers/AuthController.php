<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// Models
use App\Models\UserModel;
// Form Request
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;

class AuthController extends Controller
{

    /**
     * Login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request) : \Illuminate\Http\Response 
    {
        try{

            $user = UserModel::where("email", $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)){

                return response(["message" => "Crendenciais inválidas!"], 401);

            }

            // The sanctum token is created with a value that will be hashed
            $sanctum_token = $user->createToken(Str::random(10))->plainTextToken;

            return response([
                "user" => $user,
                "access_token" => $sanctum_token
            ], 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }

    }

    /**
     * Registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegistrationRequest $request) : \Illuminate\Http\Response 
    {
        try{

            DB::transaction(function () use ($request) {

                $new_user = UserModel::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password)
                ]);
    
                $new_user->telephone()->create([
                    "user_id" => $new_user->id
                ]);

            });

            return response(["message" => "Success!"], 201);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }

    }

    /**
     * Logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) : \Illuminate\Http\Response 
    {
        try{

            $request->user()->tokens()->delete();

            return response(["message" => "Logout successfully!"], 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }

    }
}
