<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Helpers\APIHelpers;

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

        $response = APIHelpers::createApiResponse(false, 200, null, $products);
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
        $data = Product::create($request->all());

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
        $product = Product::select('products.*', 'categories.category', 'stores.store')
                        ->join('categories', 'categories.id', 'products.category_id')
                        ->join('stores', 'stores.id', 'products.store_id')
                        ->where('products.id', $id)
                        ->get();

        $response = APIHelpers::createApiResponse(false, 200, null, $product[0]);
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
        $data = Product::find($id);
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
        Product::destroy($id);
        
        $message = 'Data has deleted successfully';
        $response = APIHelpers::createApiResponse(false, 200, $message, null);
        return response()->json($response, 200);
    }

    /**
     * Update stock data
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStock(Request $requets, $id)
    {
        $data = Product::find($id);
        $data->update([
            'stock' => $requets->stock
        ]);

        $message = 'Stock updated successfully';
        $response = APIHelpers::createApiResponse(false, 200, $message, $data);
        return response()->json($response, 200);
    }

    /**
     * Get product data by store Id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productByStore($id) {
        $data = Product::where('store_id', $id)->get();

        $response = APIHelpers::createApiResponse(false, 200, null, $data);
        return response()->json($response, 200);
    }
}
