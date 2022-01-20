<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Datasheet, BandMember};

class AdminController extends Controller
{
    public function rider(Request $request)
    {
        $datasheet   = Datasheet::first();
        $bandMembers = BandMember::all();

        return view('admin.rider', [
            'datasheet'   => $datasheet,
            'bandMembers' => $bandMembers
        ]);
    }
}
