@if($fluxContetData)
	@foreach($fluxContetData as $content)

		@if($content->layout == 'banner')
			@include('partials.sections.banner')

		@elseif($content->layout == 'simple_content')
			@include('partials.sections.simple_content')

		@elseif($content->layout == 'image_with_content')
			@include('partials.sections.image_with_content')

		@elseif($content->layout == 'image_slider')
			@include('partials.sections.gallery')

		@elseif($content->layout == 'page_grid')
			@include('partials.sections.page_grid')

		@elseif($content->layout == 'related_stay')
			@include('partials.sections.related_stay')
		
		@elseif($content->layout == 'testimonials')
			@include('partials.sections.testimonials')
			
			
		@endif

	@endforeach

@endif
