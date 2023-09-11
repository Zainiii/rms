@foreach($sections as $section)

<div style="">
    <p style="{!! $section->header_style !!}">{!! $section->section->title !!}</p>
    <p style="{!! $section->body_style !!}">{!! Helper::str_gen('long') !!}</p>
</div>


@endforeach 

