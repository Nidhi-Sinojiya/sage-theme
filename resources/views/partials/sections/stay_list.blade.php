@if($content->hide_section == 'no')
<section class="zigzag-group lg:py-60 py-30 @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
        <div class="container-fluid-xl">
            <div class="zigzag-group-grid grid gap-y-16">
            @foreach($content->accommodations as $stay)
                <div class="flex flex-wrap items-center">
                    <div class="lg:w-6/12 w-full">
                    <a href="{!! $stay['url'] !!}">
                        <div class="img">
                            <img src="{!! $stay['fea_img'] !!} " alt="Main Camp">
                        </div>
                    </a>
                    </div>
                    <div class="lg:w-6/12 w-full">
                        <div class="zigzag-group-content pl-70 lgscreen:pl-0 lgscreen:pt-20">
                            @if(!empty( $stay['title'] ))
                            <a href="{!! $stay['url'] !!}">
                            <div class="title-black">
                                <h2>{!! $stay['title'] !!}</h2>
                            </div>
                            </a>
                            @endif
                            <ul class="zigzagcontent-inner flex flex-wrap items-center pt-15 gap-x-8 gap-y-2 py-20">
                            @if(!empty($stay['stay_guest']))
                                <li> <img src="@asset('images/clarity-house-line.png')" class="w-[20px] h-[20px] object-contain mr-5" alt=""> <span>{!! $stay['stay_guest'] !!}</span></li>
                                @endif
                                @if(!empty($stay['stay_beds']))
                                <li> <img src="@asset('images/profile.png')" class="w-[18px] h-[18px] object-contain mr-5" alt=""> <span>{!! $stay['stay_beds'] !!}</span></li>
                                @endif
                            </ul>
                            @if(!empty($stay['content']))
                            <div class="content black pr-80 lgscreen:pr-0">
                                <p>{!! $stay['content'] !!}</p>
                            </div>
                            @endif
                            @if(!empty($stay['url']))
                            <div class="btn-custom mt-10">
                                <a href="{!! $stay['url'] !!}" class="btn btn-link green">Explore {!! $stay['title'] !!}</a>
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