@extends('snippet.header')

@section('title')View Template | {{$template->title}} @stop

@section('style')
<style type="text/css">
    body {
      background-color: #807f7f;
    }
    .header{
      background-color: #333333;
      padding: 2px;
      text-align: center;
      color: white;
    }
    .frame {
      width: 50%;
      border: 3px solid #807f7f;
      background: #fff;
      margin: auto;
      padding: 15px 10px;
    }
</style>
@stop 

@section('content')

  @include('snippet.topnav')

  <div class="frame">
    @foreach($sections as $section)

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


    @endforeach 
  </div>


@stop