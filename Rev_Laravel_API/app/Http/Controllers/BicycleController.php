<?php

namespace App\Http\Controllers;

use App\Bicycle;
use Illuminate\Http\Request;
use Mockery\Exception;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return response()->json(Bicycle::all(), 200);
        }catch (Exception $exception){
            return response()->json(['error'=>$exception], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $bicycle = Bicycle::create($request->all());

            return response()->json($bicycle, 201);
        }catch (Exception $exception){
            return response()->json(['error'=>$exception], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Bicycle $bicycle)
    {
        try {
            return response()->json($bicycle, 200);
        }catch (Exception $exception){
            return response()->json(['error'=>$exception], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Bicycle $bicycle)
    {
        try {
            $bicycle->update($request->all());

            return response()->json($bicycle, 200);

        }catch (Exception $exception){

            return response()->json(['error'=>$exception], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Bicycle $bicycle)
    {
        try {$bicycle->delete();

            return response()->json(['message' => 'Deleted'], 205);

        } catch (Exception $exception) {

            return response()->json(['error' => $exception], 500);
        }
    }

    public function search(Request $request){

        $result = Bicycle::where('brand', 'LIKE', '%' . $request->search . '%')->orwhere('id', 'LIKE', '%' . $request->search . '%')->get();

        if(count($result)){
            return response()->json($result);
        }
        else{
            return response()->json(['Result'=> 'Bicycle not Found'], 404);
        }
    }

}
