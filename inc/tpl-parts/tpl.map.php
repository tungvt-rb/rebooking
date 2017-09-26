<div id="map"></div>
<script>
	
	function initMap() {

		// Specify features and elements to define styles.
		var styleArray = [
			{
				featureType: "all",
				stylers: [
					{ saturation: -80 }
				]
			},{
				featureType: "road.arterial",
				elementType: "geometry",
				stylers: [
					{ hue: "#00ffee" },
					{ saturation: 50 }
				]
			},{
				featureType: "poi.business",
				elementType: "labels",
				stylers: [
					{ visibility: "off" }
				]
			}
		];

		var address = '<?php echo (!empty($re_address)) ? $re_address : 'Ha Noi'; ?>';

		var geocoder = new google.maps.Geocoder();
		if (geocoder) {
			geocoder.geocode({
				'address': address
			}, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					var map = new google.maps.Map(document.getElementById('map'), {
						center: results[0].geometry.location,
						scrollwheel: false,
						// Apply the map style array to the map.
						//styles: styleArray,
						zoom: 16
					});
					//add marker
					var image = '<?php bloginfo('template_url');?>/assets/images/gmap_marker.png';
					var marker = new google.maps.Marker({
						position: results[0].geometry.location,
						icon: image,
					});
					infoWindow = new google.maps.InfoWindow();
					infoWindow.setOptions({
						content: "<div><strong><?php pll_e('PROPERTY LOCATION') ?></strong></div>",
						position: results[0].geometry.location,
					});
					
					google.maps.event.addListener(marker, "click", function(){infoWindow.open(map,marker);});
					infoWindow.open(map,marker);

					marker.setMap(map);
				}
			});
		}
		// var myLatlng = new google.maps.LatLng(-37.81270, 175.77179);
	}

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHeXwCL0BJs48GcKp9F2VT3zVXcGWSWos&callback=initMap"></script>