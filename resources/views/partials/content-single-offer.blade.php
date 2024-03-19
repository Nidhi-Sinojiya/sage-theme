@if($fluxContetData)
	@foreach($fluxContetData as $content)

		@if($content->layout == 'banner')
			@include('partials.sections.banner')		

		@elseif($content->layout == 'image_slider')
			@include('partials.sections.gallery')

		@elseif($content->layout == 'page_grid')
			@include('partials.sections.page_grid')

		@elseif($content->layout == 'testimonials')
			@include('partials.sections.testimonials')

		@elseif($content->layout == 'terms_for_rates')
			@include('partials.sections.terms_for_rates')
		
		@elseif($content->layout == 'offer_details_with_tab')
			@include('partials.sections.offer_details_with_tab')
			
			
		@endif

	@endforeach

@endif
