{var $address                = aitEventAddress($post, true)}
{var $eventAdress            = $address['address']}
{var $eventLocationLatitude  = $address['latitude']}
{var $eventLocationLongitude = $address['longitude']}

{var $mapSettings            = $options->theme->item}

{if $eventLocationLatitude && $eventLocationLongitude}
{if ($eventLocationLatitude === "1" && $eventLocationLongitude === "1") != true}
<div class="map-container">
	<div class="content" style="height: 190px">

	</div>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		var $mapContainer = jQuery('.single-ait-event-pro .map-container');
		var $mapContent = $mapContainer.find('.content');

		$mapContent.height(190);
		$mapContent.height(jQuery('.column.event-venue').innerHeight() - 61);

		$mapContent.width($mapContainer.width());

		var styles = [
			{ featureType: "landscape", stylers: [
					{ visibility: "{if $mapSettings->mapDisplayLandscapeShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "administrative", stylers: [
					{ visibility: "{if $mapSettings->mapDisplayAdministrativeShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "road", stylers: [
					{ visibility: "{if $mapSettings->mapDisplayRoadsShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "water", stylers: [
					{ visibility: "{if $mapSettings->mapDisplayWaterShow == false}off{else}on{/if}"},
				]
			},
			{ featureType: "poi", stylers: [
					{ visibility: "{if $mapSettings->mapDisplayPoiShow == false}off{else}on{/if}"},
				]
			},
		];

		var mapdata = {
			latitude: {$eventLocationLatitude},
			longitude: {$eventLocationLongitude}
		}

		$mapContent.gmap3({
			map: {
				options: {
					center: [mapdata.latitude,mapdata.longitude],
					zoom: {!$mapSettings->mapZoom},
					scrollwheel: false,
					styles: styles,
				}
			},
			marker: {
				values:[
					{ latLng:[mapdata.latitude,mapdata.longitude] }
		        ],
			},
		});
	});

	jQuery(window).resize(function(){
		var $mapContainer = jQuery('.single-ait-event-pro .map-container');
		var $mapContent = $mapContainer.find('.content');

		$mapContent.width($mapContainer.width());
	});
	</script>
</div>

{/if}
{/if}
