<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Tag;

class SettingController extends Controller
{
    
    public function configuration(){
        $sections = Section::orderBy('id')->get();
        $tags = Tag::all();
        return view('configuration', ['sections'=>$sections, 'tags' => $tags]);
    }


    public function update_section(Request $request, $id = null){
        $request->validate([
            'title' => 'required|unique:sections,title,'.$id,
            'input_type' => 'required',
        ]);

        if($id == null)
            $section = new Section;
        else
            $section = Section::find($id);

        if($section == null)
            return redirect()->route('configuration')->withErrors(['Record not found.']);

        $section->title = $request->title;
        $section->input_type = $request->input_type;
        $section->save();

        return redirect()->route('configuration')->with('success', 'Section saved successfully.');
    }


    public function update_tag(Request $request, $id = null){
        $request->validate([
            'tag_name' => 'required|unique:tags,tag_name, '.$id
        ]);

        if($id == null)
            $tag = new Tag;
        else
            $tag = Tag::find($id);

        if($tag == null)
            return redirect()->route('configuration')->withErrors(['Record not found.']);

        $tag->tag_name = $request->tag_name;
        $tag->save();

        return redirect()->route('configuration')->with('success', 'Tag saved successfully.');
    }


}
