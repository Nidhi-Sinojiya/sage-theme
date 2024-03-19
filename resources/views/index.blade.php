@extends('layouts.app')
@section('content')
@if($blog_post)
	@foreach($blog_post as $content)

	  @if($content->layout == 'banner')
      @include('partials.sections.banner')

    @elseif($content->layout == 'simple_content')
		  @include('partials.sections.simple_content')

    @elseif($content->layout == 'post_with_tab')
		  @include('partials.sections.post_with_tab')

    @elseif($content->layout == 'testimonials')
		  @include('partials.sections.testimonials')

    @elseif($content->layout == 'page_grid')
		  @include('partials.sections.page_grid')

    @endif

	@endforeach
@endif
@endsection