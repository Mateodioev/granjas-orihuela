<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome', [
            'displayLogin' => $request->boolean('display_login')
                ?: $request->session()->get('display_login', false)
        ]);
    }
}
