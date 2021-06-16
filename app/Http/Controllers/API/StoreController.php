<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

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
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

        $stores = Store::all();

        return response()->json($stores, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

        $validated = $request->validate([
            'store' => 'required',
            'whatsapp_number' => 'required|min:10',
            'region' => 'required'
        ]);

        $data = Store::create($request->all());

        $message = [
            'message' => 'Data has created successfully',
            'data' => $data
        ];

        return response()->json($message, 201);
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
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

        $store = Store::find($id);

        return response()->json($store, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

        $validated = $request->validate([
            'whatsapp_number' => 'min:10',
        ]);

        $data = Store::find($id);
        $updated = $data->update($request->all());

        $message = [
            'message' => 'Data has updated successfully',
            'data' => $data
        ];

        return response()->json($message, 200);
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
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }
        
        $status_code = 200;
        $check = Store::find($id);

        if(!$check) {
            $status_code = 404;
            $message = [
                'message' => 'The ID is not registered in the system',
            ];
        } else {
            $data = Store::destroy($id);
    
            $message = [
                'message' => 'Data has deleted successfully',
            ];
        }

        return response()->json($message, $status_code);
    }
}
