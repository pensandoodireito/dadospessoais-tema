jQuery(function ($) {
    $(".indice ul li a[href^='#']").on('click', function (e) {

        // prevent default anchor click behavior
        e.preventDefault();

        // store hash
        var hash = this.hash;

        // animate
        $('html, body').animate({
            scrollTop: $(hash).offset().top - 100
        }, 300, function () {

            // when done, add hash to url
            // (default click behaviour)
            window.location.hash = hash;
        });

    });
});


jQuery(function ($) {
    $(window).scroll(sticky_relocate);
    sticky_relocate();

    // botão que fecha o menu indice
    $('.fecha-menu-indice').click(function() {
        $('.indice .menu').slideToggle('slow');
        $(".fecha-menu-indice .fa").toggleClass('fa-angle-up fa-angle-down');
    });

// botão que fecha o menu eixos
    $('.fecha-menu-eixo').click(function() {
        $('.eixo .menu').slideToggle('slow');
        $(".fecha-menu-eixo .fa").toggleClass('fa-angle-up fa-angle-down');
    });
});