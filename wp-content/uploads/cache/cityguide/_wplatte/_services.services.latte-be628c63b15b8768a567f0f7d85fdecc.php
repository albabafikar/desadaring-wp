<?php //netteCache[01]000591a:2:{s:4:"time";s:21:"0.96469400 1529992918";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:104:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/services/services.latte";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/services/services.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'zqka8bxnzm')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($el->common('header'), $template->getParameters(), $_l->templates['zqka8bxnzm'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="elm-item-organizer <?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">

<?php $query = WpLatteMacros::prepareCustomWpQuery(array('type'    => 'service-box',
		'tax'     => 'boxes',
		'cat'     => $el->option('category'),
		'limit'   => $el->option('count'),
		'orderby' => $el->option->orderby,
		'order' 	=> $el->option->order)) ?>

<?php if ($query->havePosts) { $layout = $el->option->layout ;$addInfo = $el->option->addInfo ;if ($layout == 'box') { $enableCarousel  = $el->option->boxEnableCarousel ;$boxAlign 		  = $el->option->boxAlign ;$numOfRows       = $el->option->boxRows ;$numOfColumns    = $el->option->boxColumns ;$imageHeight     = $el->option->boxImageHeight ;$imgWidth = 640 ;} else { $enableCarousel  = $el->option->listEnableCarousel ;$numOfRows       = $el->option->listRows ;$numOfColumns    = $el->option->listColumns ;$imageHeight     = $el->option->listImageHeight ;$imgWidth = 220 ;} ?>

<?php if ($enableCarousel) { ?>
			<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
<?php } ?>

<?php if ($layout == 'box') { ?>

			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('box-data') ?>

<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
					<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } $hasImage = $meta->image != '' ? true : false ?>
				<div data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, $hasImage ? 'image-present':null, $boxAlign ? $boxAlign:null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
					<?php if ($meta->link != "") { ?><a href="<?php echo NTemplateHelpers::escapeHtml($meta->link, ENT_COMPAT) ?>
"><?php } ?>

<?php if ($hasImage) { ?>
							<div class="item-thumbnail <?php if ($meta->hoverImage) { ?>thumb-hover<?php } else { ?>
thumb-nohover<?php } ?>">

<?php if ($element->option->boxImageHeight != 'no') { $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>
									<div class="item-thumb-img"><img src="<?php echo aitResizeImage($meta->image, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php if ($meta->hoverImage) { ?>
									<div class="item-thumb-hvr"><img src="<?php echo aitResizeImage($meta->hoverImage, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php } } else { ?>
									<div class="item-thumb-img icon"><img src="<?php echo NTemplateHelpers::escapeHtml($meta->image, ENT_COMPAT) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php if ($meta->hoverImage) { ?>
									<div class="item-thumb-hvr icon"><img src="<?php echo NTemplateHelpers::escapeHtml($meta->hoverImage, ENT_COMPAT) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php } } ?>

							</div>
<?php } ?>

						<div class="item-title">
							<h3><?php echo $item->title ?></h3>
							<?php if ($addInfo) { if ($meta->subtitle) { ?><p><?php echo $meta->subtitle ?>
</p><?php } } ?>

						</div>
					<?php if ($meta->link != "") { ?></a><?php } ?>


					<div class="item-text">
						<?php if ($meta->description) { ?><div class="item-excerpt"><p><?php echo $template->trimWords($template->striptags($meta->description), 100) ?>
</p></div><?php } ?>

<?php if ($addInfo) { ?>
							<?php if ($meta->readMoreText != '') { ?><span class="readmore"><a href="<?php echo NTemplateHelpers::escapeHtml($meta->link, ENT_COMPAT) ?>
"><?php echo $meta->readMoreText ?></a></span><?php } ?>

<?php } ?>
					</div>
				</div>
<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
					</div>
<?php } endforeach; wp_reset_postdata() ?>
			</div>

<?php } else { ?>

			<div data-cols="<?php echo NTemplateHelpers::escapeHtml($numOfColumns, ENT_COMPAT) ?>
" data-first="1" data-last="<?php echo NTemplateHelpers::escapeHtml(ceil($query->postCount / $numOfRows), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('elm-item-organizer-container', "column-{$numOfColumns}", "layout-{$layout}", $enableCarousel ? 'carousel-container' : 'carousel-disabled',))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php foreach ($iterator = new WpLatteLoopIterator($query) as $item): $meta = $item->meta('box-data') ?>

<?php if ($enableCarousel and $iterator->isFirst($numOfRows)) { ?>
					<div<?php if ($_l->tmp = array_filter(array('item-box', $enableCarousel ? 'carousel-item':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php } $hasImage = $meta->image != '' ? true : false ?>
				<div	data-id="<?php echo NTemplateHelpers::escapeHtml($iterator->counter, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array('item', "item{$iterator->counter}", $enableCarousel ? 'carousel-item':null, $iterator->isFirst($numOfColumns) ? 'item-first':null, $iterator->isLast($numOfColumns) ? 'item-last':null, $hasImage ? 'image-present':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
					<?php if ($meta->link != "") { ?><a href="<?php echo NTemplateHelpers::escapeHtml($meta->link, ENT_COMPAT) ?>
"><?php } ?>

<?php if ($hasImage) { ?>
							<div class="item-thumbnail <?php if ($meta->hoverImage) { ?>thumb-hover<?php } else { ?>
thumb-nohover<?php } ?>">

<?php if ($element->option->listImageHeight != 'no') { $ratio = explode(":", $imageHeight) ;$imgHeight = ($imgWidth / $ratio[0]) * $ratio[1] ?>
									<div class="item-thumb-img"><img src="<?php echo aitResizeImage($meta->image, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php if ($meta->hoverImage) { ?>
									<div class="item-thumb-hvr"><img src="<?php echo aitResizeImage($meta->hoverImage, array('width' => $imgWidth, 'height' => $imgHeight, 'crop' => 1)) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php } } else { ?>
									<div class="item-thumb-img icon"><img src="<?php echo NTemplateHelpers::escapeHtml($meta->image, ENT_COMPAT) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php if ($meta->hoverImage) { ?>
									<div class="item-thumb-hvr icon"><img src="<?php echo NTemplateHelpers::escapeHtml($meta->hoverImage, ENT_COMPAT) ?>
" alt="<?php echo $item->title ?>" /></div>
<?php } } ?>

							</div>
<?php } ?>

						<div class="item-title">
							<h3><?php echo $item->title ?></h3>
							<?php if ($addInfo) { if ($meta->subtitle) { ?><p><?php echo $meta->subtitle ?>
</p><?php } } ?>

						</div>
					<?php if ($meta->link != "") { ?></a><?php } ?>


					<div class="item-text">
						<?php if ($meta->description) { ?><div class="item-excerpt"><p><?php echo $template->trimWords($template->striptags($meta->description), 100) ?>
</p></div><?php } ?>

<?php if ($addInfo) { ?>
							<?php if ($meta->readMoreText != '') { ?><span class="readmore"><a href="<?php echo NTemplateHelpers::escapeHtml($meta->link, ENT_COMPAT) ?>
"><?php echo $meta->readMoreText ?></a></span><?php } ?>

<?php } ?>
					</div>
				</div>
<?php if ($enableCarousel and $iterator->isLast($numOfRows)) { ?>
					</div>
<?php } endforeach; wp_reset_postdata() ?>
			</div>
<?php } } else { ?>
		<div class="elm-item-organizer-container">
			<div class="alert alert-info">
				<?php echo NTemplateHelpers::escapeHtml(_x('Services', 'name of element', 'wplatte'), ENT_NOQUOTES) ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo NTemplateHelpers::escapeHtml(__('Info: There are no items created, add some please.', 'wplatte'), ENT_NOQUOTES) ?>

			</div>
		</div>
<?php } ?>
</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/services/javascript", ""), array('enableCarousel' => $enableCarousel) + get_defined_vars(), $_l->templates['zqka8bxnzm'])->render() ;