<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(Request $request)
    {
        return view('music', ['page' => 'music']);
    }
}
