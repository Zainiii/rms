@extends('snippet.header')

@section('title')Add Resume @stop

@section('style')
<style type="text/css">
    body {
      background-color: #51c0ff;
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

    .mt-100{margin-top: 100px}body{background: #00B4DB;background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);background: linear-gradient(to right, #0083B0, #00B4DB);color: #514B64;min-height: 100vh}

</style>
@stop 

@section('content')

  @include('snippet.topnav')

  <div class="container">
    <div class="row">

      <form class="row" action="{!! route('applicant_new_post') !!}" method="POST">             
        @csrf
        
        <div class="col-md-8 bg-white mt-5 p-5 row g-3">
          <h3 class="text-center">Add Resume Data</h3>
          
          @if($errors->any())
          <div class="alert alert-success" role="alert">
            {{ $errors->first() }}
          </div>
          @endif

          @foreach($sections as $section)

          @if($section->input_type == 'para')
          <div class="input-group col-md-12">
            <div class="input-group">
              <label for="input{!! $section->id !!}" class="form-label">{!! $section->title !!}</label>
            </div>
            <textarea class="form-control" rows="6" aria-label="{!! $section->title !!}" name="input_{!! $section->id !!}"></textarea>
          </div>

          @elseif($section->input_type == 'multi')
          <div class="card border-info mb-12">
            <h3 class="card-header text-white bg-info">{!! $section->title !!}</h3>
            <div class="card-body" id="container-{!! $section->id !!}">
              <input type="hidden" id="counter-{!! $section->id !!}" value="1">
              <div id="subsection{!! $section->id !!}-inputs-1">
                <button type="button" class="badge badge-danger float-right" onclick="removeSection('#subsection{!! $section->id !!}-inputs-1')" style="cursor: pointer;position: relative;z-index: 1;">Remove</button>
                <div class="col-md-12 panel panel-info">
                  <label for="input{!! $section->id !!}-title-1" class="form-label">Title</label>
                  <input type="text" class="form-control" name="input_{!! $section->id !!}_title[]" id="input{!! $section->id !!}-title-1">
                </div>
                <div class="input-group col-md-12">
                  <div class="input-group">
                    <label for="input{!! $section->id !!}-detail-1" class="form-label">Details</label>
                  </div>
                  <textarea rows="5" class="form-control" aria-label="{!! $section->title !!}" name="input_{!! $section->id !!}_data[]" id="input{!! $section->id !!}-detail-1"></textarea>
                </div>
                <hr class="mt-5"></hr>
              </div>
            </div>

            <div class="text-center mb-2">
              <button type="button" class="btn btn-primary btn-sm bg-info mt-3" onclick="addMoreSubSections({!! $section->id !!})" >Add More</button>
            </div>
          </div>

          

          @else 
          <div class="@if($section->input_type == 'text') col-md-6 @else col-md-12 @endif">
            <label for="input{!! $section->id !!}" class="form-label">{!! $section->title !!}</label>
            <input type="text" class="form-control" name="input_{!! $section->id !!}">
          </div>

          @endif
          @endforeach

          <div class="col-12 text-center mt-5">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        </div>

        <div class="col-md-3 bg-white mt-5 ml-5 p-1 pt-5" style="height: fit-content;">
          <h3 class="text-center">Select Tags</h3>

          <div class="row d-flex justify-content-center mt-5 mb-5">
            <div class="col-md-12"> 
              <select id="choices-multiple-remove-button" name="tags[]" placeholder="Select tags" multiple>
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->tag_name}}</option>                
                @endforeach
              </select> 
            </div>
          </div>


        </div>
      </form>

    </div>
  </div>


@stop

@section('js')
<script type="text/javascript">
  
  function addMoreSubSections(section_id) {
    var counter = parseInt($('#counter-'+section_id).val())+1;
    $('#counter-'+section_id).val(counter);

    $('#container-'+section_id).append('<div id="subsection'+section_id+'-inputs-'+counter+'"><button type="button" class="badge badge-danger float-right" onclick="removeSection(\'#subsection'+section_id+'-inputs-'+counter+'\')" style="cursor: pointer;position: relative;z-index: 1;">Remove</button><div class="col-md-12 panel panel-info"><label for="input'+section_id+'-title-'+counter+'" class="form-label">Title</label><input type="text" class="form-control" name="input_'+section_id+'_title[]" id="input'+section_id+'-title-'+counter+'"></div><div class="input-group col-md-12"><div class="input-group"><label for="input'+section_id+'-detail-'+counter+'" class="form-label">Details</label></div><textarea rows="5" class="form-control" aria-label="'+section_id+'" name="input_'+section_id+'_data[]" id="input'+section_id+'-detail-'+counter+'"></textarea></div><hr class="mt-5"></hr></div>');
    
  }

  function removeSection(subSection) {
    $(subSection).remove();
  }

  $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        searchResultLimit:5,
        renderChoiceLimit:5
      }); 
     
     
 });

</script>
@stop