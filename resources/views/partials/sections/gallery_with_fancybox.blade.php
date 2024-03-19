@if($content->hide_section == 'no')
<section class="gallery fade-ani py-100 lgscreen:py-50 @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif> 
    <div class="container-fluid-xl">
        <div class="tabs-wrapper">
            <ul id="gallery_with_fancy_box_tabs" class="tabs flex flex-wrap gap-x-6 gap-y-3 fade-ani-one">
                <li class="tab-link text-12 tracking-02em text-black-200 font-600 uppercase pb-5 cursor-pointer current" data-tab="all" href="#all">all</li>
                @foreach($content->tabs as $box)
                    @php $str = strtolower(str_replace(' & ', '-', $box['tab_heading'])); @endphp
                    @php $str = strtolower(str_replace(' ', '-', $str)); @endphp
                    <li class="tab-link text-12 tracking-02em text-black-200 font-600 uppercase pb-5 cursor-pointer" data-tab="{!! $str !!}" href="#{!! $str !!}">{!! $box['tab_heading'] !!}</li>    
                @endforeach    
            </ul>
            <div class="tabs-container">
                <div id="all" class="tab-content current">
                    <div class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-8 lgscreen:gap-y-10 mdscreen:gap-y-6 fade-ani-one tabs-grid-all">
                        @foreach($content->tabs as $box)
                            @if($box['tab_content'])
                                @foreach($box['tab_content'] as $col)
                                    <div class="lg:w-4/12 w-full lg:px-15 px-0 tab-grid hidden tabs-md">
                                        <div class="img">
                                            <a href="{!! $col['image']['url'] !!}" data-fancybox="gallery">
                                                <img src="{!! $col['image']['url'] !!}" alt="Gallery">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                        <div class="btn-custom flex justify-center mt-60 mb-30 w-full">
                            <a href="javascript:void(0)" class="btn btn-border-green" id="loadmoreall">Load More</a>
                        </div>
                        <script>
                            jQuery(".tabs-grid-all .tabs-md").slice(0,9).show();
                            console.log( jQuery(".tabs-grid-all .tabs-md").length );
                            if(jQuery(".tabs-grid-all .tab-grid").length <= 9) {
                                jQuery("#loadmoreall").hide();
                               
                            }
                            jQuery("#loadmoreall").click(function(e){
                                 console.log( 'come' );
                                e.preventDefault();
                                jQuery(".tabs-grid-all .tabs-md:hidden").slice(0,9).fadeIn("slow");

                                if(jQuery(".tabs-grid-all .tabs-md:hidden").length == 0){
                                    jQuery("#loadmoreall").hide();
                                    // jQuery(".grid-gallery__loadmore").hide(); 
                                }
                            });
                        </script>
                    </div>
                </div>

                @php $galleryCount = 1; @endphp
                @foreach ($content->tabs as $content)
                    @if($content['tab_content'])
                        @php $str = strtolower(str_replace(' & ', '-', $content['tab_heading'])); @endphp
                         @php $str = strtolower(str_replace(' ', '-', $str)); @endphp
                        <div id="{!! $str !!}" class="tab-content">
                            <div class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-8 lgscreen:gap-y-10 fade-ani-one tabs-img-grid-{!! $galleryCount !!}">
                                    @foreach($content['tab_content'] as $box)
                                        <div class="lg:w-4/12 w-full lg:px-15 px-0 hidden tabs-md">
                                            <div class="img">
                                                <a href="{!! $box['image']['url'] !!}" data-fancybox="gallery">
                                                    <img src="{!! $box['image']['url'] !!}" alt="Gallery">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="btn-custom flex justify-center my-30 w-full">
                                        <a href="javascript:void(0)" class="btn btn-border-green" id="loadmore-{!! $galleryCount !!}">Load More</a>
                                    </div>
                            </div>
                            <script>
                            jQuery(".tabs-img-grid-{!! $galleryCount !!} .tabs-md").slice(0,9).show();
                                if(jQuery(".tabs-img-grid-{!! $galleryCount !!} .tabs-md").length <= 9) {
                                    jQuery("#loadmore-{!! $galleryCount !!}").hide();
                                }
                                jQuery("#loadmore-{!! $galleryCount !!}").click(function(e){
                                    e.preventDefault();
                                    jQuery(".tabs-img-grid-{!! $galleryCount !!} .tabs-md:hidden").slice(0,9).fadeIn("slow");

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