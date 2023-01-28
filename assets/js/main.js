$(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
    if (scrollTop >1) {
        $('#navbar').css('padding', '5px 25px')
    } else {
        $('#navbar').css('padding', '25px')
    }
})

$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,
        dots: true,
        responsive:{
            0:{
                items:1,
                dots: true
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    });
  });