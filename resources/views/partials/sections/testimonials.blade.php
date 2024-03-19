@if($content->hide_section == 'no')
@php $cat_id = $content->testimonial_category; $category = get_term( $cat_id, 'testimonial_category' );
if( !is_front_page() && is_home() ){ $header_style = get_field('header_style', get_option('page_for_posts')); } else { $header_style = get_field('header_style', get_the_ID()); }
if(is_single() && 'post' == get_post_type() ){
    $header_style = 'wilder';
}
@endphp
<section class="fade-ani relative py-120 lgscreen:py-60 pb-80 @if($content->extra_class){{$content->extra_class}}@endif @if($header_style != 'wilder') micro-testimonials bg-color @else testimonials @endif"
    @if($content->id) id="{{$content->id}}" @endif>
    <div class="w-[782px] lgscreen:w-full px-20 m-auto text-center relative">
        <span class="uppercase text-gray-100 text-13 font-600 fade-ani-one">{!! $category->name !!}</span>
        <div class="swiper lg:mt-50 mt-25 fade-ani-two @if($header_style != 'wilder') micro-testimonials-slider @else testimonials-slider @endif">
            <div class="swiper-wrapper">
                @foreach( $content->testimonial_data as $data)
                <div class="swiper-slide">
                    <h6>{!! $data['content'] !!}</h6>
                    <span class="text-gray-100 uppercase font-400 mt-30 inline-block text-10">{!! $data['title']
                        !!}</span>
                </div>
                @endforeach
            </div>
            <div class="@if($header_style != 'wilder') swiper-pagination-micro @else swiper-pagination @endif"></div>
        </div>
    </div>
</section>
@endif