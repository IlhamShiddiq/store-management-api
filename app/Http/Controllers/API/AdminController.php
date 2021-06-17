<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Helpers\APIHelpers;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $response = APIHelpers::createApiResponse(false, 200, null, $users);
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
        $data = $request->all();

        if(!($data['password'] == $data['password_confirmation'])) {
            $message = "The password doesn't match";
            $response = APIHelpers::createApiResponse(true, 400, $message, null);
            return response()->json($response, 400);
        }

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->assignRole('admin');

        $message = 'Data has created successfully';
        $response = APIHelpers::createApiResponse(false, 201, $message, $user);
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
        $user = User::find($id);

        $response = APIHelpers::createApiResponse(false, 200, null, $user);
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
        $data = User::find($id);
        $data->update($request->except(['password']));

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
        User::destroy($id);

        $message = 'Data has deleted successfully';
        $response = APIHelpers::createApiResponse(false, 200, $message, null);
        return response()->json($response, 200);
    }
}
