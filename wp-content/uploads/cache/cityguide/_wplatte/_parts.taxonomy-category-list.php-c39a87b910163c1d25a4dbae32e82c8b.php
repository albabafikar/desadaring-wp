<?php //netteCache[01]000588a:2:{s:4:"time";s:21:"0.73525900 1529937334";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:101:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/taxonomy-category-list.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/taxonomy-category-list.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'wrap9suc5i')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$currentCategory = get_term_by( 'slug', get_query_var($taxonomy), $taxonomy) ;$parentCategory = $currentCategory != false ? $currentCategory->term_id : 0 ;$categories = $wp->categories(array('taxonomy' => $taxonomy, 'hide_empty' => 0, 'parent' => $parentCategory)) ?>

<?php if (defined('AIT_EVENTS_PRO_ENABLED')) { $eventOptions = get_option('ait_events_pro_options', array()) ;} ?>

<?php if (isset($categories) && count($categories) > 0) { $columns = $options->theme->items->categoryColumns ?>
	<div class="categories-container">
		<div class="content">
			<ul<?php if ($_l->tmp = array_filter(array("column-{$columns}",))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>><!--
<?php $iterations = 0; foreach ($categories as $category) { $title = $category->title ;$desc = $category->description ;$link = get_term_link( $category->id, $category->taxonomy ) ;$icons = get_option($category->taxonomy . "_category_" . $category->id) ;$icon = "" ?>

<?php if (isset($icons['icon']) && $icons['icon'] != "") { $icon = $icons['icon'] ;} else { if ($category->parentId != 0) { $parent = get_term($category->parentId, $taxonomy) ;$icons = get_option($parent->taxonomy . "_category_" . $parent->term_id) ;if (isset($icons['icon']) && $icons['icon'] != "") { $icon = $icons['icon'] ;} else { if ($taxonomy == "ait-items") { $icon = $options->theme->items->categoryDefaultIcon ;} elseif ($category->taxonomy == "ait-events-pro") { ?>
								<?php echo NTemplateHelpers::escapeHtmlComment($eventOptions['categoryDefaultIcon']) ?>

<?php } else { $icon = $options->theme->items->locationDefaultIcon ;} } } else { if ($taxonomy == "ait-items") { $icon = $options->theme->items->categoryDefaultIcon ;} elseif ($category->taxonomy == "ait-events-pro") { ?>
							<?php echo NTemplateHelpers::escapeHtmlComment($eventOptions['categoryDefaultIcon']) ?>

<?php } else { $icon = $options->theme->items->locationDefaultIcon ;} } } ?>

				--><li<?php if ($_l->tmp = array_filter(array($title ? 'has-title':null, 'has-icon'))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
					<a href="<?php echo NTemplateHelpers::escapeHtml($link, ENT_COMPAT) ?>">
						<img src="<?php echo NTemplateHelpers::escapeHtml($icon, ENT_COMPAT) ?>" alt="icon" />
						<span><?php echo $title ?></span>
					</a>
<?php if ($desc) { ?>
					<div class="cat-desc">
						<?php echo $template->trimWords($desc, 10) ?>

					</div>
<?php } ?>
				</li><!--
<?php $iterations++; } ?>
			--></ul>
		</div>
	</div>
<?php } 