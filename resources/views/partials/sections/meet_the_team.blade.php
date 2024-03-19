@if($content->hide_section == 'no')
<section class="zigzag-img-group lg:py-60 py-30  @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    	@if(!empty($content->our_team))  
        <div class="container-fluid">
			<div class="bg-white rounded-15 lg:py-100 py-30">
				<div class="zigzag-group-grid grid gap-y-16">
					<div class="lg:px-100 px-20 grid gap-y-14 lgscreen:gap-y-6">
						@php $team_count = 1; @endphp
						 @foreach( $content->our_team as $our_team_val)
							<div class="flex flex-wrap items-center">
								@if(!empty($our_team_val['image']))  
									<div class="lg:w-6/12 w-full">
										<div class="img">
											<img src="{!! $our_team_val['image']['url'] !!}" alt="{!! $our_team_val['image']['alt'] !!}">
										</div>
									</div>
								@endif
								<div class="lg:w-6/12 w-full">
									<div class="zigzag-group-content pl-70 lgscreen:pl-0 lgscreen:pt-20">
										@if(!empty($our_team_val['member_name'])) 
											<div class="title-black">
												<h2>{!! $our_team_val['member_name'] !!}</h2>
											</div>
										 @endif
										 @if(!empty($our_team_val['member_position'])) 
											<div class="subtitle-black">
												<h6>{!! $our_team_val['member_position'] !!}</h6>
											</div>
										 @endif
										@if(!empty($our_team_val['sort_description'])) 
											<div class="content black pr-80 lgscreen:pr-0">
												{!! $our_team_val['sort_description'] !!}
											</div>
										@endif
										@if(!empty($our_team_val['display_popup'])) 
											<div class="btn-custom mt-10">		                               
												<a href="javascript:void(0)" data-fancybox data-src="#team-poup-modal-{!! $team_count !!}" class="btn btn-link green">Read More</a>   
											</div>
										@endif
									</div>
								</div>
							</div>
							@php $team_count ++ ; @endphp
						@endforeach                
					</div>
				</div>
			</div>
        </div>
        @endif
    </section>
    <!-- Modal Popup -->      
    <div class="custom-popup">
    	@php $count = 1; @endphp
    	 @foreach( $content->our_team as $our_team_val)
	        <div id="team-poup-modal-{!! $count !!}" class="relative hidden experiences-modal-popup w-[90%] smscreen2:w-full bg-color lgscreen:p-20">
	             <a href="javascript:void(0)" class="absolute flex items-center justify-center transition-all duration-300 ease-in-out right-100 top-80 smscreen:right-60 smscreen:top-40 w-30 h-30 z-9" data-fancybox-close="">
	                <span class="text-12 text-black-200 font-600 mr-10 text-opacity-50 lgscreen:text-white">CLOSE</span>
	                <img src="@asset('images/close-black.png')" class="w-[24px] modal-close" alt="modal-close"> 
	            </a>
	            <div class="custom-modal-inner bg-white">
	                <div class="flex flex-wrap items-center h-full">
	                    <div class="lg:w-6/12 w-full h-full">                                   
	                        <div class="experiences-modal-slider swiper h-full">
	                            <div class="swiper-wrapper">                                                
	                                 @if(!empty($our_team_val['popup_slider']))
	                                    @foreach($our_team_val['popup_slider'] as $sliderData)
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
	                        <div class="zigzag-content px-80 laptop:px-20 lgscreen:py-30"> 
                         		@if(!empty($our_team_val['member_name']))
		                            <div class="title-black">
		                                <h4>{!! $our_team_val['member_name'] !!}</h4>
		                            </div>
	                            @endif  
	                            @if(!empty($our_team_val['member_position']))
		                            <div class="subtitle-black">
		                                <h6>{!! $our_team_val['member_position'] !!}</h6>
		                            </div>
	                            @endif                      
                             	 @if(!empty($our_team_val['popup_description']))
	                                <div class="content pr-80 lgscreen:pr-0 black">
	                                     {!! $our_team_val['popup_description'] !!}
	                                </div>
                            	@endif 
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div> 
	         @php $count ++ ; @endphp
        @endforeach   
    </div>    
@endif