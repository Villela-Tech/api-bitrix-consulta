<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Ixudra\Curl\Facades\Curl;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        // dd($request->all());

        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|string',
        // ]);

        $resource = "user.current";

        $query = http_build_query([
            'auth' => $request->input('access_token'),
        ]);

        $url = implode('/', [$request->input('domain'), 'rest', $resource]);

        $url = "https://{$url}?{$query}";
        // $url .= "?{$query}";

        // dd($url);

        $response = Curl::to($url)
            ->returnResponseObject()
            ->asJson()
            ->get();

        // dd($response);

        $user_bitrix_id = $response->content->result->ID;

        $user = User::where('domain', $request->input('domain'))->where('bitrix_id', $user_bitrix_id)->first();

        // dd($user);

        // $token = app('auth')->attempt($request->only(['email']));
        $token = app('auth')->login($user);

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(app('auth')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        app('auth')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(app('auth')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => app('auth')->factory()->getTTL() * 60
        ]);
    }
}
