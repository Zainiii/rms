@extends('snippet.header')

@section('title')Templates @stop

@section('content')
<!-- Page Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>

@include('snippet.topnav')

<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/bg (3).jpg">
</div>

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Templates
        </h2>
    </div>
    <div class="row tm-mb-90 tm-gallery">
        @foreach($templates as $template)
    	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
            <figure class="effect-ming tm-video-item">
                <img src="img/bg (1).jpg" alt="{!! $template->title !!}" class="img-fluid">
                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2>{!! $template->title !!}</h2>
                    <a target="_blank" href="{{ route('template.view', $template->id) }}">View</a>
                </figcaption>                    
            </figure>
        </div>
        @endforeach            
               
    </div> <!-- row -->
    
</div> <!-- container-fluid, tm-container-content -->

@include('snippet.footer')

<script src="js/plugins.js"></script>
<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });
</script>

@stop