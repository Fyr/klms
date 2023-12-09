document.addEventListener("DOMContentLoaded", function () {

    $("#owl-carousel").owlCarousel({
		//autoPlay : 6000,
		navigation : true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true,
		lazyLoad : true,
		autoHeight : false,
        navigationText : ['<i class="icon arrow-left1"></i>','<i class="icon arrow-right1"></i>']

	});


    $('#owl-carousel-partners').owlCarousel({
        items : 5,
		autoPlay: true,
		singleItem : false,
		navigation : true,
		pagination: false,
		lazyLoad : true,
        slideSpeed : 200,
        rewindNav : true,
        
        // stopOnHover : true,
        responsive: true,
		navigationText : ['<i class="icon arrow-left"></i>','<i class="icon arrow-right"></i>']
	});


    $('.menu > li > a').click(function(){
        $('.header .menu > li > ul').stop().slideUp();
        if ( $(this).next().is('ul') ) {
            this.classList.toggle('down');
            $(this).next('ul').stop().slideToggle();
        }
    });

    $('.menu > li  ul > li > a').click(function(){
        $(this).next().stop().slideToggle();
        if ( $(this).next().is('ul') ) {
            if( $(this).hasClass('active')) {
                $(this).removeClass('active')
            }
            else {
                $(this).addClass('active');
            }
        }
    }).next().stop().hide();


    $('.menuMobile > li > a').click(function(){
        $('.menuMobile li ul').stop().slideUp();
        if ( $(this).next().is('ul') ) {
            this.classList.toggle('down');
            $(this).next('ul').stop().slideToggle();
        }
    });

    $('.menuMobile > li  ul > li > a').click(function(){
        $(this).next().stop().slideToggle();
        if ( $(this).next().is('ul') ) {
            if( $(this).hasClass('active')) {
                $(this).removeClass('active')
            }
            else {
                $(this).addClass('active');
            }
        }
    }).next().stop().hide();


    $(document).on('click touchstart', function(e) {
			
        if (!$.contains($(".header .menu").get(0), e.target)  ) {
            $(".header .menu > li  ul").stop().slideUp();
            $(".header .menu > li  ul a").removeClass('active');
        }

        if (!$.contains($(".header .menuMobile").get(0), e.target)  ) {
            $(".header .menuMobile > li  ul").stop().slideUp();
            $(".header .menuMobile > li  ul a").removeClass('active');
        }
    });

    $('input.styler, select').styler();


    $('.searchText').click(function(){
        $('.searchBoxOuter').toggle();
    });

    $('.searchBox .close').click(function(){
        $('.searchBoxOuter').hide();
    });

    $(document).on('click touchstart', function(e) {
			
        if (!$.contains($(".search").get(0), e.target)  ) {
            $(".searchBoxOuter").hide();
        }
       
    });

    $('article img').each(function (i, e) {
        console.log(i, e, e.style.float);
        if (e.style.float === 'left') {
            $(e).addClass('align-left');
        }
    });

    $('.catalog').find('.firstLevel').click(function(){
        $(this).next().stop().slideToggle();
        if ( $(this).next().is('ul') ) {
            if( $(this).hasClass('active')) {
                $(this).removeClass('active')
            }
            else {
                $(this).addClass('active');
            }
        }


    }).next().stop().hide();

    $('#mobile-cataloge-btn').click( function(event){
        event.preventDefault();
        $('#mobile-cataloge').fadeIn();
        $('#mm__wrapper')
            .css('visibility', 'visible')
            .css('transform', 'translateX(0)');

        $("body").css("overflow","hidden");
    });

    $('.mm__close').click( function(){
        $('#mobile-cataloge').fadeOut();
        $('#mm__wrapper')
            .css('visibility', 'hidden')
            .css('transform', 'translateX(-100%)');

        $("body").css("overflow","auto");
    });
    
});


