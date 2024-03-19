<?php if( !is_front_page() && is_home() ){ $header_style = get_field('header_style', get_option('page_for_posts')); } else { $header_style = get_field('header_style', get_the_ID()); }
if(is_single() && 'post' == get_post_type() || is_search()){
    $header_style = 'wilder';
}
?>
@if($header_style == 'wilder')
<header class="header fixed top-0 left-0 w-full py-60 z-999">
    <div class="container-fluid-md relative z-9">
        <div
            class="grid grid-cols-3 mdscreen:flex mdscreen:flex-wrap mdscreen:justify-between mdscreen:grid-cols-[auto]">
            <div class="top-navbar flex flex-wrap items-center gap-x-8 mdscreen:pl-20">
                <a href="javascript:void(0)" class="menu-icon flex items-center justify-center w-[25px] h-[25px]">
                    <div class="flex flex-wrap w-30 space-y-2 menu-line cursor-pointer">
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </a>
                @if($header_style == 'wilder')
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'flex flex-wrap gap-x-5
                ipad:hidden', 'echo' => false]) !!}
                @endif
            </div>
            <div class="logo text-center">
                @if(!empty($logo))
                <a href="{!! esc_url(home_url()) !!}">
                    <img src="{!! $logo['url'] !!}" class="w-[187px] xlscreen:w-[150px] ipad:w-[130px] mx-auto"
                        alt="Logo" />
                </a>
                @endif
            </div>
            <div class="top-right flex flex-wrap items-center gap-x-5 justify-end mdscreen:pr-20">
                <div class="search">
                    <a href="javascript:void(0)" id="searchopen">
                        <img src="@asset('images/search.png')" class="max-w-[25px]" alt="Search" />
                    </a>
                    <a href="javascript:void(0)" id="searchclose">
                        <img src="@asset('images/close.png')" class="max-w-[25px]" alt="Search" />
                    </a>
                </div>
                @if(!empty($book_now))
                <div class="btn-custom ipad:hidden">
                    <a href="{!! $book_now['url'] !!}" class="btn btn-transparent">{!! $book_now['title'] !!}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>
<div class="main-nav">
    <div class="img absolute text-right w-full right-0 block mdscreen:hidden">
        <img src="@asset('images/menu-bg.jpg')" class="w-50-per h-screen object-cover ml-auto" alt="Menu Image" />
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
                text-right mdscreen:text-left grid gap-y-5 mdscreen:gap-y-2 pt-50 mdscreen:pt-20', 'echo' => false]) !!}
                @endif
                @if(!empty($book_now))
                <div class="btn-custom text-right mdscreen:text-left mt-30 pr-150 ipad:pr-100 hidden lgscreen:block">
                    <a href="{!! $book_now['url'] !!}" class="btn btn-transparent">{!! $book_now['title'] !!}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@else
<header class="header absolute top-0 left-0 w-full py-60 z-999">

    <div class="microsite-main-logo">
        @if(!empty($logo))
        <a href="{!! esc_url(home_url()) !!}">
            <img src="{!! $logo['url'] !!}" class="w-[187px] xlscreen:w-[150px] ipad:w-[130px] mx-auto" alt="Logo" />
        </a>
        @endif
    </div>

    <div class="container-fluid-md relative z-9">
        <div
            class="grid grid-cols-3 mdscreen:flex mdscreen:flex-wrap mdscreen:justify-between mdscreen:grid-cols-[auto]">
            <div class="top-navbar flex flex-wrap items-center gap-x-8 mdscreen:pl-20">
                <a href="javascript:void(0)" class="menu-icon flex items-center justify-center w-[25px] h-[25px]">
                    <div class="flex flex-wrap w-30 space-y-2 menu-line cursor-pointer">
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </a>
            </div>
            <div class="logo text-center">
                @if(!empty($main_website_logo))
                @foreach($main_website_logo as $value)
                @if($header_style == $value['website'])
                <a href="{!! $value['link']['url'] !!}"><img src="{!! $value['logo']['url'] !!}"
                        class="w-[187px] xlscreen:w-[150px] ipad:w-[130px] mx-auto" alt="Logo"></a>
                @endif
                @endforeach
                @endif

            </div>
            <div class="top-right flex flex-wrap items-center gap-x-5 justify-end mdscreen:pr-20">
                <div class="search">
                    <a href="javascript:void(0)" id="searchopen">
                        <img src="@asset('images/search.png')" class="max-w-[25px]" alt="Search" />
                    </a>
                    <a href="javascript:void(0)" id="searchclose">
                        <img src="@asset('images/close.png')" class="max-w-[25px]" alt="Search" />
                    </a>
                </div>
                @if(!empty($book_now))
                @php
                if($header_style == 'olerai' || $header_style =='ballooning' || $header_style == 'ride_maasai' || $header_style == 'cliff_boat'){
                    $about = 'Experience';
                }else{
                    $about = 'Stay';
                }
                @endphp
                <div class="btn-custom ipad:hidden">
                    <a href="{!! $book_now['url'] !!}?about={{$about}}&stay={{$header_style}}" class="btn btn-transparent">{!! $book_now['title'] !!}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="header-navbar-mn relative mt-20 px-30">
        <div
            class="header-navbar border-solid border-0 border-t-1 border-b-1 border-gray-100 border-opacity-40 block lgscreen:hidden">
            @php
            $microsite_header_menu = array(
            'entim' => 'entim_mara_header_menu',
            'cliff' => 'the_cliff_header_menu',
            'ilkeliani' => 'ilkeliani_header_menu',
            'lerai' => 'lerai_safari_camp_header_menu',
            'river_camp' => 'the_river_camp_header_menu',
            'ballooning' => 'mara_ballooning_header_menu',
            'ride_maasai' => 'ride_maasi_mara_header_menu',
            'cliff_boat' => 'cliff_boat_safaris_header_menu',
            'olerai' => 'olerai_conservancy_header_menu'
            );
            @endphp
            @foreach($microsite_header_menu as $menu_key => $menu_value)
            @if($header_style == $menu_key)
            {!! wp_nav_menu(['theme_location' => $menu_value, 'container' => false,'menu_class' => 'flex flex-wrap
            justify-center gap-x-12 xlscreen:gap-x-8', 'echo' => false]) !!}
            @endif
            @endforeach
        </div>
    </div>
</header>
<div class="main-nav">
    
    <div class="img absolute text-right w-full right-0 block mdscreen:hidden">
        <img src="@asset('images/menu-bg.jpg')" class="w-50-per h-screen object-cover ml-auto" alt="Menu Image" />
    </div>
    <div class="menu-wrapper relative z-9999 text-white pt-[200px] mdscreen:pt-150">
        <div class="menu-wrapper-content grid w-50-per h-full mdscreen:w-full">
            <div
                class="menu-wrapper-grid mdscreen:px-30 mdscreen:h-[70vh] mdscreen:overflow-y-auto mdscreen:overflow-x-hidden">
                {!! wp_nav_menu(['theme_location' => 'primary_inner_navigation', 'menu_class' => 'main-menu grid
                text-right mdscreen:text-left relative', 'menu_id' => 'menu-main-menu', 'echo' => false]) !!}
                {!! wp_nav_menu(['theme_location' => 'primary_inner_navigation_two', 'menu_class' => 'secondary-menu
                text-right mdscreen:text-left grid gap-y-5 mdscreen:gap-y-2 pt-50 mdscreen:pt-20', 'echo' => false]) !!}
                @if(!empty($book_now))
                <div class="btn-custom text-right mdscreen:text-left mt-30 pr-150 ipad:pr-100 hidden lgscreen:block">
                    <a href="{!! $book_now['url'] !!}" class="btn btn-transparent">{!! $book_now['title'] !!}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
<div class="header-search fixed w-full z-99 bg-black-200 bg-opacity-90 pt-[210px] lgscreen:pt-150 pb-50 hidden">
    <div class="w-[610px] m-auto text-center lgscreen:w-full lgscreen:px-20">
        <div class="title-white">
            <h3>Search</h3>
        </div>
        <div class="content white">
            <p>Looking for something specific? Search our African destinations, trip ideas and experiences.</p>
        </div>
        <div class="header-search-bx mt-30 relative">
            <form role="search" method="get" id="searchform" action="{!! home_url('/') !!}" target='_top'>
                <input type="search" placeholder="Type Here....."
                    class="placeholder:text-white text-white text-14 pb-5 w-[90%] outline-none bg-transparent border-0 border-b-1 border-white"
                    value="{{ get_search_query() }}" name="s">
                <button id='search-button' type='submit'><img src="@asset('images/search.png')" class="max-w-[20px]"
                        alt="Search"></button>
            </form>
        </div>
    </div>
</div>


@if($header_style != 'wilder')
<section class="mobile-header  fixed bottom-0 w-full z-[99999]  hidden transition-all duration-700">
    <div class="m-header-grid relative pb-15 hidden pl-20">
        @php
        $microsite_header_menu = array(
            'entim' => 'entim_mara_header_menu',
            'cliff' => 'the_cliff_header_menu',
            'ilkeliani' => 'ilkeliani_header_menu',
            'lerai' => 'lerai_safari_camp_header_menu',
            'river_camp' => 'the_river_camp_header_menu',
            'ballooning' => 'mara_ballooning_header_menu',
            'ride_maasai' => 'ride_maasi_mara_header_menu',
            'cliff_boat' => 'cliff_boat_safaris_header_menu',
            'olerai' => 'olerai_conservancy_header_menu'
        );
        @endphp
        @foreach($microsite_header_menu as $menu_key => $menu_value)
            @if($header_style == $menu_key)
                {!! wp_nav_menu(['theme_location' => $menu_value, 'container' => false,'menu_class' => 'grid gap-y-2', 'echo' => false]) !!}
            @endif
        @endforeach
    </div>
    <div class="flex flex-wrap justify-between px-20 py-20 w-full bg-lightsavanna">
        <div class="m-header-menu flex items-center gap-x-3">
            <div class="flex flex-wrap w-30 space-y-2 mobile-menu-icon cursor-pointer">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <span class="text-12 font-primary text-[##010101] tracking-02em font-300 open-menu">Menu</span>
            <span class="text-12 font-primary text-[##010101] tracking-02em font-300 close-menu">Close</span>
        </div> 
        @if(!empty($book_now))
            @php
            if($header_style == 'olerai' || $header_style =='ballooning' || $header_style == 'ride_maasai' || $header_style == 'cliff_boat'){
                $about = 'Experience';
            }else{
                $about = 'Stay';
            }
            @endphp
        <div class="btn-custom">
            <a href="{!! $book_now['url'] !!}?about={{$about}}&stay={{$header_style}}" class="btn-border">Enquire</a>                
        </div>
        @endif                   
    </div>  
</section>
@endif