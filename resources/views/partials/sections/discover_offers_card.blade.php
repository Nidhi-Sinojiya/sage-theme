@if($content->hide_section == 'no')
<section class="discover-offer-card lg:py-80 py-40 fade-ani bg-overlay-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    <div class="section-title text-center text-white w-[978px] px-20 lgscreen:w-full m-auto">
        @if(!empty($content->heading))
        <div class="title-white fade-ani-one">
            <h2>{!! $content->heading !!}</h2>
        </div>
        @endif        
    </div>
    <div class="container-fluid relative">
        <div class="flex flex-wrap lg:mx-minus-15 mx-0 mt-40 gap-y-20 lgscreen:gap-y-10">            
            @foreach( $content->all_offers as $col)            
            <div class="lg:w-6/12 w-full lg:px-15 px-0 ">
                <div class="img-grid">
                    <div class="img relative">
                        <img src="{!! $col['fea_img'] !!}" alt="The Cliff">                        
                    </div>
                    <div class="img-info pt-30 lg:pr-80">
                        <div class="title-black">
                            <h3>{!! $col['title'] !!}</h3>
                        </div>
                        <div class="content black">
                            <p>{!! $col['content'] !!}</p>
                        </div>
                        @if(!empty($col['url']))
                        <div class="btn-custom mt-20">
                            <a href="{!! $col['url'] !!}" class="btn btn-link">Explore</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>           
            @endforeach
        </div>
    </div>
</section>
@endif