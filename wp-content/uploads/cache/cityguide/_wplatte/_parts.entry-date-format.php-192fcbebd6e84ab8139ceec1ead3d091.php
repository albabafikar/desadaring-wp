<?php //netteCache[01]000575a:2:{s:4:"time";s:21:"0.15020300 1529937336";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:89:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/parts/entry-date-format.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/parts/entry-date-format.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'm4xbt1lxrx')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($dateIcon) { ?>

	<?php $rawDate = $dateIcon ?> 

<?php $dayFormat = '' ;$dayFormatSuffix = '' ;$monthFormat = '' ;$yearFormat = '' ?>


	<span class="entry-date updated <?php if ($dateShort == 'yes') { ?>short-date<?php } ?>">

		<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('j', 'day date format', 'wplatte'), ENT_NOQUOTES) ;$dayFormat = ob_get_clean() ?>

		<?php ob_start() ;if ($currentLang->slug == 'en') { echo NTemplateHelpers::escapeHtml(_x('S', 'english ordinal suffix for the day', 'wplatte'), ENT_NOQUOTES) ;} else { ?>
.<?php } $dayFormatSuffix = ob_get_clean() ?>


		<?php if ($dateShort == 'yes') { ?>	<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('M', 'month date short format', 'wplatte'), ENT_NOQUOTES) ;$monthFormat = ob_get_clean() ?>

		<?php } else { ?>						<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('F', 'month date long format', 'wplatte'), ENT_NOQUOTES) ;$monthFormat = ob_get_clean() ?>
 <?php } ?>


		<?php ob_start() ;echo NTemplateHelpers::escapeHtml(_x('Y',  'year date format', 'wplatte'), ENT_NOQUOTES) ;$yearFormat = ob_get_clean() ?>


<?php if ($dateLinks == 'yes') { ?>

			<time class="date" datetime="<?php echo NTemplateHelpers::escapeHtml($template->date($rawDate, 'c'), ENT_COMPAT) ?>">
				<a class="link-day" href="<?php echo NTemplateHelpers::escapeHtml($post->dayArchiveUrl, ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml(__('Link to daily archives: %s', 'wplatte'), ENT_COMPAT) ;echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate), ENT_COMPAT) ?>">
					<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $dayFormat), ENT_NOQUOTES) ;if (!empty($dayFormatSuffix)) { ?>
<small><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $dayFormatSuffix), ENT_NOQUOTES) ?>
</small><?php } ?>

				</a>
				<a class="link-month" href="<?php echo NTemplateHelpers::escapeHtml($post->monthArchiveUrl, ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml(__('Link to monthly archives: %s', 'wplatte'), ENT_COMPAT) ;echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $monthFormat), ENT_COMPAT) ?>">
					<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $monthFormat), ENT_NOQUOTES) ?>

				</a>
				<a class="link-year" href="<?php echo NTemplateHelpers::escapeHtml($post->yearArchiveUrl, ENT_COMPAT) ?>
" title="<?php echo NTemplateHelpers::escapeHtml(__('Link to yearly archives: %s', 'wplatte'), ENT_COMPAT) ;echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $yearFormat), ENT_COMPAT) ?>">
					<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $yearFormat), ENT_NOQUOTES) ?>

				</a>
			</time>

<?php } else { ?>

			<time class="date" datetime="<?php echo NTemplateHelpers::escapeHtml($template->date($rawDate, 'c'), ENT_COMPAT) ?>">
				<span class="link-day">
					<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $dayFormat), ENT_NOQUOTES) ;if (!empty($dayFormatSuffix)) { ?>
<small><?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $dayFormatSuffix), ENT_NOQUOTES) ?>
</small><?php } ?>

				</span>
				<span class="link-month">
					<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $monthFormat), ENT_NOQUOTES) ?>

				</span>
				<span class="link-year">
					<?php echo NTemplateHelpers::escapeHtml($template->dateI18n($rawDate, $yearFormat), ENT_NOQUOTES) ?>

				</span>
			</time>

<?php } ?>

	</span>

<?php } 