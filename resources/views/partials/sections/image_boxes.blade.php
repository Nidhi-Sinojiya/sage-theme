@if($content->hide_section == 'no')
@php $header_style = get_field('header_style', get_the_ID()); @endphp
@if($header_style != 'wilder')         
@php $titleClass = "title-black"; $contClass ="black" @endphp
@else
@php $titleClass = "title-white"; $contClass ="white" @endphp
@endif
<section class="explore-img-grid relative lg:py-40 fade-ani @if($content->extra_class){{$content->extra_class}}@endif"
    @if($content->id) id="{{$content->id}}" @endif>
    <div class="ani-overlay">
        <div class="container-fluid-xl">
            <div class="flex flex-wrap lg:mx-minus-15 mx-0 gap-y-10">
                @foreach( $content->boxes as $box)
                <div class="lg:w-4/12 w-full lg:px-15 px-0">
                    <div class="img-grid">
                        <div class="img fade-ani-one">
                            <img src="{!! $box['image']['url'] !!}" alt="{!! $box['image']['title'] !!}">
                        </div>
                        <div class="img-grid-content text-center pt-30">
                            <div class="icon-img">
                                <img src="{!! $box['logo_image']['url'] !!}" class="max-w-[75px] m-auto fade-ani-two"
                                    alt="{!! $box['logo_image']['title'] !!}">
                            </div>
                            <div class="{!! $titleClass !!} mt-20 fade-ani-three">
                                <h5>{!! $box['heading'] !!}</h5>
                            </div>
                            <div class="content {!! $contClass !!} px-20 fade-ani-four">
                                <p> {!! $box['content'] !!} </p>
                            </div>
                            @if(!empty($box['button']))
                            <div class="btn-custom mt-20 fade-ani-five">
                                <a href="{!! $box['button']['url'] !!}" class="btn @if($header_style != 'wilder') btn-color @else btn-red @endif ">{!!
                                    $box['button']['title'] !!}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif