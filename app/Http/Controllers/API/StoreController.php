<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\StoreAdmin;
use App\Helpers\APIHelpers;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('store crud')) {
            $message = "This user have no permission to access this route";
            $response = APIHelpers::createApiResponse(true, 401, $message, null);
            return response()->json($response, 401);
        }

        $stores = Store::all();

        $response = APIHelpers::createApiResponse(false, 200, null, $stores);
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('store crud')) {
            $message = "This user have no permission to access this route";
            $response = APIHelpers::createApiResponse(true, 401, $message, null);
            return response()->json($response, 401);
        }

        $data = Store::create($request->all());

        $message = 'Data has created successfully';
        $response = APIHelpers::createApiResponse(false, 201, $message, $data);
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!auth()->user()->can('store crud')) {
            $message = "This user have no permission to access this route";
            $response = APIHelpers::createApiResponse(true, 401, $message, null);
            return response()->json($response, 401);
        }

        $store = Store::find($id);

        $response = APIHelpers::createApiResponse(false, 200, null, $store);
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!auth()->user()->can('store crud')) {
            $message = "This user have no permission to access this route";
            $response = APIHelpers::createApiResponse(true, 401, $message, null);
            return response()->json($response, 401);
        }

        $data = Store::find($id);
        $data->update($request->all());

        $message = 'Data has updated successfully';
        $response = APIHelpers::createApiResponse(false, 200, $message, $data);
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('store crud')) {
            $message = "This user have no permission to access this route";
            $response = APIHelpers::createApiResponse(true, 401, $message, null);
            return response()->json($response, 401);;
        }

        Store::destroy($id);

        $message = 'Data has deleted successfully';
        $response = APIHelpers::createApiResponse(false, 200, $message, null);
        return response()->json($response, 200);
    }
}
