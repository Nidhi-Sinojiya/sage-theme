{{--
    Template Name: Thanks Template
  --}}

@php if( !is_front_page() && is_home() ){ $header_style = get_field('header_style', get_option('page_for_posts')); }
else { $header_style = get_field('header_style', get_the_ID()); }
if(is_single() && 'post' == get_post_type() ){
$header_style = 'wilder';
} @endphp
<section class="traveller-enquiry-form">
    <div class="flex flex-wrap">
        <div class="lg:w-7/12 w-full enquiry-left">
            <div
                class="xl:px-80 lg:px-40 px-20 lg:py-40 pb-20 pt-20 relative h-screen overflow-y-auto overflow-x-hidden  lgscreen:h-auto">
                <div class="traveller-enquiry_details h-full">
                    <div class="enquiry_header mb-50 header flex flex-wrap items-center justify-between">
                        <div class="logo">
                            <a href="{!! esc_url(home_url()) !!}">
                                <img src="@asset('images/logo.png')" alt="Logo"
                                    class="lozad traveller-enquiry__logo w-[149px]">
                            </a>
                        </div>
                        <div class="top-navbar flex flex-wrap items-center gap-x-8 mdscreen:pl-20">
                            <a href="javascript:void(0)"
                                class="menu-icon flex items-center justify-center w-[25px] h-[25px]">
                                <div class="flex flex-wrap w-30 space-y-2 menu-line cursor-pointer">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="commontext relative white text-center flex flex-col items-center justify-center h-[calc(100%_-_100px)]">
                        @if($thank_you_heading)
                        <div class="title-white">
                            <h4>{!! $thank_you_heading !!}</h4>
                        </div>
                        @endif
                        @if($thank_you_description)
                        <div class="content white w-[420px] lgscreen:w-full px-20 mx-auto py-15">
                           <p>{!! $thank_you_description !!}</p>
                        </div>
                        @endif
                        @if($thank_you_button_link['url'])
                        <div class="btn-custom mt-25">
                            <a href="{!! esc_url(home_url()) !!}" class="btn btn-transparent">{!!
                                $thank_you_button_link['title'] !!}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-5/12 w-full">
            @if(!empty($thank_you_image))
            <div class="traveller-enquiry__top-bar lg:h-screen">
                <img src="{!! $thank_you_image['url'] !!}" alt="{!! $thank_you_image['title'] !!}" class="lozad w-full h-full object-cover">
            </div>
            @endif
        </div>
    </div>
    <div class="main-nav">
        <div class="img absolute text-right w-full right-0 block mdscreen:hidden">
            <img src="@asset('images/menu-bg.jpg')" class="w-50-per h-screen object-cover relative ml-auto"
                alt="Menu Image" />
        </div>
        <div class="menu-wrapper relative z-9999 text-white pt-[200px] mdscreen:pt-150">
            <div class="menu-wrapper-content grid w-50-per h-full mdscreen:w-full">
                <div
                    class="menu-wrapper-grid mdscreen:px-30 mdscreen:h-[70vh] mdscreen:overflow-y-auto mdscreen:overflow-x-hidden">
                    @if($header_style == 'wilder')
                    {!! wp_nav_menu(['theme_location' => 'primary_inner_navigation', 'menu_class' => 'main-menu grid
                    text-right mdscreen:text-left relative', 'menu_id' => 'menu-main-menu', 'echo' => false]) !!}
                    @endif
                    @if($header_style == 'wilder')
                    {!! wp_nav_menu(['theme_location' => 'primary_inner_navigation_two', 'menu_class' => 'secondary-menu
                    text-right mdscreen:text-left grid gap-y-5 mdscreen:gap-y-2 pt-50 mdscreen:pt-20', 'echo' => false])
                    !!}
                    @endif
                    @if(!empty($book_now))
                    <div
                        class="btn-custom text-right mdscreen:text-left mt-30 pr-150 ipad:pr-100 hidden lgscreen:block">
                        <a href="{!! $book_now['url'] !!}" class="btn btn-transparent">{!! $book_now['title'] !!}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
