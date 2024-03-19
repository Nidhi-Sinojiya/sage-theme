@if($content->hide_section == 'no')
<section class="explore-wrapper discover-wapper lg:py-80 py-40 fade-ani bg-overlay-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    <div class="section-title text-center text-white w-[978px] px-20 lgscreen:w-full m-auto">
        @if(!empty($content->heading))
        <div class="title-white fade-ani-one">
            <h2>{!! $content->heading !!}</h2>
        </div>
        @endif
        @if(!empty($content->content))
        <div class="content fade-ani-two">
            <p>{!! $content->content !!}</p>
        </div>
        @endif
        @if(!empty($content->button))
        <div class="btn-custom mt-30 fade-ani-three">
            <a href="{!! $content->button['url'] !!}" class="btn btn-red">{!! $content->button['title'] !!}</a>
        </div>
        @endif
    </div>

    @if($content->style_slider == '2_colums')
    <div class="container-fluid relative">
        <div class="ani-overlay">
            <div class="explore-slider swiper lg:mt-70 mt-35 discover-site">
                <div class="swiper-wrapper">
                    @foreach( $content->list_sites as $site)
                    <div class="swiper-slide">
                        <div class="explore-card relative">
                            @if(!empty($site['background_image']))
                            <div class="img">
                                <img src="{!! $site['background_image']['url'] !!}"
                                    alt="{!! $site['background_image']['title'] !!}">
                            </div>
                            @endif
                            <div class="slider-content absolute bottom-100 xlscreen:bottom-50 text-center w-full">
                                @if(!empty($site['logo']))
                                <img src="{!! $site['logo']['url'] !!}" class="m-auto w-[153px] xlscreen:w-[120px]"
                                    alt="{!! $site['logo']['title'] !!}">
                                @endif
                                @if(!empty($site['explore_link']))
                                <div class="btn-custom mt-25">
                                    <a href="{!! $site['explore_link']['url'] !!}" class="btn btn-white-transparent">{!!
                                        $site['explore_link']['title'] !!}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div
                class="swiper-button-next explore-swiper-button-next !w-50 !h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 !top-[55%] !right-50 xlscreen:!right-30 lgscreen:!right-10">
                <img src="@asset('images/white-arrow.png')" class="rotate-180 max-w-[20px]" alt=""></div>
            <div
                class="swiper-button-prev explore-swiper-button-prev !w-50 !h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 !top-[55%] !left-50 xlscreen:!left-30 lgscreen:!left-10">
                <img src="@asset('images/white-arrow.png')" class="max-w-[20px]" alt=""></div>
        </div>
    </div>
    

    @endif

</section>
@endif