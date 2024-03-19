@if($content->hide_section == 'no')

    <section class="accordion-container lg:py-100 py-30 mb-50 lgscreen:mb-30 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
        <div class="px-90 lgscreen:px-15">
            <div class="flex flex-wrap">
                <div class="w-full fade-ani-one">
                    @if(!empty($content->terms_of_rates))
                        @foreach($content->terms_of_rates as $value)
                            <div class="w-full flex flex-col content">
                                <h4 class="accordion-title cursor-pointer border-solid border-gray-300 border-0 border-b-1 py-20 relative">{!! $value['heading'] !!}</h4>
                                <div class="accordion-content mb-15">
                                    <p>{!! $value['content'] !!}</p>                                    
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endif