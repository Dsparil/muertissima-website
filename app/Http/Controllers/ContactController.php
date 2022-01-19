<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('contact', [
            'page' => 'contact'
        ]);
    }

    public function postMessage(Request $request)
    {
        // todo.
    }
}
