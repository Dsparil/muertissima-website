<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Datasheet, BandMember};
use PDF;

class RiderController extends Controller
{
    public function edit(Request $request)
    {
        $datasheet   = Datasheet::first();
        $bandMembers = BandMember::all();

        return view('admin.rider', [
            'datasheet'   => $datasheet,
            'bandMembers' => $bandMembers
        ]);
    }

    public function save(Request $request)
    {
        Datasheet::saveProcess([
            'general_info' => $request->post('general_infos'),
            'networks'     => $request->post('networks'),
            'staff'        => $request->post('staff'),
            'languages'    => $request->post('languages')
        ]);

        BandMember::saveProcess($request->post('members'));

        return redirect(route('admin.rider.edit'));
    }

    public function generatePDF(Request $request)
    {
        $datasheet   = Datasheet::first();
        $bandMembers = BandMember::all();

        $pdf = PDF::loadView('admin.rider-pdf', [
            'datasheet'   => $datasheet,
            'bandMembers' => $bandMembers
        ]);

        return $pdf->download('Fiche technique.pdf');
    }
}
