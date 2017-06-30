/* -------------------------------------------------------------------- */
/* ----------------------- google map function ------------------------ */
/* -------------------------------------------------------------------- */
function initGoogleMap($mapObject)
	{
	var
		coordinateX = parseFloat($mapObject.attr("data-cordinate-x")),
		coordinateY = parseFloat($mapObject.attr("data-cordinate-y")),
		title       = $mapObject.attr("data-store-name");
	if(!coordinateX || !coordinateY || !title) return;

	var map = new google.maps.Map
		(
		$mapObject[0],
			{
			zoom                  :12,
			draggable             : true,
			disableDefaultUI      : true,
			disableDoubleClickZoom: true,
			scrollwheel           : true,
			mapTypeId             : google.maps.MapTypeId.ROADMAP,
			center                : new google.maps.LatLng(coordinateX, coordinateY)
			}
		);

	new google.maps.Marker
		({
		position: {lat: coordinateX, lng: coordinateY},
		map     : map,
		title   : title
		});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$('.av-bases-list-element .google-map').each(function() {initGoogleMap($(this))});

	$(document)
		.on("vclick", '.av-bases-list-element', function(event)
			{
			if(!$(event.target).closest('.google-map').length)
				$(this).find('a')[0].click();
			});
	});