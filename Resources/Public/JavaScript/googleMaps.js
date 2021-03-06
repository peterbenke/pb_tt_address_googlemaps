/**
 * Creates the google map
 * Called by: https://maps.googleapis.com/maps/api/js?key={GOOGLE-API-KEY}&callback=initMap
 */
function initMap() {

	// Set the center of the map (value not important, because we bound the markers to set the center of the map)
	var myLatLng = {lat: -25.363, lng: 131.044};

	// Bounding for centering the map
	var bounds = new google.maps.LatLngBounds();

	// Info window for the markers
	var infoWindow = new google.maps.InfoWindow();

	// Create the map
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 4,
		center: myLatLng
	});

	for (var i = 0; i < addresses.length; i++) {

		// Only if lat and lng exist
		if(addresses[i].lat && addresses[i].lng){

			// Set the marker
			var point = new google.maps.LatLng(
				parseFloat(addresses[i].lat),
				parseFloat(addresses[i].lng)
			);
			var marker = new google.maps.Marker({
				position: point,
				map: map,
				title: addresses[i].title
			});

			// Bound the marker for centering the map
			bounds.extend(marker.position);

			// Create the info window on click (here: self invoking anonymous function)
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infoWindow.setContent(addresses[i].markerText);
					infoWindow.open(map, marker);
				}
			})(marker, i));

		}

	}
	google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
		if (this.getZoom() > 14) {
			this.setZoom(14);
		}
		if (this.getZoom() < 3) {
			this.setZoom(3);
		}
	});
	// Center the map to the bounds
	map.fitBounds(bounds);

}

/**
 *
 * @param map
 */
/*
function updateMapTimer(map) {
	clearInterval(refreshIntervalId);
	var center = map.getCenter() ;
	google.maps.event.trigger(map, 'resize');
	map.setCenter(center) ;
}

refreshIntervalId = setInterval(function () { updateMapTimer(map) }, 300);
*/