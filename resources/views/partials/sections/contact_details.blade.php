@if($content->hide_section == 'no')
<section class="contact-us zigzag lg:py-60 py-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    <div class="container-fluid ">
        <div class="flex flex-wrap items-center">           
            <div class="lg:w-6/12 w-full lg:order-1 lg:pr-80 xlscreen:pr-40 lgscreen:pr-0"> 
                <div class="img fade-ani-one">  
                    @if(!empty($content->image))                    
                    	<img src="{!! $content->image['url'] !!}" alt="{!! $content->image['alt'] !!}" />                    
                    @endif
                </div>
            </div>
            <div class="lg:w-6/12 w-full lg:order-2 lg:pl-10 pl-0">            
                <div class="zigzag-content w-[600px] laptop:w-[500px] xlscreen:w-[450px] lgscreen:w-full lgscreen:pt-30">
            		@foreach( $content->contact_details as $contact_details_val)
            			<div class="contact-sec-details mb-20">
		            		@if(!empty($contact_details_val['heading']))
			                    <div class="title-black fade-ani-two">
			                        <h3>{!! $contact_details_val['heading'] !!}</h3>
			                    </div>
			                @endif    
		                    <div class="content black fade-ani-three">
		                    	@if(!empty($contact_details_val['email_address']))
		                       	 	<p><span class="pr-5 text-18">E :</span><a href="mailto:{!! $contact_details_val['email_address'] !!}">{!! $contact_details_val['email_address'] !!}</a></p>
		                        @endif   
		                        <div class="flex flex-wrap">
	                               @if(!empty($contact_details_val['phone_number']))
	                               @php $phone = str_replace(" ","",$contact_details_val['phone_number']); @endphp
	                                	<p><span class="pr-5 text-white pt-10">T :</span><a href="tel:{!! $phone !!}">{!! $contact_details_val['phone_number'] !!}</a></p>
	                                @endif
		                        </div>
		                    </div>
	                    </div>
                    @endforeach
                    <div class="sicon border-solid border-t-1 border-0 border-white pt-30 mt-30 fade-ani-four">
                        <ul class="flex flex-wrap items-start justify-start gap-x-3">
                            @foreach( $content->social_media as $link)
                            	 @if(!empty($link['icon']['url']))
                            		<li><a href="{!! $link['link']['url'] !!}"><img src="{!! $link['icon']['url'] !!}" alt="{!! $link['icon']['alt'] !!}"></a></li>
                            	@endif
                            @endforeach
                        </ul>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>
@endif