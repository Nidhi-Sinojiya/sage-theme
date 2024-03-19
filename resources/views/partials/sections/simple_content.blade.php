@if($content->hide_section == 'no')

@php $header_style = get_field('header_style', get_the_ID()); @endphp
@if($header_style != 'wilder')
@php $titleClass = "title-black"; $contClass ="black" @endphp
@else
@php $titleClass = "title-white"; $contClass ="white" @endphp
@endif
@if($content->content_style == 'half')
<section class="ab-content py-20 lg:pb-50 pb-20 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
    <div class="container-fluid-xl">
        <div class="flex flex-wrap items-start">
            <div class="{!! $titleClass !!} flex items-center gap-x-3 fade-ani-one">
                @if(!empty($content->icon_image))
                <img src="{!! $content->icon_image['url'] !!}" class="max-w-[33px] mx-auto"
                    alt="{!! $content->icon_image['title'] !!}" />
                @endif
                @if(!empty($content->heading))
                <h6>{!! $content->heading !!}</h6>
                @endif
            </div>
            <div
                class="content w-[1100px] desktop2:w-[960px] laptop:w-[940px] xlscreen:w-[700px] ipad:w-[600px] mdscreen:w-full desktop2:pl-100 mdscreen:pl-0 mdscreen:pt-30 pl-150 fade-ani-two">
                @if(!empty($content->content))
                <h4>{!! $content->content !!}</h4>
                @endif
            </div>
        </div>
    </div>
</section>
@else
<section
    class="common-content lg:py-60 py-30 lg:mt-20 mt-0 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
    @if($content->icon_style == 'none')
        <div class="w-[1050px] m-auto text-center lgscreen:w-full px-20">
            <div class="{!! $titleClass !!} fade-ani-one">
                @if(is_page() && $post->post_parent)
                <h4>{!! $content->heading !!}</h4>
                @else
                <h2>{!! $content->heading !!}</h2>
               @endif
            </div>
            @if(!empty($content->content))
            <div class="content {!! $contClass !!} fade-ani-two">
                <p>{!! $content->content !!}</p>
            </div>
            @endif
            @if(!empty($content->button))
            <div class="btn-custom mt-30 fade-ani-three">
                <a href="{!! $content->button['url'] !!}" class="btn btn-link">{!! $content->button['title'] !!}</a>
            </div>
            @endif
        </div>
    @elseif($content->icon_style == 'left')
        <div class="px-30">
            <div
                class="title-with-icon flex flex-wrap items-start gap-x-6 lgscreen:justify-center lgscreen:pb-20 pl-20 lgscreen:pl-0">
                @if(!empty($content->icon_image))
                    <img src="{!! $content->icon_image['url'] !!}" class="w-[48px] fade-ani-one" alt="Icon">
                @endif
                <div class="title-info w-[978px] xlscreen:w-[850px] lgscreen:w-full lgscreen:text-center lgscreen:pt-20">
                    <div class="title-white fade-ani-one">
                        <h2>{!! $content->heading !!}</h2>
                    </div>
                    <div class="content white fade-ani-two">
                        <p>{!! $content->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="w-[945px] m-auto text-center lgscreen:w-full px-20">
            <div class="title-black fade-ani-one">
                @if(!empty($content->icon_image))
                    <img src="{!! $content->icon_image['url'] !!}" class="max-w-[33px] mx-auto mb-15" alt="">
                @endif
                <h2>{!! $content->heading !!}</h2>
            </div>
            @if(!empty($content->button))
            <div class="btn-custom mt-30 fade-ani-three">
                <a href="{!! $content->button['url'] !!}" class="btn btn-link green">{!! $content->button['title'] !!}</a>
            </div>
            @endif
        </div>
    @endif
</section>
@endif
@endif