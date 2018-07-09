<?php //netteCache[01]000596a:2:{s:4:"time";s:21:"0.73980000 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:109:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/taxonomy-list/javascript.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/ait-theme/elements/taxonomy-list/javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'c1jx13c2dw')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-script" type="text/javascript">
jQuery(window).load(function(){
<?php if ($options->theme->general->progressivePageLoading) { ?>
		if(!isResponsive(1024)){
			jQuery("#<?php echo $htmlId ?>-main").waypoint(function(){
				jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
			}, { triggerOnce: true, offset: "95%" });
		} else {
			jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
		}
<?php } else { ?>
		jQuery("#<?php echo $htmlId ?>-main").addClass('load-finished');
<?php } ?>
});

jQuery(document).ready(function(){
	var $tabs = jQuery("#<?php echo $htmlId ?>-main .cat-tabs-menu a");
	var $contents = jQuery("#<?php echo $htmlId ?>-main .cat-tabs-contents");
	var activeClass = "cat-option-active";
	$tabs.each(function(){
		jQuery(this).click(function(e){
			e.preventDefault();
			$tabs.each(function(){
				jQuery(this).removeClass(activeClass);
			});
			$contents.find(".cat-tabs-content").each(function(){
				jQuery(this).removeClass(activeClass);
			});
			jQuery(this).addClass(activeClass);
			$contents.find(".cat-tabs-content:eq("+jQuery(this).index()+")").addClass(activeClass);
		});
	});
});
</script>
