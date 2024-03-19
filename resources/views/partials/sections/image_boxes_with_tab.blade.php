@if($content->hide_section == 'no')
<section class="img-grid-wrapper py-100 lgscreen:py-30 pt-50 fade-ani">
    <div class="container-fluid-xl">
        <div class="tabs-wrapper">
            <ul class="tabs flex flex-wrap gap-x-6 gap-y-3 fade-ani-one">
                <li class="tab-link text-12 tracking-02em text-white font-600 uppercase pb-5 cursor-pointer current"
                    data-tab="all">all</li>
                @foreach( $content->boxes as $box)
                @php $str = strtolower(str_replace(' & ', '-', $box['tab_heading'])); @endphp
                <li class="tab-link text-12 tracking-02em text-white font-600 uppercase pb-5 cursor-pointer"
                    data-tab="{!! $str !!}">{!! $box['tab_heading'] !!}</li>
                @endforeach
            </ul>
            <div class="tabs-container">
                <div id="all" class="tab-content current">
                    <div class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-20 lgscreen:gap-y-10 fade-ani-one">
                        @foreach ($content->boxes as $box)
                        @if($box['tab_content'])
                        @foreach ($box['tab_content'] as $col)
                        <div class="lg:w-6/12 w-full lg:px-15 px-0 ">
                            <div class="img-grid">
                                <div class="img relative">
                                    <img src="{!! $col['image']['url'] !!}" alt="The Cliff">
                                    <div
                                        class="img-logo absolute top-50per left-50per translate-x-minus_50 translate-y-minus_50 text-center">
                                        <img src="{!! $col['logo_image']['url'] !!}" alt="Cliff">
                                    </div>
                                </div>
                                <div class="img-info pt-30 lg:pr-80">
                                    <div class="title-white">
                                        <h3>{!! $col['heading'] !!}</h3>
                                    </div>
                                    <div class="content white">
                                        <p>{!! $col['content'] !!}</p>
                                    </div>
                                    @if(!empty($col['button']['url']))
                                    <div class="btn-custom mt-30">
                                        <a href="{!! $col['button']['url'] !!}" class="btn btn-red">{!!
                                    $col['button']['title'] !!}</a>
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
                @foreach ($content->boxes as $content)
                @if($content['tab_content'])
                @php $str = strtolower(str_replace(' & ', '-', $content['tab_heading'])); @endphp
                <div id="{!! $str !!}" class="tab-content">
                    <div class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-20 lgscreen:gap-y-10">
                        @foreach ($content['tab_content'] as $box)
                        <div class="lg:w-6/12 w-full lg:px-15 px-0 ">
                            <div class="img-grid">
                                <div class="img relative">
                                    <img src="{!! $box['image']['url'] !!}" alt="The Cliff">
                                    <div
                                        class="img-logo absolute top-50per left-50per translate-x-minus_50 translate-y-minus_50 text-center">
                                        <img src="{!! $box['logo_image']['url'] !!}" alt="Cliff">
                                    </div>
                                </div>
                                <div class="img-info pt-30 lg:pr-80">
                                    <div class="title-white">
                                        <h3>{!! $box['heading'] !!}</h3>
                                    </div>
                                    <div class="content white">
                                        <p>{!! $box['content'] !!}</p>
                                    </div>
                                    @if(!empty($box['button']['url']))
                                    <div class="btn-custom mt-30">
                                        <a href="{!! $box['button']['url'] !!}" class="btn btn-red">{!!
                                    $box['button']['title'] !!}</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif