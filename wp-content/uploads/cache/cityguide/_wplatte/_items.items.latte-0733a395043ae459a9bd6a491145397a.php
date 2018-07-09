<?php //netteCache[01]000584a:2:{s:4:"time";s:21:"0.71672800 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/items/items.latte";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/items/items.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'a53f6ituic')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($el->common('header'), $template->getParameters(), $_l->templates['a53f6ituic'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="elm-item-organizer <?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">
<?php $enableCarousel = false ;$postType = 'ait-item' ;$lang = AitLangs::getCurrentLanguageCode() ;$count = $el->option('count') ;$orderBy = array() ;$order = $el->option('order') ?>

<?php $metaQuery = array() ?>

<?php if ($el->option('onlyFeatured')) { $metaQuery = array(
			'relation'        => 'AND',
			'featured_clause' => array(
				'key'     => '_ait-item_item-featured',
				'value'     => true,
				'compare' => '='
			)
		) ;} else { $metaQuery = array(
			'relation'        => 'AND',
			'featured_clause' => array(
				'key'     => '_ait-item_item-featured',
				'compare' => 'EXISTS'
			)
		) ?>

<?php $orderBy = array(
			'featured_clause' => 'DESC',
	    ) ;} ?>


<?php $taxQuery = array() ?>

<?php if ($el->option('category') != 0) { array_push($taxQuery, array(
			'taxonomy' 	=> 'ait-items',
			'field'		=> 'term_id',
			'terms'		=> $el->option('category')
		)) ;} ?>

<?php if ($el->option('location') != 0) { array_push($taxQuery, array(
			'taxonomy' 	=> 'ait-locations',
			'field'		=> 'term_id',
			'terms'		=> $el->option('location')
		)) ;} ?>


<?php if (defined('AIT_REVIEWS_ENABLED') and $el->option('orderby') == 'none') { $metaQuery['rating_clause'] = array(
			'key'     => 'rating_mean',
			'compare' => 'EXISTS'
		) ;$orderBy['rating_clause'] = $order ;} ?>

<?php $orderBy[$el->option('orderby')] = $order ?>

<?php $args = array(
		'lang'           => $lang,
		'post_type'      => $postType,
		'posts_per_page' => $count,
		'meta_query'     => $metaQuery,
		'tax_query'      => $taxQuery,
		'orderby'        => $orderBy,
	) ?>

<?php $query = new WpLatteWpQuery($args) ?>



<?php if ($query->havePosts) { $layout = $el->option->layout ;$noFeatured = $options->theme->item->noFeatured ;if ($layout == 'box') { $enableCarousel  = $el->option->boxEnableCarousel ;$boxAlign 		  = $el->option->boxAlign ;$numOfRows       = $el->option->boxRows ;$numOfColumns    = $el->option->boxColumns ;$imageHeight     = $el->option->boxImageHeight ;$imgWidth = 640 ;} else { $enableCarousel  = $el->option->listEnableCarousel ;$numOfRows       = $el->option->listRows ;$numOfColumns    = $el->option->listColumns ;$imageHeight     = $el->option->listImageHeight ;$imgWidth = 220 ;} ?>


<?php if ($enableCarousel) { ?>
			<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
<?php } ?>

<?php if ($layout == 'box') { ?>

			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): if ($iterator->counter <= $el->option('count')) { $meta = $item->meta('item-data') ?>

<?php $dbFeatured = get_post_meta($item->id, '_ait-item_item-featured', true) ;$isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false ?>

<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
						<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } ?>

					<div data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, 'image-present', $boxAlign ? $boxAlign:null, $isFeatured ? 'item-featured':null, defined("AIT_REVIEWS_ENABLED") ? 'reviews-enabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>

						<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>">
<?php $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>
							<div class="item-thumbnail">
								<div class="item-thumbnail-wrap">
<?php if ($item->hasImage) { ?>
									<img src="<?php echo aitResizeImage($item->imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
<?php } else { ?>
									<img src="<?php echo aitResizeImage($noFeatured, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
<?php } ?>
								</div>
								<div class="item-text">
									<div class="item-excerpt"><p><?php echo $template->striptags($item->excerpt(200)) ?></p></div>
									<div class="item-location"><p><?php echo NTemplateHelpers::escapeHtml($meta->map['address'], ENT_NOQUOTES) ?></p></div>
								</div>
							</div>
							<div class="item-title"><h3><?php echo $item->title ?></h3></div>
							<div class="item-categories">
<?php $iterations = 0; foreach ($item->categories('ait-items') as $cat) { ?>
									<span class="item-category"><?php echo $cat->title ?></span>
<?php $iterations++; } ?>
							</div>
						</a>

<?php if (defined('AIT_REVIEWS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/carousel-reviews-stars", ""), array('item' => $item, 'showCount' => false) + get_defined_vars(), $_l->templates['a53f6ituic'])->render() ;} ?>
					</div>

<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
						</div>
<?php } } endforeach; wp_reset_postdata() ?>
			</div>

<?php } else { ?>

			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): if ($iterator->counter <= $el->option('count')) { $meta = $item->meta('item-data') ?>

<?php $dbFeatured = get_post_meta($item->id, '_ait-item_item-featured', true) ;$isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false ?>

<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
						<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } ?>

					<div	data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, 'image-present', $isFeatured ? 'item-featured':null, defined("AIT_REVIEWS_ENABLED") ? 'reviews-enabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
						<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>">

<?php $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>
							<div class="item-thumbnail">
								<div class="item-thumbnail-wrap">
<?php if ($item->hasImage) { ?>
									<img src="<?php echo aitResizeImage($item->imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
<?php } else { ?>
									<img src="<?php echo aitResizeImage($noFeatured, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
<?php } ?>
								</div>
							</div>

							<div class="item-title">
								<h3><?php echo $item->title ?></h3>

								<div class="item-categories">
<?php $iterations = 0; foreach ($item->categories('ait-items') as $cat) { ?>
										<span class="item-category"><?php echo $cat->title ?></span>
<?php $iterations++; } ?>
								</div>

							</div>

							<div class="item-text">
								<div class="item-excerpt"><p><?php echo $template->striptags($item->excerpt(200)) ?></p></div>
							</div>

							<div class="item-location"><p><?php echo NTemplateHelpers::escapeHtml($meta->map['address'], ENT_NOQUOTES) ?></p></div>

																											</a>
<?php if (defined('AIT_REVIEWS_ENABLED')) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/carousel-reviews-stars", ""), array('item' => $item, 'showCount' => false) + get_defined_vars(), $_l->templates['a53f6ituic'])->render() ;} ?>
					</div>

<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
						</div>
<?php } } endforeach; wp_reset_postdata() ?>
			</div>
<?php } } else { ?>
		<div class="elm-item-organizer-container">
			<div class="alert alert-info">
				<?php echo NTemplateHelpers::escapeHtml(_x('Posts', 'name of element', 'wplatte'), ENT_NOQUOTES) ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml(__('Info: There are no items created, add some please.', 'wplatte'), ENT_NOQUOTES) ?>

			</div>
		</div>
<?php } ?>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/items/javascript", ""), array('enableCarousel' => $enableCarousel) + get_defined_vars(), $_l->templates['a53f6ituic'])->render() ;