<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Category::where('name', 'specials')->first();

        return view('front.indexwelcome', compact('specials'));
    }
    public function thankyou()
    {
        return view('front.thankyou');
    }
}
