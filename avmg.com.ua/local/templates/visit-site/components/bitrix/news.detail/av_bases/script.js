$(function()
	{
	var
		$googleMap  = $('.av-bases-detail .map-col .google-map'),
		coordinateX = parseFloat($googleMap.attr("data-cordinate-x")),
		coordinateY = parseFloat($googleMap.attr("data-cordinate-y")),
		map;

	if($googleMap.length)
		{
		map = new google.maps.Map
			(
			$googleMap[0],
				{
				zoom     : 12,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center   : new google.maps.LatLng(coordinateX, coordinateY)
				}
			);

		new google.maps.Marker
			({
			map     : map,
			position: {lat: coordinateX, lng: coordinateY},
			title   : $googleMap.attr("data-store-name")
			});
		}
	});