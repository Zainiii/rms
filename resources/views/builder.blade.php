@extends('snippet.header')

@section('title')Template @stop

@section('style')
<style type="text/css">
  body {
    background-color: #0093E9;
    background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
  }
  .header{
    background-color: #333333;
    padding: 2px;
    text-align: center;
    color: white;
  }

  .mt-100{margin-top: 100px}

  .header-style{
    font-family: {!! Helper::css_default('header')['font'] !!};
    font-size: {!! Helper::css_default('header')['size'] !!}px;
    color:{!! Helper::css_default('header')['color'] !!};
    font-weight:{!! Helper::css_default('header')['bold'] !!};
    font-style:{!! Helper::css_default('header')['italic'] !!};
    text-decoration:{!! Helper::css_default('header')['underline'] !!};
    text-align:{!! Helper::css_default('header')['align'] !!};
  }

  .subheader-style{
    font-family: {!! Helper::css_default('subheader')['font'] !!};
    font-size: {!! Helper::css_default('subheader')['size'] !!}px;
    color:{!! Helper::css_default('subheader')['color'] !!};
    font-weight:{!! Helper::css_default('subheader')['bold'] !!};
    font-style:{!! Helper::css_default('subheader')['italic'] !!};
    text-decoration:{!! Helper::css_default('subheader')['underline'] !!};
    text-align:{!! Helper::css_default('subheader')['align'] !!};
  }

  .default-style{
    font-family: {!! Helper::css_default('body')['font'] !!};
    font-size: {!! Helper::css_default('body')['size'] !!}px;
    color:{!! Helper::css_default('body')['color'] !!};
    font-weight:{!! Helper::css_default('body')['bold'] !!};
    font-style:{!! Helper::css_default('body')['italic'] !!};
    text-decoration:{!! Helper::css_default('body')['underline'] !!};
    text-align:{!! Helper::css_default('body')['align'] !!};
  }

  #editor {
      width: 100%;
      height: 200px;
      border: 1px solid #ccc;
      padding: 10px;
      font-size: 16px;
  }
  .active-btn {
      background-color: #e0e0e0; /* Change this color as needed */
  }

  /*section-edit box styling */
  .style-box{
    opacity: 0.0;
    -webkit-transition: all 500ms ease-in-out;
    -moz-transition: all 500ms ease-in-out;
    -ms-transition: all 500ms ease-in-out;
    -o-transition: all 500ms ease-in-out;
    transition: all 500ms ease-in-out;
    position:absolute;
    z-index:-10;
    background-color: #fff;
    border-radius: 10px;
    padding: 10px;
    box-shadow:
                0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                0 6.7px 5.3px rgba(0, 0, 0, 0.048),
                0 12.5px 10px rgba(0, 0, 0, 0.06),
                0 22.3px 17.9px rgba(0, 0, 0, 0.072),
                0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                0 100px 80px rgba(0, 0, 0, 0.12);
  }
  .style-trigger {
    height: fit-content;
    width: fit-content;
    width: 100%;
    border-radius: 10px;
    -webkit-transition: all 500ms ease-in-out;
    -moz-transition: all 500ms ease-in-out;
    -ms-transition: all 500ms ease-in-out;
    -o-transition: all 500ms ease-in-out;
    transition: all 500ms ease-in-out;

  }
  .style-trigger:hover .style-box {
    opacity: 1.0;
    z-index: 10;
  }

  .style-trigger:hover {
    box-shadow: inset 0 -3em 3em rgb(255 255 255 / 30%), 0 0 0 2px white, 0.3em 0.3em 1em rgb(16 16 16 / 60%);
  }

  .fa-pen {
    float: right;
    display: inline-block;
    font-size: 0.75rem;
    margin: 10px;
    padding: 3px;
    color: #007bff;
    opacity: 0;
    z-index: -10;
    border-radius: 50%;
  }
  .fa-pen:hover {
    background-color: #007bff;
    color: white;
  }
  .style-trigger:hover .fa-pen {
    opacity: 1.0;
    z-index: 10;
  }





  .style-box {
  position: fixed !important;
  top: 65px;
  right: 0;
  display: flex;
  flex-direction: column !important;
  align-items: flex-start;
  gap: 1rem;
  height: auto;
  border-radius: 0.1rem !important;
  min-width: 320px !important;
  overflow: auto;
  padding: 1rem !important;
  height: 90vh;
}

.style-box .style-block {
  display: flex !important;
  flex-direction: column !important;
  gap: 0.2rem;
  width: 100%;
}

.header-group {
  display: flex;
  align-items: flex-start;
  gap: 0.2rem;
  justify-content: space-between;
}

.font-style-group {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  justify-content: flex-start;
}

.font-size-group,
.text-color-group,
.font-bold-group,
.font-underline-group,
.font-italic-group {
  display: flex;
  gap: 0.5rem;
  align-items: center;
  justify-content: flex-start;
}

.font-italic-group label,
.font-bold-group label,
.font-underline-group label {
  margin-bottom: 0 !important;
}

.text-align-group {
  display: flex;
  justify-content: stretch;
}

.style-trigger hr {
  color: slategray;
  height: 0.5px;
}

</style>
@stop 



@section('content')
  @include('snippet.topnav')


  <div class="frame">
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="button-63 float-left btn-left previous" role="button">&laquo; Templates</a>

    <form action="{!! route('template_new_post') !!}" method="POST">             
    @csrf

      <div class="input-group mb-5" style="padding: 10px; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
        <div class="input-group-prepend">
          <span class="input-group-text bg-default" id="basic-addon1" style="color: white;">Template Name</span>
        </div>
        <input type="text" class="form-control" name="title" aria-describedby="basic-addon1" required>
      </div>

      @foreach($sections as $i => $section)
      <div class="style-trigger section" id="section{{ $section->id }}">
        <input type="hidden" name="section{{ $section->id }}_order" class="order" value="{{ $i+1 }}">

        <p class="header-style" id="section{{ $section->id }}_header">{!! $section->title !!}</p>

        @if($section->input_type == "multi")
        <p class="subheader-style" id="section{{ $section->id }}_subheader">Description Header</p>
        <p class="default-style" id="section{{ $section->id }}_subbody">{!! Helper::str_gen('para') !!}</p>
        
        @else
        <p class="default-style" id="section{{ $section->id }}_body">{!! Helper::str_gen($section->input_type) !!}</p>
          
        @endif

        <div class="style-box">

          <div class="style-block">
            <div class="flex gap-2 align-items-center justify-content-between text-center">
              <label for="section{{ $section->id }}_header_show">Hide Header?</label>
              <input type="checkbox" class="toggle" name="section{{ $section->id }}_header_hide" id="section{{ $section->id }}_header_hide" onchange="headerShow(this, '#section{{ $section->id }}_header')"> 
            </div>
            <div class="flex gap-5 justify-content-between align-items-center text-center">
              <button class="btn btn-success btn-sm" type="button" onclick="move('#section{{ $section->id }}', 'up')">
                <div class="flex gap-2">
                  <i class="fa-solid fa-arrow-up"></i>
                  <span> Move Up</span>
                </div>
              </button>
              <button class="btn btn-success btn-sm" type="button" onclick="move('#section{{ $section->id }}', 'down')">
                <div class="flex gap-2">
                  <i class="fa-solid fa-arrow-down"></i>
                  <span> Move Down</span>
                </div>
              </button>
            </div>
            <hr />
          </div>
          <div class="style-block card">
            <h5 class="text-center">Header</h5>
            <div class="font-size-group">
              <label for="section{{ $section->id }}_header_font" class="text-muted">Font:</label>
              <select class="form-control form-control-sm" id="section{{ $section->id }}_header_font" name="section{{ $section->id }}_header_font" onchange="styleFont(this, '#section{{ $section->id }}_header')">
                  <option value="Arial" selected>Arial</option>
                  <option value="Times New Roman">Times New Roman</option>
                  <option value="Verdana">Verdana</option>
                  <!-- Add more font options as needed -->
              </select>
            </div>
            <div class="font-size-group">
              <label class="text-muted" for="section{{ $section->id }}_header_size">Size:</label>
              <input class="form-control form-control-sm w-100" type="number" name="section{{ $section->id }}_header_size" id="section{{ $section->id }}_header_size" value="{{ Helper::css_default('header')['size'] }}" onchange="styleSize(this, '#section{{ $section->id }}_header')">
            </div>
            <div class="text-color-group">
              <label class="text-muted" for="section{{ $section->id }}_header_color">Color:</label>
              <input class="w-100" type="color" name="section{{ $section->id }}_header_color" id="section{{ $section->id }}_header_color" value="{{ Helper::css_default('header')['color'] }}" oninput="styleColor(this, '#section{{ $section->id }}_header')">
            </div>
            <div class="font-size-group">
              <label class="text-muted">Style:</label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_header_bold" id="section{{ $section->id }}_header_bold" onchange="styleBold(this, '#section{{ $section->id }}_header')" autocomplete="off" value="bold" @if(Helper::css_default('header')['bold'] == 'bold') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_header_bold"><i class="fa-solid fa-bold"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_header_italic"  id="section{{ $section->id }}_header_italic"  onchange="styleItalic(this, '#section{{ $section->id }}_header')" @if(Helper::css_default('header')['italic'] == 'italic') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_header_italic"><i class="fa-solid fa-italic"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_header_underline"  id="section{{ $section->id }}_header_underline"  onchange="styleUnderline(this, '#section{{ $section->id }}_header')"  autocomplete="off" @if(Helper::css_default('header')['underline'] == 'underline') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_header_underline"><i class="fa-solid fa-underline"></i></label>
            </div>

            <div class="font-size-group">
              <label for="section{{ $section->id }}_header_align" class="text-muted">Align:</label>
              <div class="btn-group text-align-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" id="align{{ $section->id }}-header-left" name="section{{ $section->id }}_header_align" autocomplete="off" value="left" onchange="styleAlign(this, '#section{{ $section->id }}_header')" @if(Helper::css_default('header')['align'] == 'left') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-header-left"><i class="fa-solid fa-align-left"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-header-center" name="section{{ $section->id }}_header_align" autocomplete="off" value="center" onchange="styleAlign(this, '#section{{ $section->id }}_header')" @if(Helper::css_default('header')['align'] == 'center') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-header-center"><i class="fa-solid fa-align-center"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-header-right" name="section{{ $section->id }}_header_align" autocomplete="off" value="right" onchange="styleAlign(this, '#section{{ $section->id }}_header')" @if(Helper::css_default('header')['align'] == 'right') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-header-right"><i class="fa-solid fa-align-right"></i></label>
              </div>
            </div>
          </div>

          <hr />



          @if($section->input_type == "multi")
          <div class="style-block card">
            <h5 class="text-center">Sub Header</h5>
            <div class="font-size-group">
              <label for="section{{ $section->id }}_subheader_font" class="text-muted">Font:</label>
              <select class="form-control form-control-sm" id="section{{ $section->id }}_subheader_font" name="section{{ $section->id }}_subheader_font" onchange="styleFont(this, '#section{{ $section->id }}_subheader')">
                  <option value="Arial" selected>Arial</option>
                  <option value="Times New Roman">Times New Roman</option>
                  <option value="Verdana">Verdana</option>
                  <!-- Add more font options as needed -->
              </select>
            </div>
            <div class="font-size-group">
              <label class="text-muted" for="section{{ $section->id }}_subheader_size">Size:</label>
              <input class="form-control form-control-sm w-100" type="number" name="section{{ $section->id }}_subheader_size" id="section{{ $section->id }}_subheader_size" value="{{ Helper::css_default('subheader')['size'] }}" onchange="styleSize(this, '#section{{ $section->id }}_subheader')">
            </div>
            <div class="text-color-group">
              <label class="text-muted" for="section{{ $section->id }}_subheader_color">Color:</label>
              <input class="w-100" type="color" name="section{{ $section->id }}_subheader_color" id="section{{ $section->id }}_subheader_color" value="{{ Helper::css_default('subheader')['color'] }}" oninput="styleColor(this, '#section{{ $section->id }}_subheader')">
            </div>
            <div class="font-size-group">
              <label class="text-muted">Style:</label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_subheader_bold" id="section{{ $section->id }}_subheader_bold" onchange="styleBold(this, '#section{{ $section->id }}_subheader')" autocomplete="off" value="bold" @if(Helper::css_default('subheader')['bold'] == 'bold') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_subheader_bold"><i class="fa-solid fa-bold"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_subheader_italic"  id="section{{ $section->id }}_subheader_italic"  onchange="styleItalic(this, '#section{{ $section->id }}_subheader')" @if(Helper::css_default('subheader')['italic'] == 'italic') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_subheader_italic"><i class="fa-solid fa-italic"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_subheader_underline"  id="section{{ $section->id }}_subheader_underline"  onchange="styleUnderline(this, '#section{{ $section->id }}_subheader')"  autocomplete="off" @if(Helper::css_default('subheader')['underline'] == 'underline') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_subheader_underline"><i class="fa-solid fa-underline"></i></label>
            </div>
            <div class="font-size-group">
              <label for="section{{ $section->id }}_subheader_align" class="text-muted">Align:</label>
              <div class="btn-group text-align-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" id="align{{ $section->id }}-subheader-left" name="section{{ $section->id }}_subheader_align" autocomplete="off" value="left" onchange="styleAlign(this, '#section{{ $section->id }}_subheader')" @if(Helper::css_default('subheader')['align'] == 'left') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-subheader-left"><i class="fa-solid fa-align-left"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-subheader-center" name="section{{ $section->id }}_subheader_align" autocomplete="off" value="center" onchange="styleAlign(this, '#section{{ $section->id }}_subheader')" @if(Helper::css_default('subheader')['align'] == 'center') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-subheader-center"><i class="fa-solid fa-align-center"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-subheader-right" name="section{{ $section->id }}_subheader_align" autocomplete="off" value="right" onchange="styleAlign(this, '#section{{ $section->id }}_subheader')" @if(Helper::css_default('subheader')['align'] == 'right') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-subheader-right"><i class="fa-solid fa-align-right"></i></label>
              </div>
            </div>
          </div>

          <div class="style-block card">
            <h5 class="text-center">Body</h5>
            <div class="font-size-group">
              <label for="section{{ $section->id }}_subbody_font" class="text-muted">Font:</label>
              <select class="form-control form-control-sm" id="section{{ $section->id }}_subbody_font" name="section{{ $section->id }}_subbody_font" onchange="styleFont(this, '#section{{ $section->id }}_subbody')">
                  <option value="Arial" selected>Arial</option>
                  <option value="Times New Roman">Times New Roman</option>
                  <option value="Verdana">Verdana</option>
                  <!-- Add more font options as needed -->
              </select>
            </div>
            <div class="font-size-group">
              <label class="text-muted" for="section{{ $section->id }}_subbody_size">Size:</label>
              <input class="form-control form-control-sm w-100" type="number" name="section{{ $section->id }}_subbody_size" id="section{{ $section->id }}_subbody_size" value="{{ Helper::css_default('body')['size'] }}" onchange="styleSize(this, '#section{{ $section->id }}_subbody')">
            </div>
            <div class="text-color-group">
              <label class="text-muted" for="section{{ $section->id }}_subbody_color">Color:</label>
              <input class="w-100" type="color" name="section{{ $section->id }}_subbody_color" id="section{{ $section->id }}_subbody_color" value="{{ Helper::css_default('body')['color'] }}" oninput="styleColor(this, '#section{{ $section->id }}_subbody')">
            </div>
            <div class="font-size-group">
              <label class="text-muted">Style:</label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_subbody_bold" id="section{{ $section->id }}_subbody_bold" onchange="styleBold(this, '#section{{ $section->id }}_subbody')" autocomplete="off" value="bold" @if(Helper::css_default('body')['bold'] == 'bold') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_subbody_bold"><i class="fa-solid fa-bold"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_subbody_italic"  id="section{{ $section->id }}_subbody_italic"  onchange="styleItalic(this, '#section{{ $section->id }}_subbody')" @if(Helper::css_default('body')['italic'] == 'italic') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_subbody_italic"><i class="fa-solid fa-italic"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_subbody_underline"  id="section{{ $section->id }}_subbody_underline"  onchange="styleUnderline(this, '#section{{ $section->id }}_subbody')"  autocomplete="off" @if(Helper::css_default('body')['underline'] == 'underline') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_subbody_underline"><i class="fa-solid fa-underline"></i></label>
            </div>
            <div class="font-size-group">
              <label for="section{{ $section->id }}_subbody_align" class="text-muted">Align:</label>
              <div class="btn-group text-align-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" id="align{{ $section->id }}-subbody-left" name="section{{ $section->id }}_subbody_align" autocomplete="off" value="left" onchange="styleAlign(this, '#section{{ $section->id }}_subbody')" @if(Helper::css_default('body')['align'] == 'left') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-subbody-left"><i class="fa-solid fa-align-left"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-subbody-center" name="section{{ $section->id }}_subbody_align" autocomplete="off" value="center" onchange="styleAlign(this, '#section{{ $section->id }}_subbody')" @if(Helper::css_default('body')['align'] == 'center') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-subbody-center"><i class="fa-solid fa-align-center"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-subbody-right" name="section{{ $section->id }}_subbody_align" autocomplete="off" value="right" onchange="styleAlign(this, '#section{{ $section->id }}_subbody')" @if(Helper::css_default('body')['align'] == 'right') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-subbody-right"><i class="fa-solid fa-align-right"></i></label>
              </div>
            </div>
          </div>
          
          @else
          <div class="style-block card">
            <h5 class="text-center">Body</h5>
            <div class="font-size-group">
              <label for="section{{ $section->id }}_body_font" class="text-muted">Font:</label>
              <select class="form-control form-control-sm" id="section{{ $section->id }}_body_font" name="section{{ $section->id }}_body_font" onchange="styleFont(this, '#section{{ $section->id }}_body')">
                  <option value="Arial" selected>Arial</option>
                  <option value="Times New Roman">Times New Roman</option>
                  <option value="Verdana">Verdana</option>
                  <!-- Add more font options as needed -->
              </select>
            </div>
            <div class="font-size-group">
              <label class="text-muted" for="section{{ $section->id }}_body_size">Size:</label>
              <input class="form-control form-control-sm w-100" type="number" name="section{{ $section->id }}_body_size" id="section{{ $section->id }}_body_size" value="{{ Helper::css_default('body')['size'] }}" onchange="styleSize(this, '#section{{ $section->id }}_body')">
            </div>
            <div class="text-color-group">
              <label class="text-muted" for="section{{ $section->id }}_body_color">Color:</label>
              <input class="w-100" type="color" name="section{{ $section->id }}_body_color" id="section{{ $section->id }}_body_color" value="{{ Helper::css_default('body')['color'] }}" oninput="styleColor(this, '#section{{ $section->id }}_body')">
            </div>
            <div class="font-size-group">
              <label class="text-muted">Style:</label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_body_bold" id="section{{ $section->id }}_body_bold" onchange="styleBold(this, '#section{{ $section->id }}_body')" autocomplete="off" value="bold" @if(Helper::css_default('body')['bold'] == 'bold') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_body_bold"><i class="fa-solid fa-bold"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_body_italic"  id="section{{ $section->id }}_body_italic"  onchange="styleItalic(this, '#section{{ $section->id }}_body')" @if(Helper::css_default('body')['italic'] == 'italic') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_body_italic"><i class="fa-solid fa-italic"></i></label>
              <input type="checkbox" class="btn-check" name="section{{ $section->id }}_body_underline"  id="section{{ $section->id }}_body_underline"  onchange="styleUnderline(this, '#section{{ $section->id }}_body')"  autocomplete="off" @if(Helper::css_default('body')['underline'] == 'underline') checked @endif
              />
              <label class="btn btn-outline-secondary w-100 btn-sm" for="section{{ $section->id }}_body_underline"><i class="fa-solid fa-underline"></i></label>
            </div>
            <div class="font-size-group">
              <label for="section{{ $section->id }}_body_align" class="text-muted">Align:</label>
              <div class="btn-group text-align-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" id="align{{ $section->id }}-body-left" name="section{{ $section->id }}_body_align" autocomplete="off" value="left" onchange="styleAlign(this, '#section{{ $section->id }}_body')" @if(Helper::css_default('body')['align'] == 'left') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-body-left"><i class="fa-solid fa-align-left"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-body-center" name="section{{ $section->id }}_body_align" autocomplete="off" value="center" onchange="styleAlign(this, '#section{{ $section->id }}_body')" @if(Helper::css_default('body')['align'] == 'center') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-body-center"><i class="fa-solid fa-align-center"></i></label>
                <input type="radio" class="btn-check" id="align{{ $section->id }}-body-right" name="section{{ $section->id }}_body_align" autocomplete="off" value="right" onchange="styleAlign(this, '#section{{ $section->id }}_body')" @if(Helper::css_default('body')['align'] == 'right') checked @endif
                />
                <label class="btn btn-outline-secondary w-100 btn-sm" for="align{{ $section->id }}-body-right"><i class="fa-solid fa-align-right"></i></label>
              </div>
            </div>
          </div>
          
          @endif

        </div>
      </div>


      @endforeach 
      <div class="col-12 text-center mt-5">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    
    </form>
  </div>



@stop

@section('js')
<script type="text/javascript">
  
  $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        searchResultLimit:5,
        renderChoiceLimit:5
      }); 
     
     
 });

  function styleFont(ele, target){
    $(target).css('font-family', $(ele).val());
  }

  function styleSize(ele, target){
    $(target).css('font-size', parseInt($(ele).val()));
  }

  function styleColor(ele, target){
    $(target).css('color', $(ele).val());
  }

  function styleBold(ele, target){
    if ($(ele).is(":checked")){
      $(target).css('font-weight', "bold");
    } else {
      $(target).css('font-weight', "normal");
    }
  }

  function styleItalic(ele, target){
    if ($(ele).is(":checked")){
      $(target).css('font-style', "italic");
    } else {
      $(target).css('font-style', "normal");
    }
  }

  function styleUnderline(ele, target){
    if ($(ele).is(":checked")){
      $(target).css('text-decoration', "underline");
    } else {
      $(target).css('text-decoration', "none");
    }
  }

  function styleAlign(ele, target){
    $(target).css('text-align', $(ele).val());
  }

  function headerShow(ele, target){
    if ($(ele).is(":checked")){
      $(target).hide();
    } else {
      $(target).show();
    }
  }

  function move(ele, dirct){
    if(dirct == 'up'){
      if($(ele).prev('.section').attr('id') !== undefined){
        var target = '#'+ $(ele).prev('.section').attr('id');
        $(ele).insertBefore( target );
      }

    }else if(dirct == 'down') {
      if($(ele).next('.section').attr('id') !== undefined){
        var target = '#'+ $(ele).next('.section').attr('id');
        $(ele).insertAfter( target ); 
      }
    }
    reOrder('.section');
  }

  function reOrder(ele){
    $( ele ).each(function( index ) {
      $(this).children('.order').val( index + 1 );
    });

  }
  
</script>




@stop


