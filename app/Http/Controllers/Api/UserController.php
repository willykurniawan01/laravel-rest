<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDetail()
    {
        $user = auth()->user();

        return new UserResource($user);
    }
}
