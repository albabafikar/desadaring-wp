<?php //netteCache[01]000579a:2:{s:4:"time";s:21:"0.49115800 1529984413";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:93:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/item-container.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/item-container.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '3e0f6stljz')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$categories = get_the_terms($post->id, 'ait-items') ?>

<?php $categories = aitOrderTermsByHierarchy($categories) ;$categories = aitFilterTerms($categories, $options->theme->items->maxDisplayedCategories) ;$meta = $post->meta('item-data') ?>

<?php $dbFeatured = get_post_meta($post->id, '_ait-item_item-featured', true) ;$isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false ?>

<?php $noFeatured = $options->theme->item->noFeatured ?>

<div<?php if ($_l->tmp = array_filter(array('item-container', $isFeatured ? "item-featured":null, defined("AIT_REVIEWS_ENABLED") ? 'reviews-enabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
	<a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>">
		<div class="content">

			<div class="item-image">
<?php if ($post->image) { ?>
				<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 640, 'height' => 384, 'crop' => 1)) ?>
" alt="<?php echo $post->title ?>" />
<?php } else { ?>
				<img src="<?php echo aitResizeImage($noFeatured, array('width' => 640, 'height' => 384, 'crop' => 1)) ?>
" alt="<?php echo $post->title ?>" />
<?php } ?>
			</div>
			<div class="item-data">
				<div class="item-header">
					<div class="item-title">
						<h3><?php echo $post->title ?></h3>
					</div>
<?php if (count($categories) > 0) { ?>
					<div class="item-categories">
<?php $iterations = 0; foreach ($categories as $category) { ?>
							<span class="item-category"><?php echo $category->name ?></span>
<?php $iterations++; } ?>
					</div>
<?php } ?>
				</div>
				<div class="item-body">
					<div class="entry-content">
						<p>
<?php if ($post->hasExcerpt) { ?>
								<?php echo $template->truncate($template->trim($template->striptags($post->excerpt)), 140) ?>

<?php } else { ?>
								<?php echo $template->truncate($template->trim($template->striptags($post->content)), 140) ?>

<?php } ?>
						</p>
					</div>
				</div>
				<div class="item-footer">
					<div class="item-address">
						<?php echo NTemplateHelpers::escapeHtml($meta->map['address'], ENT_NOQUOTES) ?>

					</div>
				</div>
			</div>
		</div>
	</a>
<?php if (defined('AIT_REVIEWS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/carousel-reviews-stars", ""), array('item' => $post, 'showCount' => false) + get_defined_vars(), $_l->templates['3e0f6stljz'])->render() ;} ?>
</div>