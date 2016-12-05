/********************************************************
 ThemeTim
 Version:   1.0
 ********************************************************/
jQuery(function(){

    /*******************************************************************************
     * Camera Slider Load
     *******************************************************************************/
    if (jQuery('.main-slider').length) {
        jQuery('.main-slider').camera({
            height: '48%',
            loader: 'bar',
            margin:'',
            alignment: 'center',
            barPosition: 'bottom',
            thumbnails: true,
            playPause: false,
            loaderColor: '#fff',
            loaderBgColor: '#f93759',
            hover: true,
            opacityOnGrid: false
        });
        $('.camera_wrap').find('.camera_prev').append('<i class="fa fa-angle-left fa-2x"></i>');
        $('.camera_wrap').find('.camera_next').append('<i class="fa fa-angle-right fa-2x"></i>');
    }
    /*******************************************************************************
     * Carousel Slider
     *******************************************************************************/
    if(jQuery('.related').length){
        jQuery('.related .products').owlCarousel({
            loop:true,
            margin:30,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:1
                },
                768:{
                    items:2
                },
                1024:{
                    items:2
                },
                1366:{
                    items:2
                }
            },
            autoplay:false,
            animateOut: true,
            nav: true,
            navText: ["<span><i class='fa fa-angle-left fa-2x'></i></span>","<span><i class='fa fa-angle-right  fa-2x'></i></span>"]

        });
    }
    if(jQuery('.thumbnails').length){
        jQuery('.images .thumbnails').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            items:4,
            nav: true,
            navText: ["<span><i class='fa fa-angle-left fa-2x'></i></span>","<span><i class='fa fa-angle-right  fa-2x'></i></span>"]
        });
    }
    /*******************************************************************************
     * Brand Slider
     *******************************************************************************/

    if(jQuery('.brand-carousel').length){
        var brand = jQuery('.brand-carousel').owlCarousel({
            loop:true,
            autoplay:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:3
                },
                768:{
                    items:4
                },
                1024:{
                    items:5
                },
                1366:{
                    items:6
                }
            }
        });
        jQuery('.next').click(function () {
            brand.trigger('next.owl.carousel', [1000]);
        });
        jQuery('.prev').click(function () {
            brand.trigger('prev.owl.carousel', [1000]);
        });
    }

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 20){
            jQuery('.header').addClass("sticky");
        }
        else{
            jQuery('.header').removeClass("sticky");
        }
    });
    /*******************************************************************************
     * Body Animation
     *******************************************************************************/
    if(jQuery('.animsition').length){
        jQuery(".animsition").animsition({
            inClass: 'fade-in-up-sm',
            outClass: 'fade-out-up-sm',
            inDuration: 1500,
            outDuration: 800,
            linkElement: '.navbar-collapse a',
            // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
            loading: true,
            loadingParentElement: 'body', //animsition wrapper element
            loadingClass: 'animsition-loading',
            loadingInner: '', // e.g '<img src="loading.svg" />'
            timeout: false,
            timeoutCountdown: 5000,
            onLoadEvent: true,
            browser: [ 'animation-duration', '-webkit-animation-duration'],
            // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
            // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
            overlay : false,
            overlayClass : 'animsition-overlay-slide',
            overlayParentElement : 'body',
            transition: function(url){ window.location.href = url; }
        });
    }
    /*******************************************************************************
     * Smooth Scroll
     *******************************************************************************/
    jQuery.srSmoothscroll({
        step: 95,
        speed: 600,
        ease: 'swing',
        target: jQuery('body'),
        container: jQuery(window)
    })

});