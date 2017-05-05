$(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

    $("[rel='tooltip']").tooltip();

    $('.teamThumb').hover(
        function(){
            $(this).find('.teamCaption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.teamCaption').slideUp(250); //.fadeOut(205)
        }
    );

    $(window).scroll(function() {
        $(".slideanim").each(function(){
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });
})

// -------------------------------------------------------------------------------------------------------------------
$(window).load(function() {
    // $("#flexiselDemo1").flexisel();
    $("#flexiselDemo1").flexisel({
        visibleItems: 4,
        animationSpeed: 1500,
        autoPlay: true,
        autoPlaySpeed: 3500,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 2
            },
            landscape: {
                changePoint:640,
                visibleItems: 3
            },
            tablet: {
                changePoint:768,
                visibleItems: 4
            }
        }
    });
});

// var  mn = $(".main-nav");
// mns = "main-nav-scrolled";
// hdr = $('header').height();
//
// $(window).scroll(function() {
//     if( $(this).scrollTop() > hdr ) {
//         mn.addClass(mns);
//     } else {
//         mn.removeClass(mns);
//     }
// });
