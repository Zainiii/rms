@extends('snippet.header')

@section('title')Templates @stop

@section('style')
    <link rel="stylesheet" href="{{ asset('css/beauty-btn.css') }}">
    <style type="text/css">
      body {
        background-color: white !important;
        background-image: none !important;
      }

    .bg-dark1{
        width: 100%;
        height: 573px;
        background-color: #0000009e;
        position: absolute;
        margin-top: -572px;
    }
    .banner-header{
        color:white;
        font-family: sans-serif;
        font-size: 64px;
        margin-top: 150px;
    }

    </style>
@endsection


@section('content')
@include('snippet.topnav')

@if($applicant_id == null)
<video playsinline autoplay muted loop poster="polina.jpg" id="bgvid">
  <source src="vid.mp4" type="video/mp4">
</video>
<div class="bg-dark1">
    <h1 class="banner-header text-center">Welcome To The</h1>
    <h1 class="banner-header text-center" style="margin-top: 50px; font-size:78px;"><b style="color: #8ad6ff;">Easiness</b> Of <b style="color: #ecb1ff;">Recruitment</b></h1>
</div>

@endif

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 clr-default">
            @if($applicant_id == null)
            Templates
            @else
            Select Template
            @endif
        </h2>
        
        @if($applicant_id == null)
        <div class="col-6 text-right">
          <a href="{{ route('builder') }}" class="border relative inline-flex items-center px-12 py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
            <span class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
            <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
              </svg>
            </span>
            <span class="relative">Template Generator</span>
          </a>
        </div>
        @endif
    </div>
    <div class="row tm-mb-90 tm-gallery">
        @if(count($templates) > 0)
        @foreach($templates as $template)
    	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="{{ asset('img/bg (1).jpg') }}" alt="{!! $template->title !!}" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>{!! $template->title !!}</h2>
                    @if($applicant_id == null)
                    <a href="{{ route('template.view', $template->id) }}">View</a>
                    @else
                    <a href="{{ route('template.view', [$template->id, $applicant_id]) }}">View</a>                    
                    @endif
                </figcaption>                    
            </figure>
        </div>
        @endforeach
        
        @else
        @include('snippet.no_data', ['header'=>'No Template Has Been Added Yet.', 'body'=>'Go to <b>Template Genrator</b> to make a new one.'])
        @endif

    </div> <!-- row -->
    
</div> <!-- container-fluid, tm-container-content -->

@include('snippet.footer')

<script src="{{ asset('js/plugins.js') }}"></script>
<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });
</script>

@stop