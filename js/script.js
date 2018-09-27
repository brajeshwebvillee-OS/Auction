$(document).ready(function () {


    /* ---- Countdown timer ---- */

    //    $('.counter').countdown({
    //        timestamp: (new Date()).getTime() + 41 * 24 * 60 * 60 * 1000
    //    });
    $(function () {
        $('.counter').each(function () {
            $(this).countdown({
                timestamp: (new Date()).getTime() + 41 * 24 * 60 * 60 * 1000
            });
        });
    });
    $(function () {
        $('.counterMycart').each(function () {
            $(this).countdown({
                timestamp: (new Date()).getTime() + 3 * 24 * 60 * 60 * 1000
            });
        });
    });

    /* ---- Animations ---- */

    $('#links a').hover(
        function () {
            $(this).animate({
                left: 3
            }, 'fast');
        },
        function () {
            $(this).animate({
                left: 0
            }, 'fast');
        }
    );

    $('footer a').hover(
        function () {
            $(this).animate({
                top: 3
            }, 'fast');
        },
        function () {
            $(this).animate({
                top: 0
            }, 'fast');
        }
    );


    /* ---- Using Modernizr to check if the "required" and "placeholder" attributes are supported ---- */

    if (!Modernizr.input.placeholder) {
        $('.email').val('Input your e-mail address here...');
        $('.email').focus(function () {
            if ($(this).val() == 'Input your e-mail address here...') {
                $(this).val('');
            }
        });
    }

    // for detecting if the browser is Safari
    var browser = navigator.userAgent.toLowerCase();

    if (!Modernizr.input.required || (browser.indexOf("safari") != -1 && browser.indexOf("chrome") == -1)) {
        $('form').submit(function () {
            $('.popup').remove();
            if (!$('.email').val() || $('.email').val() == 'Input your e-mail address here...') {
                $('form').append('<p class="popup">Please fill out this field.</p>');
                $('.email').focus();
                return false;
            }
        });
        $('.email').keydown(function () {
            $('.popup').remove();
        });
        $('.email').blur(function () {
            $('.popup').remove();
        });
    }


});
$('.ItemListCarousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    items: 9,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 7
        }
    }
});
$('.relatedProductCarousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    items: 4,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});

$('body').on('click', '.starRating i', function () {
    $(this).prevAll().addClass('Active');
    $(this).addClass('Active');
    $(this).nextAll().removeClass('Active');
    var ratingValue = $(this).find('span').text();
    $('.starRating .stared_input').val(ratingValue);
});


$('body').on('click', '.popupForm .PF_logo', function () {
    $('.popupForm').addClass('InquiryShow');
});
$('body').on('click', '.popupForm .popupFormClose', function () {
    $('.popupForm').removeClass('InquiryShow');
});


$(document).ready(function () {
    $('body').on('click', '.mainMenuDrop', function () {
        $('.RightMenuMain').addClass('showMenu');
        $('body').addClass('RightMenuMainShow');
    });
    $('body').on('click', '.RightMenu .RightMenuClose', function () {
        $('.RightMenuMain').removeClass('showMenu');
        $('body').removeClass('RightMenuMainShow');
    });
    var windowWidth = $('body').innerWidth();
    if(windowWidth > 767){
    $('.productContract .row').each(function(){
        var productContractRow = $(this).innerHeight();
        $(this).find('.card').innerHeight(productContractRow - 26);
       
    });
       }
});
