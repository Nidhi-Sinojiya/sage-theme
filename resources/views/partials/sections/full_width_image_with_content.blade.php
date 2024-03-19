@if($content->hide_section == 'no')
@if($content->content_style == 'left')
    @php $pb = ''; $content_class = 'items-start';
    $img_class = 'w-[1000px] lgscreen:w-full lgscreen:px-20 '; $button_class =''; @endphp
@elseif($content->content_style == 'right')
    @php $pb = 'pb-0'; $content_class = 'items-end full-content-inner';
    $img_class = 'w-[950px] lgscreen:w-full text-right'; $button_class ='justify-end'; @endphp
@else
    @php $pb = 'pb-0'; $content_class = 'items-center';
    $img_class = 'w-[950px] lgscreen:w-full text-center'; $button_class ='justify-end'; @endphp
@endif

@if($content->content_align == 'top')
    @php $alignClass = "justify-between"; $padding = "pb-80"; @endphp
@elseif($content->content_align == 'center')
    @php $alignClass = "justify-center"; $padding = "pb-0"; @endphp 
@else
    @php $alignClass = "justify-end"; $padding = "pb-80"; @endphp
@endif
@php $header_style = get_field('header_style', get_the_ID()); @endphp

<section
    class="full-img-content relative py-40 fade-ani {!! $pb !!} @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
    <div class="container-fluid">
        <div class="full-img-content-inner h-[658px] bg-cover bg-no-repeat relative"
            style="background-image: url('{!! $content->background_image['url'] !!}')">
            <div class="relative z-9 h-full flex flex-col {!! $content_class !!}  {!! $alignClass !!}">
                @if(!empty($content->icon_image))
                <div class="HotAirSafaris-logo p-30 fade-ani-one">
                    <img src="{!! $content->icon_image['url'] !!}" class="w-[144px]" />
                </div>
                @endif
                <div class="img-content px-80 xlscreen:px-30 {!! $img_class !!} {!! $padding !!}">
                    @if(!empty($content->pre_heading))<span
                        class="text-white uppercase text-12 tracking-02em font-700 mb-10 inline-block fade-ani-two">{!! $content->pre_heading
                        !!}</span>@endif
                    @if(!empty($content->heading))
                    <div class="title-white fade-ani-two">
                        <h2>{!! $content->heading !!}</h2>
                    </div>
                    @endif
                    @if(!empty($content->content))
                    <div class="content white fade-ani-three">
                        <p>{!! $content->content !!}</p>
                    </div>
                    @endif
                    
                    @if($header_style == 'wilder') 
                        @php $btn1 = 'btn-red'; $btn2 = 'btn-white-transparent'; @endphp
                    @else 
                        @php $btn1 = 'btn-color'; $btn2 = 'btn-white-transparent'; @endphp                        
                    @endif
                    <div
                        class="btn-custom flex flex-wrap items-center gap-x-6 gap-y-3 mt-30 fade-ani-four {!! $button_class !!} ">
                        @if(!empty($content->button_1))
                        <a href="{!! $content->button_1['url'] !!}" class="btn {!! $btn1 !!}">{!! $content->button_1['title'] !!}</a>
                        @endif
                        @if(!empty($content->button_2))
                        <a href="{!! $content->button_2['url'] !!}" class="btn {!! $btn2 !!}">{!!
                            $content->button_2['title'] !!}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif