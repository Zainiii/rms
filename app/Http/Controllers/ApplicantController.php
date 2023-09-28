<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Section;
use App\Models\ResSubSection;

class ApplicantController extends Controller
{
    
    public function applicants(){
        $applicants = Applicant::with('resume', 'resume.subSections')->get();
        $sections = Section::orderBy('id')->get();

        return view('applicant_data', ['applicants'=>$applicants, 'sections' => $sections]);
    }

    public function applicant_new(){
        $sections = Section::orderBy('id')->get();
        return view('add_data', ['sections'=>$sections]);
    }

    public function applicant_new_post(Request $request){
        /*dd($request);
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();*/
        return redirect()->route('applicant_new')->withErrors(['message'=> 'Data Saved Successfully.']);
        
        //$sections = Section::orderBy('id')->get();
        //return view('add_data', ['sections'=>$sections]);
    }



}
