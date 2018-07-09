{block content}

	{var $settings = $options->theme->items}
	{var $noFeatured = $options->theme->item->noFeatured}

	{* VARIABLES *}
	{var $filterCounts = array(5, 10, 20)}
	{capture $dateLabel}{__ 'Date'}{/capture}
	{capture $titleLabel}{__ 'Title'}{/capture}

	{var $filterOrderBy = array( array("date", $dateLabel), array("title", $titleLabel))}
	{if defined('AIT_REVIEWS_ENABLED')}
		{capture $ratingLabel}{__ 'Rating'}{/capture}
		{? array_push($filterOrderBy, array("rating", $ratingLabel))}
	{/if}

	{var $filterCountsSelected = isset($_REQUEST['count']) && $_REQUEST['count'] != "" ? $_REQUEST['count'] : $settings->sortingDefaultCount}

	{if defined("AIT_ADVANCED_FILTERS_ENABLED")}
		{if isset($_REQUEST['filters']) && $_REQUEST['filters'] != ""}
			{var $filterCountsSelected = -1}
		{/if}
	{/if}

	{var $filterOrderBySelected = isset($_REQUEST['orderby']) && $_REQUEST['orderby'] != "" ? $_REQUEST['orderby'] : $settings->sortingDefaultOrderBy}
	{var $filterOrderSelected = isset($_REQUEST['order']) && $_REQUEST['order'] != "" ? $_REQUEST['order'] : $settings->sortingDefaultOrder}

	{var $pagination = (get_query_var('paged')) ? get_query_var('paged') : 1}
	{*var $currentCategory = get_term_by( 'slug', get_query_var('ait-items'), 'ait-items')*}

	{var $itemQuery = array(
		'post_type' => 'ait-item',
		'posts_per_page' => $filterCountsSelected,
		'paged' => $pagination,
	)}

	{* FILTER BY RATING HACKS *}
	{if $filterOrderBySelected == 'rating' && defined('AIT_REVIEWS_ENABLED')}
		{var $itemQuery['orderby'] = 'meta_value_num'}
		{var $itemQuery['meta_query'] = array(
			'relation' => 'OR',
			array(
				'key' => 'rating_mean',
				'compare' => 'NOT EXISTS',
				'value' => 0,
			),
			array(
				'key' => 'rating_mean',
			),
		)}
	{else}
		{var $itemQuery['orderby'] = $filterOrderBySelected}
	{/if}
	{* FILTER BY RATING HACKS *}

	{var $itemQuery['order'] = $filterOrderSelected}

	{customQuery as $query, $itemQuery}

	{var $allItems_filtered_query = $itemQuery}

	{* ADVANCED FILTERING *}
	{if defined("AIT_ADVANCED_FILTERS_ENABLED")}
		{if isset($_REQUEST['filters']) && $_REQUEST['filters'] != ""}
			{var $defined_filters = explode(";",$_REQUEST['filters'])}
			{var $advanced_filter_query = $itemQuery}
			{var $advanced_filter_query['posts_per_page'] = -1}
			{var $valid = array()}

			{customLoop from $query as $post}
				{var $meta = $post->meta('filters-options')}
				{if isset($meta->filters) && is_array($meta->filters)}
					{var $check = array_intersect($defined_filters, $meta->filters)}
					{if is_array($check) && count($check) >= count($defined_filters)}
						{? array_push($valid, $post->id)}
					{/if}
				{else}
					{* no meta .. no fun *}
				{/if}
			{/customLoop}

			{var $advanced_filter_query['post__in'] = array_unique($valid)}
			{customQuery as $query, $advanced_filter_query}

			{var $allItems_filtered_query = $advanced_filter_query}
		{/if}
	{/if}
	{* ADVANCED FILTERING *}

	{var $allItems_filtered_query['posts_per_page'] = -1}
	{customQuery as $allItemsQuery, $allItems_filtered_query}

	{* REORDER ITEMS SO FEATURED WILL BE FIRST *}
	{var $featured = array()}
	{var $notFeatured = array()}
	{var $newOrder = array()}
	{foreach $query->posts as $post}
		{var $dbFeatured = get_post_meta($post->ID, '_ait-item_item-featured', true)}
		{var $isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false}
		{if $isFeatured}
			{? array_push($featured, $post)}
		{else}
			{? array_push($notFeatured, $post)}
		{/if}
	{/foreach}
	{foreach $featured as $post}
		{? array_push($newOrder, $post)}
	{/foreach}
	{foreach $notFeatured as $post}
		{? array_push($newOrder, $post)}
	{/foreach}
	{var $query->posts = $newOrder}
	{var $query->post_count = count($newOrder)}
	{var $query->found_posts = count($newOrder)}
	{* REORDER ITEMS SO FEATURED WILL BE FIRST *}

	{* VARIABLES *}

	{includePart portal/parts/taxonomy-category-list, taxonomy => "ait-items"}

	<div class="items-container">
		<div class="content">

			{if $query->havePosts}

			{includePart portal/parts/search-filters, taxonomy => "ait-items", current => $query->post_count, max => $allItemsQuery->post_count}

			{if defined("AIT_ADVANCED_FILTERS_ENABLED")}
				{includePart portal/parts/advanced-filters, query => $allItemsQuery}
			{/if}

			<div class="ajax-container">
				<div class="content">

					{customLoop from $query as $post}
						{var $categories = get_the_terms($post->id, 'ait-items')}

						{var $meta = $post->meta('item-data')}

						{var $dbFeatured = get_post_meta($post->id, '_ait-item_item-featured', true)}
						{var $isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false }


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


					{/customLoop}

					{includePart parts/pagination, location => pagination-below, max => $query->max_num_pages}
				</div>
			</div>

			{else}
				{includePart parts/none, message => empty-site}
			{/if}
		</div>
	</div>
