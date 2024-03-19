@if($content->hide_section == 'no')

<section class="zigzag lg:py-60 py-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->
    id) id="{{$content->id}}" @endif>
    <div class="container-fluid ">
        <div class="flex flex-wrap items-center">
            <div class="lg:w-6/12 w-full lg:order-1 lg:pr-80 xlscreen:pr-40 lgscreen:pr-0">
                <div class="img fade-ani-one">
                    @if(!empty($content->image))
                    <img src="{!! $content->image['url'] !!}" alt="{!! $content->image['title'] !!}" />
                    @endif
                </div>
            </div>
            <div class="lg:w-6/12 w-full lg:order-2 lg:pl-10 pl-0">
                <div
                    class="zigzag-content w-[600px] laptop:w-[500px] xlscreen:w-[450px] lgscreen:w-full lgscreen:pt-30">
                    @if(!empty($content->pre_heading))
                    <div class="fade-ani-one">
                        <h6>{!! $content->pre_heading !!}</h6>
                    </div>
                    @endif
                    @if(!empty($content->heading))
                    <div class="title-black ">
                        <h2>{!! $content->heading !!}</h2>
                    </div>
                    @endif


                    
                    <div class="tabs-wrapper mt-20">
                        <ul class="tabs flex flex-wrap gap-x-6 gap-y-3 ">
                            @foreach( $content->tab as $index => $box)
                            @php $str = strtolower(str_replace(' & ', '-', $box['heading'])); @endphp
                            <li class="tab-link text-12 tracking-02em text-green font-600 uppercase pb-5 cursor-pointer @if($index == 0) current @endif" data-tab="{!! $str !!}">{!! $box['heading'] !!}</li>
                            @endforeach
                        </ul>
                        <div class="tabs-container">
                            @foreach ($content->tab as $index => $box)
                            @php $str = strtolower(str_replace(' & ', '-', $box['heading'])); @endphp
                            <div id="{!! $str !!}" class="tab-content @if($index == 0) current @endif">
                                <div class="flex flex-wrap my-15 gap-y-20 lgscreen:gap-y-10">
                                    <div class="content black">
                                        <p>{!! $box['content'] !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="zigzag-content-btm pt-10">
                        @if(!empty($content->from_text))
                            <div class="title-green fade-ani-two">
                                <h3>{!! $content->from_text !!}</h3>
                            </div>
                        @endif
    
                        @if(!empty($content->valid_until))
                            <div class="fade-ani-three mt-15">
                                <p>
                                {!! $content->valid_until !!}
                                </p>
                            </div>
                        @endif
                    </div>
                    
                        <div class="btn-custom flex items-center gap-x-6 gap-y-4 mt-25 fade-ani-four">
                            @if(!empty($content->link))
                            <a href="{!! $content->link['url'] !!}" class="btn btn-green">{!!
                                $content->link['title'] !!}</a>
                            @endif                           

                        </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endif