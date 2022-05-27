<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Form Requests
use App\Http\Requests\User\UpdateUserRequest;
// Models
use App\Models\UserModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : \Illuminate\Http\Response
    {
        try{

            $users = UserModel::all();

            return response($users, 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : \Illuminate\Http\Response
    {
        try{

            $user = UserModel::findOrFail($id);

            return response($user, 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id) : \Illuminate\Http\Response
    {
        try{

            UserModel::where("id", $id)->update($request->only(["name", "email"]));

            return response(["message" => "User successfully updated!"], 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : \Illuminate\Http\Response
    {
        try{

            UserModel::where("id", $id)->delete();

            return response(["message" => "User successfully deleted!"], 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }
}
