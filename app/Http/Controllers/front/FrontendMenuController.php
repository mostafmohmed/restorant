<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Menue;
use Illuminate\Http\Request;

class FrontendMenuController extends Controller
{
    public function index()
    {
        $menus = Menue::all();

        return view('front.menus.index', compact('menus'));
    }
}
