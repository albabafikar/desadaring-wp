<?php //netteCache[01]000587a:2:{s:4:"time";s:21:"0.75645700 1530195499";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:100:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/events/events.latte";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/events/events.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'g397re2dld')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($el->common('header'), $template->getParameters(), $_l->templates['g397re2dld'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="elm-item-organizer <?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

<?php $metaQuery = array() ;$taxQuery = array() ;$orderBy = array() ;$lang = AitLangs::getCurrentLanguageCode() ;$postType = 'ait-event' ?>

<?php if ($el->option('category') != 0) { array_push($taxQuery, array(
			'taxonomy' 	=> 'ait-events',
			'field'		=> 'term_id',
			'terms'		=> $el->option('category')
		)) ;} ?>

<?php if ($el->option('orderby') == 'eventDate') { $metaQuery = array(
			'relation' => 'OR',
			'date_is_not' => array(
				'key' => 'event_date_from',
				'compare' => 'NOT EXISTS',
			),
			'date_is' => array(
				'key' => 'event_date_from',
				'compare' => 'EXISTS',
				'type' => 'date,'
			),
		) ;$orderBy['date_is'] = $el->option('order') ;} else { $orderBy[$el->option('orderby')] = $el->option('order') ;} ?>


<?php $args = array(
		'lang'           => $lang,
		'post_type'      => $postType,
		'posts_per_page' => $el->option('count'),
		'meta_query'     => $metaQuery,
		'tax_query'      => $taxQuery,
		'orderby'        => $orderBy,
	) ?>

<?php $query = new WpLatteWpQuery($args) ?>

<?php $dateFormat = 'D, j M Y' ?>

<?php if ($query->havePosts) { $layout = $el->option->layout ;$addInfo = $el->option->addInfo ;if ($layout == 'box') { $enableCarousel  = $el->option->boxEnableCarousel ;$boxAlign 		  = $el->option->boxAlign ;$numOfRows       = $el->option->boxRows ;$numOfColumns    = $el->option->boxColumns ;$imageHeight     = $el->option->boxImageHeight ;$imgWidth = 640 ;} else { $enableCarousel  = $el->option->listEnableCarousel ;$numOfRows       = $el->option->listRows ;$numOfColumns    = $el->option->listColumns ;$imageHeight     = $el->option->listImageHeight ;$imgWidth = 220 ;} ?>

<?php if ($enableCarousel) { ?>
			<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
<?php } ?>

<?php if ($layout == 'box') { ?>
			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('event-data') ?>

<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
					<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } ?>

				<div data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, $item->hasImage ? 'image-present':null, $boxAlign ? $boxAlign:null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
					<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>">
						<div class="item-title"><h3><?php echo $item->title ?></h3></div>

						<div class="item-thumbnail">
<?php if ($item->hasImage) { $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>
							<div class="item-thumbnail-wrap">
								<img src="<?php echo aitResizeImage($item->imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
						  </div>

<?php } ?>

<?php if ($meta->dateFrom != '') { ?>
							<div class="event-date">
								<div class="entry-date event-date-from">
									<time class="date" datetime="<?php echo NTemplateHelpers::escapeHtml($template->date($meta->dateFrom, 'c'), ENT_COMPAT) ?>">
										<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('j', 'day date format', 'wplatte'), ENT_NOQUOTES) ;$dayFormat = ob_get_clean() ?>

										<span class="link-day"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $dayFormat), ENT_NOQUOTES) ?></span>
										<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('F', 'month date format', 'wplatte'), ENT_NOQUOTES) ;$monthFormat = ob_get_clean() ?>

										<span class="link-month"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $monthFormat), ENT_NOQUOTES) ?></span>
										<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('Y',  'year date format', 'wplatte'), ENT_NOQUOTES) ;$yearFormat = ob_get_clean() ?>

										<span class="link-year"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $yearFormat), ENT_NOQUOTES) ?></span>
									</time>
								</div>
							</div>
<?php } ?>

						</div>

					</a>

					<div class="item-text">
						<div class="item-excerpt"><?php echo $item->excerpt(200) ?></div>
					</div>

<?php if ($addInfo) { ?>
					<div class="item-info">
<?php if ($meta->dateTo != '') { ?>
							<div class="item-duration">
								<span class="item-dur-title"><strong><?php echo NTemplateHelpers::escapeHtml(__('Duration:', 'wplatte'), ENT_NOQUOTES) ?></strong></span>
								<time class="item-from" datetime="<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, 'c'), ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $dateFormat), ENT_NOQUOTES) ?></time>
								<span class="item-sep">-</span>
								<time class="item-to" datetime="<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateTo, 'c'), ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateTo, $dateFormat), ENT_NOQUOTES) ?></time>
							</div>
<?php } ?>
					</div>
<?php } ?>
				</div>

<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
					</div>
<?php } endforeach; wp_reset_postdata() ?>
			</div>
<?php } else { ?>
			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('event-data') ?>

<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
					<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } ?>

				<div	data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, $item->hasImage ? 'image-present':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
					<a href="<?php echo NTemplateHelpers::escapeHtml($item->permalink, ENT_COMPAT) ?>">

<?php if ($item->hasImage) { ?>
						<div class="item-thumbnail">
<?php $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>
							<div class="item-thumbnail-wrap">
								<img src="<?php echo aitResizeImage($item->imageUrl, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" />
							</div>
						</div>
<?php } ?>



						<div class="item-title">

<?php if ($meta->dateFrom != '') { ?>
							<div class="event-date">
								<div class="entry-date event-date-from">
									<time class="date" datetime="<?php echo NTemplateHelpers::escapeHtml($template->date($meta->dateFrom, 'c'), ENT_COMPAT) ?>">
										<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('j', 'day date format', 'wplatte'), ENT_NOQUOTES) ;$dayFormat = ob_get_clean() ?>

										<span class="link-day"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $dayFormat), ENT_NOQUOTES) ?></span>
										<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('M', 'month date format', 'wplatte'), ENT_NOQUOTES) ;$monthFormat = ob_get_clean() ?>

										<span class="link-month"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $monthFormat), ENT_NOQUOTES) ?></span>
										<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('Y',  'year date format', 'wplatte'), ENT_NOQUOTES) ;$yearFormat = ob_get_clean() ?>

										<span class="link-year"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $yearFormat), ENT_NOQUOTES) ?></span>
									</time>
								</div>
							</div>
<?php } ?>

						<h3><?php echo $item->title ?></h3></div>
					</a>

					<div class="item-text">
						<div class="item-excerpt"><?php echo $item->excerpt(200) ?></div>
					</div>

<?php if ($addInfo) { ?>
					<div class="item-info">
<?php if ($meta->dateTo != '') { ?>
							<div class="item-duration">
								<span class="item-dur-title"><strong><?php echo NTemplateHelpers::escapeHtml(__('Duration:', 'wplatte'), ENT_NOQUOTES) ?></strong></span>
								<time class="item-from" datetime="<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, 'c'), ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateFrom, $dateFormat), ENT_NOQUOTES) ?></time>
								<span class="item-sep">-</span>
								<time class="item-to" datetime="<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateTo, 'c'), ENT_COMPAT) ?>
"><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($meta->dateTo, 'j. M Y'), ENT_NOQUOTES) ?></time>
							</div>
<?php } ?>
					</div>
<?php } ?>
				</div>

<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
					</div>
<?php } endforeach; wp_reset_postdata() ?>
			</div>
<?php } } else { ?>
		<div class="elm-item-organizer-container">
			<div class="alert alert-info">
				<?php echo NTemplateHelpers::escapeHtml(_x('Events', 'name of element', 'wplatte'), ENT_NOQUOTES) ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml(__('Info: There are no items created, add some please.', 'wplatte'), ENT_NOQUOTES) ?>

			</div>
		</div>
<?php } ?>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/events/javascript", ""), array('enableCarousel' => $enableCarousel) + get_defined_vars(), $_l->templates['g397re2dld'])->render() ;