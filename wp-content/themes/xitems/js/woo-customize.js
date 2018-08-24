jQuery(document).ready(function ($) {


    class SlideItem {
        constructor(elem) {
            this.elem = $(elem)
            this.imageWrapper = this.elem.find('.img-wrapper')
            this.$form = this.elem.find('.cart')

            this.$form.on('found_variation', this.onFoundVariation.bind(this));
            this.elem.find('.add-to-cart').on('click', (e) => {

                let data = this.$form.serializeArray().filter(item => item.name !== 'add-to-cart');
                $(document).find('.main-wrapper').addClass('loader wp-opacity');
                $.ajax({
                    method: 'post',
                    url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart_fix' ),
                    data,
                    success(response){
                        console.log(response)
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);
                        $(document).find('.main-wrapper').removeClass('loader wp-opacity');
                    },
                })

            })
        }

        onFoundVariation(event, variation) {
            const $img = this.imageWrapper.find('img')
            $img.hide();
            $img.attr('src', variation.image.src);
            $img.attr('alt', variation.image.alt);
            $img.fadeIn();
            this.elem.attr('price', variation.display_price);
            if (this.elem.hasClass('addToCartSingle')) { this.elem.find('.price span').text(variation.display_price)};
            $('#amount').text(variation.display_price)
        }
    }

    $('.catalog-item').each(function () {
        new SlideItem(this)
    });

    $('.addToCartSingle').each(function () {
        new SlideItem(this)
    })

    function initCheckout(){
      $('.checkout').each(function () {
        let elem = $(this);
        let timeOut = 0;
        elem.on('click','.add-product-button', (e) => {
          console.log(e)
          elem.find('.quantity input').trigger('change');
          clearTimeout(timeOut);
          timeOut = setTimeout( () => {
            elem.find(':input[name="update_cart"]').trigger('click');
            console.log('update')
          }, 1000);
          e.preventDefault()
        })
      });
    }
  initCheckout()
    $('.catalog-slider').on('swipe setPosition', function (event,slick,b) {
        let permaLink = slick.$slideTrack.children().eq(slick.currentSlide).data('permalink');
        var slickActive = $('.catalog-slider .catalog-item.slick-active')
        $('.js-more-link').attr('href', permaLink);
        $('.catalog-item__sale h3').text(slickActive.attr('gift_title'));
        $('.catalog-item__sale .amount').text(slickActive.attr('gift_qty'));
    });


  // загрузка продукта через ajax
  $('.js-more-link').on('click', function() {
    $('.icon-load').css('display', 'block');
    urlProduct = $(this).attr('href');
    $.ajax({
      method: 'post',
      url: urlProduct,
      async: false,
      success(response) {
        let document = new DOMParser().parseFromString(response,'text/html')
        $('body.home').removeClass('loaded');
        $('body.home').find('form').detach();
        $('html').append(document.body);
        $('body.home').find('.slick-next').css('right', '-100px');
        $('body.home').find('.slick-prev').css('left', '-100px');
        $('body.home').find('.catalog-categories').css('right', '-700px');
        $('html').find('section.description').css('height', '100vh')
      }
    })
    $('body.home .header').hide()
    $('body.home').animate({'bottom' : '100px'}, 500).slideUp('slow','swing', function () {
      document.body.classList = []
      $(document.body.children).remove()
      window.initSingle()
      initCheckout()
      $( '.variations_form' ).each( function() {
        $( this ).wc_variation_form();
      });
      $('.addToCartSingle').each(function () {
        new SlideItem(this)
      })
    });
    $('.pageControls').show('slow');

    window.history.replaceState({}, '', urlProduct);


    $( '#rating' ).hide().before( '<p class="stars"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></p>' );

    $('body').on( 'click', '#respond p.stars a', function() {
      var $star       = $( this ),
          $rating     = $( this ).closest( '#respond' ).find( '#rating' ),
          $container     = $( this ).closest( '.stars' );

      $rating.val( $star.text() );
      $star.siblings( 'a' ).removeClass( 'active' );
      $star.addClass( 'active' );
      $container.addClass( 'selected' );

      return false;
    } );

    $('body').removeClass('loaded');

    return false;
  });

});


