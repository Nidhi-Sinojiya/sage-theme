import 'jquery';
import 'lity/dist/lity.js';
import {domReady} from '@roots/sage/client';
import { gsap,ScrollTrigger } from 'gsap/all';
import Swiper from 'swiper/bundle';
import FancyBox from '@fancyapps/fancybox';


/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  /*Sticky Header*/
  jQuery(window).scroll(function() {
      if (jQuery(window).scrollTop() >= 100) {
          jQuery('.header').addClass('is-sticky');
      } else {
          jQuery('.header').removeClass('is-sticky');
      }
  });
  /*Sticky Header*/

  // Menu Start
  jQuery(document).ready(function() {
      jQuery('.menu-icon').on("click", function() {
          jQuery("body").toggleClass("menu-open");
          if(jQuery('.header').hasClass("header-search-open")){
            jQuery(".header-search").hide();
          }
      })
  });

  jQuery("#menu-main-menu li span.submenu-button").on('click', function() {
      if (jQuery(this).parent().find(".submenu-button").hasClass("active")) {
          jQuery(this).parent().find(".submenu-button").removeClass("active");
      } else {
          jQuery(".submenu-button").removeClass("active");
          jQuery(this).parent().find(".submenu-button").addClass("active");
      }
      if (jQuery(this).parent().find(".sub-menu").hasClass("active")) {
          jQuery(this).parent().find(".sub-menu").removeClass("active");
      } else {
          jQuery(".sub-menu").removeClass("active");
          jQuery(this).parent().find(".sub-menu").addClass("active");
      }
  });
  // Menu End

  // Explore Slider
  jQuery(document).ready(function($) {
    if ($('.discover-wapper').length) {
        var swiper = new Swiper(".discover-site", {      
            loop: true,
            speed: 1000,                  
            grabCursor: true, 
            spaceBetween: 40,
            navigation: {
              nextEl: ".explore-swiper-button-next",
              prevEl: ".explore-swiper-button-prev",
            },
            breakpoints: {
                100: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                  },
                640: {
                  slidesPerView: 2,
                  spaceBetween: 20,
                },
                768: {
                  slidesPerView: 2,
                  spaceBetween: 30,
                },
                1024: {
                  slidesPerView: 4,
                  spaceBetween: 30,
                },
              },
          });
    }
  });

  jQuery(document).ready(function($) {
// Explore Secondary Slider
if ($('.explore-wrapper-secondary-slider').length) {
    var swiper = new Swiper(".explore-secondary-slider", {      
        loop: true,
        speed: 1000,              
        grabCursor: true,  
        // centeredSlides: true,          
        spaceBetween: 40,
        pagination: {
          el: ".swiper-pagination-2",
          type: "progressbar",
        },
        navigation: {
          nextEl: ".explore-secondary-swiper-button-next",
          prevEl: ".explore-secondary-swiper-button-prev",
        },
        breakpoints: {
            100: {
                slidesPerView: 1,
                spaceBetween: 10,
                centeredSlides: false,   
              },
            640: {
              slidesPerView: 2,
              spaceBetween: 20,
              centeredSlides: false,   
            },
            768: {
              slidesPerView: 3,
              spaceBetween: 30,
            },
            1024: {
              slidesPerView: 3.1,
              spaceBetween: 30,
            },
          },
      });
  }
});

  // Testimonials Slider
  jQuery(document).ready(function($) {
    if ($('.testimonials').length) {
        var swiper = new Swiper(".testimonials-slider", {
            slidesPerView: 1,
            loop: true,
            speed: 1000,
            dots: true,
            grabCursor: true,
            centeredSlides: true,
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }
  });

  jQuery(document).ready(function($) {
    if ($('.micro-testimonials').length) {
        var swiper = new Swiper(".micro-testimonials-slider", {
            slidesPerView: 1,
            loop: true,
            speed: 1000,
            dots: true,
            grabCursor: true,
            centeredSlides: true,
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination-micro",
                clickable: true,
            },
        });
    }
  });

  
// Auto Img Slider
jQuery(document).ready(function($) {
if ($('.explore-wrapper-property-slider').length) {
    var swiper = new Swiper(".property-item", {        
        loop: true,
        speed: 1000,      
        dots: false,
        centeredSlides: true,
        grabCursor: true,        
        spaceBetween: 0,
        pagination: {
          el: ".swiper-pagination-2",
          type: "progressbar",
        },
        navigation: {
          nextEl: ".property-swiper-button-next",
          prevEl: ".property-swiper-button-prev",
        },    
        breakpoints: {
          100: {
              slidesPerView: 1,
              spaceBetween: 0,
            },
          640: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
          1024: {
            slidesPerView: 5.5,
            spaceBetween: 20,
          },
        },
      });
  }
});
  
  // Auto Slider Gallery
//   jQuery(document).ready(function($) {
//   if ($('.auto-slider-gallery').length) {
//     var swiper = new Swiper(".auto-slider", {
//       slidesPerView: 'auto',
//         loop: true,
//         speed: 1000,      
//         dots: true,
//         grabCursor: true,        
//         spaceBetween: 30,
//         pagination: {
//           el: ".swiper-pagination",
//           type: "progressbar",
//         },
//         navigation: {
//           nextEl: ".auto-slider-button-next",
//           prevEl: ".auto-slider-button-prev",
//         },    
//       });
//   }
// });

// Explore Slider
jQuery(document).ready(function($) {
  if ($('.auto-img-grid').length) {
      var swiper = new Swiper(".auto-size-image", {      
          loop: true,
          speed: 1000,                  
          grabCursor: true, 
          spaceBetween: 40,
          pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
          },
          navigation: {
            nextEl: ".auto-swiper-button-next",
            prevEl: ".auto-swiper-button-prev",
          },
          breakpoints: {
              100: {
                  slidesPerView: 1,
                  spaceBetween: 15,
                },
              640: {
                slidesPerView: 2,
                spaceBetween: 20,
              },
              768: {
                slidesPerView: 2,
                spaceBetween: 30,
              },
              1024: {
                slidesPerView: 4,
                spaceBetween: 30,
              },
            },
        });
  }
});

// gallery slider without scrollbar
jQuery(document).ready(function($) {
if ($('.gallery-slider').length) {
  var swiper = new Swiper(".gallery-item", {
    slidesPerView: 'auto',
      loop: false,
      speed: 1000,      
      dots: true,
      grabCursor: true,        
      spaceBetween: 30,
      navigation: {
        nextEl: ".gallery-slide-next",
            prevEl: ".gallery-slide-prev",
      },  
      breakpoints: {
        100: {
            slidesPerView: 1,
            spaceBetween: 0,
          },
        640: {
          slidesPerView: 2,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 0,
        },
        1024: {
          slidesPerView: 'auto',
          spaceBetween: 0,
        },
      },  
    });
}
});


// Auto Slider Gallery
jQuery(document).ready(function($) {
  if ($('.zigzag-slider-wraper').length) {
    var swiper = new Swiper(".zigzag-slider", {
        slidesPerView: 1.2,
        loop: true,
        speed: 1000,      
        dots: true,
        grabCursor: true,        
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          type: "progressbar",
        },
        navigation: {
          nextEl: ".zigzag-swiper-button-next",
          prevEl: ".zigzag-swiper-button-prev",
        }, 
        breakpoints: {
          100: {
              slidesPerView: 1,
              spaceBetween: 10,
            },
          640: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          1024: {
            slidesPerView: 1.2,
            spaceBetween: 30,
          },
        },    
      });
  }
});

// Explore Slider
  jQuery(document).ready(function($) {
    if ($('.experiences-modal-popup').length) {
        var swiper = new Swiper(".experiences-modal-slider", {      
            loop: false,
            slidesPerView: 1,
            speed: 1000,                  
            grabCursor: true, 
            spaceBetween: 0,
            navigation: {
              nextEl: ".experiences-modal-next",
              prevEl: ".experiences-modal-prev",
            },
          });
    }
  });


  // Page Load Animation
  jQuery(document).ready(function() {
      function Te(e, t) {
          var i;
          return function() {
              var n = arguments,
                  s = this;
              i || (e.apply(s, n), i = !0, setTimeout((function() {
                  return i = !1
              }), t))
          }
      }

      var e = Array.prototype.slice.call(document.querySelectorAll(".fade-ani"));
      if (!(e.length < 1)) {
          var t = Te((function() {
              for (var i = 0; i < e.length; i++) n = e[i], s = void 0, r = void 0, o = void 0, a = void 0, s = n.getBoundingClientRect(),
                  r = window.innerHeight || document.documentElement.clientHeight, o = s.bottom < r && s.bottom >= .70 *
                  r, a = s.top <= 0 && s.bottom >= r, (s.top >= 0 && s.top <= .70 * r || a || o) && (e[i].classList.add("is-visible"), e.splice(i, 1), i -= 1);
              var n, s, r, o, a;
              e.length || (window.removeEventListener("scroll", t), window.removeEventListener("resize", t))
          }), 60);
          window.addEventListener("load", t, {
              once: !0
          }), window.addEventListener("scroll", t, {
              passive: !0
          }), window.addEventListener("resize", t, {
              passive: !0
          })
      }
  });

    
    // accordion
    jQuery(document).ready(function ($) {
        $('.accordion-open').on("click", function(){    
        let clickedData = $(this).data("parent");
            if($(this).parent('.accordion-item').hasClass("active")){
            $(this).siblings(".accordion-body").slideDown();
        }
        else{
            $("#"+clickedData + " .accordion-body").slideUp(300);
            $("#"+clickedData + " .accordion-item").removeClass("active");
            $(this).siblings(".accordion-body").slideDown();
            $(this).parent(".accordion-item").addClass("active");
        }
    })
    });


  // Tabs
  jQuery(document).ready(function($) {
      $('ul.tabs li').click(function() {
          var tab_id = $(this).attr('data-tab');

          $('ul.tabs li').removeClass('current');
          $('.tab-content').removeClass('current');

          $(this).addClass('current');
          $("#" + tab_id).addClass('current');
      });
  });

  jQuery(document).ready(function($) {
    $("#searchopen").click(function(){
      $(".header").addClass('header-search-open');
      $(".header-search").show();

      if(jQuery('body').hasClass("menu-open")){
        jQuery("body").removeClass("menu-open");
      }
    });
    
    $("#searchclose").click(function(){
      $(".header").removeClass('header-search-open');
      $(".header-search").hide();
    });
  });

  jQuery(document).ready(function($) {
    $(function () {  
      $(".accordion-content:not(:first-of-type)").css("display", "none");  
      $(".accordion-title:first-of-type").addClass("open");  
      $(".accordion-title").click(function () {
        $(".open").not(this).removeClass("open").next().slideUp(300);
        $(this).toggleClass("open").next().slideToggle(300);
      });
    });
  });

  // Mobile Header
  jQuery(".mobile-menu-icon").click(function(){
    jQuery(".m-header-grid").slideToggle("slow");   
    jQuery("body").toggleClass("mobile-menu-active");    
  });

  /*Sticky Header*/
  jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() >= 100) {
        jQuery('body').addClass('mobile-is-sticky');
    } else {
        jQuery('body').removeClass('mobile-is-sticky');
    }
});
  /*Sticky Header*/

  // application code
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
