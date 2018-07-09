<?php //netteCache[01]000594a:2:{s:4:"time";s:21:"0.70332000 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:107:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/search-form/javascript.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/search-form/javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'uco4juon8r')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-script">
//jQuery(window).load(function(){
jQuery(document).ready(function(){
<?php if ($options->theme->general->progressivePageLoading) { ?>
		if(!isResponsive(1024)){
			jQuery("#<?php echo $htmlId ?>-main").waypoint(function(){
				jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
			}, { triggerOnce: true, offset: "95%" });
		} else {
			jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
		}
<?php } else { ?>
		jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
<?php } ?>



	var select2Settings = {
		dropdownAutoWidth : true
	};

	jQuery('#<?php echo $htmlId ?>').find('select').select2(select2Settings).on("select2-close", function() {
		// fired to the original element when the dropdown closes
		jQuery('.select2-drop').removeClass('select2-drop-active');

		// replace all &nbsp;
		var regPattern = "&nbsp;";
		jQuery('#<?php echo $htmlId ?> .category-search .select2-chosen').html(jQuery('#<?php echo $htmlId ?> .category-search .select2-chosen').html().replace(new RegExp(regPattern, "g"), ''));
		if(jQuery('#<?php echo $htmlId ?> .location-search .select2-chosen').length > 0) {
			jQuery('#<?php echo $htmlId ?> .location-search .select2-chosen').html(jQuery('#<?php echo $htmlId ?> .location-search .select2-chosen').html().replace(new RegExp(regPattern, "g"), ''));
		}
	});

	jQuery('#<?php echo $htmlId ?>').find('select').select2(select2Settings).on("select2-loaded", function() {
		// fired to the original element when the dropdown closes
		jQuery('#<?php echo $htmlId ?>').find('.select2-container').removeAttr('style');
	});

	if(isMobile()){
		jQuery('#<?php echo $htmlId ?> .category-search-wrap').find('select').select2(select2Settings).on("select2-selecting", function(val, choice) {
			if(val != ""){
				jQuery('#<?php echo $htmlId ?>').find('.category-clear').addClass('clear-visible');
			}
		});
		jQuery('#<?php echo $htmlId ?> .location-search-wrap').find('select').select2(select2Settings).on("select2-selecting", function(val, choice) {
			if(val != ""){
				jQuery('#<?php echo $htmlId ?>').find('.location-clear').addClass('clear-visible');
			}
		});
	} else {
		jQuery('#<?php echo $htmlId ?>').find('.category-search-wrap').hover(function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.category-clear').addClass('clear-visible');
			}
		},function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.category-clear').removeClass('clear-visible');
			}
		});

		jQuery('#<?php echo $htmlId ?>').find('.location-search-wrap').hover(function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.location-clear').addClass('clear-visible');
			}
		},function(){
			if(jQuery(this).find('select').select2("val") != ""){
				jQuery(this).find('.location-clear').removeClass('clear-visible');
			}
		});
	}


	jQuery('#<?php echo $htmlId ?>').find('.radius').hover(function(){
		jQuery(this).find('.radius-clear').addClass('clear-visible');
	},function(){
		jQuery(this).find('.radius-clear').removeClass('clear-visible');
	});

	jQuery('#<?php echo $htmlId ?>').find('.category-clear').click(function(){
		jQuery('#<?php echo $htmlId ?>').find('.category-search-wrap select').select2("val", "");
		jQuery(this).removeClass('clear-visible');
	});
	jQuery('#<?php echo $htmlId ?>').find('.location-clear').click(function(){
		jQuery('#<?php echo $htmlId ?>').find('.location-search-wrap select').select2("val", "");
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

	var $headerMap = jQuery("#<?php echo $elements->unsortable['header-map']->getHtmlId() ?>-container");

	var $radiusContainer = jQuery('#<?php echo $htmlId ?> .radius');
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

<?php if ($selectedRad) { if (!empty($selectedLat) and !empty($selectedLon)) { ?>
			coordinatesSet = true;
<?php } ?>
		$radiusToggle.trigger('click', [['radius-already-selected']]);
<?php } ?>
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
	var $radiusContainer = jQuery('#<?php echo $htmlId ?> .radius');
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
