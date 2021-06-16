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
        $products = Product::select('products.*', 'categories.category', 'stores.store')
                            ->join('categories', 'categories.id', 'products.category_id')
                            ->join('stores', 'stores.id', 'products.store_id')
                            ->get();

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
            'product' => 'required',
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
        $product = Product::select('products.*', 'categories.category', 'stores.store')
                        ->join('categories', 'categories.id', 'products.category_id')
                        ->join('stores', 'stores.id', 'products.store_id')
                        ->where('products.id', $id)
                        ->get();

        return response()->json($product, 200);
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
        $validated = $request->validate([
            'store_id' => 'integer',
            'category_id' => 'integer',
            'price' => 'integer',
            'stock' => 'integer'
        ]);

        $data = Product::find($id);
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
        $status_code = 200;

        $check = Product::find($id);

        if(!$check) {
            $status_code = 404;
            $message = [
                'message' => 'The ID is not registered in the system',
            ];
        } else {
            $data = Product::destroy($id);
    
            $message = [
                'message' => 'Data has deleted successfully',
            ];
        }

        return response()->json($message, $status_code);
    }
}
