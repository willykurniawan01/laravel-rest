<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function action(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(80),
        ]);

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $user->api_token
            ],
        ]);
    }
}
