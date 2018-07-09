<?php //netteCache[01]000559a:2:{s:4:"time";s:21:"0.55764700 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:73:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/@layout.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/@layout.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '0veytaq4ss')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
get_header("" ? "" : null) ?>


<?php if ($wp->isSingular('item')) { ?>
		<?php $meta = $post->meta('item-data') ?> 

<?php $packageSlug = getPostPackageSlug($post->id) ;if ($packageSlug != "") { $packages = new ThemePackages() ;$package = $packages->getPackageBySlug($packageSlug) ;$packageOptions = $package->getOptions() ?>

<?php $headerType = $packageOptions['headerDefault'] ;} if (isset($meta->headerType)) { ?>
		<?php $headerType = $meta->headerType ?>	
<?php } ?>



<?php if ($headerType === 'map' || $headerType === 'street') { ?>

<?php if ($elements->unsortable['header-map']->display) { ?>
			<div class="header-wrap">
<?php if($elements->unsortable['header-map']->getId() === 'columns' or $elements->unsortable['header-map']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['header-map']->getTemplate(), array('el' => $elements->unsortable['header-map'], 'element' => $elements->unsortable['header-map'], 'htmlId' => $elements->unsortable['header-map']->getHtmlId(), 'htmlClass' => $elements->unsortable['header-map']->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['header-map']);
			} ?>
			</div>
<?php } ?>

<?php } elseif ($headerType === 'image') { if (isset($meta->headerImageAlign)) { ?>
			<div class="header-wrap <?php echo NTemplateHelpers::escapeHtml($meta->headerImageAlign, ENT_COMPAT) ?>">
<?php } else { ?>
			<div class="header-wrap image-left">
<?php } ?>

<?php if (isset($meta->headerImage) and !empty($meta->headerImage)) { ?>
			<img src="<?php echo NTemplateHelpers::escapeHtml($meta->headerImage, ENT_COMPAT) ?>" alt="header image" />
<?php } else { ?>
			<img src="<?php echo NTemplateHelpers::escapeHtml($options->theme->item->noHeader, ENT_COMPAT) ?>" alt="header image" />
<?php } ?>
		</div>
<?php } else { } ?>

<?php } elseif ($wp->isSingular('event-pro')) { $meta = $post->meta('event-pro-data') ?>

<?php if (isset($meta->headerType)) { $headerType = $meta->headerType ;} if ($headerType === 'map' || $headerType === 'street') { if ($elements->unsortable['header-map']->display) { ?>
			<div class="header-wrap">
<?php if($elements->unsortable['header-map']->getId() === 'columns' or $elements->unsortable['header-map']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['header-map']->getTemplate(), array('el' => $elements->unsortable['header-map'], 'element' => $elements->unsortable['header-map'], 'htmlId' => $elements->unsortable['header-map']->getHtmlId(), 'htmlClass' => $elements->unsortable['header-map']->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['header-map']);
			} ?>
			</div>
<?php } ?>

<?php } elseif ($headerType === 'image') { if (isset($meta->headerImage) and !empty($meta->headerImage)) { ?>
						<div class="header-wrap has-image" style="height: 375px; overflow: hidden; background: url('<?php echo $meta->headerImage ?>') no-repeat"></div>
<?php } else { ?>
			<div class="header-wrap image-left">
				<img src="<?php echo NTemplateHelpers::escapeHtml($options->theme->item->noHeader, ENT_COMPAT) ?>" alt="header image" />
			</div>
<?php } } ?>

<?php } elseif ($wp->isTax('items') or $wp->isTax('locations')) { ?>
		<?php $meta = (object) get_option("{$taxonomyTerm->taxonomy}_category_{$taxonomyTerm->id}") ?> 

	<?php if (isset($meta->header_type)) { if ($meta->header_type === 'map') { if ($elements->unsortable['header-map']->display) { ?>
			<div class="header-wrap">
<?php if($elements->unsortable['header-map']->getId() === 'columns' or $elements->unsortable['header-map']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['header-map']->getTemplate(), array('el' => $elements->unsortable['header-map'], 'element' => $elements->unsortable['header-map'], 'htmlId' => $elements->unsortable['header-map']->getHtmlId(), 'htmlClass' => $elements->unsortable['header-map']->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['header-map']);
			} ?>
			</div>
<?php } } elseif ($meta->header_type === 'image') { if (isset($meta->header_image) && $meta->header_image != "") { if (isset($meta->header_image_align)) { ?>
				<div class="header-wrap <?php echo NTemplateHelpers::escapeHtml($meta->header_image_align, ENT_COMPAT) ?>">
<?php } else { ?>
				<div class="header-wrap image-left">
<?php } ?>
					<img src="<?php echo NTemplateHelpers::escapeHtml($meta->header_image, ENT_COMPAT) ?>" alt="header image" />
				</div>
<?php } else { if ($wp->isTax('items')) { ?>
				<div class="header-wrap has-image" style="height: <?php echo NTemplateHelpers::escapeHtml(NTemplateHelpers::escapeCss($options->theme->items->headerImageHeight), ENT_COMPAT) ?>
px; overflow: hidden; background: url('<?php echo $options->theme->items->categoryDefaultImage ?>') no-repeat"></div>
<?php } else { ?>
				<div class="header-wrap has-image" style="height: <?php echo NTemplateHelpers::escapeHtml(NTemplateHelpers::escapeCss($options->theme->items->headerImageHeight), ENT_COMPAT) ?>
px; overflow: hidden; background: url('<?php echo $options->theme->items->locationDefaultImage ?>') no-repeat"></div>
<?php } } } } ?>

<?php } else { ?>

<?php if ($options->layout->general->headerType == 'map') { ?>

<?php if ($elements->unsortable['header-map']->display) { ?>
		<div class="header-wrap">
<?php if($elements->unsortable['header-map']->getId() === 'columns' or $elements->unsortable['header-map']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['header-map']->getTemplate(), array('el' => $elements->unsortable['header-map'], 'element' => $elements->unsortable['header-map'], 'htmlId' => $elements->unsortable['header-map']->getHtmlId(), 'htmlClass' => $elements->unsortable['header-map']->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['header-map']);
			} ?>
		</div>
<?php } ?>

<?php } elseif ($options->layout->general->headerType == 'revslider') { ?>

<?php if ($elements->unsortable['revolution-slider']->display) { ?>
		<div class="header-wrap">
<?php if($elements->unsortable['revolution-slider']->getId() === 'columns' or $elements->unsortable['revolution-slider']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['revolution-slider']->getTemplate(), array('el' => $elements->unsortable['revolution-slider'], 'element' => $elements->unsortable['revolution-slider'], 'htmlId' => $elements->unsortable['revolution-slider']->getHtmlId(), 'htmlClass' => $elements->unsortable['revolution-slider']->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['revolution-slider']);
			} ?>
		</div>
<?php } ?>

<?php } elseif ($options->layout->general->headerType == 'image') { ?>

<?php if ($options->layout->general->headerImage) { if (isset($options->layout->general->headerImageAlign)) { ?>
		<div class="header-wrap <?php echo NTemplateHelpers::escapeHtml($options->layout->general->headerImageAlign, ENT_COMPAT) ?>">
<?php } else { ?>
		<div class="header-wrap image-left">
<?php } ?>
			<img src="<?php echo NTemplateHelpers::escapeHtml($options->layout->general->headerImage, ENT_COMPAT) ?>" alt="header image" />
		</div>
<?php } ?>

<?php } } ?>

<?php if ($elements->unsortable['search-form']->display) { if($elements->unsortable['search-form']->getId() === 'columns' or $elements->unsortable['search-form']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['search-form']->getTemplate(), array('el' => $elements->unsortable['search-form'], 'element' => $elements->unsortable['search-form'], 'htmlId' => $elements->unsortable['search-form']->getHtmlId(), 'htmlClass' => $elements->unsortable['search-form']->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['search-form']);
			} } ?>


<div id="main" class="elements">

<?php if ($elements->unsortable['page-title']->display) { if($elements->unsortable['page-title']->getId() === 'columns' or $elements->unsortable['page-title']->isEnabled()){
				NCoreMacros::includeTemplate($elements->unsortable['page-title']->getTemplate(), array('el' => $elements->unsortable['page-title'], 'element' => $elements->unsortable['page-title'], 'htmlId' => $elements->unsortable['page-title']->getHtmlId(), 'htmlClass' => $elements->unsortable['page-title']->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($elements->unsortable['page-title']);
			} } ?>


	<div class="main-sections">
<?php $iterations = 0; foreach ($elements->sortable as $element) { ?>

<?php if ($element->id == 'sidebars-boundary-start') { ?>

		<div class="elements-with-sidebar">
			<div class="elements-sidebar-wrap">
				<div class="right-bck"></div>
<?php if ($wp->hasSidebar('left')) { get_sidebar("left" ? "left" : null) ;} ?>
				<div class="elements-area">

<?php } elseif ($element->id == 'sidebars-boundary-end') { ?>

				</div><!-- .elements-area -->
<?php if ($wp->hasSidebar('right')) { get_sidebar("" ? "" : null) ;} ?>
				</div><!-- .elements-sidebar-wrap -->
			</div><!-- .elements-with-sidebar -->

<?php } else { global $post ;if ($element->id == 'comments' && $post == null) { ?>
				<!-- COMMENTS DISABLED - IS NOT SINGLE PAGE -->
<?php } elseif ($element->id == 'comments' && !comments_open($post->ID) && get_comments_number($post->ID) == 0) { ?>
				<!-- COMMENTS DISABLED -->
<?php } else { if ($element->display) { ?>				<section id="<?php echo NTemplateHelpers::escapeHtml($element->htmlId, ENT_COMPAT) ?>
-main" class="<?php echo NTemplateHelpers::escapeHtml($element->htmlClasses, ENT_COMPAT) ?>">

					<div class="elm-wrapper <?php echo NTemplateHelpers::escapeHtml($element->htmlClass, ENT_COMPAT) ?>-wrapper">

<?php if($element->getId() === 'columns' or $element->isEnabled()){
				NCoreMacros::includeTemplate($element->getTemplate(), array('el' => $element, 'element' => $element, 'htmlId' => $element->getHtmlId(), 'htmlClass' => $element->getHtmlClass()) + $template->getParameters(), $_l->templates['0veytaq4ss'])->render();
			}else{
				echo AitWpLatteMacros::elementPlaceholder($element);
			} ?>

					</div><!-- .elm-wrapper -->

				</section>
<?php } } } $iterations++; } ?>
	</div><!-- .main-sections -->
</div><!-- #main .elements -->

<?php get_footer("" ? "" : null) ;