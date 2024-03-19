@if($content->hide_section == 'no')
<section class="tabs-with-grid common-content lg:py-0 py-35  lg:mb-100 mb-0 fade-ani @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
    <div class="container-fluid">
        <div class="tabs-wrapper img-grid-wrapper lg:px-90 xlscreen:px-90 lgscreen:px-0">
            <ul class="tabs flex flex-wrap gap-x-6 gap-y-3 mb-50 fade-ani-one">
                @foreach( $content->tabs as $index => $heading)
                @php $str = strtolower(str_replace(array(' & ', ' '), '-', $heading['tab_heading'])); @endphp
                <li class="tab-link text-12 tracking-02em text-white font-600 uppercase pb-5 cursor-pointer @if($index == 0) current @endif" data-tab="{!! $str !!}">{!! $heading['tab_heading'] !!}</li>
                @endforeach
            </ul>
            <div class="tabs-container">
                @foreach ($content->tabs as $index => $content)
                @php $str = strtolower(str_replace(array(' & ', ' '), '-', $content['tab_heading'])); @endphp
                <div id="{!! $str !!}"
                    class="tab-content  w-50-per xlscreen:w-full fade-ani-two @if($index == 0) current @endif">
                    @php echo $content['tab_content']; @endphp
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif