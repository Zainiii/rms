@extends('snippet.header')

@section('title')View Template | {{$template->title}} @stop

@section('content')

  @include('snippet.topnav')

  <div class="frame">
    @if($applicant_id != null)
    <a href="{{ route('template.generate', [$template->id, $applicant_id]) }}" target="_blank" class="button-63 float-right btn-right" role="button">Download / Print</a>
    @endif
  
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="button-63 float-left btn-left previous" role="button">&laquo; Templates</a>
  
    @foreach($sections as $section)
    @if($section->resume != null)
    @if($section->resume->is_group == false || ($section->resume->is_group == true && count($section->resume->subSections) > 0))

    <div style="{!! $section->section_style !!}">
        @if($section->show_title)
        <p style="{!! $section->header_style !!}">{!! $section->section->title !!}</p>
        @endif

        @if($section->resume->is_group)
        @foreach($section->resume->subSections as $sub_section)

        <p style="{!! $section->sub_header_style !!}">{!! $sub_section->title !!}</p>
        <p style="{!! $section->sub_body_style !!}">{!! $sub_section->data !!}</p>
        
        @endforeach 

        
        @else
        <p style="{!! $section->body_style !!}">{!! $section->resume->data !!}</p>

        @endif
    </div>


    @endif
    @endif
    @endforeach 
  </div>


@stop