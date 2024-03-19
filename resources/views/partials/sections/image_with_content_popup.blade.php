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
<section class="zigzag lg:py-60 py-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
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
                    @if(!empty($content->image))                    
                    <img src="{!! $content->image['url'] !!}" alt="{!! $content->image['title'] !!}" />                    
                    @endif
                </div>
            </div>
            <div class="lg:w-6/12 w-full {!! $contentClass !!}">
                <div class="zigzag-content w-[600px] laptop:w-[500px] xlscreen:w-[450px] lgscreen:w-full lgscreen:pt-30 {!! $innerClass !!}">
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
                    @if(!empty($content->sort_description))
                        <div class="content {!! $contClass !!} fade-ani-three">
                            @php echo $content->sort_description; @endphp
                        </div>
                    @endif 
                     @if(!empty($content->display_popup))
                        <div class="btn-custom mt-25 fade-ani-four @if($header_style != 'wilder') bg-link @endif">                            
                           <a href="javascript:void(0)" data-fancybox data-src="#image-poup-modal" class="btn btn-link green">Read More</a>                         
                        </div> 
                    @endif                       
                </div>
            </div>
        </div>
    </div>
</section>
     @if(!empty($content->display_popup))
    <!-- Modal Popup -->      
    <div class="custom-popup">
        <div id="image-poup-modal" class="relative hidden experiences-modal-popup w-[90%] smscreen2:w-full bg-color lgscreen:p-20">
             <a href="javascript:void(0)" class="absolute flex items-center justify-center transition-all duration-300 ease-in-out right-100 top-80 smscreen:right-60 smscreen:top-40 w-30 h-30 z-9 lgscreen:right-80 lgscreen:top-50" data-fancybox-close="">
                <span class="text-12 text-black-200 font-600 mr-10 lgscreen:text-white">CLOSE</span>
                <img src="@asset('images/close-black.png')" class="w-[24px] modal-close" alt="modal-close"> 
            </a>
            <div class="custom-modal-inner bg-white">
                <div class="flex flex-wrap items-center h-full">
                    <div class="lg:w-6/12 w-full h-full">                                   
                        <div class="experiences-modal-slider swiper h-full">
                            <div class="swiper-wrapper">                                                
                                 @if(!empty($content->popup_slider))
                                    @foreach($content->popup_slider as $sliderData)
                                        <div class="swiper-slide">
                                            <div class="img h-full">
                                                <img src="{!! $sliderData['popup_image']['url'] !!}" class="object-cover" alt="{!! $sliderData['popup_image']['alt'] !!}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif                                                
                            </div>
                            <div class="experiences-modal-next auto-swiper-button-next absolute opacity-100 top-50per z-9 flex items-center justify-center w-50 h-50 border-solid border-1 border-white bg-transparent bg-opacity-90 rounded-999 right-40 xlscreen:right-20 lgscreen:right-10"><img src="@asset('images/white-arrow.png')" class="rotate-180 max-w-[20px]" alt=""></div>
                            <div class="experiences-modal-prev auto-swiper-button-prev absolute opacity-100 top-50per z-9 flex items-center justify-center w-50 h-50 border-solid border-1 border-white bg-transparent bg-opacity-90 rounded-999 left-40 xlscreen:left-20 lgscreen:left-10"><img src="@asset('images/white-arrow.png')" class="max-w-[20px]" alt=""></div>   
                        </div>                                  
                    </div>
                    <div class="lg:w-6/12 w-full">
                        <div class="zigzag-content px-60 laptop:px-20 lgscreen:py-30">                        
                             @if(!empty($content->popup_heading))
                                <div class="title-black">
                                     <h4>{!! $content->popup_heading !!}</h4>
                                </div>
                            @endif
                             @if(!empty($content->popup_description))
                                <div class="content pr-80 lgscreen:pr-0 black">
                                    {!! $content->popup_description !!}    
                                </div>
                            @endif
                            <div class="btn-custom flex flex-wrap items-center gap-x-6 gap-y-3 mt-30">
                                @if(!empty($content->link))
                                    <a href="{!! $content->link['url'] !!}" class="btn btn-color">{!! $content->link['title'] !!}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    @endif
@endif

