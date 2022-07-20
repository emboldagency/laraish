jQuery(function($) {
    $(document).ready(function(){
        $('.home-slider').slick({
            initialSlide: 0,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $('.prev-slide'),
            nextArrow: $('.next-slide'),
        });
    });
    $(document).ready(function(){
        $('.home-slider__mobile').slick({
            initialSlide: 0,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $('.prev-slide__mobile'),
            nextArrow: $('.next-slide__mobile'),
        });
    });
});