<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\{Datasheet, BandMember, StuffSection, Stuff, Patchlist, Rider, ScenePlanItem};
use File;
use PDF;
use WKPDF;

class RiderController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.rider', $this->getViewData());
    }

    public function save(Request $request)
    {
        Datasheet::saveProcess([
            'general_info'  => $request->post('general_infos'),
            'networks'      => $request->post('networks'),
            'staff'         => $request->post('staff'),
            'languages'     => $request->post('languages'),
            'scenePlanData' => json_encode($request->post('scenePlanItem'))
        ]);

        BandMember::saveProcess($request->post('members'));
        StuffSection::saveProcess($request->post('sections'));
        Stuff::saveProcess($request->post('stuff'));
        Patchlist::saveProcess($request->post('patchlist'));
        Rider::saveProcess($request->post('rider'));
        ScenePlanItem::saveProcess($request->post('scenePlanItems'));

        return redirect(route('admin.rider.edit'));
    }

    public function generatePDF(Request $request)
    {
        set_time_limit(0);
/*
        $auth = Http::post('https://login.pdfbroker.io/connect/token', [
            'client_id' => '358d4122-9466-4acb-ac59-bf2dcef66d93',
            'client_secret' => '1525c1343a3147fb9d04db008e8585d1',
            'grant_type' => 'client_credentials'
        ]);

        var_dump($auth);
die;

        $content = Http::post('https://api.pdfbroker.io/api/pdf/wkhtmltopdf', [
            'url' => null,
            'htmlBase64String' => view('admin.rider-pdf', $this->getViewData()),
            'resources' => null
        ]);

        var_dump($content);
die;
*/
        $pdf = PDF::loadView('admin.rider-pdf', $this->getViewData());

        return $pdf->download('Fiche technique.pdf');
    }

    public function generateWKPDF(Request $request)
    {
        $pdf  = WKPDF::generatePdf(view('admin.rider-pdf', $this->getViewData()));
        $path = public_path('rider');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $outputName = 'Fiche technique Muertissima';
        $pdfPath    = $path.'/'.$outputName.'.pdf';


        File::put($pdfPath, $pdf);

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'attachment; filename="'.$outputName.'.pdf'.'"',
        ];

        return response()->download($pdfPath, $outputName.'.pdf', $headers);
    }

    private function getViewData(): array
    {
        return [
            'datasheet'      => Datasheet::first(),
            'bandMembers'    => BandMember::all(),
            'stuffSections'  => StuffSection::all(),
            'stuff'          => Stuff::all(),
            'patchlist'      => Patchlist::orderBy('input_number')->get(),
            'rider'          => Rider::all(), 
            'scenePlanItems' => ScenePlanItem::all()
        ];
    }
}
