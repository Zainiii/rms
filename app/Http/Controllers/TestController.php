<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TestController extends Controller
{
    public function showPDF(){

        //$pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->stream();


//        $licencie = \Licencie::find($licencie)->first();
        $pdf = PDF::loadView('test1', []);
        return $pdf->stream('resume.pdf');
        //return $pdf->download('invoice.pdf');

/*$viewhtml = View::make('test', [variables])->render();

$dompdf = new Dompdf();
$dompdf->loadHtml($viewhtml);
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream();


$pdf = PDF::loadView('pages.newblade', []);
*/


        //return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
    }
}
