<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Mockery\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return response()->json(User::all(), 200);

        }catch (Exception $exception){

            return response()->json(['error'=>$exception], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $user = User::create($request->all());

            return response()->json($user, 201);

        }catch (Exception $exception){

            return response()->json(['error'=>$exception], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        try {
            return response()->json($user, 200);
        }catch (Exception $exception){
            return response()->json(['error'=>$exception], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->all());

            return response()->json($user, 200);

        }catch (Exception $exception){

            return response()->json(['error'=>$exception], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try {$user->delete();

            return response()->json(['message' => 'Deleted'], 205);

        } catch (Exception $exception) {

            return response()->json(['error' => $exception], 500);
        }
    }

    public function search(Request $request){

        $result = User::where('first_name', 'LIKE', '%' . $request->search . '%')->orwhere('id', 'LIKE', '%' . $request->search . '%')->get();

        if(count($result)){
            return response()->json($result);
        }
        else{
            return response()->json(['Result'=> 'User not Found'], 404);
        }
    }

}
