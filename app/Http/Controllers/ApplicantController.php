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
        $applicants = Applicant::with('resume', 'resume.subSections')->get();
        $sections = Section::orderBy('id')->get();

        return view('applicant_data', ['applicants'=>$applicants, 'sections' => $sections]);
    }

    public function applicant_new(){
        $sections = Section::orderBy('id')->get();
        $tags = Tag::all();
        return view('add_data', ['sections'=>$sections, 'tags' => $tags]);
    }

    public function applicant_new_post(Request $request){
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

        $sections = Section::orderBy('id')->get();
        foreach($sections as $section){
            $resume = new AplResume;            
            $resume->section_id = $section->id;
            $resume->applicant_id = $applicant->id;
            if($section->input_type == 'multi')
                $resume->is_group = true;
            else{
                $v = 'input_'.$section->id;
                $resume->data = $request->{$v};
            }
            $resume->save();

            if($section->input_type == 'multi'){
                $v1 = 'input_'.$section->id.'_title';
                $v2 = 'input_'.$section->id.'_data';

                $sub_titles = $request->{$v1};
                $sub_datas = $request->{$v2};

                foreach($sub_titles as $i=>$sub_title){
                    $resume_sub = new ResSubSection;
                    $resume_sub->resume_id = $resume->id;
                    $resume_sub->title = $sub_title;
                    $resume_sub->data = $sub_datas[$i];
                    $resume_sub->save();
                }
            }

        }

        return redirect()->route('applicant_new')->withErrors(['message'=> 'Data Saved Successfully.']);
    }



}
