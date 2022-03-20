/*! ===================================
 *  Author: BBDesign & WPHunters
 *  -----------------------------------
 *  Email(support):
 * 	bbdesign_sp@yahoo.com
 *  ===================================
 */

'use strict';
var dentistJS = {};

/**
 * Helpers
 * --------------------------------------------------
 */

dentistJS.__select_text = function (el) {

    if (Modernizr.touch) return;

    if (typeof window.getSelection != 'undefined' && typeof document.createRange != 'undefined') {

        var range = document.createRange();
        range.selectNodeContents(el);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);

    } else if (typeof document.selection != 'undefined' && typeof document.body.createTextRange != 'undefined') {

        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.select();

    }
};

dentistJS.__scrollTo = function (el) {

    var $ = jQuery;

    $('html, body').animate({
        scrollTop: $(el).offset().top
    }, 400);

};


/**
 * Functions
 * --------------------------------------------------
 */

dentistJS.InitScrollSpy = function ($) {

    var $elems = $('.scrollspy');

    if ($elems.length <= 0 || !$.fn.scrollSpy) {
        return;
    }

    // find home button
    var $menu = $('#head-menu nav ul.menu');
    $menu.find('li.current-menu-item').removeClass('current-menu-item');

    // process all menu & scroll links
    $menu.find('a')
        .add('a[data-action="scroll"]')
        .add('#main-footer ul.menu a')
        .each(function () {
            var $link = $(this);

            // detect same-page links
            if (this.hash &&
                $(this.hash).length &&
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname) {
                $link.attr('href', this.hash);
            }

            // highlight first link
            var location_parsed = $.trim(location.href.replace(location.hash, ''));
            if ($.trim($link.attr('href')) == location_parsed) {
                $link.attr('href', '#page-top');
                $link.parent().addClass('current-menu-item');
            }
        });

    // run engine
    $elems.scrollSpy();

};

dentistJS.InitPageTransitions = function ($) {

    var $body = $('body');

    // fade in page
    setTimeout(function () {
        $body.css('visibility', 'visible').hide().fadeIn(300);
    }, 250);

    // fade out page
    if ($.wph_safari) { return; }
    $(window).on('beforeunload unload', function () {
        if ($body.data('unloaded') === true) {
            return;
        }

        $body.data('unloaded', true).fadeOut(300);
    });
};

dentistJS.InitHeader = function ($) {

    var $header = $('#head-menu');

    // phone auto-selection
    $header.find('.phone strong').on('click', function () {
        dentistJS.__select_text(this);
    });

    $('#head-info').find('.lang-selector > ul > li:first-child > a').click(function () {
        $(this).parents('ul').toggleClass('active');
        return false;
    });

    // mobile navigation
    if ($.fn.tinyNav) {
        $header.find('ul.menu').tinyNav({ header: 'Navigation' });

        // menu button action
        $header.find('#menu-toggle').on('click', function () {
            $header.find('.tinynav:eq(0)').focus();
            return false;
        });
    }
};

dentistJS.InitHeroSlider = function ($) {

    var $sliders = $('.hero-slider');

    // check for dependency
    if ($sliders.length <= 0 || !$.fn.slick) {
        $sliders.hide();
        return;
    }

    // run
    $sliders.each(function () {

        var $this = $(this),
            transition = $this.attr('data-transition'),
            apSpeed = $this.attr('data-speed');

        if (!apSpeed || apSpeed < 1) {
            apSpeed = 3;
        }

        $this.slick({
            autoplay: true,
            autoplaySpeed: apSpeed * 1000,
            arrows: !Modernizr.touch,
            dots: true,
            fade: true,
            //swipe        : Modernizr.touch,
            //draggable    : false,
            cssEase: 'linear'
        });

    });
};

dentistJS.InitSliderAutoHeight = function ($) {

    var $menu = $('#head-menu'),
        $header = $('#head-info'),
        $slider = $('.hero-slider:eq(0)');

    if ($slider.parents('.fw-main-row').index() > 0) {
        return;
    }

    // add some math
    var overallHeight = $menu.outerHeight() + $header.outerHeight() + $slider.outerHeight(),
        winHeight = $(window).height(),
        diff = winHeight - overallHeight;

    // check values
    if (diff < 0 || diff > 160) {
        return;
    }

    // and do stuff
    $slider.find('.slick-slide .image').css('height', $slider.outerHeight() + diff);
};

dentistJS.InitServicesBlock = function ($) {

    // cache vars & checks
    var $blocks = $('.services-block');
    if ($blocks.length <= 0) {
        return;
    }

    // translation
    var backStr = 'Back to services list';
    if (typeof DentistLG != 'undefined' && typeof DentistLG.back_to_services == 'string') {
        backStr = DentistLG.back_to_services;
    }

    // do logic
    $blocks.find('.item').on('click', function () {

        var $this = $(this),
            animationSpeed = 300,
            $mainList = $this.parents('.services-block').eq(0),
            $container = $mainList.parent(),
            $singleView = $container.find('.single-view.services');

        // clear element
        $singleView.find('> *').html('');

        // transfer text & title
        var $textColumn = $singleView.find('.text-column');
        $this.find('.title').clone().appendTo($textColumn);
        $this.find('.post-body').clone().appendTo($textColumn);

        // transfer image
        var imgUrl = $this.find('.image').attr('data-img-url');
        $singleView.find('.image-column')
            .append('<img class="main-image" />')
            .find('.main-image')
            .attr('src', imgUrl)
            .wrap('<a/>')
            .parent().attr('href', imgUrl)
            .addClass('remove-outline')
            .magnificPopup({ type: 'image' });

        // add back button
        $singleView.find('h1.title')
            .wrapInner('<span/>')
            .append('<a href="#" class="back-btn"><i class="fa fa-angle-left"></i> ' + backStr + '</a>')
            .find('.back-btn').one('click', function () {
                $singleView.animate({ height: 'toggle', opacity: 0 }, animationSpeed, function () {
                    $mainList.animate({ height: 'toggle', opacity: 1 }, animationSpeed);
                });

                return false;
            });

        // show single-view
        $mainList.animate({ height: 'toggle', opacity: 0 }, animationSpeed, function () {
            $singleView.animate({ height: 'toggle', opacity: 1 }, animationSpeed);
        });
    });

};

dentistJS.InitStaffBlock = function ($) {

    var $blocks = $('.staff-block');

    // check for dependency
    if ($blocks.length <= 0 || !$.fn.slick) {
        $blocks.hide();
        return;
    }

    if (!Modernizr.touch) {
        $blocks.removeClass('black-dots');
    }

    // run
    $blocks.slick({
        autoplay: false,
        slidesToShow: 3,
        arrows: !Modernizr.touch,
        dots: false,
        infinite: false,

        responsive: [
            {
                breakpoint: 600,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 480,
                settings: { slidesToShow: 1 }
            }
        ]
    });

    // popups init
    $blocks.find('a.read-more[href="dentist_popup_open.html"]').each(function () {
        var $this = $(this), $item = $this.parents('article.member');

        $this.attr('href', '#')
            .addClass('remove-outline');

        var $popup = $item.find('> .staff-popup');
        $popup.find('> .text').wrapInner('<div class="scroll-inner"/>');

        $this.magnificPopup({
            items: {
                src: $popup
            },
            closeBtnInside: false,
            preloader: false,
            type: 'inline',
            removalDelay: 300,
            mainClass: 'mfp-slide-bottom'
        });
    })
        .on('mfpOpen', function (e) {
            var mfp = $.magnificPopup.instance;

            $('.text', mfp.content).matchHeight({
                target: $('.image', mfp.content)
            });
        });

    // close popup button
    $(document).on('click', '.close-popup', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
    });
};

dentistJS.InitGalleryBlock = function ($) {

    var $blocks = $('.gallery-block');

    // check for dependency
    if ($blocks.length <= 0 || !$.fn.masonry || !$.fn.imagesLoaded) {
        $blocks.hide();
        return;
    }

    // init masonry
    $blocks.imagesLoaded(function () {

        $blocks.masonry({
            itemSelector: '.item',
            columnWidth: '.item',
            percentPosition: true
        });

        $blocks.each(function () {

            BackgroundCheck.init({
                targets: $(this).find('.cd-image-label'),
                images: $(this).find('.cd-image-container img')
            });

        });

    });

    // equip magnific popup for images
    $blocks.find('.one_image > a').magnificPopup({ type: 'image' });
};

dentistJS.InitTestimonialsBlock = function ($) {

    var $blocks = $('.testimonials-block');

    // check for dependency
    if ($blocks.length <= 0 || !$.fn.slick) {
        $blocks.hide();
        return;
    }

    if (!Modernizr.touch) {
        $blocks.removeClass('black-dots');
    }

    // run
    $blocks.slick({
        autoplay: false,
        slidesToShow: 3,
        arrows: !Modernizr.touch,
        dots: false,
        infinite: false,

        responsive: [
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 480,
                settings: { slidesToShow: 1 }
            }
        ]
    });
};

dentistJS.StickyFooter = function ($) {

    var $footer = $('#main-footer');
    if ($footer.parents('.disable-sticky-footer, .error404').length) return;

    $footer.hide().css('margin-top', 0);
    var docHeight = $('body').outerHeight();
    $footer.show();

    var calculatedHeight = $(window).height() - (docHeight + $footer.outerHeight() - 45);
    $footer.css('margin-top', (calculatedHeight <= 0) ? 0 : calculatedHeight);
};

dentistJS.InitMagnificPopup = function ($) {

    $('.post-content, .page-content')
        .find('a[href*=".png"], a[href*=".gif"], a[href*=".jpg"], a[href*=".jpeg"]')
        .magnificPopup({ type: 'image' });

    // for WP galleries
    $('.post-content, .page-content, .fw-page-builder-content')
        .find('.gallery')
        .each(function () {
            $(this).find('.gallery-item a').magnificPopup({
                type: 'image',
                gallery: { enabled: true },
                image: {
                    titleSrc: function (item) {
                        return item.el.parent().siblings('.gallery-caption').text();
                    }
                }
            });
        });
};

dentistJS.InitParallax = function ($) {

    var selector = $('[data-stellar-background-ratio]'),
        isAppleDevice = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i) ? true : false;

    // disable for touch devices
    if (selector.length <= 0 || Modernizr.touch || !isAppleDevice) return;

    $.stellar({
        horizontalScrolling: false,
        scrollProperty: 'scroll',
        positionProperty: 'position'
    });

};


/**
 * Runtime
 * --------------------------------------------------
 */

(function ($) {

    // detect non-ios browsers
    if (!navigator.userAgent.match(/(iPod|iPhone|iPad)/)) $('html').addClass('non-ios');

    $.wph_safari = /^((?!chrome).)*safari/i.test(navigator.userAgent);

    // transition end event name
    var transEndEventNames = {
        'WebkitTransition': 'webkitTransitionEnd', // Saf 6, Android Browser
        'MozTransition': 'transitionend',       // only for FF < 15
        'transition': 'transitionend'        // IE10, Opera, Chrome, FF 15+, Saf 7+
    };
    $.transEndEventName = transEndEventNames[Modernizr.prefixed('transition')];

    // init animations engine
    if (!Modernizr.touch) {
        new WOW({
            boxClass: 'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 100,        // distance to the element when triggering the animation (default is 0)
            mobile: false       // trigger animations on mobile devices (default is true)
        }).init();
    }

    // set defaults for magnific-popup
    if ($.fn.magnificPopup) {
        $.extend(true, $.magnificPopup.defaults, {
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out'
            }
        });
    }

    // run functions
    $(document).ready(function () {
        dentistJS.InitScrollSpy($);
        dentistJS.InitHeader($);
        dentistJS.InitHeroSlider($);
        dentistJS.InitSliderAutoHeight($);
        dentistJS.InitServicesBlock($);
        dentistJS.InitStaffBlock($);
        dentistJS.InitGalleryBlock($);
        dentistJS.InitTestimonialsBlock($);
        dentistJS.InitMagnificPopup($);
        dentistJS.InitParallax($);
        dentistJS.StickyFooter($);
    });

    $(window).on('resize', function () {
        dentistJS.StickyFooter($);
    });

    // page fade in & fade out
    dentistJS.InitPageTransitions($);

})(jQuery);