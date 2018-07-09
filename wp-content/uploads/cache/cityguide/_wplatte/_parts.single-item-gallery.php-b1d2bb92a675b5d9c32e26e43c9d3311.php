<?php //netteCache[01]000584a:2:{s:4:"time";s:21:"0.03297800 1529937682";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-gallery.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-gallery.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'ph1e27r83a')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($meta->displayGallery && count($meta->gallery) > 0) { if (count($meta->gallery) == 1) { $gallery = $meta->gallery ?>
		<section class="elm-main elm-easy-slider-main">
			<div class="elm-easy-slider-wrapper">
				<div class="elm-easy-slider easy-pager-thumbnails pager-pos-outside detail-thumbnail-wrap detail-thumbnail-slider">
					<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
					<ul class="easy-slider"><!--
<?php $iterations = 0; foreach ($gallery as $item) { $title = AitLangs::getCurrentLocaleText($item['title']) ?>
					--><li>
							<a href="<?php echo aitResizeImage($item['image'], array('width' => 1000, 'crop' => 1)) ?>
" title="<?php echo NTemplateHelpers::escapeHtml($title, ENT_COMPAT) ?>" target="_blank" rel="item-gallery">
								<span class="easy-thumbnail">
									<?php if ($title != "") { ?><span class="easy-title"><?php echo NTemplateHelpers::escapeHtml($title, ENT_NOQUOTES) ?>
</span><?php } ?>

									<img src="<?php echo aitResizeImage($item['image'], array('width' => 400, 'crop' => 1)) ?>
" alt="<?php echo NTemplateHelpers::escapeHtml($title, ENT_COMPAT) ?>" />
								</span>
							</a>
						</li><!--
<?php $iterations++; } ?>
					--></ul>
				</div>
				<script type="text/javascript">
					jQuery(window).load(function(){
<?php if ($options->theme->general->progressivePageLoading) { ?>
							if(!isResponsive(1024)){
								jQuery(".detail-thumbnail-slider").waypoint(function(){
									jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
									jQuery('.detail-thumbnail-slider').find('ul').delay(500).animate({'opacity':1}, 500, function(){
										jQuery('.detail-thumbnail-slider').find('.loading').fadeOut('fast');
										jQuery.waypoints('refresh');
									});
								}, { triggerOnce: true, offset: "95%" });
							} else {
								jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
								jQuery('.detail-thumbnail-slider').find('ul').delay(500).animate({'opacity':1}, 500, function(){
									jQuery('.detail-thumbnail-slider').find('.loading').fadeOut('fast');
									jQuery.waypoints('refresh');
								});
							}
<?php } else { ?>
							jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
							jQuery('.detail-thumbnail-slider').find('ul').delay(500).animate({'opacity':1}, 500, function(){
								jQuery('.detail-thumbnail-slider').find('.loading').fadeOut('fast');
								jQuery.waypoints('refresh');
							});
<?php } ?>
					});
				</script>
			</div>
		</section>
<?php } else { $gallery = $meta->gallery ?>
		<section class="elm-main elm-easy-slider-main">
			<div class="elm-easy-slider-wrapper">
				<div class="elm-easy-slider easy-pager-thumbnails pager-pos-outside detail-thumbnail-wrap detail-thumbnail-slider">
					<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
					<ul class="easy-slider"><!--
<?php $iterations = 0; foreach ($gallery as $item) { $title = AitLangs::getCurrentLocaleText($item['title']) ?>
					--><li>
							<a href="<?php echo NTemplateHelpers::escapeHtml($item['image'], ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml($title, ENT_COMPAT) ?>" target="_blank" rel="item-gallery">
								<span class="easy-thumbnail">
									<?php if ($title != "") { ?><span class="easy-title"><?php echo NTemplateHelpers::escapeHtml($title, ENT_NOQUOTES) ?>
</span><?php } ?>

									<img src="<?php echo aitResizeImage($item['image'], array('width' => 400, 'crop' => 1)) ?>
" alt="<?php echo NTemplateHelpers::escapeHtml($title, ENT_COMPAT) ?>" />
								</span>
							</a>
						</li><!--
<?php $iterations++; } ?>
					--></ul>
					<div class="easy-slider-pager">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($gallery) as $item) { $title = AitLangs::getCurrentLocaleText($item['title']) ?>
						<a data-slide-index="<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter()-1, ENT_COMPAT) ?>
" href="#" title="<?php echo NTemplateHelpers::escapeHtml($title, ENT_COMPAT) ?>">
							<span class="entry-thumbnail-icon">
								<img src="<?php echo aitResizeImage($item['image'], array('width' => 100, 'height' => 75, 'crop' => 1)) ?>
" alt="<?php echo $title ?>" class="detail-image" />
							</span>
						</a>
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
					</div>
				</div>
				<script type="text/javascript">
					jQuery(window).load(function(){
<?php if ($options->theme->general->progressivePageLoading) { ?>
							if(!isResponsive(1024)){
								jQuery(".detail-thumbnail-slider").waypoint(function(){
									portfolioSingleEasySlider("4:3");
									jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
								}, { triggerOnce: true, offset: "95%" });
							} else {
								portfolioSingleEasySlider("4:3");
								jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
							}
<?php } else { ?>
							portfolioSingleEasySlider("4:3");
							jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
<?php } ?>
					});
				</script>
			</div>
		</section>
<?php } } 