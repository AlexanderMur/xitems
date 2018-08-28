$ = jQuery;
!(function ($) {
  $(window).on('load', function () {

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
      $('body').addClass('ios');
    } else {
      $('body').addClass('web');
    }
    ;

    $('body').removeClass('loaded');
  });

  /* viewport width */
  function viewport() {
    var e = window,
        a = 'inner';
    if (!('innerWidth' in window)) {
      a = 'client';
      e = document.documentElement || document.body;
    }
    return {width: e[a + 'Width'], height: e[a + 'Height']}
  };
  /* viewport width */
  $(function () {
    $('.pageControls').show('slow');
    /* placeholder*/
    $('input, textarea').each(function () {
      var placeholder = $(this).attr('placeholder');
      $(this).focus(function () {
        $(this).attr('placeholder', '');
      });
      $(this).focusout(function () {
        $(this).attr('placeholder', placeholder);
      });
    });
    /* placeholder*/
    $(document).on('click', '.button-nav', function () {
      $(this).toggleClass('active'),
          $('.main-nav-list').slideToggle();
      return false;
    });
    $(document).on('click', '.header-nav__btn', function () {
      $(this).parents('.header-right').find('.header-cartBtn').toggleClass('active');
      $(this).parent().toggleClass('active');
      $(this).parent().find('ul').toggleClass('active');
    });
    $(document).on('click', '.add-product-button', function () {
      var $button = $(this);
      var oldValue = $button.parent().find('input').val();
      if ($button.hasClass('add-product-plus')) {
        var newVal = parseFloat(oldValue) + 1;
      } else {
        if (oldValue > 0) {
          var newVal = parseFloat(oldValue) - 1;
        } else {
          newVal = 0;
        }
      }
      $button.parent().find("input").val(newVal);
    });
    $('.js-styled').styler();
    if ($('.checkout').length) {
      $(document).on('click', '.header-cartBtn', function () {

        var checkoutCart = $('#checkoutCart');
        var checkoutOrder = $('#checkoutOrder');
        $('.checkout').fadeIn();
        checkoutCart.fadeIn();
        $(this).removeClass('active');
        checkoutOrder.removeClass('active');
        checkoutCart.addClass('active');
      });
      $(document).on('click', '.checkout-item__trigger', function () {

        var checkoutCart = $('#checkoutCart');
        var checkoutOrder = $('#checkoutOrder');
        checkoutOrder.removeClass('active');
        checkoutCart.removeClass('active');
        $('.header-cartBtn').removeClass('active');
        $('.checkout').fadeOut('slow');
      });
      $(document).on('click', '.checkout-bottom button', function () {

        var checkoutCart = $('#checkoutCart');
        var checkoutOrder = $('#checkoutOrder');
        if (checkoutCart.hasClass('active')) {
          //checkoutCart.slideUp();
          checkoutCart.hide();
          checkoutCart.removeClass('active');
          checkoutOrder.addClass('active');
        }
      });
      $('.checkout-bottom button').on('submit', function () {

        var checkoutCart = $('#checkoutCart');
        var checkoutOrder = $('#checkoutOrder');
        if (checkoutOrder.hasClass('active')) {
          checkoutOrder.removeClass('active');
          checkoutCart.removeClass('active');
          $('.checkout').fadeOut('slow');
        }
      });
    }
    //index
    if ($('.tab-container').length) {
      $(".tabs .tab").click(function () {
        $(".tabs .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(this).parents('.tab-container').find(".tab-content .tab-item").hide().eq($(this).index()).fadeIn();
      }).eq(0).addClass("active");
    }
    //index
    if ($('.js-catalog-slider').length) {
      $('.js-catalog-slider').not('.slick-initialized').slick({
        dots: false,
        infinite: false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 40000,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              dots: false,
            }
          }
        ]
      });

      var totalItems = $('.catalog-item').length;
      var progressBar = $('.catalog-item__number .progress .bar');
      var slickActive = $('.catalog-slider .catalog-item.slick-active')
      progressBar.css({'width': (100 * 1 / totalItems) + '%'});
      $('.catalog-item__number .current').html('1');
      $('.catalog-item__number .total').html(totalItems);
      $('.catalog-categories .price').find('#amount').html(slickActive.attr('price'));
      if (slickActive.attr("sale") === "true") {
        $('.catalog-item__sale').addClass('active');
      } else {
        $('.catalog-item__sale').removeClass('active');
      }
      var defaultPoint;
      var activePointX = 235;
      var activePointY = 160;
      var zpx = -55;
      var zpy = 0;
      var scene = $('.catalog-categories');
      var item = $('.catalog-categories li');
      var itemActive = $('.catalog-categories li.active');
      item.css({'right': activePointY + 'px', 'top': activePointX + 'px'});
      for (var i = 0; i < item.length; i++) {
        if (i < 3) {
          item.eq(i).css({'right': zpx + 'px', 'top': zpy + 'px'});
          item.eq(i).attr('top', zpy);
          item.eq(i).attr('right', zpx);
          zpy += 160;
          if (zpy > 320) zpy = 80;
        }
        else if (i < 6 && i >= 3) {
          zpx = 90;
          item.eq(i).css({'right': zpx + 'px', 'top': zpy + 'px'});
          item.eq(i).attr('top', zpy);
          item.eq(i).attr('right', zpx);
          zpy += 160;
          if (zpy > 400) zpy = 320;
        }
        else if (i < 8 && i >= 6) {
          zpx = 235;
          item.eq(i).css({'right': zpx + 'px', 'top': zpy + 'px'});
          item.eq(i).attr('top', zpy);
          item.eq(i).attr('right', zpx);
          zpy += 160;
          if (zpy > 630) zpy = 240;
        }
        else if (i < 10 && i >= 8) {
          zpx = 380;
          item.eq(i).css({'right': zpx + 'px', 'top': zpy + 'px'});
          item.eq(i).attr('top', zpy);
          item.eq(i).attr('right', zpx);
          zpy += 160;
        } else {
          zpx = -55;
          zpy = 480;
          item.eq(i).css({'right': zpx + 'px', 'top': zpy + 'px'});
          item.eq(i).attr('top', zpy);
          item.eq(i).attr('right', zpx);
          zpy += 160;
        }
        if (item.eq(i).attr("category") === $('.catalog-slider .catalog-item.slick-active').attr("category")) {
          item.removeClass('active');
          item.find('.icon').removeClass('active');
          item.eq(i).addClass('active');
          item.eq(i).find('.icon').addClass('active');
          item.eq(i).css({'right': activePointX + 'px', 'top': activePointY + 'px'});
        }
        activePlate(item, 235, 160);
        // if(item.eq(i).hasClass('active')){
        // 	item.eq(i).find('.icon').addClass('active');
        // 	item.eq(i).css({'right': activePointY + 'px', 'top': activePointX + 'px'});
        // }
      }

      $(item).click(function () {
        var slider_items = $('.js-catalog-slider .catalog-item');

        var category = $(this).attr('category');
        var slider_category = new Array();
        activePlate(item, 235, 160);

        item.removeClass('active');

        for (var i = 0; i < slider_items.length; i++) {
          slider_category[i] = slider_items.eq(i).attr('category');
          if (category == slider_category[i]) {
            $('.js-catalog-slider').slick('slickGoTo', i);
            //$(this).addClass('active');
            calcSlides(totalItems, progressBar, item);
            //activePlate(item, 235, 160);
            continue;
          }
        }

      });

      $('.catalog-slider .slick-arrow').on('click', function () {
        calcSlides(totalItems, progressBar, item);
      });
      $('.catalog-slider .slick-dots button').click(function () {
        calcSlides(totalItems, progressBar, item);
      });
      $('.catalog-slider').on('swipe', function () {
        calcSlides(totalItems, progressBar, item);
      });
    }

    if ($('.productCard-slider').length) {

    }

    $(document).on('click', '.pageDown-button', function () {
      $('.onePage-scroll').moveDown();
    });

    function initProductSlider() {
      $('.productCard-slider').not('.slick-initialized').slick({
        dots: false,
        infinite: false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
        appendArrows: '.productCard-slider__nav',
      });

      var imgAmount = $('.productCard-slider .img-wrapper').length;

      $('.productCard-slider__nav .current').html('1');
      $('.productCard-slider__nav .total').html(imgAmount);

      $('.productCard-slider__nav .slick-arrow').click(function () {
        for (var i = 0; i < imgAmount; i++) {
          if ($('.productCard-slider .img-wrapper').eq(i).hasClass('slick-active')) {
            $('.productCard-slider__nav .current').html(i + 1);
          }
        }
      });
      $('.productCard-slider').on('swipe', function () {
        for (var i = 0; i < imgAmount; i++) {
          if ($('.productCard-slider .img-wrapper').eq(i).hasClass('slick-active')) {
            $('.productCard-slider__nav .current').html(i + 1);
          }
        }
      });
    }

    function initVideo() {
      var vid = document.getElementById("bgvid");
      var wrapper = document.getElementById('vidWrapper');
      var controls = document.querySelector("#videoControls");
      var pauseButton = document.querySelector("#pauseButton");
      pauseButton.innerHTML = "<img src='" + window.site.assets_url + "/img/icon-play.png'>";
      if (window.matchMedia('(prefers-reduced-motion)').matches) {
        vid.removeAttribute("autoplay");
        vid.pause();
        pauseButton.innerHTML = "<img src='" + window.site.assets_url + "/img/icon-play.png'>";
      }

      function vidFade() {
        vid.classList.add("stopfade");
      }

      vid.addEventListener('ended', function () {
        // only functional if "loop" is removed
        vid.pause();
        // to capture IE10
        vidFade();
      });
      pauseButton.addEventListener("click", function () {
        vid.classList.toggle("stopfade");
        wrapper.classList.toggle('active');
        if (vid.paused) {
          vid.play();
          pauseButton.innerHTML = "";
          $('header').css({'opacity': '0'});
          $('.pageControls').css({'opacity': '0'});
          $('.onepage-pagination').css({'opacity': '0'});
        } else {
          vid.pause();
          $('header').css({'opacity': '1'});
          $('.pageControls').css({'opacity': '1'});
          $('.onepage-pagination').css({'opacity': '1'});
          pauseButton.innerHTML = "<img src='" + window.site.assets_url + "/img/icon-play.png'>";
        }
      });
      vid.addEventListener("click", function () {
        vid.classList.toggle("stopfade");
        if (vid.paused) {
          vid.play();
          pauseButton.innerHTML = "";
          $('header').css({'opacity': '0'});
          $('.pageControls').css({'opacity': '0'});
          $('.onepage-pagination').css({'opacity': '0'});
        } else {
          vid.pause();
          $('header').css({'opacity': '1'});
          $('.pageControls').css({'opacity': '1'});
          $('.onepage-pagination').css({'opacity': '1'});
          pauseButton.innerHTML = "<img src='" + window.site.assets_url + "/img/icon-play.png'>";
        }
      });
    }

    window.initSingle = function () {
      if ($('video').length) {
        initVideo()
      }
      $('.js-styled').styler();
      initProductSlider()
      var markItem = $('.js-mark');
      var rating = new Array();
      var maxRating = 100;
      for (var i = 0; i < markItem.length; i++) {
        rating[i] = parseInt(markItem.eq(i).attr('rating'));
        rating[i] = maxRating - rating[i];
        markItem.eq(i).find('.rating-bar').css({'width': rating[i] + '%'});
      }
      handler()
    }
    console.log(window.initSingle)
    if ($('.js-mark').length) {

    }
    //index
    if ($('.text-box-expand').length) {
      $('.text-box-expand').click(function () {
        $(this).parent().find('.text-box').toggleClass('active');
        if ($.trim($(this).html()) === "Больше") {
          $(this).html('Скрыть');
        } else {
          $(this).html('Больше');
        }
      });
    }

      if($('.single-product')){
        window.initSingle()
      }
  });
  //resize
  var handler = function () {

    var height_footer = $('footer').height();
    var height_header = $('header').outerHeight();

    var viewport_wid = viewport().width;
    var viewport_height = viewport().height;


    if (viewport_wid >= 991) {
      $('.mainSection').css({'min-height': (viewport_height - height_header) + 'px'});
      // $('.catalog-item').css({'min-height': (viewport_height - height_header) + 'px'});

      if ($('.onePage-scroll').length) {
        $(".onePage-scroll").onepage_scroll({
          sectionContainer: "section",
          easing: "ease",

          animationTime: 1000,
          pagination: true,
          updateURL: false,
          beforeMove: function (index) {
            $('header').css({'opacity': '1'});
            $('.pageControls').css({'opacity': '1'});
            $('.onepage-pagination').css({'opacity': '1'});
          },
          afterMove: function (index) {
            if ($('.onePage-scroll .page:last-child').hasClass('active')) {
              $('.pageDown-button').fadeOut();
            } else {
              $('.pageDown-button').fadeIn();
            }
          },
          loop: false,
          keyboard: true,
          responsiveFallback: 992,
          direction: "vertical"
        });
      }

      $('.onePage-scroll section').css({'padding-top': height_header + 'px'});
    }

  }
  $(window).on('load', handler);
  $(window).on('resize', handler);


  function calcSlides(totalItems, progressBar, item) {
    var activePointX = 235;
    var activePointY = 160;
    for (var i = 0; i < totalItems; i++) {
      if ($('.catalog-item').eq(i).hasClass('slick-active')) {
        $('.catalog-item__number .current').html(i + 1);
        progressBar.css({'width': (100 * (i + 1) / totalItems) + '%'});
      }
    }

    activePlate(item, 235, 160);

    for (var i = 0; i < item.length; i++) {
      if ($('.catalog-slider .catalog-item.slick-active').attr("sale") === "true") {
        $('.catalog-item__sale').addClass('active');
      } else {
        $('.catalog-item__sale').removeClass('active');
      }
      $('.catalog-categories .price').find('#amount').html($('.catalog-slider .catalog-item.slick-active').attr('price'));
    }
  }

  function activePlate(item, activePointX, activePointY) {
    var tmpX = 0;
    var tmpY = 0;
    var currentX, currentY;

    for (var i = 0; i < item.length; i++) {
      if (item.eq(i).hasClass('active')) {
        currentY = item.eq(i).attr('top');
        currentX = item.eq(i).attr('right');
        item.eq(i).css({'top': currentY + 'px', 'right': currentX + 'px'});
      }
    }

    for (var i = 0; i < item.length; i++) {
      if (item.eq(i).attr("category") === $('.catalog-slider .catalog-item.slick-active').attr("category")) {
        item.removeClass('active');
        item.find('.icon').removeClass('active');
        item.eq(i).addClass('active');
        item.eq(i).find('.icon').addClass('active');
        item.eq(i).css({'top': activePointY + 'px', 'right': activePointX + 'px'});
      } else {
        currentY = item.eq(i).attr('top');
        currentX = item.eq(i).attr('right');
        item.eq(i).css({'top': currentY + 'px', 'right': currentX + 'px'});
      }
    }
  }

  $(document).mouseup(function (e) {
    if ($('.header-nav').hasClass('active')) {
      var div = $(".header-nav");
      if (!div.find('.header-nav-list').is(e.target) && div.has(e.target).length === 0) {
        div.find('.header-nav__btn').removeClass('active');
        div.find('.header-nav-list').removeClass('active');
        $('.header-cartBtn').removeClass('active');
        div.removeClass('active');
      }
    }

    if ($('.checkout-item').hasClass('active')) {
      var div = $(".checkout-item");
      if (!div.is(e.target) && div.has(e.target).length === 0) {
        div.removeClass('active');
        div.parent().fadeOut('slow');
      }
    }


  });

  // handler()
  $(".open-popup-link").magnificPopup({
    type: 'inline'
  });
  if (location.search.includes('success=yes'))
    $('a[href="#popup_note"]').click()


  $(document).on('click', '.close-popup', $.magnificPopup.close)

})(jQuery);