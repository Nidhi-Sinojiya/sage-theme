@extends('layouts.app')
@section('content')
<section class="banner inner-banner small-banner relative h-screen pt-30 pb-0 fade-ani is-visible">
    <div class="container-fluid h-full">
        <div class="overflow-hidden h-full">
            <img src="{!! $search_image['url'] !!}" class="w-full h-[calc(100vh_-_30px)] object-cover block"
                alt="Banner">
        </div>
        <div
            class="absolute top-50per left-50per text-center translate-x-minus_50 translate-y-minus_50 pt-80 w-[calc(100%_-_60px)] px-20 z-9">
            <h1 class="text-white fade-ani-one">Search results</h1>
        </div>
    </div>
</section>
@if (! have_posts())
<section class="search text-center py-60">
    <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>
    {!! get_search_form(false) !!}
</section>
@else
<section class="common-content lg:py-60 py-30 lg:mt-20 mt-0 fade-ani is-visible">
    <div class="px-30">
        <div
            class="title-with-icon flex flex-wrap items-start gap-x-6 lgscreen:justify-center lgscreen:pb-20 pl-20 lgscreen:pl-0">
            <img src="@asset('images/title-icon-slateblue.png')" class="w-[48px] fade-ani-one" alt="Icon">
            <div class="title-info w-[978px] xlscreen:w-[850px] lgscreen:w-full lgscreen:text-center lgscreen:pt-20">
                @php
                global $wp_query;
                @endphp
                <div class="title-white fade-ani-one">
                    <h2>{{ $wp_query->found_posts.' results for '. get_query_var('s') }}</h2>
                </div>
                @if(!empty($search_description))
                <div class="content white fade-ani-two">
                    <p>{{ $search_description }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="search-result lg:py-0 py-30 fade-ani our-blog is-visible">
    <div class="container-fluid">
        <div class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-20 lgscreen:gap-y-10 fade-ani-one tabs-grid-all">
            @php
            $args = array(
                'posts_per_page'   => -1,
                's' => get_query_var('s')
            );
            $the_query = new WP_Query( $args );
            @endphp
            @while($the_query->have_posts()) @php($the_query->the_post())
            @include('partials.content-search')
            @endwhile
            <div class="btn-custom flex justify-center mt-60 mb-30 w-full">
                <a href="javascript:void(0)" class="btn btn-border-green" id="loadmoreall">Load More</a>
            </div>
            <script>
                jQuery(".tabs-grid-all .tabs-md").slice(0,6).show();
                if(jQuery(".tabs-grid-all .tab-grid").length <= 6) {
                    jQuery("#loadmoreall").hide();                               
                }
                jQuery("#loadmoreall").click(function(e){                                
                    e.preventDefault();
                    jQuery(".tabs-grid-all .tabs-md:hidden").slice(0,6).fadeIn("slow");
                    if(jQuery(".tabs-grid-all .tabs-md:hidden").length == 0){
                        jQuery("#loadmoreall").hide();
                    }
                });
            </script>
        </div>
    </div>
</section>
@if(!empty($relatedCards))
<section class="img-grid lg:mt-60 mt-60 relative fade-ani is-visible">
    <div class="title-icon text-center absolute top-[-35px] left-50per translate-x-minus_50">
        <img src="@asset('images/title-icon-white.png')" class="w-[71px]" alt="">
    </div>
    <div class="container-fluid">
        <div class="bg-green bg-opacity-[0.25] lg:py-120 py-80 px-80 lgscreen:px-40">
            <div class="section-title text-center text-white w-[1000px] px-20 xlscreen:w-full m-auto">
            </div>
            <div class="flex flex-wrap gap-y-12 lg:mx-minus-15 mx-0">
                <?php 
                $relatedCards = get_field('website_cards', 'option');
                ?>
                @foreach( $relatedCards as $website)
                @if($website['website'] == 'wilder')
                @foreach($website['cards'] as $card)
                <div class="lg:w-6/12 w-full lg:px-15 px-0">
                    <div class="img-grid-bx relative ">
                        @if(!empty($card['image']))
                        <div class="img fade-ani-one">
                            <img src="{!! $card['image']['url'] !!}" alt="{!! $card['heading'] !!}">
                        </div>
                        @endif
                        <div class="img-grid-info text-center lg:pt-50 pt-25 lg:px-50 px-10">
                            @if(!empty($card['heading']))
                            <div class="title-white fade-ani-two">
                                <h3>{!! $card['heading'] !!}</h3>
                            </div>
                            @endif
                            @if(!empty($card['description']))
                            <div class="content white fade-ani-three">
                                <p>{!! $card['description'] !!}</p>
                            </div>
                            @endif
                            @if(!empty($card['link']))
                            <div class="btn-custom mt-30 fade-ani-four">
                                <a href="{!! $card['link']['url'] !!}" class="btn btn-red">Explore</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<?php 
$all_testimonial = array();
$usp_args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => '-1',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'testimonial_category',
            'field'    => 'slug',
            'terms'    => 'wilder-group',
        ),
    ),
);
$usp_query = new \WP_Query(  $usp_args );
if($usp_query->have_posts()) {
    while ( $usp_query->have_posts() ) : $usp_query->the_post();                            
        $all_testimonial[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),                               
            'content' => get_the_content(),                             
            'url' => get_the_permalink(),
        );
    endwhile;
    wp_reset_postdata();
}
?>
@if(!empty($all_testimonial))
<section class="fade-ani relative py-120 lgscreen:py-60 pb-80 testimonials is-visible">
<div class="w-[782px] lgscreen:w-full px-20 m-auto text-center relative">
        <span class="uppercase text-gray-100 text-13 font-600 fade-ani-one">Wilder Group</span>
        <div class="swiper lg:mt-50 mt-25 fade-ani-two  testimonials-slider ">
            <div class="swiper-wrapper">                
                @foreach( $all_testimonial as $data)
                <div class="swiper-slide">
                    <h6>{!! $data['content'] !!}</h6>
                    <span class="text-gray-100 uppercase font-400 mt-30 inline-block text-10">{!! $data['title']
                        !!}</span>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@endif
@endif
@endsection