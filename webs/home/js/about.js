$(function() {
    var swiper2 = new Swiper(".swiper2", {
        loop: true, // 循环模式选项
        slidesPerView: 4,
        spaceBetween: 20,
        navigation: {
          nextEl: ".h-pro-swiper-next2",
          prevEl: ".h-pro-swiper-prev2",
        },
        breakpoints: {
            1399: {
                slidesPerView: 3,
            },
            767: {
                slidesPerView: 2,
            },
            500: {
                slidesPerView: 1,
            }
        }
      });
      
      var galleryThumbs11 = new Swiper('.gallery-thumbs11', {
        spaceBetween: 0,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 0,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 0,
          },
        }
    
      });
      var galleryTop11 = new Swiper('.gallery-top11', {
        spaceBetween: 10,
        loop: true,
        thumbs: {
          swiper: galleryThumbs11
        },
        navigation: {
          nextEl: '.lc-next',
          prevEl: '.lc-prev',
        }
      });
      
      
      $("a.toGsjj").click(function() {
        $("html, body").animate({
          scrollTop: $($(this).attr("href")).offset().top - 50 + "px"
        }, {
          duration: 600,
          easing: "linear"
        });
        return false;
    });
    
    $("a.toFzlc").click(function() {
        $("html, body").animate({
          scrollTop: $($(this).attr("href")).offset().top - 50 + "px"
        }, {
          duration: 600,
          easing: "linear"
        });
        return false;
    });
    
    $("a.toRyzz").click(function() {
        $("html, body").animate({
          scrollTop: $($(this).attr("href")).offset().top - 50 + "px"
        }, {
          duration: 600,
          easing: "linear"
        });
        return false;
    });
    
})