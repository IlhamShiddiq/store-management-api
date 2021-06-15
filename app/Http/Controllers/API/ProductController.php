<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products, 200);
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
        $validated = $request->validate([
            'store_id' => 'required|integer',
            'name' => 'required',
            'category_id' => 'required|integer',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required'
        ]);

        $data = Product::create($request->all());

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
        //
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
        $data = Product::find($id);
        $updated = $data->update($request->all());

        $message = [
            'message' => 'Data has updated successfully',
            'data' => $data
        ];

        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Product::find($id);

        if(!$check) {
            $message = [
                'message' => 'The ID is not registered in the system',
            ];
        } else {
            $data = Product::destroy($id);
    
            $message = [
                'message' => 'Data has deleted successfully',
            ];
        }

        return response()->json($message);
    }
}
