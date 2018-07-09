<?php //netteCache[01]000566a:2:{s:4:"time";s:21:"0.39978300 1529984413";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:80:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/taxonomy-items.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/taxonomy-items.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'qgoe240os5')
;
// prolog NUIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb11fb6720f3_content')) { function _lb11fb6720f3_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;global $wp_query ?>

<?php $currentCategory = get_queried_object() ;NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/taxonomy-category-list", ""), array('taxonomy' => "ait-items") + get_defined_vars(), $_l->templates['qgoe240os5'])->render() ?>

<?php if ($currentCategory->description) { ?>
	<div class="entry-content">
		<?php echo $currentCategory->description ?>

	</div>
<?php } ?>


	<div class="items-container">
		<div class="content">

<?php if ($wp_query->have_posts()) { ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/search-filters", ""), array('taxonomy' => "ait-items", 'current' => $wp_query->post_count, 'max' => $wp_query->found_posts) + get_defined_vars(), $_l->templates['qgoe240os5'])->render() ?>

<?php if (defined("AIT_ADVANCED_FILTERS_ENABLED")) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/advanced-filters", ""), array('query' => $wp_query) + get_defined_vars(), $_l->templates['qgoe240os5'])->render() ;} ?>

			<div class="ajax-container">
				<div class="content">

<?php foreach ($iterator = new WpLatteLoopIterator($wp_query) as $post): NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/item-container", ""), array() + get_defined_vars(), $_l->templates['qgoe240os5'])->render() ;endforeach; wp_reset_postdata() ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/pagination", ""), array('location' => 'pagination-below', 'max' => $wp_query->max_num_pages) + get_defined_vars(), $_l->templates['qgoe240os5'])->render() ?>
				</div>
			</div>

<?php } else { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/none", ""), array('message' => 'empty-site') + get_defined_vars(), $_l->templates['qgoe240os5'])->render() ;} ?>
		</div>
	</div><?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof NPresenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 