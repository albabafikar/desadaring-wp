<?php //netteCache[01]000601a:2:{s:4:"time";s:21:"0.73064000 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:114:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/taxonomy-list/taxonomy-list.latte";i:2;i:1528298093;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/taxonomy-list/taxonomy-list.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'g9tguqmcfu')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
NCoreMacros::includeTemplate($element->common('header'), $template->getParameters(), $_l->templates['g9tguqmcfu'])->render() ?>

<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" class="<?php echo NTemplateHelpers::escapeHtml($htmlClass, ENT_COMPAT) ?>">



<?php if ($el->option('taxonomy') == 'all') { ?>

		<div class="cat-tabs-container">
			<div class="cat-tabs-menu">
				<a class="cat-option-active" href="#"><?php echo NTemplateHelpers::escapeHtml(__('Kategori', 'wplatte'), ENT_NOQUOTES) ?></a>
				<a href="#"><?php echo NTemplateHelpers::escapeHtml(__('Daerah', 'wplatte'), ENT_NOQUOTES) ?></a>

				<div class="cat-bg"></div>

			</div>
			<div class="cat-tabs-contents">
				<div class="cat-tabs-content cat-option-active">
					<!-- Categories -->
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/taxonomy-category-list", ""), array('taxonomy' => "ait-items") + get_defined_vars(), $_l->templates['g9tguqmcfu'])->render() ?>
				</div>
				<div class="cat-tabs-content">
					<!-- Locations -->
<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/taxonomy-category-list", ""), array('taxonomy' => "ait-locations") + get_defined_vars(), $_l->templates['g9tguqmcfu'])->render() ?>
				</div>
			</div>
		</div>

<?php } else { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("portal/parts/taxonomy-category-list", ""), array('taxonomy' => $el->option('taxonomy')) + get_defined_vars(), $_l->templates['g9tguqmcfu'])->render() ;} ?>

</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/taxonomy-list/javascript", ""), array() + get_defined_vars(), $_l->templates['g9tguqmcfu'])->render() ;