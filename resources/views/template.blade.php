

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

