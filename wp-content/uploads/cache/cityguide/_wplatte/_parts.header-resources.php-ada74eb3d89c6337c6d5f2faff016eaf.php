<?php //netteCache[01]000581a:2:{s:4:"time";s:21:"0.60019300 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:95:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/header-resources.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/header-resources.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'ujmoukyc5d')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($options->theme->header->displayHeaderResources) { $args = array(
	'lang'           => AitLangs::getCurrentLanguageCode(),
	'post_type'      => 'ait-item',
	'post_status'	 => 'publish',
	'posts_per_page' => -1,
	'fields'		 => 'ids',
) ;$resources = get_posts($args) ?>
<div class="header-resources">

	<span class="resources-data">
		<span class="resources-count"><?php echo NTemplateHelpers::escapeHtml(count($resources), ENT_NOQUOTES) ?></span>
		<span class="resources-text"><?php echo NTemplateHelpers::escapeHtml(__('Resources', 'wplatte'), ENT_NOQUOTES) ?></span>
	</span>
<?php if (is_user_logged_in()) { ?>
	<a href="<?php echo admin_url('post-new.php?post_type=ait-item') ?>" class="resources-button ait-sc-button"><?php echo NTemplateHelpers::escapeHtml(__('Add', 'wplatte'), ENT_NOQUOTES) ?></a>
<?php } else { if (function_exists('pll_get_post')) { $link = get_permalink( pll_get_post( $options->theme->header->headerResourcesButtonLink ) ) ;} else { $link = get_permalink( $options->theme->header->headerResourcesButtonLink ) ;} ?>
	<a href="<?php echo $link ?>" class="resources-button ait-sc-button"><?php echo NTemplateHelpers::escapeHtml(__('Add', 'wplatte'), ENT_NOQUOTES) ?></a>
<?php } ?>

</div>
<?php } 