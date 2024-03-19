@php if( !is_front_page() && is_home() ){ $footer_style = get_field('footer_style', get_option('page_for_posts')); }
else { $footer_style = get_field('footer_style', get_the_ID()); }
if(is_single() && 'post' == get_post_type() || is_search()){
$footer_style = 'wilder';
}
@endphp
@if($footer_style == 'wilder')
<footer class="footer fade-ani">
    <div class="footer-navbar pt-50 pb-80 lgscreen:pt-25 lgscreen:pb-40">
        <div class="container-fluid-xl text-center">
            <div class="logo fade-ani-two">
                <a href="{!! esc_url(home_url()) !!}">
                    @if(!empty($footer_logo))
                    <img src="{!! $footer_logo['url'] !!}" class="m-auto w-[191px]" alt="Logo" />
                    @else
                    <img src="@asset('images/footer-logo.png')" class="m-auto w-[191px]" alt="Logo" />
                    @endif
                </a>
            </div>
            @if(!empty($footer_logo_tagline))
            <span class="text-white text-14 font-300 tracking-02em mt-30 inline-block fade-ani-two">{!!
                $footer_logo_tagline !!}</span>
            @endif
            <div
                class="footer-logos border-solid border-0 border-b-1 border-white border-opacity-10 pb-15 fade-ani-three">
                <ul
                    class="flex flex-wrap items-center justify-center gap-x-16 desktop2:gap-x-8 laptop:gap-x-6 xlscreen:gap-x-6 gap-y-4 pt-50">
                    @if(!empty($website_logo))
                    @foreach($website_logo as $value)
                    <li><a href="{!! $value['link']['url'] !!}"><img src="{!! $value['logo']['url'] !!}"
                                alt="{!! $value['logo']['name'] !!}" /></a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="footer-menu">
                @if($footer_style == 'wilder')
                {!! wp_nav_menu(['theme_location' => 'wilder_group_footer', 'menu_class' => 'flex flex-wrap items-center
                gap-x-12 gap-y-4 justify-center pt-30 lgscreen:pt-25 fade-ani-four', 'echo' => false]) !!}
                @endif
                @if(!empty($enquire_link))
                <div class="btn-custom flex justify-center my-40 lgscreen:my-25 fade-ani-five">
                    <a href="{!! $enquire_link['url'] !!}" class="btn btn-red">{!! $enquire_link['title'] !!}</a>
                </div>
                @endif
                @if(!empty($micro_site_footer))
                @foreach($micro_site_footer as $value)
                @if($footer_style == $value['website'])
                <div class="fade-ani-six">
                    <span class="text-white tracking-02em text-12 font-300">
                        @if(!empty($value['e-mail_address']))
                        <a href="mailto:{!! $value['e-mail_address'] !!}" class="underline">{!! $value['e-mail_address']
                            !!}</a>
                        @endif
                        @if(!empty($value['phone_number']))
                        @foreach($value['phone_number'] as $number)
                        <a href="tel:{!! $number['phone_number'] !!}">{!! $number['phone_number'] !!}</a>
                        @endforeach
                        @endif
                    </span>
                </div>
                @endif
                @endforeach
                @endif
                <div class="sicon">
                    <ul class="flex flex-wrap items-center justify-center gap-x-3 pt-30 fade-ani-seven">
                        @if(!empty($social_media))
                        @foreach($social_media as $media)
                        <li>
                            <a href="{!! $media['link']['url'] !!}">
                                <img src="{!! $media['icon']['url'] !!}" alt="facebook" />
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center bg-black-100 py-40 pb-20 lgscreen:py-20">
        @if(!empty($newsletter_button_text))
        <div class="btn-custom flex justify-center fade-ani-one">
            <a href="javascript:void(0)" data-fancybox="" data-src="#form-newsletter" class="btn btn-transparent">{!!
                $newsletter_button_text !!}</a>
        </div>
        @endif
        @if(!empty($copyright_text))
        <div class="btm-text flex flex-wrap items-center justify-center pt-20 fade-ani-two">
            <span class="text-white text-10 tracking-02em font-300 relative top-[1px]">{!! $copyright_text !!}</span>
            @if(!empty($legal_page_list))
            <ul class="flex flex-wrap gap-x-5 pl-5">
                @foreach($legal_page_list as $page)
                <li><a href="{!! $page['legal_page']['url'] !!}">{!! $page['legal_page']['title'] !!}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
        @endif
    </div>
</footer>
@else
<footer class="footer bg-color fade-ani">
    <div class="footer-navbar-top py-60 lgscreen:py-30">
        <div class="container-fluid">
            <div class="border-solid border-1 border-white py-60 lgscreen:py-40">
                <div class="w-[1240px] desktop2:w-[1040px] laptop:w-full laptop:px-50 lgscreen:px-20 m-auto">
                    <div class="flex flex-wrap justify-between ipad:inline-block ipad:text-center ipad:w-full mt-65">
                        <div class="footer-info fade-ani-one mt-[-50px]">
                            <div class="logo">
                                @if(!empty($main_website_logo))
                                @foreach($main_website_logo as $value)
                                @if($footer_style == $value['website'])
                                <a href="{!! $value['link']['url'] !!}"><img src="{!! $value['logo']['url'] !!}"
                                        class="w-[187px] xlscreen:w-[150px] ipad:w-[130px] ipad:mx-auto" alt="Logo"></a>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            @if(!empty($micro_site_footer))
                            @foreach($micro_site_footer as $value)
                            @if($footer_style == $value['website'])
                            <div class="contact-info mt-15">
                                @if(!empty($value['e-mail_address']))
                                <a href="mailto:{!! $value['e-mail_address'] !!}" class="underline">{!!
                                    $value['e-mail_address'] !!}</a>
                                @endif
                                @if(!empty($value['phone_number']))
                                <span
                                    class="text-white tracking-02em text-12 font-300 flex flex-wrap xlscreen:justify-center gap-x-2 gap-y-2 mt-5">
                                    @foreach($value['phone_number'] as $number)
                                    <a href="tel:{!! $number['phone_number'] !!}">{!! $number['phone_number'] !!}</a>
                                    @endforeach
                                </span>
                                @endif
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                        @php
                        $microsite_footer_menu = array(
                        'entim' => 'entim_mara_footer_menu',
                        'cliff' => 'the_cliff_footer_menu',
                        'ilkeliani' => 'ilkeliani_footer_menu',
                        'lerai' => 'lerai_safari_camp_footer_menu',
                        'river_camp' => 'the_river_camp_footer_menu',
                        'ballooning' => 'mara_ballooning_footer_menu',
                        'ride_maasai' => 'ride_maasi_mara_footer_menu',
                        'cliff_boat' => 'cliff_boat_safaris_footer_menu',
                        'olerai' => 'olerai_conservancy_footer_menu'
                        );
                        @endphp

                        @foreach($microsite_footer_menu as $menu_key => $menu_value)
                        @if($footer_style == $menu_key)
                        @php
                        $locations = get_nav_menu_locations();
                        $menu_id = $locations[$menu_value];
                        $menu = wp_get_nav_menu_object( $menu_id );
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        $menu_list = '';
                        $menu_count = 0;
                        $menu_count_array = array("two", "three", "four");
                        @endphp

                        @foreach (array_chunk($menu_items, 3) as $menu_item)
                        @php $menu_list .= '<div
                            class="footer-navbar pt-40 lgscreen:pt-20 fade-ani-'.$menu_count_array[$menu_count].'">
                            <ul class="grid gap-y-2">'; @endphp
                                @foreach ($menu_item as $menu)
                                @php $title = $menu->title;
                                $url = $menu->url;
                                $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>'; @endphp
                                @endforeach
                                @php $menu_list .= '</ul>
                        </div>';
                        $menu_count++; @endphp
                        @endforeach
                        {!! $menu_list !!}
                        @endif
                        @endforeach
                    </div>
                    <div class="sicon">
                        <ul
                            class="flex flex-wrap items-center justify-start ipad:justify-center gap-x-3 pt-30 fade-ani-five">
                            @if(!empty($social_media))
                            @foreach($social_media as $media)
                            <li>
                                <a href="{!! $media['link']['url'] !!}">
                                    <img src="{!! $media['icon']['url'] !!}" alt="facebook" />
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-navbar bg-black-200 pt-40 pb-20">
        <div class="container-fluid-xl text-center">
            <div class="logo fade-ani-two">
                <a href="{!! esc_url(home_url()) !!}">
                    @if(!empty($footer_logo))
                    <img src="{!! $footer_logo['url'] !!}" class="m-auto w-[191px]" alt="Logo" />
                    @else
                    <img src="@asset('images/footer-logo.png')" class="m-auto w-[191px]" alt="Logo" />
                    @endif
                </a>
            </div>
            @if(!empty($footer_logo_tagline))
            <span class="text-white text-14 font-300 tracking-02em mt-30 inline-block fade-ani-two">{!!
                $footer_logo_tagline !!}</span>
            @endif
            <div
                class="footer-logos border-solid border-0 border-b-1 border-white border-opacity-10 pb-15 fade-ani-three">
                <ul
                    class="flex flex-wrap items-center justify-center gap-x-16 desktop2:gap-x-8 laptop:gap-x-6 xlscreen:gap-x-6 gap-y-4 pt-50">
                    @if(!empty($website_logo))
                    @foreach($website_logo as $value)
                    <li><a href="{!! $value['link']['url'] !!}"><img src="{!! $value['logo']['url'] !!}"
                                alt="{!! $value['logo']['name'] !!}" /></a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright text-center bg-black-100 py-40 pb-20 lgscreen:py-20">
        @if(!empty($newsletter_button_text))
        <div class="btn-custom flex justify-center fade-ani-one">           
            <a href="javascript:void(0)" data-fancybox="" data-src="#form-newsletter" class="btn btn-transparent">{!!
                $newsletter_button_text !!}</a>
        </div>
        @endif
        @if(!empty($copyright_text))
        <div class="btm-text flex flex-wrap items-center justify-center pt-20 fade-ani-two">
            <span class="text-white text-10 tracking-02em font-300 relative top-[1px]">{!! $copyright_text !!}</span>
            @if(!empty($legal_page_list))
            <ul class="flex flex-wrap gap-x-5 pl-5">
                @foreach($legal_page_list as $page)
                <li><a href="{!! $page['legal_page']['url'] !!}">{!! $page['legal_page']['title'] !!}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
        @endif
    </div>
</footer>
@endif

<div class="custom-popup">
    <div id="form-newsletter"
        class="relative hidden newsletter-modal-popup modal-popup-content w-[90%] smscreen2:w-full bg-color lgscreen:p-20">
        <a href="javascript:void(0)"
            class="absolute flex items-center justify-center transition-all duration-300 ease-in-out right-70 lgscreen:top-50 lgscreen:right-80 top-50 smscreen:right-60 smscreen:top-40 w-30 h-30 z-9"
            data-fancybox-close="">
            <span class="text-12 text-black-200 font-600 mr-10 text-opacity-50 lgscreen:text-white">CLOSE</span>
            <img src="@asset('images/close-black.png')"
                class="w-[20px] modal-close" alt="modal-close">
        </a>
        <div class="custom-modal-inner h-full bg-white">
            <div class="flex flex-wrap items-center h-full">
                <div class="lg:w-6/12 w-full h-full lgscreen:hidden">
                    @if(!empty($newsletter_form_image))    
                    <div class="img h-full">
                        <img src="{{ $newsletter_form_image['url'] }}"
                            class="object-cover w-full h-full" alt="experiences-fancy-img1">
                    </div>  
                    @endif                  
                </div>
                <div class="lg:w-6/12 w-full">
                    <div class="zigzag-content px-60 laptop:px-20 lgscreen:py-30">
                        @php echo do_shortcode($newsletter_form);
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>