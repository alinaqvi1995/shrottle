// Add class Add 
jQuery(function($) {
    var path = window.location.href;
    $('.custom-nav .navbar-nav a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
        }
    });
});

//NAVBAR FIXED HIDE STARTS
$(window).scroll(function(e) {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $('nav').addClass("navbar-hide");

    } else {
        $('nav').removeClass("navbar-hide");
    }

});


/*======testimonial-slider=======*/

$('.testimonial-slider').slick({
    dots: true,
    arrows: false,
    infinite: true,
    centerMode: true,
    centerPadding: '200px',
    slidesToShow: 3,
    autoplay: true,
    // slidesToScroll: 1,
    responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
                centerMode: false,
                // slidesToScroll: 3,
                // infinite: true,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                centerPadding: '0',
                centerMode: false,
                // slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                centerPadding: '0',
                centerMode: false,
                slidesToScroll: 1
            }
        }
    ]
});
/*======testimonial-slider end=======*/

// start inilize slick slider
$('.destination-slider').slick({
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    prevArrow: $('.prev-destination-slider'),
    nextArrow: $('.next-destination-slider'),
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,

                // arrow: false,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});


// see more less more
function AddReadMore() {
    //This limit you can set after how much characters you want to show Read More.
    var carLmt = 150;
    // Text to show when text is collapsed
    var readMoreTxt = " ... Read More";
    // Text to show when text is expanded
    var readLessTxt = " Read Less";


    //Traverse all selectors with this class and manupulate HTML part to show Read More
    $(".addReadMore").each(function() {
        if ($(this).find(".firstSec").length)
            return;

        var allstr = $(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
        }

    });
    //Read More and Read Less Click Event binding
    $(document).on("click", ".readMore,.readLess", function() {
        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
    });
}
$(function() {
    //Calling function after Page Load
    AddReadMore();
});

