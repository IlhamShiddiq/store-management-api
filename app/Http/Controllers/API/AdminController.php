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
        if(!auth()->user()->can('admin crud')) {
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

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
        if(!auth()->user()->can('admin crud')) {
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'gender' => ['required', Rule::in(['L', 'P'])],
            'address' => 'required',
            'phone' => 'required|min:10'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        $user->assignRole('admin');

        $message = [
            'message' => 'Data has created successfully',
            'data' => [
                'id' => $user->id,
                'name' => $request->name,
                'email' => $request->email
            ]
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
        if(!auth()->user()->can('admin crud')) {
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

        $user = User::find($id);

        return response()->json($user, 200);
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
        if(!auth()->user()->can('admin crud')) {
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }

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
        if(!auth()->user()->can('admin crud')) {
            return response([
                'message' => 'This user have no permission to access this route'
            ]);
        }
        
        $status_code = 200;

        $check = User::find($id);

        if(!$check) {
            $status_code = 404;
            $message = [
                'message' => 'The ID is not registered in the system'
            ];
        } else {
            User::destroy($id);

            $message = [
                'message' => 'Data has deleted successfully'
            ];
        }

        return response()->json($message, $status_code);
    }
}
