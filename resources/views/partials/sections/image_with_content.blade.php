@if($content->hide_section == 'no')
@php $header_style = get_field('header_style', get_the_ID()); @endphp
@if($header_style != 'wilder') 
    @if($content->background_color == 'yes')
    @php $titleClass = "title-white"; $contClass ="white" @endphp
    @else
    @php $titleClass = "title-black"; $contClass ="black" @endphp
    @endif
@else
    @php $titleClass = "title-white"; $contClass ="white" @endphp
@endif
<section class="zigzag lg:py-60 py-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->
    id) id="{{$content->id}}" @endif>
    <div class="container-fluid ">
        <div class="flex flex-wrap items-center @if($content->background_color == 'yes') bg-color @endif">
            @if($content->image_position == 'left')
            @php $imgClass = 'lg:order-1 lg:pr-80 xlscreen:pr-40 lgscreen:pr-0'; 
            $contentClass = 'lg:order-2 lg:pl-10 pl-0'; $innerClass=""; @endphp
            @else
            @php $imgClass = 'lg:order-2 lg:pl-80 pl-0'; $contentClass = 'lg:order-1 lg:pr-10 pr-0';
            $innerClass="ml-auto"; @endphp
            @endif
            <div class="lg:w-6/12 w-full {!! $imgClass !!}  "> 
                <div class="img fade-ani-one">               
                @if($content->map_iframe == 'no')
                    @if(!empty($content->image))                    
                    <img src="{!! $content->image['url'] !!}" alt="{!! $content->image['title'] !!}" />                    
                    @endif
                @else
                    <iframe src="{!! $content->iframe_url !!}"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @endif 
                </div>
            </div>
            <div class="lg:w-6/12 w-full {!! $contentClass !!}">
                <div
                    class="zigzag-content w-[600px] laptop:w-[500px] xlscreen:w-[450px] lgscreen:w-full lgscreen:pt-30 {!! $innerClass !!}">

                    @if($content->contact == 'yes')
                    <div class="{!! $titleClass !!} fade-ani-two">
                        <h4>{!! $content->heading !!}</h4>
                    </div>
                    <div class="content {!! $contClass !!} fade-ani-three">
                        <p>  <span class="pr-5 text-18">E :</span> <a href="mailto:{!! $content->email !!}">{!! $content->email !!}</a></p>
                        <div class="flex flex-wrap">
                            <span class="text-white pt-10">T :</span>
                            <ul class="flex flex-wrap text-white">
                                @if(!empty($content->image))
                                
                                @foreach( $content->telephone as $phone)
                                <li><a href="tel:{!! $phone['number'] !!}">{!! $phone['number'] !!}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="sicon border-solid border-t-1 border-0 border-white pt-30 mt-30 fade-ani-four">
                        <ul class="flex flex-wrap items-start justify-start gap-x-3">
                            @foreach( $content->social_link as $link)
                            <li><a href="{!! $link['icon_link']['url'] !!}"><img
                                        src="{!! $link['icon_image']['url'] !!}"
                                        alt="{!! $link['icon_image']['title'] !!}"></a></li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                        @if(!empty($content->icon_image))                    
                             <img src="{!! $content->icon_image['url'] !!}" class="w-[78px] mb-20" alt="{!! $content->icon_image['title'] !!}" />                    
                        @endif
                        @if(!empty($content->pre_heading))
                        <div class="fade-ani-one">
                            <h6>{!! $content->pre_heading !!}</h6>
                        </div>
                        @endif
                        @if(!empty($content->heading))
                        <div class="{!! $titleClass !!} fade-ani-two">
                            <h2>{!! $content->heading !!}</h2>
                        </div>
                        @endif
                        @if(!empty($content->content))
                        <div class="content {!! $contClass !!} fade-ani-three">
                            @php echo $content->content; @endphp
                        </div>
                        @endif 
                        <div class="btn-custom flex flex-wrap items-center gap-x-6 gap-y-4 mt-25 fade-ani-four @if($header_style != 'wilder') bg-link @endif">
                            @if(!empty($content->button))
                                @if($header_style == 'entim') 
                                    <a href="{!! $content->button['url'] !!}" class="btn btn-green flex items-center">{!!
                                    $content->button['title'] !!} </a>
                                @elseif($header_style == 'ballooning') 
                                    <a href="{!! $content->button['url'] !!}" class="btn btn-blue flex items-center">{!!
                                    $content->button['title'] !!} <img src="@asset('images/external-link.png');" class="w-[28px] ml-5" alt="external-link" /> </a>
                                @else
                                    <a href="{!! $content->button['url'] !!}" class="btn btn-color flex items-center">{!!
                                    $content->button['title'] !!} </a>
                                @endif                                
                            @endif
                            @if(!empty($content->readmore_link))
                            <a href="{!! $content->readmore_link['url'] !!}" class="btn @if($content->background_color == 'yes') btn-border-white @else btn-link @endif">{!!
                                $content->readmore_link['title'] !!}</a>
                            @endif

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif