@if($content->hide_section == 'no')
	@if(!empty($content->grid))
		<section class="img-grid-wrapper py-100 lgscreen:py-30 pt-50 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"@if($content->id) id="{{$content->id}}" @endif>
		    <div class="container-fluid-xl">
		        <div class="flex flex-wrap lg:mx-minus-15 mx-0 gap-y-20 lgscreen:gap-y-10 fade-ani-one">
		        	@php $box_count = 1 @endphp
		            @foreach( $content->grid as $box)
			            <div class="lg:w-6/12 w-full lg:px-15 px-0 ">
			                <div class="img-grid">
			                	@if(!empty($box['image']))	
				                <div class="img relative">
				                   <img src="{!! $box['image']['url'] !!}" alt="{!! $box['title'] !!}">                      
				                </div>
			                    @endif

			                    <div class="img-info pt-30 lg:pr-80">
			                    	@if(!empty($box['title']))
				                        <div class="title-black">
				                            <h3>{!! $box['title'] !!}</h3>
				                        </div>
			                        @endif
			                        @if(!empty($box['excerpt']))
				                        <div class="content black">
				                            {!! $box['excerpt'] !!}
				                        </div>
			                        @endif
			                        @if(!empty($box['display_popup']))
				                        <div class="btn-custom mt-30">
				                            <a href="javascript:void(0)" data-fancybox data-src="#experiences-modal_{!! $box_count !!}" class="btn btn-link green">Explore</a>         
				                        </div>
			                        @endif
			                    </div>
			                </div>
			            </div>
			            @php $box_count++; @endphp
		            @endforeach
		        </div>
		    </div>
		</section>

		<!-- Modal Popup -->
		@php $modal_count = 1 @endphp
		<div class="custom-popup">
		@foreach( $content->grid as $modal)
			@if(!empty($modal['display_popup']))			
				    <div id="experiences-modal_{!! $modal_count !!}" class="relative hidden experiences-modal-popup w-[90%] smscreen2:w-full bg-color lgscreen:p-20">
				          <a href="javascript:void(0)" class="absolute flex items-center justify-center transition-all duration-300 ease-in-out right-100 lgscreen:top-50 lgscreen:right-80 top-80 smscreen:right-60 smscreen:top-40 w-30 h-30 z-9" data-fancybox-close="">
				               <span class="text-12 text-black-200 font-600 mr-10 text-opacity-50 lgscreen:text-white">CLOSE</span>
				              	<img src="@asset('images/close-black.png')" class="w-[24px] modal-close" alt="modal-close"> 
				          </a>
				          <div class="custom-modal-inner bg-white">
				                <div class="flex flex-wrap items-center h-full">
				                    <div class="lg:w-6/12 w-full h-full">									
				                        <div class="experiences-modal-slider swiper h-full">
				                         	<div class="swiper-wrapper">				                         	 	
												@if(!empty($modal['popup_slider']))
													@foreach($modal['popup_slider'] as $sliderData)
														<div class="swiper-slide">
															<div class="img h-full">
																<img src="{!! $sliderData['image']['url'] !!}" class="object-cover" alt="{!! $sliderData['image']['title'] !!}">
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
				                            @if(!empty($modal['title']))
					                            <div class="title-black">
					                                <h4>{!! $modal['title'] !!}</h4>
					                            </div>
				                            @endif
				                            @if(!empty($modal['popup_description']))
				                            <div class="content pr-80 lgscreen:pr-0 black">
				                            	{!! $modal['popup_description'] !!}    
				                            </div>
				                            @endif
				                            <div class="btn-custom flex flex-wrap items-center gap-x-6 gap-y-3 mt-30 btn-color">
				                            	@if(!empty($modal['button']))
				                                	<a href="{!! $modal['button']['url'] !!}" class="btn btn-green">{!! $modal['button']['title'] !!}</a>
				                                @endif
				                                @if(!empty($modal['link']))
				                                	<a href="{!! $modal['link']['url'] !!}" class="btn btn-link green">{!! $modal['link']['title'] !!}</a>
				                                @endif
				                            </div>
				                        </div>
				                    </div>
				                </div>
				          </div>
				    </div>				
			@endif    
		@php $modal_count++; @endphp
	    @endforeach
		</div>
	@endif
@endif