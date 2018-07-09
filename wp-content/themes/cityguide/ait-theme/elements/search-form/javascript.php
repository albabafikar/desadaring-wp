<script id="{$htmlId}-script">
//jQuery(window).load(function(){
jQuery(document).ready(function(){
	{if $options->theme->general->progressivePageLoading}
		if(!isResponsive(1024)){
			jQuery("#{!$htmlId}-main").waypoint(function(){
				jQuery("#{!$htmlId}-main").addClass('load-finished');
			}, { triggerOnce: true, offset: "95%" });
		} else {
			jQuery("#{!$htmlId}-main").addClass('load-finished');
		}
	{else}
		jQuery("#{!$htmlId}-main").addClass('load-finished');
	{/if}



	var select2Settings = {
		dropdownAutoWidth : true
	};

	jQuery('#{!$htmlId}').find('select').select2(select2Settings).on("select2-close", function() {
		// fired to the original element when the dropdown closes
		jQuery('.select2-drop').removeClass('select2-drop-active');

		// replace all &nbsp;
		var regPattern = "&nbsp;";
		jQuery('#{!$htmlId} .category-search .select2-chosen').html(jQuery('#{!$htmlId} .category-search .select2-chosen').html().replace(new RegExp(regPattern, "g"), ''));
		if(jQuery('#{!$htmlId} .location-search .select2-chosen').length > 0) {
			jQuery('#{!$htmlId} .location-search .select2-chosen').html(jQuery('#{!$htmlId} .location-search .select2-chosen').html().replace(new RegExp(regPattern, "g"), ''));
		}
	});

	jQuery('#{!$htmlId}').find('select').select2(select2Settings).on("select2-loaded", function() {
		// fired to the original element when the dropdown closes
		jQuery('#{!$htmlId}').find('.select2-container').removeAttr('style');
	});

	if(isMobile()){
		jQuery('#{!$htmlId} .category-search-wrap').find('select').select2(select2Settings).on("select2-selecting", function(val, choice) {
			if(val != ""){
				jQuery('#{!$htmlId}').find('.category-clear').addClass('clear-visible');
			}
		});
		jQuery('#{!$htmlId} .location-search-wrap').find('select').select2(select2Settings).on("select2-selecting", function(val, choice) {
			if(val != ""){
				jQuery('#{!$htmlId}').find('.location-clear').addClass('clear-visible');
			}
		});
	} else {
		jQuery('#{!$htmlId}').find('.category-search-wrap').hover(function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.category-clear').addClass('clear-visible');
			}
		},function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.category-clear').removeClass('clear-visible');
			}
		});

		jQuery('#{!$htmlId}').find('.location-search-wrap').hover(function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.location-clear').addClass('clear-visible');
			}
		},function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.location-clear').removeClass('clear-visible');
			}
		});
	}


	jQuery('#{!$htmlId}').find('.radius').hover(function(){
		jQuery(this).find('.radius-clear').addClass('clear-visible');
	},function(){
		jQuery(this).find('.radius-clear').removeClass('clear-visible');
	});

	jQuery('#{!$htmlId}').find('.category-clear').click(function(){
		jQuery('#{!$htmlId}').find('.category-search-wrap select').select2("val", "");
		jQuery(this).removeClass('clear-visible');
	});
	jQuery('#{!$htmlId}').find('.location-clear').click(function(){
		jQuery('#{!$htmlId}').find('.location-search-wrap select').select2("val", "");
		jQuery(this).removeClass('clear-visible');
	});


	/* RADIUS SCRIPT */
	var lat,
		lon,
		tmp = [];
	window.location.search
	//.replace ( "?", "" )
	// this is better, there might be a question mark inside
	.substr(1)
	.split("&")
	.forEach(function (item) {
		tmp = item.split("=");
		if (tmp[0] === 'lat'){
			lat = decodeURIComponent(tmp[1]);
		}
		if (tmp[0] === 'lon'){
			lon = decodeURIComponent(tmp[1]);
		}
	});
	var coordinatesSet = false;
	if(typeof lat != 'undefined' & typeof lon != 'undefined') {
		coordinatesSet = true;
	}

	var $headerMap = jQuery("#{!$elements->unsortable[header-map]->getHtmlId()}-container");

	var $radiusContainer = jQuery('#{!$htmlId} .radius');
	var $radiusToggle = $radiusContainer.find('.radius-toggle');
	var $radiusDisplay = $radiusContainer.find('.radius-display');
	var $radiusPopup = $radiusContainer.find('.radius-popup-container');

	$radiusToggle.click(function(e, invoker){
		if (typeof invoker != 'undefined') {
			if(invoker.indexOf('advanced-search') > -1) {
				coordinatesSet = true;
			}
			if(invoker.indexOf('reset-geodata') > -1) {
				coordinatesSet = false;
			}
		}

		jQuery(this).removeClass('radius-input-visible').addClass('radius-input-hidden');
		$radiusContainer.find('input').each(function(){
			jQuery(this).removeAttr('disabled');
		});
		$radiusDisplay.removeClass('radius-input-hidden').addClass('radius-input-visible');
		if(typeof invoker == 'undefined' || invoker.indexOf('radius-already-selected') == -1) {
			openRadiusPopup();
		}

		if(!coordinatesSet) {
			setGeoData();
		}

		$radiusDisplay.find('.radius-value').html($radiusPopup.find('input').val());
	});

	$radiusDisplay.click(function(){
		openRadiusPopup();
		if(!coordinatesSet) {
			setGeoData();
		}
	});
	$radiusDisplay.find('.radius-clear').click(function(e){
		e.stopPropagation();
		$radiusDisplay.removeClass('radius-input-visible').addClass('radius-input-hidden');
		$radiusContainer.find('input').each(function(){
			jQuery(this).attr('disabled', true);
		});
		$radiusPopup.find('.radius-popup-close').trigger('click');
		$radiusToggle.removeClass('radius-input-hidden').addClass('radius-input-visible');
	});
	$radiusPopup.find('.radius-popup-close').click(function(e){
		e.stopPropagation();
		$radiusPopup.removeClass('radius-input-visible').addClass('radius-input-hidden');
	});
	$radiusPopup.find('input').change(function(){
		$radiusDisplay.find('.radius-value').html(jQuery(this).val());
	});

	{if $selectedRad}
		{if !empty($selectedLat) and !empty($selectedLon)}
			coordinatesSet = true;
		{/if}
		$radiusToggle.trigger('click', [['radius-already-selected']]);
	{/if}
	/* RADIUS SCRIPT */


	/* AUTO GROW SEARCH INPUT */

	var $searchInput = jQuery('#searchinput-text');

	jQuery(document).one('search-recalc', searchAutoGrow());
	searchAutoGrow();

	function searchAutoGrow() {
		var $searchInputWidth = $searchInput.width(),
			$searchInputMaxWidth = $searchInput.closest('.elm-wrapper').width() - $searchInput.parent().width() + $searchInputWidth - 10;

		$searchInput.autoGrowInput({
			minWidth: $searchInputWidth,
			maxWidth: $searchInputMaxWidth,
			comfortZone: 0
		});

		$searchInput.trigger('search-recalc');
	}

});

function openRadiusPopup() {
	var $radiusContainer = jQuery('#{!$htmlId} .radius');
	var $radiusPopup = $radiusContainer.find('.radius-popup-container');

	$radiusPopup.removeClass('radius-input-hidden').addClass('radius-input-visible');
}

function setGeoData() {
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			jQuery("#latitude-search").attr('value', pos.lat());
			jQuery("#longitude-search").attr('value', pos.lng());
		});
	}
}
</script>
