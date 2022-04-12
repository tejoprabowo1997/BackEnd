<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\auth\AuthenticationException;

class IndexController extends Controller
{
    public function login(Request $request)
    {
        if(!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }
    }
}
