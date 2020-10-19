<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function action(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $credential = ['username' => $request->username, 'password' => $request->password];

        if (Auth::attempt($credential)) {
            $currentUser = auth()->user();
            return (new UserResource($currentUser))->additional([
                'meta' => [
                    'token' => $currentUser->api_token
                ],
            ]);
        }

        return response()->json([
            'error' => 'Your Credential Doesn match'
        ], 401);
    }
}
