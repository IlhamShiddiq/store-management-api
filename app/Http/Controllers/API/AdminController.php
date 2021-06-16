<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

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

        return response()->json($users, 200);
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
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'gender' => ['required', Rule::in(['L', 'P'])],
            'address' => 'required',
            'phone' => 'required|min:10'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $data = User::create($validated);

        $message = [
            'message' => 'Data has created successfully',
            'data' => [
                'id' => $data->id,
                'name' => $request->name,
                'email' => $request->email
            ]
        ];

        return response()->json($message);
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

        return response()->json($user);
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
            'email' => 'email|unique:users',
            'gender' => [Rule::in(['L', 'P'])],
            'phone' => 'min:10'
        ]);
        
        $data = User::find($id);
        $data->update($request->except(['password']));

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
        $check = User::find($id);

        if(!$check) {
            $message = [
                'message' => 'The ID is not registered in the system'
            ];
        } else {
            User::destroy($id);

            $message = [
                'message' => 'Data has deleted successfully'
            ];
        }

        return response()->json($message);
    }
}
