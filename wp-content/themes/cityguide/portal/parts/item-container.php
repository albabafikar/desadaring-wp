{var $categories = get_the_terms($post->id, 'ait-items')}

{* FEATURED CATEGORIES *}
{var $categories = aitOrderTermsByHierarchy($categories)}
{var $categories = aitFilterTerms($categories, $options->theme->items->maxDisplayedCategories)}
{* FEATURED CATEGORIES *}

{var $meta = $post->meta('item-data')}

{var $dbFeatured = get_post_meta($post->id, '_ait-item_item-featured', true)}
{var $isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false}

{var $noFeatured = $options->theme->item->noFeatured}

<div n:class='item-container, $isFeatured ? "item-featured", defined("AIT_REVIEWS_ENABLED") ? reviews-enabled'>
	<a href="{$post->permalink}">
		<div class="content">

			<div class="item-image">
				{if $post->image}
				<img src="{imageUrl $post->imageUrl, width => 640, height => 384, crop => 1}" alt="{!$post->title}">
				{else}
				<img src="{imageUrl $noFeatured, width => 640, height => 384, crop => 1}" alt="{!$post->title}">
				{/if}
			</div>
			<div class="item-data">
				<div class="item-header">
					<div class="item-title">
						<h3>{!$post->title}</h3>
					</div>
					{if count($categories) > 0}
					<div class="item-categories">
						{foreach $categories as $category}
							<span class="item-category">{!$category->name}</span>
						{/foreach}
					</div>
					{/if}
				</div>
				<div class="item-body">
					<div class="entry-content">
						<p>
							{if $post->hasExcerpt}
								{!$post->excerpt|striptags|trim|truncate: 140}
							{else}
								{!$post->content|striptags|trim|truncate: 140}
							{/if}
						</p>
					</div>
				</div>
				<div class="item-footer">
					<div class="item-address">
						{$meta->map['address']}
					</div>
				</div>
			</div>
		</div>
	</a>
	{if defined('AIT_REVIEWS_ENABLED')}
		{includePart "portal/parts/carousel-reviews-stars", item => $post, showCount => false}
	{/if}
</div>