/*---------------------- ФУНКЦИЯ ПОЯВЛЕНИЯ ОКРУЖНОСТЕЙ ПРИ СКРОЛЕ --------------*/
function animScroll() {
    var $windowHeight = ($(window).height() / 1.2),
        $scroll = ($(this).scrollTop() + $windowHeight),
        $anim1 = $('[circle-first] [circle-1-img-1]').offset().top,
        $anim2 = $('[circle-2] [circle-2-img-1]').offset().top,
        $anim3 = $('[circle-3] [circle-1-img-1]').offset().top,
        $mapOffsetTop = $('#map_canvas').offset().top,
        $payMethod = $('.main-wrap #pay-method-section .pull-left').offset().top,
        counter = 0;
    $windowHeight = $(window).height();
    if ($scroll >= $anim1) {
        $('[circle-first] .col-sm-6 ').each(function() {
            $(this).addClass("anim-show").css("transition-delay", counter + 's');
            counter += 0.3;
        });
    }
    counter = 0;
    if ($scroll >= $anim2) {
        $('[circle-2] > .col-md-4').each(function() {
            $(this).addClass("anim-show").css("transition-delay", $(this).attr("delay-time"));
        });
    }
    if ($scroll >= $anim3) {
        $('[circle-3] > .col-md-3').each(function() {
            $(this).addClass("anim-show").css("transition-delay", counter + 's');
            counter += 0.3;
        });
    }
    counter = 0;
}
$(function() {
    /* ------------------ ОТМЕНА ВВОДА БУКВ В INPUT PHONE ----------------------------*/
    $(document).on("keydown", ".inputtext[phone]", function(event) {
        // Разрешаем нажатие клавиш backspace, del, tab и esc
        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
            // Разрешаем выделение: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Разрешаем клавиши навигации: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            return;
        } else {
            // Запрещаем всё, кроме клавиш цифр на основной клавиатуре, а также Num-клавиатуре
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                event.preventDefault();
            }
        }
    });
    $("#hamburger").click(function() {
        $('.av-alert-popup').remove();
        $(this).toggleClass('open');
        $('.bg-mobile-menu').fadeToggle(400, 'swing').toggleClass('hidden');
        $('#mobile-menu').positionCenter(9999);
        $('.bg-mobile-menu').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('#mobile-menu li a').on('click', function() {
        $('.bg-mobile-menu').toggleClass('hidden');
        $('#hamburger').toggleClass('open');
    });
    $('li[call-btn]').on('click', function() {
        AvBlurScreen("on", "9999");
        CreateAvAlertPopup2($('[call-back-form]').html(), "").positionCenter(9999).on('remove', function() {
            AvBlurScreen("off");
            $('body').removeClass("stop-scrolling");
        });
    });
    $('#partners-form-btn').on('click', function() {
        $('body').addClass("stop-scrolling");
        AvBlurScreen("on", "9999");
        CreateAvAlertPopup2($('[partners-form]').html(), "").positionCenter(9999).on('remove', function() {
            AvBlurScreen("off");
            $('body').removeClass("stop-scrolling");
        });
    });
    $('body').on('mouseenter touchstart', ".main-wrap .hover-section-1-plus-img", function() {
        var offset = $(this).offset();
        $('#placeholder-hover-wrap').html($(this).attr("placeholderText")).fadeIn().css({
            "z-index": 9999,
            "left": offset.left - 20 + "px",
            "top": offset.top - $('#placeholder-hover-wrap').height() - 50 + "px"
        });
    });
    /*----------hide on MouseOut------------*/
    $('#hover-section-2-roof-img, #hover-section-1-roof-img').mouseout(function() {
        $('#placeholder-hover-wrap').hide();
    });
    /*------------------HIDE ON CLICK---------------------------*/

    $('body').on('click', '#av-blur-screen', function() {
        $('.av-alert-popup').remove();
    });
    /*------------------RESIZE---------------------------*/
    $(window).on("resize", function() {

        $('#placeholder-hover-wrap').hide();
        AvBlurScreen("off");
        $('.av-alert-popup').remove();
        $('#hamburger').removeClass('open');
        $('.bg-mobile-menu').addClass('hidden');
    });
    /*------------------ ON SCROLL ---------------------------*/
    $(window).on('scroll',function() {
        var mapDivScrollValue = $('#map-wrap').offset().top;
        if ($(this).scrollTop() > mapDivScrollValue / 2) { SetMapOnScroll() 	};
        if ($(this).scrollTop() > 700) {
            $('.main-wrap .main-menu-fixed').addClass("fixed");
        } else {
            $('.main-wrap .main-menu-fixed').removeClass("fixed");
        }
        if($(this).scrollTop() >= ($('#order-now-wrap').offset().top / 2)) {
            $('#order-now-wrap').css("background","url(/upload/av_site/landings/av-steel/fon-form.jpg) center center no-repeat");
        }
        animScroll();
        console.log("Оффсет топ:   " + ($('#order-now-wrap').offset().top / 2) + "Скролл ТОП:    " + $(this).scrollTop());
    });
    /*------------------ ANIMATE ON SCROLL ---------------------------*/
    if ($(window).height() >= $('[circle-first] [circle-1-img-1]').offset().top) {
        animScroll();
    }
    if($(window).scrollTop() >= ($('#order-now-wrap').offset().top / 2)) {
        $('#order-now-wrap').css("background","url(/upload/av_site/landings/av-steel/fon-form.jpg) center center no-repeat");
    }

    /*------------------ INPUT LOWERCASE ONLY ---------------------------*/
    $('.emailLowerCase').keyup(function() {
        this.value = this.value.toLowerCase();
    });


    /*---------------------- ЯКОРЯ  ---------------------------*/
    $('a[href^="#"]').click(function() {
        var el = $(this).attr('href');
        if (el == "#how_we_work") {
            $('body').animate({
                scrollTop: $(el).offset().top - 60
            }, 1000);
        } else if (el == "#profnastil") {
            $('body').animate({
                scrollTop: $(el).offset().top + 330
            }, 1000);
        } else {
            $('body').animate({
                scrollTop: $(el).offset().top
            }, 1000);
        }
    });
    /*------------------ CHANGE RAL COLOR ---------------------------*/
    $("body").on("click  touchstart", ".ral-color-btn", function() {
        $('.ral-color-btn').removeClass("active");
        var color = $(this).attr("ral-color");
        $(this).addClass("active");
        $('.main-wrap #ral-color-wrap svg').css("fill", color);
    });
    /*--- CHANGE RAL TAB --------*/
    $('.ral-image-tab').on("click  touchstart", function() {
        $('.ral-image-tab').removeClass("active");
        if ($(this).attr("id") == "ral-image-tab-2") {
            $(this).addClass("active");
            $('.ral-main-img-2').fadeIn();
            $('.ral-main-img-1').hide();
        } else {
            $("#ral-image-tab-1").addClass("active")
            $('.ral-main-img-1').fadeIn();
            $('.ral-main-img-2').hide();
        };
    })

    /*------------------ MAP  ---------------------------*/
    var i = 1, map;
    function SetMapOnScroll() {
        if ( i == 1) {initialize()}
        function initialize() {
            var map = new google.maps.Map(document.getElementById("map_canvas"), {
                center: {
                    lat: 49.725496,
                    lng: 32.766595
                },
                zoom: 6,
                zoomControl: true,
                scrollwheel: false,
                scaleControl: false,
                mapTypeControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            google.maps.event.addListener(map, 'idle', function() {
                $(window).scroll(function () {
                    var $windowHeight = ($(window).height() / 1.9),
                        $scroll = ($(this).scrollTop() + $windowHeight);
                    if ($scroll >= $('#map_canvas').offset().top) {
                        setMarkers(map);
                    }
                });
            });
            i++;
        }
        function setMarkers(map) {
            if ($('#map_canvas').is('[markers-seted]')) return;
            ///// координаты точек!!!!!
            var beaches = [
                ['г. Днепр, пр. Богдана Хмельницкого, 122<br> Телефон: <a href="tel:0675660554">067 566 05 54</a>', 48.405256, 35.000636, 4],
                ['г. Киев, ул. Автопарковая, 5<br> Телефон: <a href="tel:0675660554">067 566 05 54</a>', 50.396999, 30.686763, 5],
                ['г. Херсон, ул. Тираспольская, 1<br> Телефон: <a href="tel:0675660554">067 566 05 54</a>', 46.642540, 32.620287, 3],
                ['г. Харьков, ул. Пушкинская, 109<br> Телефон: <a href="tel:0675660554">067 566 05 54</a>', 50.019081, 36.264693, 2],
                ['г. Львов, ул. Навроцкого, 1<br> Телефон: <a href="tel:0674454319">067 445 43 19</a>', 49.811408, 24.047117, 1]
            ];
            var image = {
                url: '/upload/av_site/landings/av-steel/map-marker-new.png',
                // This marker is 20 pixels wide by 32 pixels high.
                size: new google.maps.Size(40, 60),
                // The origin for this image is (0, 0).
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the base of the flagpole at (0, 22).
                anchor: new google.maps.Point(18, 45)
            };
            for (var i = 0; i < beaches.length; i++) {
                var beach = beaches[i];
                var marker = new google.maps.Marker({
                    position: {
                        lat: beach[1],
                        lng: beach[2]
                    },
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: image,
                    content: beach[0],
                    zIndex: beach[3]
                });
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', (function (marker, i, infowindow) {
                    return function () {
                        infowindow.setContent(this.content);
                        infowindow.open(map, this);
                    };
                })(marker, i, infowindow));
            }
            $('#map_canvas').attr('markers-seted', true);
        };
        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {marker.setAnimation(google.maps.Animation.BOUNCE);}
        }
    }
    /*----------------------- CATALOG  ---------------------------*/
    $('.av-center-cetalog').slick({
        centerMode: false,
        centerPadding: '0px',
        slidesToShow: 3,
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '80px',
                slidesToShow: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }]
    });

});

function CreateAvAlertPopup2(html, type) {
    $('.av-alert-popup').remove();
    return $('<div class="av-alert-popup">' + html + '<div close-form2></div>' + '</div>').appendTo('body').on('click', '[close-form2]', function() {
        $(this).closest('.av-alert-popup').remove();
        $('[form-input-error-123]').removeClass("show");
        AvBlurScreen("off");
    });
}

function CreateAvAlertPopup3(html, type) {
    $('.av-alert-popup').remove();
    return $('<div class="av-alert-popup av-alert-popup-3"><div class="col-md-12"><div class="col-md-6 pull-left text-center text-uppercase"><br><p>металлочерепица</p><div img></div><div table>' + $('#hover-section-2 table').html() + '</div></div><div class="col-md-6 pull-right">' + html + '</div><div close-form2></div>' + '</div></div>').appendTo('body').on('click', '[close-form2]', function() {
        $(this).closest('.av-alert-popup').remove();
        $('[form-input-error-123]').removeClass("show")
    });
}

function ShowPopUp() {
    AvBlurScreen("on", 1000);
    $('#form-anwer123').hide()
    CreateAvAlertPopup2($('#form-anwer123').html(), "").positionCenter(9999).on('remove', function() {
        $('body').removeClass("stop-scrolling");
    });
}
/*--------------------------- МЕНЯЕМ URL ----------------------*/
function changeUrl() {
    var stateObj = { foo: "bar" };
    history.pushState(stateObj, "page 1", "https://www.avsteel.com.ua");
}