export default {
  init() {
    // JavaScript to be fired on all pages

    function iOS() {
      return [
        'iPad Simulator',
        'iPhone Simulator',
        'iPod Simulator',
        'iPad',
        'iPhone',
        'iPod',
        'MacIntel',
      ].includes(navigator.platform)
      // iPad on iOS 13 detection
      || (navigator.userAgent.includes('Mac') && 'ontouchend' in document)
    }

    if (iOS()) {
      $('body').addClass('ios-fix');
    }

    $('.close-svg').on('click', function () {
      $('.header').removeClass('header--open');
      $('.header .header__nav').stop().fadeOut('300');
    });

    $('.menu-svg').on('click', function () {
      $('.header').addClass('header--open');
      $('.header .header__nav').stop().fadeIn('300');
    });

    $('.menu-item-has-children .submenu_link_arrow_generic').on('click', function (e) {
      e.preventDefault();

      if (window.matchMedia('screen and (max-width: 1199px)').matches) {
        $(this).toggleClass('submenu-open').closest('.menu-item').find('ul.sub-menu').stop().slideToggle(300);
      }
    });


    $('.sub-header__arrow').on('click', function () {
      $('.sub-header__links--mobile').stop().slideToggle('300', function () {
        if ($(this).is(':visible'))
          $(this).css('display', 'flex');
      });
    });


    $('.category-filter__selected').on('click', function () {
      $(this).parent().toggleClass('open').find('.category-filter__options').stop().slideToggle(300);
    });


    $('.site-chooser__selected').on('click', function () {
      $(this).parent().toggleClass('open').find('.site-chooser__list').stop().slideToggle(300);
    });

    $(window).on('scroll', function () {
      var st = $(this).scrollTop();

      if (st > 50) {
        $('.header').addClass('header--solid-fade');
      } else {
        $('.header').removeClass('header--solid-fade');
      }
    });

    // change submit subscriber btn text
    var subscribeSubmitTextDefault = '';
    var subscribeSubmitTextMobile = '';

    if ($('.footer-subscribe').length > 0) {
      subscribeSubmitTextDefault = $('.footer-subscribe').data('textdefault');
      subscribeSubmitTextMobile = $('.footer-subscribe').data('textmobile');
    }

    $(window).on('load', function () {
      if (window.matchMedia('screen and (min-width: 768px)').matches) {
        $('.footer-subscribe__form .form-row input[type=submit]').val(subscribeSubmitTextDefault);
      } else {
        $('.footer-subscribe__form .form-row input[type=submit]').val(subscribeSubmitTextMobile);
      }

      var st = $(this).scrollTop();

      if (st > 50) {
        $('.header').addClass('header--solid-fade');
      } else {
        $('.header').removeClass('header--solid-fade');
      }
    });

    $(window).on('resize', function () {
      if (window.matchMedia('screen and (min-width: 768px)').matches) {
        $('.footer-subscribe__form .form-row input[type=submit]').val(subscribeSubmitTextDefault);
      } else {
        $('.footer-subscribe__form .form-row input[type=submit]').val(subscribeSubmitTextMobile);
      }
    });
    var lastScrollTop = 0;
    $(window).on('scroll', function () {
      var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
      if (st > lastScrollTop){
         // downscroll code


         if (st > 200) {
          $('header.header').addClass('header--hidden-from-view');
          $('.sub-header').addClass('header--hidden-from-view');
         }
      } else {
         // upscroll code

        // if (st < 200) {
          $('header.header').removeClass('header--hidden-from-view');
          $('.sub-header').removeClass('header--hidden-from-view');
        // }
      }
      lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling


    });

    function createVideoModalHtml(settings) {
      if (settings.type == 'vim') {
        // create a popupModal div element
        let popupModal = document.createElement('div');
        popupModal.className = 'popup-modal';
        popupModal.setAttribute('id', settings.modalId);

        // create a popupModal__dark-layer div element
        let darkLayer = document.createElement('div');
        darkLayer.className = 'popup-modal__dark-layer';

        // create a popupModal Wrapper div element
        let popupWrapper = document.createElement('div');
        popupWrapper.className = 'popup-modal__wrapper';
 
        // create a popupModalDiv Wrapper div element
        let popupWrapperDiv = document.createElement('div');
        popupWrapperDiv.setAttribute('style', 'padding:56.25% 0 0 0;position:relative;');

        let ifrm = document.createElement('iframe');
        ifrm.setAttribute('src', 'https://player.vimeo.com/video/' + settings.modalId.replace('modal_', '') + '?title=0&byline=0&portrait=0' );
        ifrm.setAttribute('style', 'position:absolute;top:0;left:0;width:100%;height:100%;');
        ifrm.setAttribute('frameborder', '0');
        ifrm.setAttribute('allow', 'autoplay; fullscreen; picture-in-picture');
        ifrm.setAttribute('allowfullscreen', true);
    
        popupWrapperDiv.appendChild(ifrm);
        popupWrapper.appendChild(popupWrapperDiv);


        popupModal.appendChild(darkLayer);
        popupModal.appendChild(popupWrapper);

        // add the newly created element and its content into the DOM
        document.body.appendChild(popupModal);
      }

      if (settings.type == 'yt') {
        // create a popupModal div element
        let popupModal = document.createElement('div');
        popupModal.className = 'popup-modal youtube-modal';
        popupModal.setAttribute('id', settings.modalId);

        // create a popupModal__dark-layer div element
        let darkLayer = document.createElement('div');
        darkLayer.className = 'popup-modal__dark-layer';

        // create a popupModal Wrapper div element
        let popupWrapper = document.createElement('div');
        popupWrapper.className = 'popup-modal__wrapper';
 
        // create a popupModalDiv Wrapper div element
        let popupWrapperDiv = document.createElement('div');
        popupWrapperDiv.setAttribute('style', 'padding:56.25% 0 0 0;position:relative;height: 100%');

        let ifrm = document.createElement('iframe');
        ifrm.setAttribute('width', '560');
        ifrm.setAttribute('height', '315');
        ifrm.setAttribute('src', 'https://www.youtube.com/embed/' + settings.modalId.replace('modal_', '') );
        ifrm.setAttribute('title', 'YouTube video player');
        ifrm.setAttribute('frameborder', '0');
        ifrm.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; fullscreen; encrypted-media; gyroscope; picture-in-picture');
        ifrm.setAttribute('allowfullscreen', true);
    
        popupWrapperDiv.appendChild(ifrm);
        popupWrapper.appendChild(popupWrapperDiv);


        popupModal.appendChild(darkLayer);
        popupModal.appendChild(popupWrapper);

        // add the newly created element and its content into the DOM
        document.body.appendChild(popupModal);
      }
    }

    $('.btn--triggers-modal').on('click', function (e) {
      e.preventDefault();

      createVideoModalHtml({
        type: $(this).data('type'),
        modalId: $(this).data('modal'),
      });

      var modal = $('#' + $(this).data('modal'));

      if (modal.length == 0) {
        alert('Modal not defined!')
        return
      }
      
      modal.addClass('popup-modal--active');
      setTimeout(() => {
        modal.addClass('popup-modal--in-view');
      }, 10)
    });

    $(document).on('click', '.popup-modal__dark-layer', function () {
      $(this).closest('.popup-modal').removeClass('popup-modal--in-view');
      setTimeout(() => {
        $(this).closest('.popup-modal').removeClass('popup-modal--active');
        $(this).closest('.popup-modal').remove();
      }, 600)
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    // bikmo FAQ Block -------------------------------------------------------------
    $('.bikmofaqblock-body .bikmofaqblock-item').on('click', function () {
      $('.bikmofaqblock-body .bikmofaqblock-item').not($(this)).removeClass('bikmofaqblock-item--open');
      $('.bikmofaqblock-body .bikmofaqblock-item .bikmofaqblock-item__content').stop().slideUp(300);
      $(this).toggleClass('bikmofaqblock-item--open').find('.bikmofaqblock-item__content').stop().slideToggle();
    });
    // -----------------------------------------------------------------------------

    // bikmo BG Image Block --------------------------------------------------------
    const bikmoBgImageSet = () => {
      if (window.matchMedia('screen and (min-width: 1200px)').matches) {
        if ($('.bikmobgimageblock.bikmobgimageblock--with-img').length > 0) {
          var dImg = $('.bikmobgimageblock').data('img1');
          $('.bikmobgimageblock').css('background-image', 'url(' + dImg + ')');
        }

      } else if (window.matchMedia('screen and (min-width: 768px)').matches) {
        if ($('.bikmobgimageblock.bikmobgimageblock--with-img').length > 0) {
          var tImg = $('.bikmobgimageblock').data('img2');
          $('.bikmobgimageblock').css('background-image', 'url(' + tImg + ')');
        }

      } else {
        if ($('.bikmobgimageblock.bikmobgimageblock--with-img').length > 0) {
          var mImg = $('.bikmobgimageblock').data('img3');
          $('.bikmobgimageblock').css('background-image', 'url(' + mImg + ')');
        }

      }
    }
    bikmoBgImageSet();
    $(window).on('resize', function () {
      bikmoBgImageSet()
    });
    // -----------------------------------------------------------------------------


    // bikmo Policies Block --------------------------------------------------------
    const bikmoPoliciesBgSet = () => {
      $('.bikmopoliciesblock-card').each(function (index, el) {
        index += 1;

        if (window.matchMedia('screen and (min-width: 1200px)').matches) {

          var dImg = $(el).data('desktopimg');
          $(el).css('background-image', 'url(' + dImg + ')');

        } else if (window.matchMedia('screen and (min-width: 768px)').matches) {

          var tImg = $(el).data('tabletimg');
          $(el).css('background-image', 'url(' + tImg + ')');

        } else {

          var mImg = $(el).data('mobileimg');
          $(el).css('background-image', 'url(' + mImg + ')');

        }
      });

    }
    bikmoPoliciesBgSet();
    $(window).on('resize', function () {
      bikmoPoliciesBgSet()
    });
    // -----------------------------------------------------------------------------

    // bikmo 3Columns Block --------------------------------------------------------
    $('.bikmo3columnsblock__mobile-wrapper .bikmo3columnsblock-list').slick({
      infinite: false,
      arrows: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
    // -----------------------------------------------------------------------------

    // bikmo Reviews Block Slider --------------------------------------------------
    $('.bikmoreviewsblock__slider-list').slick({
      infinite: false,
      arrows: false,
      dots: false,
      // appendArrows: this.closes('.bikmoreviewsblock').find('.bikmoreviewsblock_arrows'),
      nextArrow: '',
      prevArrow: '',
      // appendDots: $('#partener_gallery_dots_controlls'),
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: false,
            dots: true,
          },
        },
      ],
    });

    $('.bikmoreviewsblock_arrows .slick-prev').on('click', function () {
      $(this).closest('.bikmoreviewsblock').find('.bikmoreviewsblock__slider-list').slick('prev');
    });

    $('.bikmoreviewsblock_arrows .slick-next').on('click', function () {
      $(this).closest('.bikmoreviewsblock').find('.bikmoreviewsblock__slider-list').slick('next');
    });
    // END bikmo Reviews Block Slider ------------------------------------------------


    // bikmo Table Block -------------------------------------------------------------
    const updateCardRows = () => {
      var table_rows = {};

      if (window.matchMedia('screen and (min-width: 1200px)').matches) {

        jQuery('.bikmotableblocks-head__features .bikmotableblock-features__item').each(function (index, el) {
          table_rows['row_' + (index + 1)] = $(el).outerHeight();
        });

        $('.bikmotableblock-cards .bikmotableblock-card').each(function (index, el) {
          for (var r in table_rows) {
            $(el).find('.bikmotableblock-card__features .' + r).css('height', table_rows[r]);
          }
        });
      }
    };

    // ------------------ Tab navigation for tablet and below ------------------------
    $('.bikmotableblock-nav__item').on('click', function () {
      $(this).parent().find('.bikmotableblock-nav__item').removeClass('bikmotableblock-nav__item--selected');
      $(this).addClass('bikmotableblock-nav__item--selected');

      var nextTab = $(this).data('tab');
      $(this).closest('.bikmotableblock-body').find('.bikmotableblock-card').removeClass('bikmotableblock-card--active');
      $(this).closest('.bikmotableblock-body').find('.bikmotableblock-card--' + nextTab).addClass('bikmotableblock-card--active');
    });

    // ------------------ Features max rows displayed ----------------------------------------
    $('.bikmotableblock-card').each(function (index, el) {
      index += 1;
      var max = $(el).find('.bikmotableblock-features').data('maxnum');
      $(el).find('.bikmotableblock-features .bikmotableblock-features__item').slice(max).wrapAll('<div class="bikmotableblock-features__hidden"></div>');
    });

    var max = $('.bikmotableblocks-head__features').data('maxnum');
    $('.bikmotableblocks-head__features .bikmotableblock-features__item').slice(max).wrapAll('<div class="bikmotableblock-features__hidden"></div>');

    // ------------------ Features Show more button -------------------------------------
    $('.bikmotableblock-card__load_more').on('click', function () {
      var moreText = $(this).data('more');
      var lessText = $(this).data('less');
      if ($(this).hasClass('less')) {
        $(this).removeClass('less').closest('.bikmotableblock').find('.bikmotableblock-features__hidden').stop().slideUp('400', () => {
          $('.bikmotableblock-card__load_more').text(moreText);
        });
      } else {
        $(this).addClass('less').closest('.bikmotableblock').find('.bikmotableblock-features__hidden').stop().slideDown('400', () => {
          $('.bikmotableblock-card__load_more').text(lessText);
          updateCardRows();
        });
      }
    });

    // ------------------ Features Rows Height Fix ----------------------------------------
    setTimeout(function () {
      updateCardRows();
    }, 100);
    $(window).on('resize', function () {
      updateCardRows();
    });

    // -------------------------------------------------------------------------------

    // Bikmo JOBS Block --------------------------------------------------------------
    $('.bikmojobsblock-item__title').on('click', function () {
      if (window.matchMedia('screen and (max-width: 767px)').matches) {
        $(this).parent().toggleClass('bikmojobsblock-item--open').find('.bikmojobsblock-item__expandeble').stop().slideToggle(400);
      }
    })
    // -------------------------------------------------------------------------------

    // Bikmo TESTIMONIALS Block ------------------------------------------------------
    $('.bikmotestimonialsblock .bikmotestimonialsblock-body').slick({
      infinite: false,
      arrows: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<div class="slick-prev"><svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.6665 1L0.999837 9.66667M0.999837 9.66667L9.6665 18.3333M0.999837 9.66667H25.6665" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
      nextArrow: '<div class="slick-next"><svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 1L25.6667 9.66667M25.6667 9.66667L17 18.3333M25.6667 9.66667H1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
      mobileFirst: true,
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            arrows: true,
            dots: false,
          },
        },
        {
          breakpoint: 767,
          settings: {
            arrows: true,
            dots: true,
          },
        },
      ],
    });
    // -------------------------------------------------------------------------------

    // Bikmo Columns123 Block --------------------------------------------------------
    $('.bikmocolumns123block .bikmocolumns123block-body.bikmocolumns123block-body--mobile').slick({
      infinite: false,
      arrows: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      mobileFirst: true,
    });
    // -------------------------------------------------------------------------------

    // Bikmo 3 Columns Extra Block --------------------------------------------------------
    $('.bikmo3columnextrablock .bikmo3columnextrablock-body.bikmo3columnextrablock-body--mobile').slick({
      infinite: false,
      arrows: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      mobileFirst: true,
    });
    // -------------------------------------------------------------------------------
  },
};
