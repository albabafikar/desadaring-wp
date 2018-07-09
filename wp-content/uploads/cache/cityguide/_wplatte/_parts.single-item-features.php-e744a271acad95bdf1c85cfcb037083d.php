<?php //netteCache[01]000585a:2:{s:4:"time";s:21:"0.06690400 1529937682";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:99:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-features.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-features.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'u1dhq4lzdk')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($meta->displayFeatures) { ?>

<?php if (!is_array($meta->features)) { $meta->features = array() ;} ?>

<?php if (defined('AIT_ADVANCED_FILTERS_ENABLED')) { $item_meta_filters = $post->meta('filters-options') ;if (is_array($item_meta_filters->filters) && count($item_meta_filters->filters) > 0) { $custom_features = array() ;$iterations = 0; foreach ($item_meta_filters->filters as $filter_id) { $filter_data = get_term($filter_id, 'ait-items_filters', "OBJECT") ;if ($filter_data) { $filter_meta = get_option( "ait-items_filters_category_".$filter_data->term_id ) ;$filter_icon = isset($filter_meta['icon']) ? $filter_meta['icon'] : "" ;array_push($meta->features, array(
						"icon" => $filter_icon,
						"text" => $filter_data->name,
						"desc" => $filter_data->description
					)) ;} $iterations++; } } } ?>

<?php if (!empty($meta->features)) { $numOfColumns = $settings->featuresColumns ;$displayDesc = $settings->featuresDisplayDesc ?>
		<div<?php if ($_l->tmp = array_filter(array('features-container', "column-{$numOfColumns}"))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
			<h2><?php echo NTemplateHelpers::escapeHtml(__('Features', 'wplatte'), ENT_NOQUOTES) ?></h2>
			<div class="content">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($meta->features) as $feature) { $hasImage = $feature['icon'] != '' ? true : false ?>
				<div<?php if ($_l->tmp = array_filter(array('feature-container', "feature-{$iterator->counter}", $iterator->isFirst($numOfColumns) ? 'feature-first':null, $iterator->isLast($numOfColumns) ? 'feature-last':null, $hasImage ? 'image-present':null, $displayDesc ? 'desc-on' : 'desc-off'))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php if ($hasImage) { ?>
					<div class="feature-icon">
						<img src="<?php echo aitResizeImage($feature['icon'], array('width' => $settings->featuresIconSize, 'height' => $settings->featuresIconSize, 'crop' => 1)) ?>
" alt="<?php echo $feature['text'] ?>" />
					</div>
<?php } ?>
					<div class="feature-data">
						<h4><?php echo $feature['text'] ?></h4>
<?php if ($displayDesc) { ?>
						<div class="feature-desc">
							<p><?php echo $feature['desc'] ?></p>
						</div>
<?php } ?>
					</div>
				</div>
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
			</div>
		</div>
<?php } } 