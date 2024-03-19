@if($content->hide_section == 'no')
   <section class="zigzag-slider-wraper py-60 lgscreen:py-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
        <div class="container-fluid">
            <div class="bg-color py-100 lgscreen:py-50">
                <div class="flex flex-wrap items-center">
                    <div class="lg:w-6/12 w-full relative">
                        <div dir="rtl" class="zigzag-slider swiper fade-ani-two relative">
                            <div class="swiper-wrapper">
                                @foreach( $content->image_slider as $list)
                                <div class="swiper-slide">
                                    <div class="img">
                                        <img src="{!! $list['image']['url'] !!}" alt="Entim Main Camp">
                                    </div>
                                    <h4>{!! $list['image_text'] !!}</h4>
                                </div>
                                @endforeach                                
                            </div>
                        </div> 
                        <div class="zigzag-swiper-button-next absolute cursor-pointer flex items-center justify-center z-9 w-50 h-50 mdscreen:w-[40px] mdscreen:h-[40px] bg-transparent border-solid border-1 border-white rounded-999 top-45per translate-y-minus_50 right-[-26px] xlscreen:right-[-28px] lgscreen:right-10"><img src="@asset('images/white-arrow.png')" class="rotate-180 max-w-[20px]" alt=""></div>
                        <div class="zigzag-swiper-button-prev absolute cursor-pointer flex items-center justify-center z-9 w-50 h-50 mdscreen:w-[40px] mdscreen:h-[40px] bg-transparent border-solid border-1 border-white rounded-999 top-45per translate-y-minus_50 left-[133px] desktop2:left-[93px] xlscreen:left-[59px] lgscreen:left-10"><img src="@asset('images/white-arrow.png')" class="max-w-[20px]" alt=""></div>
                    </div>
                    <div class="lg:w-6/12 w-full">
                        <div class="zigzag-content w-[510px] lgscreen:w-full lgscreen:pt-20 lgscreen:px-20 m-auto laptop:px-60">                            
                            @if(!empty($content->heading))
                            <div class="title-white fade-ani-one">
                                <h2>{!! $content->heading !!}</h2>
                            </div>
                            @endif
                            @if(!empty($content->content))
                            <div class="content white fade-ani-two">
                                <p>{!! $content->content !!}</p>
                            </div>
                            @endif
                            @if(!empty($content->explore_link))
                            <div class="btn-custom mt-25 fade-ani-three">
                                <a href="{!! $content->explore_link['url'] !!}" class="btn btn-border-white">{!! $content->explore_link['title'] !!}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
@endif