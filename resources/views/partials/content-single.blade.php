<section class="banner inner-banner banner-overlay-remove relative h-screen pt-30 pb-0 fade-ani">
  <div class="container-fluid h-full">
      <div class="overflow-hidden h-full">
          <img src="{{ get_the_post_thumbnail_url() }}" class="w-full h-[calc(100vh_-_30px)] object-cover block" alt="Banner">
      </div>
      <div class="absolute top-50per left-50per text-center translate-x-minus_50 translate-y-minus_50 pt-80 w-[calc(100%_-_60px)] px-20">
          <h1 class="text-white fade-ani-one">{{ the_title() }}</h1>
          <p class="text-white">{{ get_the_date() }}</p>
      </div>
  </div>
</section>
<section class="blog-content relative mb-80 lgscreen:mb-40 content white py-100 lgscreen:py-50 fade-ani"> 
        <div class="container-fluid-xl">
            @php echo get_the_content(); @endphp
        </div>
        
        <div class="sicon">
            <div class="container-fluid-xl">
                <div class="flex flex-wrap items-center pt-80 gap-x-10 lgscreen:pt-40">
                    <div class="title-white fade-ani-one">
                        <h2>Share this post</h2>
                    </div>
                    <ul class="flex flex-wrap items-center justify-start gap-x-3 mt-0 pt-10 fade-ani-two">
                        @if(!empty($social_media))
                            @php
                            $link = "https://www.getencircle.com/blog/encircle-floor-plan-faqs";
                            
                            $url = get_permalink();
                            $url = esc_url($url);

                            @endphp
                            
                            @foreach($social_media as $media)
                                @if(strtolower($media['icon_title']) == 'facebook')
                                    @php $share_link = 'http://www.facebook.com/sharer.php?u=" . $url . "'; @endphp
                                @elseif(strtolower($media['icon_title']) == 'instagram')
                                    @php $share_link = 'https://instagram.com/share?url=" . $url . "'; @endphp
                                @elseif(strtolower($media['icon_title']) == 'linkedin')
                                    @php $share_link = 'http://www.linkedin.com/shareArticle?url=" . $url . "'; @endphp
                                @elseif(strtolower($media['icon_title']) == 'youtube')
                                    @php $share_link = '#'; @endphp
                                @endif  

                                    <li>
                                         <a href="{!! $share_link !!}" rel="noopener" target="_blank">
                                            <img src="{!! $media['icon']['url'] !!}" alt="{!! $media['icon']['title'] !!}" />
                                        </a>
                                    </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </section>
