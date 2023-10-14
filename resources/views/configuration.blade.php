@extends('snippet.header')

@section('title')Configuration @stop

@section('style')
<style type="text/css">
select{
  min-width:140px !important;
  border-radius:5px !important;
}

select:focus{
  outline:none;
}
</style>

@endsection

@section('content')

  @include('snippet.topnav')


  <div class="container">    
    <div class="row">
      @include('snippet.message')
        
      <div class="col-md-6 bg-white mt-5 mr-2 pt-5 pb-5 row g-3" style="height: fit-content;">
        <h3 class="text-center mb-5">Sections</h3>

        <form class="form-inline text-center" action="{{ route('update_section') }}" method="POST">             
        @csrf
          <div class="col-md-12">
            <input type="text" class="form-control" name="title" placeholder="New Section">
            <select name="input_type">
              <option value="text" selected>Text</option>
              <option value="longtext">Long Text</option>
              <option value="para">Paragraph</option>
              <option value="multi">Multi Level</option>
            </select>
            <button type="submit" class="btn btn-primary">Add Section</button>
          </div>    
        </form>
        
        <hr/>

        @foreach($sections as $section)
        <form class="form-inline text-center" action="{{ route('update_section', $section->id) }}" method="POST">
        @csrf
          <div class="col-md-12">
            <input type="text" class="form-control" style="border:2px solid;" name="title" placeholder="{{ $section->title }}" value="{{ $section->title }}">
            <select name="input_type">
              <option value="text" @if($section->input_type == 'text') selected @endif>Text</option>
              <option value="longtext" @if($section->input_type == 'longtext') selected @endif>Long Text</option>
              <option value="para" @if($section->input_type == 'para') selected @endif>Paragraph</option>
              <option value="multi" @if($section->input_type == 'multi') selected @endif>Multi Level</option>
            </select>
            <button type="submit" class="btn btn-outline-primary">Update</button>
          </div>    
        </form>
        @endforeach

      </div>

      <div class="col-md-6 bg-white mt-5 ml-2 p-5 row g-3" style="height: fit-content;">
        <h3 class="text-center mb-5">Tags</h3>

        <form class="form-inline text-center" action="{{ route('update_tag') }}" method="POST">             
        @csrf
          <div class="col-md-12">
            <input type="text" class="form-control" name="tag_name" placeholder="New Tag">
            <button type="submit" class="btn btn-primary">Add Tag</button>
          </div>    
        </form>
        
        <hr/>

        @foreach($tags as $tag)
        <form class="form-inline text-center" action="{{ route('update_tag', $tag->id) }}" method="POST">
        @csrf
          <div class="col-md-12">
            <input type="text" class="form-control" style="border:2px solid;" name="tag_name" placeholder="{{ $tag->tag_name }}" value="{{ $tag->tag_name }}">
            <button type="submit" class="btn btn-outline-primary">Update</button>
          </div>    
        </form>
        @endforeach

      </div>


    </div>
  </div>


@stop

@section('js')
<script type="text/javascript">
</script>
@stop