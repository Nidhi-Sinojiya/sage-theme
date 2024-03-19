@if($fluxContetData)
	@foreach($fluxContetData as $content)

	@if($content->layout == 'banner')
		@include('partials.sections.banner')

	@elseif($content->layout == 'discover_with_sites')
		@include('partials.sections.discover_with_sites')

	@elseif($content->layout == 'simple_content')
		@include('partials.sections.simple_content')

	@elseif($content->layout == 'full_width_image_with_content')
		@include('partials.sections.full_width_image_with_content')

	@elseif($content->layout == 'image_boxes')
		@include('partials.sections.image_boxes')

	@elseif($content->layout == 'testimonials')
		@include('partials.sections.testimonials')

	@elseif($content->layout == 'image_boxes_with_tab')
		@include('partials.sections.image_boxes_with_tab')
		
	@elseif($content->layout == 'gallery')
		@include('partials.sections.gallery')

	@elseif($content->layout == 'image_with_content')
		@include('partials.sections.image_with_content')
	
	@elseif($content->layout == 'discover_properties')
		@include('partials.sections.discover_properties')

	@elseif($content->layout == 'page_grid')
		@include('partials.sections.page_grid')

	@elseif($content->layout == 'simple_tab')
		@include('partials.sections.simple_tab')
		
	@elseif($content->layout == 'press_tab')
		@include('partials.sections.press_tab')

	@elseif($content->layout == 'gallery_with_fancybox')
		@include('partials.sections.gallery_with_fancybox')

	@elseif($content->layout == 'accordion')
		@include('partials.sections.accordion')

	@elseif($content->layout == 'image_slider_with_sidebar_content')
		@include('partials.sections.image_slider_with_sidebar_content')

	@elseif($content->layout == 'rates_table')
		@include('partials.sections.rates_table')

	@elseif($content->layout == 'terms_for_rates')
		@include('partials.sections.terms_for_rates')

	@elseif($content->layout == 'faq')
		@include('partials.sections.faq')

	@elseif($content->layout == 'discover_offers_card')
		@include('partials.sections.discover_offers_card')

	@elseif($content->layout == 'stay_list')
		@include('partials.sections.stay_list')
	
	@elseif($content->layout == 'experiences_with_fancybox')
		@include('partials.sections.experiences_with_fancybox')	
	
	@elseif($content->layout == 'typical_day_content')
		@include('partials.sections.typical_day_content')

	@elseif($content->layout == 'image_with_content_popup')
		@include('partials.sections.image_with_content_popup')

	@elseif($content->layout == 'meet_the_team')
		@include('partials.sections.meet_the_team')

	@elseif($content->layout == 'contact_details')
		@include('partials.sections.contact_details')	

	@endif

	@endforeach

@endif

