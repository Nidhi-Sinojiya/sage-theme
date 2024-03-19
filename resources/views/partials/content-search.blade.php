<div class="lg:w-6/12 w-full lg:px-15 px-0 tab-grid hidden tabs-md">
    <div class="img-grid">
        <div class="img relative">
        @if ( has_post_thumbnail() ) 
            <img src="{{get_the_post_thumbnail_url(get_the_ID(),'full')}}" alt="The Cliff">
        @else
        <img src="@asset('images/blog-single.jpg')" alt="The Cliff">
        @endif
        </div>
        <div class="img-info pt-30 lg:pr-80">
            <div class="title-white">
                <h3>{!! $title !!}</h3>
            </div>
            <div class="content white">
                @php(the_excerpt())
            </div>
            <div class="btn-custom mt-20">
                <a href="{{ get_permalink() }}" class="btn btn-link">Read More</a>
            </div>
        </div>
    </div>
</div>