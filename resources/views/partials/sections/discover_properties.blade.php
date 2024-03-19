@if($content->hide_section == 'no')
<section
    class="explore-wrapper explore-wrapper-property-slider  lg:py-80 py-40 fade-ani bg-overlay-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    <div class="section-title text-center text-white w-[978px] px-20 lgscreen:w-full m-auto">
        <div class="title-white fade-ani-one">
            @if(!empty($content->icon_image))
            <img src="{!! $content->icon_image['url'] !!}" class="w-[53px] m-auto" alt="Icon">
            @endif

            @if(!empty($content->heading))
            <h2>{!! $content->heading !!}</h2>
            @endif
        </div>
        <div class="content fade-ani-two">
            @if(!empty($content->content))
            <p>{!! $content->content !!}</p>
            @endif
        </div>
    </div>
    <div class="container-fluid relative">
        <div class="ani-overlay">
            <div class="explore-slider property-item  swiper lg:mt-70 mt-35">
                <div class="swiper-wrapper">
                    @foreach( $content->properties_list as $list)
                    <div class="swiper-slide">
                        <div class="explore-card relative">
                            @if(!empty($list['image']))
                            <div class="img">
                                <img src="{!! $list['image']['url'] !!}" alt="{!! $list['image']['title'] !!}">
                            </div>
                            @endif
                            <div class="slider-content absolute bottom-100 xlscreen:bottom-50 text-center w-full">
                                @if(!empty($list['logo_image']))
                                <div class="img-icon">
                                    <img src="{!! $list['logo_image']['url'] !!}"
                                        class="m-auto w-[153px] xlscreen:w-[120px]"
                                        alt="{!! $list['logo_image']['title'] !!}">
                                </div>
                                @endif
                                @if(!empty($list['expore_link']))
                                <div class="btn-custom mt-25">
                                    <a href="{!! $list['expore_link']['url'] !!}" class="btn btn-white-transparent">{!!
                                        $list['expore_link']['title'] !!}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-scrollbar">
                    <div class="swiper-pagination-2"></div>
                </div>
            </div>
            <div
                class="property-swiper-button-next absolute top-50per desktop2:top-40per translate-y-minus_50 flex items-center justify-center z-9 !w-50 !h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 right-80 desktop2:right-70 xlscreen:right-30 lgscreen:right-10">
                <img src="@asset('images/white-arrow.png')" class="rotate-180 max-w-[20px]" alt=""></div>
            <div
                class="property-swiper-button-prev absolute top-50per desktop2:top-40per translate-y-minus_50 flex items-center justify-center z-9 !w-50 !h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 left-80 desktop2:left-70 xlscreen:left-30 lgscreen:left-10">
                <img src="@asset('images/white-arrow.png')" class="max-w-[20px]" alt=""></div>
        </div>
    </div>
</section>
@endif