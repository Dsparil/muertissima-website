<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\{Datasheet, BandMember, StuffSection, Stuff, Patchlist, Rider};
use PDF;

class RiderController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.rider', $this->getViewData());
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
        StuffSection::saveProcess($request->post('sections'));
        Stuff::saveProcess($request->post('stuff'));
        Patchlist::saveProcess($request->post('patchlist'));
        Rider::saveProcess($request->post('rider'));

        return redirect(route('admin.rider.edit'));
    }

    public function generatePDF(Request $request)
    {
        $datasheet   = Datasheet::first();
        $bandMembers = BandMember::all();

        $pdf = PDF::loadView('admin.rider-pdf', $this->getViewData());

        return $pdf->download('Fiche technique.pdf');
    }

    private function getViewData(): array
    {
        return [
            'datasheet'     => Datasheet::first(),
            'bandMembers'   => BandMember::all(),
            'stuffSections' => StuffSection::all(),
            'stuff'         => Stuff::all(),
            'patchlist'     => Patchlist::all(),
            'rider'         => Rider::all()
        ];
    }
}
