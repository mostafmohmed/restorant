<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class resetpasswordController extends Controller
{
    public function create(Request $request): View
    {
        // return Inertia::render('Auth/ResetPassword', [
        //     'email' => $request->email,
        //     'token' => $request->route('token'),
        // ]);
        return view('admin.auth.resat-pass',['request'=>$request]);
    }
}
