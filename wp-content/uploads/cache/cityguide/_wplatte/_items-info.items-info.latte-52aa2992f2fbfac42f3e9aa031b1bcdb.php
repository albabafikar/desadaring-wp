<?php //netteCache[01]000595a:2:{s:4:"time";s:21:"0.74253200 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:108:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/items-info/items-info.latte";i:2;i:1528298514;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/items-info/items-info.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'avqq901vbh')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['avqq901vbh'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

<?php $categories = $wp->categories(array('taxonomy' => 'ait-items', 'hide_empty' => 0)) ;$locations = $wp->categories(array('taxonomy' => 'ait-locations', 'hide_empty' => 0)) ;$resources = wp_count_posts( 'ait-item' )->publish ;if (defined('AIT_REVIEWS_ENABLED')) { $reviews = wp_count_posts( 'ait-review' )->publish ;} ?>

	<span class="info-icon"><i class="fa fa-folder-open-o"></i></span>
	<span class="info-categories">
		<span class="info-count"><?php echo NTemplateHelpers::escapeHtml(count($categories), ENT_NOQUOTES) ?></span>
		<span class="info-text"><?php echo NTemplateHelpers::escapeHtml(__('Kategori', 'wplatte'), ENT_NOQUOTES) ?></span>
	</span>
	<span class="info-locations">
		<span class="info-count"><?php echo NTemplateHelpers::escapeHtml(count($locations), ENT_NOQUOTES) ?></span>
		<span class="info-text"><?php echo NTemplateHelpers::escapeHtml(__('Daerah', 'wplatte'), ENT_NOQUOTES) ?></span>
	</span>
	<span class="info-resources">
			<span class="info-count"><?php echo NTemplateHelpers::escapeHtml($resources, ENT_NOQUOTES) ?></span>
		<span class="info-text"><?php echo NTemplateHelpers::escapeHtml(__('Produk', 'wplatte'), ENT_NOQUOTES) ?></span>
	</span>
<?php if (defined('AIT_REVIEWS_ENABLED')) { ?>
	<span class="info-reviews">
		<span class="info-count"><?php echo NTemplateHelpers::escapeHtml($reviews, ENT_NOQUOTES) ?></span>
		<span class="info-text"><?php echo NTemplateHelpers::escapeHtml(__('Testimoni', 'wplatte'), ENT_NOQUOTES) ?></span>
	</span>
<?php } ?>

</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/items-info/javascript", ""), array() + get_defined_vars(), $_l->templates['avqq901vbh'])->render() ;