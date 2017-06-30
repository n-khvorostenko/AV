$(function () {
    setHeight()
        /*------------------RESIZE---------------------------*/
    $(window).on("resize", function () {
        setHeight();
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

/*--------------------------------- ЯКОРЬ НА КАРТУ КАРТА МОБ. -----------------------------------*/
    $('body').on('click', '.mobileWrap #map', function () {
        $('.mobileWrap').slick('slickGoTo', "5")
    });

/*--------------------------------- MAP  -----------------------------------*/
	var map2;

	function initialize() {
		var map2 = new google.maps.Map(document.getElementById("map_canvas2"), {
			center: {
				lat: 49.010147,
				lng: 31.402838
			},
			zoom: 8,
			draggable: false,
			scrollwheel: true,
			zoomControl: true,
			scaleControl: true,
			mapTypeControl: true,
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


});

