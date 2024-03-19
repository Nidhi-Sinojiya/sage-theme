@if($content->hide_section == 'no')
<section class="zigzag lg:py-60 py-30 relative fade-ani  @if($content->extra_class){{$content->extra_class}}@endif " @if($content->
    id) id="{{$content->id}}" @endif>
    <div class="title-icon text-center absolute top-25 lgscreen:top-[-10px] z-9 left-50per translate-x-minus_50">
        <img src="@asset('images/title-icon-gray.png')" class="w-[71px]" alt="">
    </div>
    <div class="container-fluid"> 
        <div class="bg-white lg:py-80 py-40 lg:px-80 px-40">
            @if( is_array($content->select_stay) )
            @foreach($content->select_stay as $item)
                <div class="flex flex-wrap items-center">           
                    @php $imgClass = 'lg:order-1 lg:pr-80 xlscreen:pr-40 lgscreen:pr-0'; 
                    $contentClass = 'lg:order-2 lg:pl-10 pl-0'; $innerClass=""; @endphp            
                    <div class="lg:w-6/12 w-full {!! $imgClass !!}  ">
                        <div class="img fade-ani-one">
                            <img src="{!! $item['image'] !!}" alt="">
                        </div>
                    </div>
                    <div class="lg:w-6/12 w-full {!! $contentClass !!}">
                        <div
                            class="zigzag-content w-[600px] laptop:w-[500px] xlscreen:w-[450px] lgscreen:w-full lgscreen:pt-30 {!! $innerClass !!}"> 
                                <div class="fade-ani-one">
                                    <h6>{!! $item['pre_heading'] !!}</h6>
                                </div>
                                <div class="fade-ani-two">
                                    <h2>{!! $item['title'] !!}</h2>
                                </div>
                                <ul class="zigzagcontent-inner flex flex-wrap items-center pt-15 gap-x-8 gap-y-2 py-20">
                                    @if(!empty($item['stay_guest']))
                                    <li> <img src="@asset('images/clarity-house-line.png')" class="w-[24px] h-[24px] object-contain mr-5" alt=""> <span>{!! $item['stay_guest'] !!}</span></li>
                                    @endif
                                    @if(!empty($item['stay_person']))
                                    <li> <img src="@asset('images/profile.png')" class="w-[20px] h-[20px] object-contain mr-5" alt=""> <span>{!! $item['stay_person'] !!}</span></li>
                                    @endif
                                </ul>
                                <div class="content black pr-80 lgscreen:pr-0">
                                    <p>{!! $item['content'] !!}</p>
                                </div>                       
                                <div class="btn-custom mt-30">                            
                                    <a href="{!! $item['url'] !!}" class="btn btn-green btn-green-border">Explore</a>                            
                                </div>                   
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif