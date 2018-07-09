{var $currentCategory = get_term_by( 'slug', get_query_var($taxonomy), $taxonomy)}
{var $parentCategory = $currentCategory != false ? $currentCategory->term_id : 0}
{var $categories = $wp->categories(array('taxonomy' => $taxonomy, 'hide_empty' => 0, 'parent' => $parentCategory))}

{if defined('AIT_EVENTS_PRO_ENABLED')}
	{var $eventOptions = get_option('ait_events_pro_options', array())}
{/if}

{if isset($categories) && count($categories) > 0}
	{var $columns = $options->theme->items->categoryColumns}
	<div class="categories-container">
		<div class="content">
			<ul n:class='"column-{$columns}",'><!--
			{foreach $categories as $category}
				{var $title = $category->title}
				{var $desc = $category->description}
				{var $link = get_term_link( $category->id, $category->taxonomy )}
				{var $icons = get_option($category->taxonomy . "_category_" . $category->id)}
				{var $icon = ""}

				{if isset($icons['icon']) && $icons['icon'] != ""}
					{var $icon = $icons['icon']}
				{else}
					{if $category->parentId != 0}
						{var $parent = get_term($category->parentId, $taxonomy)}
						{var $icons = get_option($parent->taxonomy . "_category_" . $parent->term_id)}
						{if isset($icons['icon']) && $icons['icon'] != ""}
							{var $icon = $icons['icon']}
						{else}
							{if $taxonomy == "ait-items"}
								{var $icon = $options->theme->items->categoryDefaultIcon}
							{elseif $category->taxonomy == "ait-events-pro"}
								{$eventOptions['categoryDefaultIcon']}
							{else}
								{var $icon = $options->theme->items->locationDefaultIcon}
							{/if}
						{/if}
					{else}
						{if $taxonomy == "ait-items"}
							{var $icon = $options->theme->items->categoryDefaultIcon}
						{elseif $category->taxonomy == "ait-events-pro"}
							{$eventOptions['categoryDefaultIcon']}
						{else}
							{var $icon = $options->theme->items->locationDefaultIcon}
						{/if}
					{/if}
				{/if}

				--><li n:class="$title ? 'has-title', has-icon">
					<a href="{$link}">
						<img src="{$icon}" alt="icon">
						<span>{!$title}</span>
					</a>
					{if $desc}
					<div class="cat-desc">
						{!$desc|trimWords: 10}
					</div>
					{/if}
				</li><!--
			{/foreach}
			--></ul>
		</div>
	</div>
{/if}
