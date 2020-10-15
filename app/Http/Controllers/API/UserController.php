<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user =  User::where('id', auth()->user()->id)->get();
        return UserResource::collection($user);        

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
        //
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
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20|unique:users,name,'.$id,
            'gender' => 'required|numeric',
            'phone' => 'required|min:7|max:10',
            'email' => 'email|unique:users,email,'.$id,
            // 'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => false,
                'messages' => $validator->errors()
            ];
            return response()->json($data);
        }

        try {
            $user = User::find($id)->update( [
                'name'  =>  $request->name,
                'gender'  =>  $request->gender,
                'phone'  =>  $request->phone,
                'email'  =>  $request->email,
                // 'password'  => $request->password
            ] );

            return UserResource::collection([User::find($id)]);
        } catch (Exception $e) {
            return response()->json([
                'data' => [
                    [$e->getMessage()]
                ]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
