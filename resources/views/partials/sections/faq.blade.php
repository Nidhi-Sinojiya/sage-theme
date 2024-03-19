@if($content->hide_section == 'no')
    <section class="accordion-container lg:py-50 py-30 mb-100 lgscreen:mb-50 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
        <div class="container-fluid">
            <div class="bg-white accordion-container-bg">
                <div class="py-40 px-90 lgscreen:py-30 lgscreen:px-30">
                    <div class="flex flex-wrap">
                        <div class="w-full fade-ani-one">
                            <div class="w-full flex flex-col content">
                                <div class="w-full mdscreen:w-full float-left ">
                                @if(!empty($content->faq_section))
                                    @foreach($content->faq_section as $value)
                                        <h4 class="accordion-title cursor-pointer border-solid border-gray-300 border-0 border-b-1 py-20 relative pr-15 lgscreen:pr-35">{!! $value['faq_heading'] !!}</h4>
                                        <div class="accordion-content mb-15">
                                            {!! $value['faq_content'] !!}                                
                                        </div>
                                    @endforeach
                                @endif
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endif