@if($content->hide_section == 'no')
<section
    class="tabs-with-grid lg:py-0 py-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
    <div class="container-fluid">
        <div class="tabs-wrapper img-grid-wrapper lg:px-90 xlscreen:px-90 lgscreen:px-0">
            <ul class="tabs flex flex-wrap gap-x-10 gap-y-3 fade-ani-one">
                <li class="tab-link text-12 tracking-02em text-white font-600 uppercase pb-5 cursor-pointer current"
                    data-tab="all">all</li>                
                @php $category_array = wp_list_sort( $content->select_category, 'name', 'DESC' ); @endphp
                @foreach( $category_array as $box)
                @php $str = strtolower($box->slug); @endphp
                <li class="tab-link text-12 tracking-02em text-white font-600 uppercase pb-5 cursor-pointer"
                    data-tab="{!! $str !!}">{!! $box->name !!}</li>
                @endforeach
            </ul>
            <div class="tabs-container">
                <div id="all" class="tab-content current">
                    <div
                        class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-20 lgscreen:gap-y-10 fade-ani-one tabs-grid-all">
                        @php $count_allpost = count($content->all_post); @endphp 
                        @foreach( $content->all_post as $post)
                        <div class="lg:w-6/12 w-full lg:px-15 px-0 hidden tabs-md">
                            <div class="img-grid">
                                <div class="img relative">
                                    <img src="{!! $post['img'] !!}" alt="The Cliff">                                    
                                </div>
                                <div class="img-info pt-30 lg:pr-80">
                                    <div class="title-white">
                                        <h3>{!! $post['title'] !!}</h3>
                                    </div>
                                    <div class="content white">
                                        <p>{!! $post['content'] !!}</p>
                                    </div>
                                    <div class="btn-custom mt-20">
                                        <a href="{!! $post['url'] !!}" class="btn btn-link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if($count_allpost > 6)
                        <div class="btn-custom flex justify-center my-30 w-full">
                            <a href="javascript:void(0)" class="btn btn-border-red" id="loadmoreall">Load More Blog Posts</a>
                        </div>
                        @endif
                        <script>
                            jQuery(".tabs-grid-all .tabs-md").slice(0,6).show();                       
                            if(jQuery(".tabs-grid-all .tabs-md").length <= 6) {
                                jQuery("#loadmoreall").hide();                           
                            }
                            jQuery("#loadmoreall").click(function(e){                            
                                e.preventDefault();
                                jQuery(".tabs-grid-all .tabs-md:hidden").slice(0,6).fadeIn("slow");
                                if(jQuery(".tabs-grid-all .tabs-md:hidden").length == 0){
                                    jQuery("#loadmoreall").hide();                               
                                }
                            });
                        </script>
                    </div>
                </div>
                 @php $postCount = 1; @endphp
                    @foreach( $content->cat_post as $index => $cat)
                        <div id="{!! $index !!}" class="tab-content">
                            <div class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-20 lgscreen:gap-y-10 tabs-img-grid-{!! $postCount !!}">   
                            @php $count_post = count($cat); @endphp                     
                                @foreach( $cat as $post)
                                <div class="lg:w-6/12 w-full lg:px-15 px-0 hidden tabs-md">
                                    <div class="img-grid">
                                        <div class="img relative">
                                            <img src="{!! $post['img'] !!}" alt="{!! $post['title'] !!}">
                                        </div>
                                        <div class="img-info pt-30 lg:pr-80">
                                            <div class="title-white">
                                                <h3>{!! $post['title'] !!}</h3>
                                            </div>
                                            <div class="content white">
                                                <p>{!! $post['content'] !!}</p>
                                            </div>
                                            <div class="btn-custom mt-20">
                                                <a href="{!! $post['url'] !!}" class="btn btn-link">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if($count_post > 6)
                             <div class="btn-custom flex justify-center my-30 w-full" value="{{$count_post}}">
                                <a href="javascript:void(0)" class="btn btn-border-red" id="loadmore-{!! $postCount !!}">Load More Blog Posts</a>
                            </div>
                            @endif
                             <script>
                                jQuery(".tabs-img-grid-{!! $postCount !!} .tabs-md").slice(0,6).show();
                                if(jQuery(".tabs-img-grid-{!! $postCount !!} .tabs-md").length <= 6) {
                                    jQuery("#loadmore-{!! $postCount !!}").hide();
                                }
                                jQuery("#loadmore-{!! $postCount !!}").click(function(e){
                                    e.preventDefault();
                                    jQuery(".tabs-img-grid-{!! $postCount !!} .tabs-md:hidden").slice(0,6).fadeIn("slow");

                                    if(jQuery(".tabs-img-grid-{!! $postCount !!} .tabs-md:hidden").length == 0){
                                        jQuery("#loadmore-{!! $postCount !!}").hide();
                                    }
                                });
                            </script>
                        </div>
                     @php $postCount++; @endphp
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif