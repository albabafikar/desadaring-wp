<?php //netteCache[01]000597a:2:{s:4:"time";s:21:"0.65366300 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:110:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/search-form/search-form.latte";i:2;i:1528302396;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/search-form/search-form.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'w8k1jo0uis')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['w8k1jo0uis'])->render() ?>

<?php $type = $el->option('type') ?>

<?php $selectedKey = isset($_REQUEST['s']) && $_REQUEST['s'] != "" ? $_REQUEST['s'] : '' ;$selectedCat = isset($_REQUEST['category']) && $_REQUEST['category'] != "" ? $_REQUEST['category'] : '' ;$selectedLoc = isset($_REQUEST['location']) && $_REQUEST['location'] != "" ? $_REQUEST['location'] : '' ;$selectedRad = isset($_REQUEST['rad']) && $_REQUEST['rad'] != "" ? $_REQUEST['rad'] : '' ?>

<?php $selectedLocationAddress = isset($_REQUEST['location-address']) && $_REQUEST['location-address'] != "" ? $_REQUEST['location-address'] : '' ;$selectedLat = isset($_REQUEST['lat']) && $_REQUEST['lat'] != "" ? $_REQUEST['lat'] : '' ;$selectedLon = isset($_REQUEST['lon']) && $_REQUEST['lon'] != "" ? $_REQUEST['lon'] : '' ?>

<?php if (defined('AIT_ADVANCED_SEARCH_ENABLED') and !isset($_REQUEST['a'])) { $advancedSearchOptions = aitOptions()->getOptionsByType('ait-advanced-search') ;$advancedSearchOptions = $advancedSearchOptions['general'] ;if ($advancedSearchOptions['useDefaults']) { $selectedLocationAddress = $selectedLocationAddress != "" ? $selectedLocationAddress : $advancedSearchOptions['defaultLocation']['address'] ;$selectedRad = $selectedRad != "" ? $selectedRad : $advancedSearchOptions['defaultRadius'] ;$selectedLat = $advancedSearchOptions['defaultLocation']['latitude'] ;$selectedLon = $advancedSearchOptions['defaultLocation']['longitude'] ;} } ?>

<?php ob_start() ;if ($type == 2) { ?>
	<input type="text" name="s" id="searchinput-text" placeholder="<?php echo NTemplateHelpers::escapeHtml(__('Nama Produk', 'wplatte'), ENT_COMPAT) ?>
" class="searchinput" value="<?php echo NTemplateHelpers::escapeHtml($selectedKey, ENT_COMPAT) ?>" />
<?php } else { ?>
	<input type="text" name="s" id="searchinput-text" placeholder="<?php echo NTemplateHelpers::escapeHtml(__('Nama Produk', 'wplatte'), ENT_COMPAT) ?>
" class="searchinput" value="<?php echo NTemplateHelpers::escapeHtml($selectedKey, ENT_COMPAT) ?>" />
<?php } $searchKeyword = ob_get_clean() ?>

<?php ob_start() ;$categories = get_categories(array('taxonomy' => 'ait-items', 'hide_empty' => 0, 'parent' => 0)) ;if (isset($categories) && count($categories) > 0) { ?>
		<div class="category-search-wrap">
			<span class="category-clear"><i class="fa fa-times"></i></span>
			<select data-placeholder="<?php echo NTemplateHelpers::escapeHtml(__('Kategori', 'wplatte'), ENT_COMPAT) ?>" name="category" class="category-search default-disabled" style="display: none;">
			<option label="-"></option>
			<?php echo recursiveCategory($categories, $selectedCat, 'ait-items', "") ?>

			</select>
		</div>
<?php } $searchCategory = ob_get_clean() ?>

<?php ob_start() ;if (defined('AIT_ADVANCED_SEARCH_ENABLED')) { ?>
		<div class="location-search-wrap advanced-search" data-position="last">
			<input name="location-address" class="location-search searchinput" type="text" id=location-address placeholder="<?php echo NTemplateHelpers::escapeHtml(__('Location', 'wplatte'), ENT_COMPAT) ?>
" value="<?php echo NTemplateHelpers::escapeHtml(stripslashes($selectedLocationAddress), ENT_COMPAT) ?>" />
<?php if ($type == 1) { ?>
				<i class="fa fa-map-marker"></i>
<?php } ?>
		</div>
<?php } else { $locations = get_categories(array('taxonomy' => 'ait-locations', 'hide_empty' => 0, 'parent' => 0)) ;if (isset($locations) && count($locations) > 0) { ?>
			<div class="location-search-wrap">
				<span class="location-clear"><i class="fa fa-times"></i></span>
				<select data-placeholder="<?php echo NTemplateHelpers::escapeHtml(__('Lokasi', 'wplatte'), ENT_COMPAT) ?>" name="location" class="location-search default-disabled" style="display: none;">
				<option label="-"></option>
				<?php echo recursiveCategory($locations, $selectedLoc, 'ait-locations', "") ?>

				</select>
			</div>
<?php } } $searchLocation = ob_get_clean() ?>

<?php ob_start() ?>
	<div class="radius">
		<?php if ($type != 2) { ?><div class="radius-toggle radius-input-visible"><?php echo NTemplateHelpers::escapeHtml(__('Radius:', 'wplatte'), ENT_NOQUOTES) ?>
 <?php echo NTemplateHelpers::escapeHtml(__('Off', 'wplatte'), ENT_NOQUOTES) ?></div><?php } else { ?>
<div class="radius-toggle radius-input-visible">x <?php echo NTemplateHelpers::escapeHtml($el->option('radiusUnits'), ENT_NOQUOTES) ?>
</div><?php } ?>

		<input type="hidden" name="lat" value="<?php echo NTemplateHelpers::escapeHtml($selectedLat, ENT_COMPAT) ?>" id="latitude-search" class="latitude-search" disabled />
		<input type="hidden" name="lon" value="<?php echo NTemplateHelpers::escapeHtml($selectedLon, ENT_COMPAT) ?>" id="longitude-search" class="longitude-search" disabled />
		<input type="hidden" name="runits" value="<?php echo NTemplateHelpers::escapeHtml($el->option('radiusUnits'), ENT_COMPAT) ?>" disabled />

		<div class="radius-display radius-input-hidden">
			<span class="radius-clear"><i class="fa fa-times"></i></span>
			<?php if ($type != 2) { ?><span class="radius-text"><?php echo NTemplateHelpers::escapeHtml(__('Radius:', 'wplatte'), ENT_NOQUOTES) ?>
</span><?php } ?>

			<span class="radius-value"></span>
			<span class="radius-units"><?php echo NTemplateHelpers::escapeHtml($el->option('radiusUnits'), ENT_NOQUOTES) ?></span>
		</div>

		<div class="radius-popup-container radius-input-hidden">
			<span class="radius-popup-close"><i class="fa fa-times"></i></span>
			<input type="range" name="rad" class="radius-search" value="<?php if ($selectedRad) { echo NTemplateHelpers::escapeHtml($selectedRad, ENT_COMPAT) ;} else { ?>
0.1<?php } ?>" min="0.1" step="0.1" max="100" disabled />
			<span class="radius-popup-help"><?php echo NTemplateHelpers::escapeHtml($el->option('radiusHelp'), ENT_NOQUOTES) ?></span>
		</div>


	</div>
<?php $searchRadius = ob_get_clean() ?>
<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

	<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-container"<?php if ($_l->tmp = array_filter(array('search-form-container', "search-form-type-{$type}"))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
		<form action="<?php echo NTemplateHelpers::escapeHtml($searchUrl, ENT_COMPAT) ?>" method="get" class="search-form">

			<div class="elm-wrapper inputs-container">
				<div class="elm-wrapper">
					<div class="search-content">
<?php if ($type == 2) { ?>

<?php $sentence = '<span class="label">'.$el->option('sentence').'</span>' ;$sentence = str_replace('{', '</span>{', $sentence) ;$sentence = str_replace('}', '}<span class="label">', $sentence) ?>

<?php if (strpos($sentence, '{search-keyword}') !== false) { $sentence = str_replace('{search-keyword}', $searchKeyword, $sentence) ;} else { ?>
					 			<input type="hidden" name="s" value="" />
<?php } $sentence = str_replace('{search-category}', $searchCategory, $sentence) ;$sentence = str_replace('{search-location}', $searchLocation, $sentence) ;$sentence = str_replace('{search-radius}', $searchRadius, $sentence) ?>

					 		<?php echo $sentence ?>


<?php } else { ?>

<?php if ($el->option('enableKeywordSearch')) { ?>
								<?php echo $searchKeyword ?>

<?php } else { ?>
								<input type="hidden" name="s" value="" />
<?php } ?>

<?php if ($el->option('enableCategorySearch')) { ?>
								<?php echo $searchCategory ?>

<?php } ?>

<?php if ($el->option('enableLocationSearch')) { ?>
								<?php echo $searchLocation ?>

<?php } ?>

<?php if ($el->option('enableRadiusSearch')) { ?>
								<?php echo $searchRadius ?>

<?php } ?>

<?php } ?>

						<input type="hidden" name="a" value="true" /> <!-- Advanced search -->
						<!-- Advanced search -->

						<div class="searchsubmit"></div>

						<input type="submit" value="<?php echo NTemplateHelpers::escapeHtml(__('Search', 'wplatte'), ENT_COMPAT) ?>" class="searchsubmit" />
					</div>
				</div>
			</div>

		</form>
	</div>

</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/search-form/javascript", ""), array() + get_defined_vars(), $_l->templates['w8k1jo0uis'])->render() ;