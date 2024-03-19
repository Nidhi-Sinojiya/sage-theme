@if($content->hide_section == 'no')
<section
    class="tabs-with-grid lg:py-0 py-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif >
    <div class="container-fluid">
        <div class="tabs-wrapper img-grid-wrapper lg:px-90 xlscreen:px-90 lgscreen:px-0">
            <ul class="tabs flex flex-wrap gap-x-6 gap-y-3 fade-ani-one">
                <li class="tab-link text-12 tracking-02em text-white font-600 uppercase pb-5 cursor-pointer current"
                    data-tab="all">all</li>
                @foreach( $content->tabs as $box)
                @php $str = strtolower(str_replace(' & ', '-', $box['tab_heading'])); @endphp
                <li class="tab-link text-12 tracking-02em text-white font-600 uppercase pb-5 cursor-pointer"
                    data-tab="{!! $str !!}">{!! $box['tab_heading'] !!}</li>
                @endforeach
            </ul>
            <div class="tabs-container">                
                <div id="all" class="tab-content current">
                    <div class="flex flex-wrap md:mx-minus-15 mx-0 mt-40 gap-y-8 lgscreen:gap-y-10 fade-ani-one tabs-grid-all">
                        @foreach ($content->tabs as $box)
                        @if($box['tab_content'])
                        @foreach ($box['tab_content'] as $col)
                        <div class="md:w-4/12 w-full md:px-15 px-0 tab-grid hidden tabs-md">
                            <div
                                class="icon-with-bx text-center bg-blue py-40 px-60 md:px-20 lgscreen:py-20 lgscreen:px-30">
                                <img src="{!! $col['image']['url'] !!}" class="m-auto w-[150px]" alt="jublani">
                                <div class="icon-with-bx-info pt-20 text-white">
                                    <h4>{!! $col['heading'] !!}</h4>
                                    <p>{!! $col['text'] !!}</p>
                                    <span>{!! $col['year'] !!}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                         </div>
                        <div class="btn-custom flex justify-center my-30 w-full">
                            <a href="javascript:void(0)" class="btn btn-border-red" id="loadmoreall">Load More Awards</a>
                        </div> 

                    <script>
                        jQuery(".tabs-grid-all .tabs-md").slice(0,6).show();
                        console.log( jQuery(".tabs-grid-all .tabs-md").length );
                        if(jQuery(".tabs-grid-all .tab-grid").length <= 6) {
                            jQuery("#loadmoreall").hide();
                           
                        }
                        jQuery("#loadmoreall").click(function(e){
                             console.log( 'come' );
                            e.preventDefault();
                            jQuery(".tabs-grid-all .tabs-md:hidden").slice(0,6).fadeIn("slow");

                            if(jQuery(".tabs-grid-all .tabs-md:hidden").length == 0){
                                jQuery("#loadmoreall").hide();
                                // jQuery(".grid-gallery__loadmore").hide(); 
                            }
                        });
                    </script>

                   

                </div>
                @php $galleryCount = 1; @endphp
                @foreach ($content->tabs as $content)
                @if($content['tab_content'])
                @php $str = strtolower(str_replace(' & ', '-', $content['tab_heading'])); @endphp

                <div id="{!! $str !!}" class="tab-content">
                    <div class="tabs-img-grid tabs-img-grid-{!! $galleryCount !!} flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-20 lgscreen:gap-y-10">
                        @foreach ($content['tab_content'] as $box)

                        <div class="md:w-4/12 w-full md:px-15 px-0 hidden tabs-md">
                            <div
                                class="icon-with-bx text-center bg-blue py-40 px-60 md:px-20 lgscreen:py-20 lgscreen:px-30">
                                <img src="{!! $box['image']['url'] !!}" class="m-auto w-[150px]" alt="jublani">
                                <div class="icon-with-bx-info pt-20 text-white">
                                    <h4>{!! $box['heading'] !!}</h4>
                                    <p>{!! $box['text'] !!}</p>
                                    <span>{!! $box['year'] !!}</span>
                                </div>
                            </div>
                        </div>


                        @endforeach
                         <div class="btn-custom flex justify-center my-30 w-full">
                            <a href="javascript:void(0)" class="btn btn-border-red" id="loadmore-{!! $galleryCount !!}">Load More Awards</a>
                        </div> 
                    </div>
                     <script>
                            jQuery(".tabs-img-grid-{!! $galleryCount !!} .tabs-md").slice(0,6).show();
                            if(jQuery(".tabs-img-grid-{!! $galleryCount !!} .tabs-md").length <= 6) {
                                jQuery("#loadmore-{!! $galleryCount !!}").hide();
                            }
                            jQuery("#loadmore-{!! $galleryCount !!}").click(function(e){
                                e.preventDefault();
                                jQuery(".tabs-img-grid-{!! $galleryCount !!} .tabs-md:hidden").slice(0,6).fadeIn("slow");

                                if(jQuery(".tabs-img-grid-{!! $galleryCount !!} .tabs-md:hidden").length == 0){
                                    jQuery("#loadmore-{!! $galleryCount !!}").hide();
                                }
                            });
                        </script>
                </div>
                @endif
                 @php $galleryCount++; @endphp
                @endforeach

            </div>
        </div>
    </div>
</section>
@endif