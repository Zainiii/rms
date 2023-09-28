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
</style>
@stop 

@section('content')

  @include('snippet.topnav')

  <div class="container col-md-6 bg-white mt-5 p-5">
    <h3 class="text-center">Add Resume Data</h3>
    <form  class="row g-3" action="{!! route('applicant_new_post') !!}" method="POST">             
      @csrf
      @foreach($sections as $section)

      @if($section->input_type == 'para')
      <div class="input-group col-md-12">
        <div class="input-group">
          <label for="input{!! $section->id !!}" class="form-label">{!! $section->title !!}</label>
        </div>
        <textarea class="form-control" rows="6" aria-label="{!! $section->title !!}" name="input-{!! $section->id !!}"></textarea>
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
              <input type="text" class="form-control" name="input-{!! $section->id !!}-title[]" id="input{!! $section->id !!}-title-1">
            </div>
            <div class="input-group col-md-12">
              <div class="input-group">
                <label for="input{!! $section->id !!}-detail-1" class="form-label">Details</label>
              </div>
              <textarea rows="5" class="form-control" aria-label="{!! $section->title !!}" name="input-{!! $section->id !!}-data[]" id="input{!! $section->id !!}-detail-1"></textarea>
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
        <input type="text" class="form-control" name="input-{!! $section->id !!}">
      </div>

      @endif
      @endforeach


      <div class="col-12 text-center mt-5">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </form>
  </div>


@stop

@section('js')
<script type="text/javascript">
  
  function addMoreSubSections(section_id) {
    var counter = parseInt($('#counter-'+section_id).val())+1;
    $('#counter-'+section_id).val(counter);

    $('#container-'+section_id).append('<div id="subsection'+section_id+'-inputs-'+counter+'"><button type="button" class="badge badge-danger float-right" onclick="removeSection(\'#subsection'+section_id+'-inputs-'+counter+'\')" style="cursor: pointer;position: relative;z-index: 1;">Remove</button><div class="col-md-12 panel panel-info"><label for="input'+section_id+'-title-'+counter+'" class="form-label">Title</label><input type="text" class="form-control" id="input'+section_id+'-title-'+counter+'"></div><div class="input-group col-md-12"><div class="input-group"><label for="input'+section_id+'-detail-'+counter+'" class="form-label">Details</label></div><textarea rows="5" class="form-control" aria-label="'+section_id+'"  id="input'+section_id+'-detail-'+counter+'"></textarea></div><hr class="mt-5"></hr></div>');
    
  }

  function removeSection(subSection) {
    $(subSection).remove();
  }

</script>
@stop