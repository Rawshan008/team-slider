<?php
    if ('yes' == $settings->active_slider):
    $slider_number = $settings->slider_number;
    $autoplay = $settings->autoplay;
?>
(function($) {
    $(document).ready(function () {
        $(window).on('load resize orientationchange', function() {
            $('#rm-mini-team-<?php echo $id;?>').each(function(){
                var $carousel = $(this);
                /* Initializes a slick carousel only on mobile screens */
                // slick on mobile
                if ($(window).width() > 767) {
                    if ($carousel.hasClass('slick-initialized')) {
                        $carousel.slick('unslick');
                    }
                }
                else{
                    if (!$carousel.hasClass('slick-initialized')) {
                        $carousel.slick({
                            slidesToShow: <?php echo esc_html($slider_number);?>,
                            slidesToScroll: 1,
                            mobileFirst: true,
                            autoplay: <?php echo esc_html($autoplay);?>,
                            prevArrow: $('.previous'),
                            nextArrow: $('.next')
                        });
                    }
                }
            });
        });

        $(".rm-mini-team-slider").magnificPopup({
            type:'inline',
            midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
        });
    })
})(jQuery);
<?php else: ?>
(function($) {
    $(document).ready(function () {
        $(".rm-mini-team-slider").magnificPopup({
            type:'inline',
            midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
        });
    })
})(jQuery);
<?php endif;?>

