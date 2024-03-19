@if($content->hide_section == 'no')
<section
    class="accordion-wrapper lg:py-40 py-30 lg:pb-80 pb-0 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
    <div class="px-90 lgscreen:px-30">
        <div class="flex flex-wrap">
            <div class="accordion-wrapper w-full fade-ani-one" id="accordion-1">
                @foreach( $content->data as $data)
                <div class="accordion-item w-full border-solid border-gray-300 border-0 border-b-1 py-20 float-left">
                    <div class="accordion-item-header w-[90%] ipad:w-[85%] mdscreen:w-full float-left">
                        @if(!empty($data['heading']))
                        <h4 class="text-white">{!! $data['heading'] !!}</h4>
                        @endif
                        @if(!empty($data['title']))
                        <span class="text-white text-10 uppercase">{!! $data['title'] !!}</span>
                        @endif
                    </div>
                    @if(!empty($data['content']))
                    <span data-parent="accordion-1"
                        class="accordion-open w-[10%] ipad:w-[15%] mdscreen:w-full mdscreen:text-left mdscreen:pt-15 inline-block text-right text-15 font-600 text-white text-opacity-70 pt-35 cursor-pointer hover:text-red transition-all duration-300">Read
                        More</span>
                    <div class="accordion-body content white w-[90%] float-left">
                        <p>{!! $data['content'] !!}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif