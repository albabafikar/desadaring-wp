<?php //netteCache[01]000590a:2:{s:4:"time";s:21:"0.05658800 1529937682";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:103:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-social-icons.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-social-icons.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'vdv98c6qtf')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$meta = $post->meta('item-data') ?>

<?php $target = $meta->socialIconsOpenInNewWindow ? 'target="_blank"' : "" ?>

<?php if ($meta->displaySocialIcons) { ?>
<div class="social-icons-container">
	<div class="content">
<?php if (is_array($meta->socialIcons) && count($meta->socialIcons) > 0) { ?>
			<ul><!--
<?php $iterations = 0; foreach ($meta->socialIcons as $icon) { ?>
			--><li>
					<a href="<?php echo $icon['link'] ?>" <?php echo $target ?>>
<?php if (isset($icon['icon']) && $icon['icon'] != "") { $iconColor = $icon['iconColor'] != "" ? $icon['iconColor'] : getDefaultSocialIconColor($icon['icon']) ?>
						<i class="fa <?php echo NTemplateHelpers::escapeHtml($icon['icon'], ENT_COMPAT) ?>
" style="color: <?php echo $iconColor ?>"></i>
<?php } else { ?>
						<img src="<?php echo NTemplateHelpers::escapeHtml($icon['image'], ENT_COMPAT) ?>" alt="icon" />
<?php } ?>
					</a>
				</li><!--
<?php $iterations++; } ?>
			--></ul>
<?php } ?>
	</div>
</div>
<?php } 