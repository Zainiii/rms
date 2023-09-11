

@if(isset($res_data))

@foreach($sections as $section)

<div style="{!! $section->section_style !!}">
    <p style="{!! $section->header_style !!}">{!! $section->section->title !!}</p>
    

    @if($res_data->is_group)
    @foreach($sub_sections as $sub_section)

    <p style="{!! $section->sub_header_style !!}">{!! $sub_section->title !!}</p>
    <p style="{!! $section->sub_body_style !!}">{!! $sub_section->data !!}</p>
    
    @endforeach 

    
    @else
    <p style="{!! $section->body_style !!}">{!! $res_data->data !!}</p>

    @endif
</div>


@endforeach 

@else
@foreach($sections as $section)

<div style="{!! $section->section_style !!}">
    <p style="{!! $section->header_style !!}">{!! $section->section->title !!}</p>
    <p style="{!! $section->body_style !!}">{!! Helper::str_gen('long') !!}</p>
</div>


@endforeach

@endif


