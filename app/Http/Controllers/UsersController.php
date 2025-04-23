<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        // return response()->json('opa');

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        /**Take note of this: Your user authentication access token is generated here **/
        $data['token'] =  $user->createToken('MyApp')->accessToken;
        $data['name'] =  $user->name;

        return response(['data' => $data, 'message' => 'Account created successfully!', 'status' => true]);
    }

    public function teste()
    {
        return response()->json(['akdjh' => 'oi', 'oqoqoq' => 'tchau']);
        // dd('teste');

        $user = new User;
        $user->name = 'jajhagd';
        $user->email = 'jajhagd@email.com';
        $user->bitrix_id = '10';
        $user->save();

        $data['token'] =  $user->createToken('MyApp')->accessToken;
        $data['name'] =  $user->name;

        return response(['data' => $data, 'message' => 'Account created successfully!', 'status' => true]);

        // $user = User::create([
        //     'name' => 'jajhagd',
        //     'email' => 'jajhagd@email.com',
        //     'bitrix_id' => '10',
        // ]);

        // dd($user);
    }
}
