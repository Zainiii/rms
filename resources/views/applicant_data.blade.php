@extends('snippet.header')

@section('title')Applicants @stop

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

  <div class="container col-md-10 bg-white mt-5 p-5">
    <a class="btn btn-success float-right" href="{{ route('applicant_new') }}" >Add New</a>
    <h3>Applicants</h3>

    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            @foreach($sections as $section)
            <th scope="col">{{ $section->title }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($applicants as $applicant)
          <tr>
            @foreach($sections as $i=>$section)
            @php
              $resume = $applicant->resume->where('section_id',$section->id)->first();
            @endphp

            @if($i==0)
            <th scope="row">{{ $resume?->data }}</th>

            @else
            <td>
              @if($resume != null)
              @if(strlen($resume->data) >= 40) {{ substr($resume->data, 0, 40). " ... " }} @else {{ $resume->data }} @endif
              
              @if($section->input_type == 'para') 
              <span class="badge badge-primary" style="cursor: pointer;" data-toggle="modal" data-target="#modal{{ $resume->id }}">Show More!</span>
              <div class="modal fade" id="modal{{ $resume->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $resume->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal{{ $resume->id }}Label">{{$section->title}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      {{ $resume->data }}
                    </div>
                  </div>
                </div>
              </div>

              @elseif($section->input_type == 'multi')
              <span class="badge badge-primary" style="cursor: pointer;" data-toggle="modal" data-target="#modal{{ $resume->id }}">View!</span>
              <div class="modal fade" id="modal{{ $resume->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $resume->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal{{ $resume->id }}Label">{{$section->title}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      @foreach($resume->subSections as $sub_section)
                      <h5>{{ $sub_section->title }}</h5>
                      <p>{!! $sub_section->data !!}</p>
                      <hr>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>

              @endif
              @endif
             </td>

            @endif
            @endforeach
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

  </div>


@stop