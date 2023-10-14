<html>
  <head>
    <title>Title of the document</title>
    <style type="text/css">
        .header{
          padding: 2px;
          text-align: center;
          color: white;
        }
        .frame {
          background: #fff;
          margin: auto;
          padding: 15px 10px;
        }
    </style>
  </head>
  <body>

  <div class="frame">
    @foreach($sections as $section)
    @if($section->resume != null)

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
    @endforeach 
  </div>


    </div>
  </body>
</html>