<?php //netteCache[01]000570a:2:{s:4:"time";s:21:"0.60176700 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:84:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/parts/social-icons.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/parts/social-icons.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'v4dpeteya5')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($options->theme->social->enableSocialIcons) { ?>
<div class="social-icons">
	<ul><!--
<?php $iterations = 0; foreach ($options->theme->social->socIcons as $icon) { ?>
			--><li>
				<a href="<?php echo NTemplateHelpers::escapeHtml($icon->url, ENT_COMPAT) ?>" <?php if ($options->theme->social->socIconsNewWindow) { ?>
target="_blank"<?php } ?>>
					<?php if ($icon->icon) { ?><img src="<?php echo NTemplateHelpers::escapeHtml($icon->icon, ENT_COMPAT) ?>
" class="s-icon s-icon-light" alt="icon" /><?php } ?>

					<?php if ($icon->iconDark) { ?><img src="<?php echo NTemplateHelpers::escapeHtml($icon->iconDark, ENT_COMPAT) ?>
" class="s-icon s-icon-dark" alt="icon" /><?php } ?>

					<span class="s-title"><?php echo NTemplateHelpers::escapeHtml($icon->title, ENT_NOQUOTES) ?></span>
				</a>
			</li><!--
<?php $iterations++; } ?>
	--></ul>
</div>
<?php } 