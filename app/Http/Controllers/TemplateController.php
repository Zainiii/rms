<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Template;
use App\Models\TemplateSection;
use App\Models\Applicant;

class TemplateController extends Controller
{
    public function view($id=null){
        $template = Template::where('id', $id)->first();
        $temp_sec = TemplateSection::with('section')->with(['resume' => function ($query) {
            $query->where('applicant_id', 1);
            $query->with('subSections');
    
        }])->where('template_id', $id)->orderBy('order_no')->get();


//        return view('template_holder', ['template'=>$template, 'sections'=>$temp_sec]);
        
        $pdf = PDF::loadView('template', ['template'=>$template, 'sections'=>$temp_sec]);
        $name = 'template_'.$id.'.pdf';
        return $pdf->stream($name);

    }
}


