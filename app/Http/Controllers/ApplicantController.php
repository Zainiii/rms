<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Section;
use App\Models\ResSubSection;
use App\Models\Tag;
use App\Models\ApplicantTag;
use App\Models\AplResume;

class ApplicantController extends Controller
{
    
    public function applicants(){
        $applicants = Applicant::where('id', '!=', 1)->with('resume', 'resume.subSections', 'tags')->get();
        $sections = Section::orderBy('id')->get();

        return view('applicant_data', ['applicants'=>$applicants, 'sections' => $sections]);
    }

    public function applicant_new(){
        $sections = Section::orderBy('id')->get();
        $tags = Tag::all();
        return view('add_data', ['sections'=>$sections, 'tags' => $tags]);
    }

    public function applicant_new_post(Request $request){
        $data = $this->validate_data($request);
        $applicant = new Applicant;
        $applicant->name = $request->input_1;
        $applicant->save();

        if(isset($request->tags)){
            foreach($request->tags as $tag){
                $appl_tag = new ApplicantTag;
                $appl_tag->applicant_id = $applicant->id;
                $appl_tag->tag_id = $tag;
                $appl_tag->save();
            }
        }

        foreach($data as $key => $d){
            $resume = new AplResume;
            $resume->section_id = $d['section_id'];
            $resume->applicant_id = $applicant->id;

            if($d['input_type'] == 'multi')
                $resume->is_group = true;
            else
                $resume->data = $d['input'];
            
            $resume->save();

            if($d['input_type'] == 'multi'){
                $sub_titles = $d['input']['title'];
                $sub_datas = $d['input']['data'];
    
                foreach($sub_titles as $i=>$sub_title){
                    if($sub_title != null && $sub_datas[$i] != null) {
                        $resume_sub = new ResSubSection;
                        $resume_sub->resume_id = $resume->id;
                        $resume_sub->title = $sub_title;
                        $resume_sub->data = $sub_datas[$i];
                        $resume_sub->save();
                    }
                }
            }
        }

        return redirect()->route('applicants')->with('success', 'Data Saved Successfully.');
    }


    public function validate_data($request){
        $rules = array();
        $messages = array();
        $data = array();

        $sections = Section::orderBy('id')->get();

        foreach($sections as $section){
            if(isset($request->{'section'.$section->id.'_show'})){
                $v = 'input_'.$section->id;
                if($section->input_type == 'multi'){
                    $v1 = 'input_'.$section->id.'_title';
                    $v2 = 'input_'.$section->id.'_data';

                    $rules = array_merge($rules, [$v1.'.*' => 'required', $v2.".*" => 'required']);
                    $messages = array_merge($messages, [$v1.'.*.required' => '<b>Title</b> in <b>'.$section->title.'</b> is required', $v2.'.*.required' => '<b>Details</b> in <b>'.$section->title.'</b> is required']);
                    $data = array_merge($data, [$v => ['section_id' => $section->id, 'input_type' => $section->input_type, 'input' => ['title' => $request->{$v1}, 'data' => $request->{$v2}]]] );

                }else {
                    $rules = array_merge($rules, [$v => 'required']);
                    $messages = array_merge($messages, [$v.'.required' => '<b>'.$section->title.'</b> is required']);
                    $data = array_merge($data, [$v => ['section_id' => $section->id, 'input_type' => $section->input_type, 'input' => $request->{$v}]]);
                }
            }
        }
        $request->validate($rules, $messages);
        return $data;
    }


}
