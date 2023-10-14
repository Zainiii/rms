<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Template;
use App\Models\TemplateSection;
use App\Models\Applicant;
use App\Models\Section;
use App\Models\Tag;


class TemplateController extends Controller
{
    public function view($id, $applicant=null){
        $template = Template::where('id', $id)->first();
        $temp_sec = TemplateSection::with('section')->with(['resume' => function ($query) use ($applicant) {
            $query->where('applicant_id', $applicant ?? 1);
            $query->with('subSections');
        }])->where('template_id', $id)->orderBy('order_no')->get();

        return view('template', ['template'=>$template, 'sections'=>$temp_sec, 'applicant_id'=>$applicant]);
    }

    public function generate($id, $applicant){
        $template = Template::where('id', $id)->first();
        $temp_sec = TemplateSection::with('section')->with(['resume' => function ($query) use ($applicant) {
            $query->where('applicant_id', $applicant);
            $query->with('subSections');
        }])->where('template_id', $id)->orderBy('order_no')->get();

        $pdf = PDF::loadView('template_holder', ['template'=>$template, 'sections'=>$temp_sec]);
        $name = 'template_'.$id.'.pdf';
        return $pdf->stream($name);
    }

    public function templates($applicant = null){
        $templates = Template::all();

        return view('templates', ['templates'=>$templates, 'applicant_id'=>$applicant]);
    }



    public function builder(){
        $sections = Section::orderBy('id')->get();
        return view('builder', ['sections'=>$sections]);
    }



    public function template_new_post(Request $request){
        $input_data = $this->format_input($request);

        $template = new Template;
        $template->title = $request->title;
        $template->save();

        $sections = Section::orderBy('id')->get();
        foreach($sections as $section){
            $temp_section = new TemplateSection;
            $temp_section->section_id = $section->id;
            $temp_section->template_id = $template->id;
            $temp_section->show_title = $input_data['showtitle_'.$section->id];
            $temp_section->order_no = $input_data['order_'.$section->id];
            $temp_section->header_style = $input_data['header_'.$section->id];
            $temp_section->body_style = $input_data['body_'.$section->id];
            $temp_section->sub_header_style = $input_data['subheader_'.$section->id];
            $temp_section->sub_body_style = $input_data['subbody_'.$section->id];
            $temp_section->save();
        }

        return redirect()->route('templates')->withErrors(['message'=> 'Template Saved Successfully.']);
    }



    public function format_input($request){
        $style_sheet = array();
        $sections = Section::orderBy('id')->get();
        foreach($sections as $section){
            $i = $section->id;
            $header_style = '';
            $body_style = '';
            $subheader_style = '';
            $subbody_style = '';

            foreach (\Helper::css_props() as $key => $value) {
                $style = $request->{'section'.$i.'_header_'.$key};
                if($style == null)
                    $header_style .= $value.':'.\Helper::css_default('header')[$key].\Helper::css_default('postfix')[$key].'; ';
                else
                    $header_style .= $value.':'.$style.\Helper::css_default('postfix')[$key].'; ';
                
                if($section->input_type == 'multi'){
                    $style = $request->{'section'.$i.'_subheader_'.$key};
                    if($style == null)
                        $subheader_style .= $value.':'.\Helper::css_default('subheader')[$key].\Helper::css_default('postfix')[$key].'; ';
                    else
                        $subheader_style .= $value.':'.$style.\Helper::css_default('postfix')[$key].'; ';

                    $style = $request->{'section'.$i.'_subbody_'.$key};
                    if($style == null)
                        $subbody_style .= $value.':'.\Helper::css_default('body')[$key].\Helper::css_default('postfix')[$key].'; ';
                    else
                        $subbody_style .= $value.':'.$style.\Helper::css_default('postfix')[$key].'; ';

                } else {
                    $style = $request->{'section'.$i.'_body_'.$key};
                    if($style == null)
                        $body_style .= $value.':'.\Helper::css_default('body')[$key].\Helper::css_default('postfix')[$key].'; ';
                    else
                        $body_style .= $value.':'.$style.\Helper::css_default('postfix')[$key].'; ';

                }
            }

            $style_sheet['header_'.$i] =  $header_style;
            $style_sheet['body_'.$i] =  $body_style;
            $style_sheet['subheader_'.$i] =  $subheader_style;
            $style_sheet['subbody_'.$i] =  $subbody_style;
            $style_sheet['showtitle_'.$i] =  $request->{'section'.$i.'_header_hide'} ? false : true;
            $style_sheet['order_'.$i] =  $request->{'section'.$i.'_order'};
            
        }
        return $style_sheet;
    }

}


