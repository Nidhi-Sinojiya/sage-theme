@if($content->hide_section == 'no')
@if($content->banner_style == 'video')
@if($content->banner_height == 'small')
@php $class = "inner-banner"; @endphp
@else
@php $class = ""; @endphp
@endif
<section
    class="banner {!! $class !!} @if(!empty($content->video_url)) video-banner @endif relative h-screen pt-30 pb-0 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif >
    @if(!empty($content->short_video_url))
    <video autoplay loop muted class="z--1 absolute top-0 h-full w-full object-cover" poster="{{ $content->background_image['url'] }}">
        <source src="{{ $content->short_video_url }}" type="video/mp4" />
    </video>
    @endif
    <div class="container-fluid h-full">
        <div class="overflow-hidden h-full">
            @if(!empty($content->background_image))
            <img src="{!! $content->background_image['url'] !!}"
                class="w-full h-[calc(100vh_-_30px)] object-cover block" alt="{!! $content->heading !!}" />
            @else
            <img src="@asset('images/banner-bg.jpg')" class="w-full h-[calc(100vh_-_30px)] object-cover block"
                alt="{!! $content->heading !!}" />
            @endif
        </div>
        <div
            class="absolute top-50per left-50per text-center translate-x-minus_50 translate-y-minus_50 pt-80 w-[calc(100%_-_60px)] px-20">
            @if(!empty($content->heading))
            <h1 class="text-white fade-ani-one">{!! $content->heading !!}</h1>
            @endif
            <div class="video flex flex-wrap items-center justify-center pt-20 fade-ani-two">
                @if(!empty($content->video_url))
                <a href="{!! $content->video_url !!}" data-lity="" class="flex items-center gap-x-3">
                    <div
                        class="video-icon w-[22px] h-[22px] border-1 border-white border-solid rounded-999 flex items-center justify-center">
                        <img src="@asset('images/video-icon.png')" class="max-w-[7px] relative left-[1px]"
                            alt="Video" />
                    </div>
                    @if(!empty($content->video_title))
                    <span class="text-white text-12 font-600">{!! $content->video_title !!}</span>
                    @endif
                </a>
                @endif
            </div>
        </div>
    </div>
    @if($content->scroll_to_discover == 'yes')
        <div class="scroll-to-section absolute bottom-0 left-50per translate-x-minus_50 pb-50">
            <a href="#DiscoverGrid" class="js-anchor-link">
                <span class="uppercase text-white text-13 tracking-02em font-400">Scroll to discover</span>
            </a>
        </div>
        @endif
</section>
@elseif($content->banner_style == 'simple')
@if($content->banner_height == 'small')
@php $class = "small-banner"; @endphp
@elseif($content->banner_height == 'half')
@php $class = "micro-small-banner"; @endphp
@else
@php $class = ""; @endphp
@endif
<section class="banner inner-banner {!! $class !!} relative h-screen pt-30 pb-0 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    <div class="container-fluid h-full relative">
        <div class="micro-banner relative overflow-hidden h-full">
            <img src="{!! $content->background_image['url'] !!}"
                class="w-full h-[calc(100vh_-_30px)] object-cover block" alt="{!! $content->heading !!}" />
        </div>
        <div
            class="absolute top-50per left-50per text-center translate-x-minus_50 translate-y-minus_50 pt-150 w-[calc(100%_-_60px)] px-20 z-9">
            @if(!empty($content->pre_heading))
            <h6 class="text-white fade-ani-one">{!! $content->pre_heading !!}</h6>
            @endif
            @if(!empty($content->heading))
            <h1 class="text-white fade-ani-one">{!! $content->heading !!}</h1>
            @endif
        </div>
    </div>
    @if($content->scroll_to_discover == 'yes')
        <div class="scroll-to-section absolute bottom-0 left-50per translate-x-minus_50 pb-50">
            <a href="#DiscoverGrid" class="js-anchor-link">
                <span class="uppercase text-white text-13 tracking-02em font-400">Scroll to discover</span>
            </a>
        </div>
    @endif
</section>
@else
<section class="banner relative h-screen pt-30 pb-0 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
        <div class="container-fluid h-full">
            <div class="micro-banner overflow-hidden absolute w-[calc(100%_-_60px)] mdscreen:w-[calc(100%_-_30px)] h-full">
                <img src="{!! $content->background_image['url'] !!}" class="w-full h-[calc(100vh_-_30px)] object-cover block" alt="Banner">
            </div>
            <div class="w-full h-full flex items-center justify-end flex-col pt-80 lgscreen:pt-0 lgscreen:justify-center">
                <div class="text-center max-w-[800px]">
                    @if(!empty($content->pre_heading))
                    <h6 class="text-white fade-ani-one">{!! $content->pre_heading !!}</h6>
                    @endif
                    @if(!empty($content->heading))
                    <h1 class="text-white fade-ani-one">{!! $content->heading !!}</h1>
                    @endif
                    @if(!empty($content->explore_link))
                    <div class="btn-custom pt-15 fade-ani-two">
                        <a href="{!! $content->explore_link['url'] !!}" class="btn btn-link">{!! $content->explore_link['title'] !!}</a>
                    </div>
                    @endif
                </div>
                @if(!empty($content->logo))
                <div class="traveler-choice flex py-80 lgscreen:py-40 smscreen2:py-20 px-20 w-[370px] mdscreen:w-full ml-auto fade-ani-four lgscreen:absolute lgscreen:bottom-60 lgscreen:right-60 mdscreen:right-0 mdscreen:bottom-0">
                    <div class="logo">
                        <img src="{!! $content->logo['url'] !!}" class="max-w-[80px]" alt="{!! $content->logo['title'] !!}">
                    </div>
                    <div class="content white relative pl-10">
                        @if(!empty($content->description))
                        <p>{!! $content->description !!}</p>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        @if($content->scroll_to_discover == 'yes')
        <div class="scroll-to-section absolute bottom-0 left-50per translate-x-minus_50 pb-50">
            <a href="#DiscoverGrid" class="js-anchor-link">
                <span class="uppercase text-white text-13 tracking-02em font-400">Scroll to discover</span>
            </a>
        </div>
        @endif
    </section>
@endif
@endif
@if ( is_singular( 'accommodation' ) ) 
    <div class="banner-breadcrumbs">
        <div class="container-fluid">
            <div class="bg-color bg-opacity-90 py-30">
                <ul class="flex flex-wrap items-center justify-center gap-x-10 gap-y-4 smscreen2:flex-col">  
                    <li><img src="@asset('images/clarity-house-line.png')" class="w-[20px] h-[20px] object-contain mr-5" alt=""><span>{!! get_field('stay_guest') !!}</span></li>
                    <li><img src="@asset('images/beds.png')" class="w-[20px] h-[20px] object-contain mr-5" alt=""><span>{!! get_field('stay_beds') !!}</span></li> 
                    <li><img src="@asset('images/profile.png')" class="w-[18px] h-[18px] object-contain mr-5" alt=""><span>{!! get_field('stay_person') !!}</span></li>    
                </ul>
            </div>
        </div>
    </div>
    @endif