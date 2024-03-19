@if($content->hide_section == 'no')
<section class="img-content-grid @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    <div class="container-fluid">
        <div class="bg-white py-80 lgscreen:py-40 rounded-15">
        	@if(!empty($content->heading))
	            <div class="title-black text-center">
	                <h2>{!! $content->heading !!}</h2>
	            </div>
            @endif
            <div class="img-content-grid-inner pt-80">
				@if(!empty($content->typical_day))
                <div class="lg:w-9/12 m-auto xlscreen:w-full desktop2:w-[80%]">
                	@foreach( $content->typical_day as $typical_day_val)
	                    <div class="img-content-grid-row lgscreen:px-20">
	                        <div class="flex flex-wrap justify-center">
	                        	@if(!empty($typical_day_val['image']))
	                            <div class="lg:w-5/12 w-full">
	                                <div class="img">
	                                    <img src="{!! $typical_day_val['image']['url'] !!}" alt="{!! $typical_day_val['image']['alt'] !!}">
	                                </div>
	                            </div>
	                            @endif	                            
	                            <div class="lg:w-1/12">
	                                <div class="img-grid-icon relative h-full text-center lgscreen:hidden">
	                                    <img src=" @asset('images/title-icon-slateblue.png')" class="w-[33px]" alt="Icon">
	                                </div>
	                            </div>	                            
	                            <div class="lg:w-5/12 w-full">
	                                <div class="grid-content flex gap-x-10 relative lgscreen:pt-20">
	                                    <div class="content w-[427px] lgscreen:w-full">
	                             			@if(!empty($typical_day_val['title']))
	                                       	 	<span class="text-slateblue uppercase text-16 font-500 tracking-02em leading-22">{!! $typical_day_val['title'] !!}</span>
	                             			@endif
	                             			@if(!empty($typical_day_val['description']))
	                                        	{!! $typical_day_val['description'] !!}
	                             			@endif
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    @endforeach
                </div>
                 @endif
                 @if(!empty($content->link['url']))
                <div class="btn-custom text-center">
                    <a href="{!! $content->link['url'] !!}" class="btn btn-link green">{!! $content->link['title'] !!}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif