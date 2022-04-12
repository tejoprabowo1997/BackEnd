<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class IndexController extends Controller
{
    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response('Register success!', 200);
    }
}
