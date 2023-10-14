@extends('snippet.header')

@section('title')Applicants @stop

@section('style')
<link rel="stylesheet" href="{{ asset('css/beauty-btn.css') }}">
@stop 

@section('content')

  @include('snippet.topnav')

  @include('snippet.message')

  <div class="container col-md-10 bg-white mt-5 p-5">
    <a class="btn btn-success float-right" href="{{ route('applicant_new') }}" >Add New</a>
    <h3>Applicants</h3>

    <div class="table-responsive">
      @if(count($applicants) > 0)
      <table class="table table-hover">
        <thead>
          <tr>
            @foreach($sections as $section)
            <th scope="col">{{ $section->title }}</th>
            @endforeach
            <th scope="col">Tags</th>
            <th scope="col">Templates</th>
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
              
              @if($section->input_type == 'para' && strlen($resume->data) >= 40) 
              <span class="badge badge-primary" style="cursor: pointer;" data-toggle="modal" data-target="#modal{{ $applicant->id }}-sect{{ $resume->id }}">Show More!</span>
              <div class="modal fade" id="modal{{ $applicant->id }}-sect{{ $resume->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $applicant->id }}-sect{{ $resume->id }}-label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal{{ $applicant->id }}-sect{{ $resume->id }}-label">{{$section->title}}</h5>
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
              @if(count($resume->subSections) > 0)
              <span class="badge badge-primary" style="cursor: pointer;" data-toggle="modal" data-target="#modal{{ $applicant->id }}-sect{{ $resume->id }}">View!</span>
              <div class="modal fade" id="modal{{ $applicant->id }}-sect{{ $resume->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $applicant->id }}-sect{{ $resume->id }}-label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal{{ $applicant->id }}-sect{{ $resume->id }}-label">{{$section->title}}</h5>
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
              @else
              -
              @endif

              @endif
              @endif
             </td>

            @endif
            @endforeach
            <td>
              @if(count($applicant->tags) > 0)
              <span class="badge badge-primary" style="cursor: pointer;" data-toggle="modal" data-target="#modal{{ $applicant->id }}-tags">View Tags!</span>
              <div class="modal fade" id="modal{{ $applicant->id }}-tags" tabindex="-1" role="dialog" aria-labelledby="modal{{ $applicant->id }}-tags-label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal{{ $applicant->id }}-tags-label">Tags</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      @foreach($applicant->tags as $tag)
                      <span class="badge bg-default">{{ $tag->tag_name }}</span>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              @else
              -
              @endif
            </td>

            <td>
              <div class="col-6 text-right">
                <a href="{{ route('templates', $applicant->id) }}" class="border relative inline-flex items-center px-7 py-1 overflow-hidden text-sm font-medium bg-default text-white text-indigo-600 border-2 border-indigo-600 rounded-full group">
                  <span class="absolute right-0 flex items-center justify-start w-6 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                  </span>
                  <span class="relative">Generate</span>
                </a>
              </div>
            </td>

          </tr>
          @endforeach

        </tbody>
      </table>

      @else
      @include('snippet.no_data', ['header'=>'No Applicant Has Been Added Yet.', 'body'=>'Click <b>Add New</b> button to make a new one.'])

      @endif
    </div>

  </div>


@stop