@if($content->hide_section == 'no')
@php $header_style = get_field('header_style', get_the_ID());
$relatedCards = get_field('website_cards', 'option');
@endphp
@if($header_style != 'wilder')
@php $bgcolor = ""; $titleClass = "title-black"; $contClass ="black"; @endphp
@else
@php $bgcolor = ""; $titleClass = "title-white"; $contClass ="white"; @endphp
@endif

<section
    class="img-grid lg:mt-60 mt-60 relative fade-ani {{$bgcolor}} @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
    @if($content->background_style == 'yes')
    @if($header_style == 'wilder')
    <div class="title-icon text-center absolute top-[-35px] left-50per translate-x-minus_50">
        <img src="@asset('images/title-icon-white.png')" class="w-[71px]" alt="">
    </div>
    <div class="container-fluid">
        <div class="bg-green bg-opacity-[0.25] lg:py-120 py-80 px-80 lgscreen:px-40">
            <div class="section-title text-center text-white w-[1000px] px-20 xlscreen:w-full m-auto">
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
            </div>
            <div class="flex flex-wrap gap-y-12 lg:mx-minus-15 mx-0">
                @foreach( $relatedCards as $website)
                @if($website['website'] == 'wilder')
                @php $relatedArray = []; @endphp 
                @foreach($website['cards'] as $card)
                @php
                if( (get_permalink() !=  $card['link']['url'])  ){
                    $relatedArray[] = $card;
                }              
                @endphp
                @endforeach
                @foreach($relatedArray as $item => $card)
                @php
                if($item == 2  ){
                    continue;
                }              
                @endphp
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
    @elseif($header_style == 'entim')
    <div class="title-icon text-center absolute top-[-35px] left-50per translate-x-minus_50">
        <img src="@asset('images/title-icon-gray.png')" class="w-[71px]" alt="">
    </div>
    <div class="container-fluid">
        <div class="bg-green lg:py-80 py-40 px-80 lgscreen:px-40">
            <div
                class="section-title text-center text-white w-[1000px] lgscreen:pt-30 px-20 pb-70 lgscreen:pb-30 xlscreen:w-full m-auto">
                @if(!empty($content->heading))
                <div class="title-white fade-ani-one">
                    <h2>{!! $content->heading !!}</h2>
                </div>
                @endif

                @if(!empty($content->content))
                <div class="content fade-ani-two @if(is_page() && $post->post_parent) white @endif">
                    <p>{!! $content->content !!}</p>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap gap-y-12 lg:mx-minus-15 mx-0">
                @foreach( $relatedCards as $website)
                @if($website['website'] == 'entim')
                @php $relatedArray = []; @endphp
                @foreach($website['cards'] as $entim)
                @php
                if( (get_permalink() !=  $entim['link']['url'])  ){
                    $relatedArray[] = $entim;
                }              
                @endphp
                @endforeach
                @foreach($relatedArray as $item => $entim)
                @php
                if($item == 2  ){
                    continue;
                }              
                @endphp
                <div class="lg:w-6/12 w-full lg:px-15 px-0">
                    <div class="img-grid-bx relative ">
                        @if(!empty($entim['image']))
                        <div class="img fade-ani-one">
                            <img src="{!! $entim['image']['url'] !!}" alt="{!! $entim['heading'] !!}">
                        </div>
                        @endif
                        <div class="img-grid-info text-center lg:pt-50 pt-25 lg:px-50 px-10">
                            @if(!empty($entim['heading']))
                            <div class="title-white fade-ani-two">
                                <h3>{!! $entim['heading'] !!}</h3>
                            </div>
                            @endif
                            @if(!empty($entim['description']))
                            <div class="content white fade-ani-three">
                                <p>{!! $entim['description'] !!}</p>
                            </div>
                            @endif
                            @if(!empty($entim['link']))
                            <div class="btn-custom mt-10 fade-ani-four">
                                <a href="{!! $entim['link']['url'] !!}" class="btn discover-link">Explore</a>
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
    @else @endif
    @else
    <div class="container-fluid">
        <div class="lg:py-120 py-80 px-80 lgscreen:px-0">
            <div class="section-title text-center text-white w-[1000px] px-20 xlscreen:w-full m-auto">
                @if(!empty($content->heading))
                <div class="title-black fade-ani-one">
                    <h2>{!! $content->heading !!}</h2>
                </div>
                @endif
                @if(!empty($content->content))
                <div class="content black fade-ani-two">
                    <p>{!! $content->content !!}</p>
                </div>
                @endif
            </div>
            <div class="flex flex-wrap gap-y-12 mt-70 lgscreen:mt-35 lg:mx-minus-15 mx-0">
                @foreach( $relatedCards as $website)
                @if($website['website'] == $header_style)

                @php $relatedArray = []; @endphp
                @foreach($website['cards'] as $card)
                @php
                if( (get_permalink() !=  $card['link']['url'])  ){
                    $relatedArray[] = $card;
                }              
                @endphp
                @endforeach
                @foreach($relatedArray as $item => $card)
                @php
                if($item == 2  ){
                    continue;
                }              
                @endphp
                <div class="lg:w-6/12 w-full lg:px-15 px-0">
                    <div class="img-grid-bx relative ">
                        @if(!empty($card['image']))
                        <div class="img fade-ani-one">
                            <img src="{!! $card['image']['url'] !!}" alt="{!! $card['heading'] !!}">
                        </div>
                        @endif
                        <div class="img-grid-info text-center lg:pt-50 pt-25 lg:px-50 px-10">
                            @if(!empty($card['heading']))
                            <div class="{!! $titleClass !!} fade-ani-two">
                                <h3>{!! $card['heading'] !!}</h3>
                            </div>
                            @endif
                            @if(!empty($card['description']))
                            <div class="content {!! $contClass !!} fade-ani-three">
                                <p>{!! $card['description'] !!}</p>
                            </div>
                            @endif
                            @if(!empty($card['link']))
                            <div class="btn-custom mt-30 fade-ani-four">
                                <a href="{!! $card['link']['url'] !!}"
                                    class="btn @if($header_style == 'wilder') btn-red @else btn-link @endif">Explore</a>
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

    @endif
</section>
@endif