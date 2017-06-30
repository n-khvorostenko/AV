$(function () {

    setHeight()
googleMapMobile();
        /*------------------RESIZE---------------------------*/
    $(window).on("resize", function () {
        setHeight();
		googleMapMobile();
    });

    $('.mobileWrap').slick({
        speed: 800,
        vertical: true,
        draggable: true,
        verticalSwiping: true,
        infinite: false,
        slidesToScroll: 1,
        swipe: true,
        autoplay: false,
        initialSlide: 0
    });

    $('.single-item1').slick({
        speed: 500,
        vertical: true,
        draggable: false,
        verticalSwiping: false,
        infinite: false,
        slidesToScroll: 1,
        swipe: false,
        autoplay: false,
        initialSlide: 3,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    vertical: true,
                    draggable: false,
                    verticalSwiping: false,
                    infinite: false,
                    slidesToScroll: 1,
                    autoplay: false,
                    initialSlide: 2
                }
    }
  ]
    });
    $('.single-item2').slick({
        speed: 500,
        vertical: true,
        draggable: false,
        swipe: false,
        verticalSwiping: false,
        infinite: false,
        slidesToScroll: 1,
        autoplay: false,
        initialSlide: 0,
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    vertical: true,
                    draggable: false,
                    verticalSwiping: false,
                    infinite: false,
                    slidesToScroll: 1,
                    autoplay: false,
                    initialSlide: 0
                }
    }
  ]

    });
/*--------------------------------- СКРОЛЛ МЫШЬЮ  -----------------------------------*/
    $('body ').on('mousewheel', function (e) {
        if (e.originalEvent.wheelDelta / 120 < 0) {
            openCarusel("open");
        }
    });

		var elem = document.getElementById('av-shpola');
		// Firefox < 17
		elem.addEventListener("MozMousePixelScroll", onWheel);
	// Это решение предусматривает поддержку IE8-
	function onWheel(e) {
	  e = e || window.event;
	  // deltaY, detail содержат пиксели
	  // wheelDelta не дает возможность узнать количество пикселей
	  // onwheel || MozMousePixelScroll || onmousewheel
	  var delta = e.deltaY || e.detail || e.wheelDelta;
	  if (delta > 0) {changeImg("next")} else {changeImg("prev")}
	}


    $('body').on('mousewheel', function (e) {
        if (e.originalEvent.wheelDelta / 120 < 0) {changeImg("next")} else {changeImg("prev")}
		if($('#page0').is(".active")) {
				$('#pageIndicator').removeClass("red");
				$('#arrow').addClass("down").removeClass("up");

		} 
    });

    $('body ').on('click', '.desctopeWrap #products', function () {
        changeImg("next");
    });
    $('body ').on('click', '.mobileWrap #products', function () {
       $('.mobileWrap').slick('slickGoTo', "1")
    });
    $('.img3 , .img6').on('mousewheel', function (e) {
        if (e.originalEvent.wheelDelta / 120 > 0) {
            changeImg("prev")
        }
    });
/*--------------------------------- ЯКОРЬ НА КАРТУ КАРТА МОБ. -----------------------------------*/
    $('body').on('click', '.mobileWrap #map', function () {
        $('.mobileWrap').slick('slickGoTo', "5")
    });
/*--------------------------------- ЯКОРЬ НА КАРТУ КАРТА  -----------------------------------*/
    $('body').on('click', '.desctopeWrap #map', function () {
		$('.logoTextWrap').css("z-index",0)
        $('#arrow').removeClass("down").addClass("up");
        $('#pageIndicator div').removeClass("active");
        $('#pageIndicator #page3').addClass("active");
        $('.single-item1').slick('slickGoTo', "0");
        $('.single-item2').slick('slickGoTo', "3");
		$('#pageIndicator').addClass("red");
    });

/*--------------------------------- СТРЕЛКА ВНИЗ  -----------------------------------*/
	$(document).on('click', '.desctopeWrap .down', function () {
		changeImg("next");
		if ($('.img6').is('.slick-current')) {
			$('#arrow').removeClass("down").addClass("up");
			$('#pageIndicator').addClass("red");
		}
	});

	$(document).on('click', '.mobileWrap .containerArrow.down', function () {
		$('.mobileWrap .slick-next').click();
	});
	$(document).on('click', '.mobileWrap #socialImg .containerArrow.down', function () {
		$('.mobileWrap').slick('slickGoTo', "0");
	});
/*--------------------------------- СТРЕЛКА ВВЕРХ  -----------------------------------*/
    $(document).on('click', '.desctopeWrap .up', function () {
        changeImg("prev");$('#pageIndicator').removeClass("red");

    })


/*--------------------------------- MAP  -----------------------------------*/
	var map;

	function initialize() {
		var map = new google.maps.Map(document.getElementById("map_canvas"), {
			center: {
				lat: 49.010147,
				lng: 31.402838
			},
			zoom: 8,
			scrollwheel: false,
			zoomControl: true,
			scaleControl: true,
			mapTypeControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		setMarkers(map);
	}
	///// координаты точек!!!!!
	var beaches = [
		['м. Шпола, вул. Лебединська, 4-б<br> Телефон: <a href="tel:0675660554">067 522 24 18</a>', 49.010147, 31.402838, 4]
	];

	function setMarkers(map) {
		if ($('#map_canvas').is('[markers-seted]')) return;
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
			google.maps.event.addListener(marker, 'click', (function(marker, i, infowindow) {
				return function() {
					infowindow.setContent(this.content);
					infowindow.open(map, this);
				};
			})(marker, i, infowindow));
		}
		$('#map_canvas').attr('markers-seted', true);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

	function toggleBounce() {

			marker.setAnimation(google.maps.Animation.BOUNCE);

	}


/*--------------------------------- END  -----------------------------------*/

/*--------------------------------- MAP 2222 -----------------------------------*/
	function googleMapMobile() {
var windowHeight = window.innerWidth;
	if(windowHeight <= 1024) {
	var map2;

	function initialize() {
		var map2 = new google.maps.Map(document.getElementById("map_canvas2"), {
			center: {
				lat: 49.010147,
				lng: 31.402838
			},
			zoom: 14,
			draggable: false,
			scrollwheel: false,
			zoomControl: true,
			zoomControlOptions: {
			position: google.maps.ControlPosition.RIGHT_CENTER
			},
			scaleControl: false,
			mapTypeControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		setMarkers(map2);
	}
	///// координаты точек!!!!!
	var beaches = [
		['м. Шпола, вул. Лебединська, 4-б<br> Телефон: <a href="tel:0675660554">067 522 24 18</a>', 49.010147, 31.402838, 4]
	];

	function setMarkers(map2) {
		if ($('#map_canvas2').is('[markers-seted]')) return;
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
				map: map2,
				animation: google.maps.Animation.DROP,
				icon: image,
				content: beach[0],
				zIndex: beach[3]
			});
			var infowindow = new google.maps.InfoWindow();
			google.maps.event.addListener(marker, 'click', (function(marker, i, infowindow) {
				return function() {
					infowindow.setContent(this.content);
					infowindow.open(map, this);
				};
			})(marker, i, infowindow));
		}
		$('#map_canvas2').attr('markers-seted', true);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

	function toggleBounce() {

			marker.setAnimation(google.maps.Animation.BOUNCE);

		}

	}
  }

});


/*--------------------------------- ПОЗИЦИОНИРОВАНИЕ ЭЛЛЕМЕНТОВ  -----------------------------------*/
function setHeight() {
    var 
        $logoTextWrap = $('.logoTextWrap').height(),
        $logoTextWrapMod = $('.mobileWrap .logoTextWrap').height(),
        windowHeight = window.innerHeight;
    $('.imageClass, .conta').css("height", windowHeight + "px");
    $('.logoTextWrap').css("margin-top", (windowHeight / 2 - $logoTextWrap / 2) + "px");
    $('.mobileWrap .logoTextWrap').css("margin-top", (windowHeight / 2 - $logoTextWrapMod / 2) + "px");
	$('.mobileWrap #map_canvas2').css("height",  windowHeight - $('.mobileWrap #mapText').height() - $('.mobileWrap #socialImg').height() + "px");
	$('.sliderText').each(function(){
		var $imgTextHeight = $(this).height(),
		windowHeight = window.innerHeight;
		if(windowHeight >= 600) { 
			$(this).css("margin-top", (windowHeight / 2 - $imgTextHeight / 2) + "px");
		} else {$(this).css("margin-top", ((windowHeight / 2 - 30) - $imgTextHeight / 2) + "px");}

});

}


/*--------------------------------- ФУНК-ЦИЯ СМЕНЫ СЛАЙДА  -----------------------------------*/
function changeImg(value) {
    if (value == "next") {

            if ($('.img6').is('.slick-current')) {
                $('#arrow').removeClass("down").addClass("up");
				$('#pageIndicator').addClass("red");

            } else {
				$('.logoTextWrap').css("z-index",0)
                $('.carusel2 .slick-prev, .carusel1 .slick-next').click();
                $('.single-item2').on('afterChange', function (event, slick, currentSlide, nextSlide) {
                    $('#pageIndicator .active').removeClass("active");
                    var number = parseInt(currentSlide  );
                    $('#page' + number).addClass("active");

                });
            }
    }
    if (value == "prev") {

        $('.carusel1 .slick-prev, .carusel2 .slick-next').click();
        $('.single-item2').on('afterChange', function (event, slick, currentSlide, nextSlide) {
            $('#pageIndicator .active').removeClass("active");
            var number = parseInt(currentSlide );
            $('#page' + number).addClass("active");
			if($('#page0').is(".active")) {
			$('#pageIndicator').removeClass("red");
			$('#arrow').addClass("down").removeClass("up");
			$('.logoTextWrap').css("z-index",999999999)
		}
        });
		$('#pageIndicator').removeClass("red");

    }
};


/*--------------------------------- ФУНК-ЦИЯ ОТКРЫТИЯ СЛАЙДЕРА  -----------------------------------*/
function openCarusel(value) {
    if (value == "open") {
       $('.logoTextWrap').css("z-index",0)
$('.single-item2').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                    $('#pageIndicator .active').removeClass("active");
                    var number = parseInt(currentSlide );
                    $('#page' + number).addClass("active");
});
    }
    if (value == "close") {
        $('#arrow').addClass("down").removeClass("up");

    }
}



