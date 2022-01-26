<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('contact', [
            'quote' => Quote::random(),
            'page'  => 'contact'
        ]);
    }
}
