@if($content->hide_section == 'no')
@if($content->scrollbar == 'yes') 
    <section class="auto-img-grid fade-ani bg-overlay-ani lg:py-60 py-30 @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
        @if(!empty($content->heading) || !empty($content->content))
                <div class="img-grid-info text-center lg:pt-50 pt-25 lg:px-50 px-10">
                    @if(!empty($content->heading))
                        <div class="title-black fade-ani-two">
                            <h3>{!! $content->heading !!}</h3>
                        </div>            
                    @endif
                    @if(!empty($content->content))
                        <div class="content black fade-ani-three">
                            <p>{!! $content->content !!}</p>
                        </div>          
                    @endif
                </div>
            @endif

        <div class="container-fluid relative">           

            <div class="ani-overlay">
                <div class="auto-img-grid-slider @if($content->image_size_auto == 'yes' ) auto-size-image @endif auto-img-grid-slider-scrollbar lg:mx-minus-15 swiper">
                    <div class="swiper-wrapper">
                        @foreach( $content->images as $img)
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="{!! $img['image']['url'] !!}" alt="{!! $img['image']['title'] !!}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-scrollbar">
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="auto-swiper-button-next w-50 h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 flex items-center justify-center top-40per translate-y-minus_50 absolute z-9 right-60 xlscreen:right-30 lgscreen:right-10"><img src="@asset('images/white-arrow.png')" class="rotate-180 max-w-[20px]" alt=""></div>
                    <div class="auto-swiper-button-prev w-50 h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 flex items-center justify-center top-40per translate-y-minus_50 absolute z-9 left-60 xlscreen:left-30 lgscreen:left-10"><img src="@asset('images/white-arrow.png')" class="max-w-[20px]" alt=""></div>              
                </div> 
            </div>
        </div>
    </section>
    @else
    <section class="gallery-slider fade-ani bg-overlay-ani lg:py-60 py-30 @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
        <div class="container-fluid relative">
            <div class="ani-overlay">
                <div class="auto-img-grid-slider-scrollbar lg:mx-minus-15 swiper gallery-item">
                    <div class="swiper-wrapper">
                        @foreach( $content->images as $img)
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="{!! $img['image']['url'] !!}" alt="{!! $img['image']['title'] !!}">
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="w-50 h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 flex items-center justify-center top-50per translate-y-minus_50 absolute z-9 right-80 xlscreen:right-30 lgscreen:right-10 gallery-slide-next"><img src="@asset('images/white-arrow.png')" class="rotate-180 max-w-[20px]" alt=""></div>
                    <div class="w-50 h-50 smscreen2:!w-[40px] smscreen2:!h-[40px] bg-red bg-opacity-90 rounded-999 flex items-center justify-center top-50per translate-y-minus_50 absolute z-9 left-80 xlscreen:left-30 lgscreen:left-10 gallery-slide-prev"><img src="@asset('images/white-arrow.png')" class="max-w-[20px]" alt=""></div>              
                </div> 
            </div>
        </div>
    </section>

    @endif
@endif