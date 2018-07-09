{block content}
	{? global $wp_query}

	{var $currentCategory = get_queried_object()}

	{includePart portal/parts/taxonomy-category-list, taxonomy => "ait-events-pro"}

	{if $currentCategory->description}
	<div class="entry-content">
		{!$currentCategory->description}
	</div>
	{/if}


	<div class="items-container">
		<div class="content">

			{if $wp_query->have_posts()}

			{includePart portal/parts/search-filters, postType => 'ait-event-pro', taxonomy => "ait-events-pro", current => $wp_query->post_count, max => $wp_query->found_posts}

			<div class="ajax-container">
				<div class="content">

					{customLoop from $wp_query as $post}
						{var $categories = get_the_terms($post->id, 'ait-events-pro')}

						{var $meta = $post->meta('event-pro-data')}

						{var $isFeatured = false }

						{var $imgWidth = 768}
						{var $imgHeight = 195}

						<div n:class='event-container, layout-list, $isFeatured ? "item-featured", defined("AIT_REVIEWS_ENABLED") ? reviews-enabled'>

							{var $imgHeight = ($imgWidth / 4) * 3}
							<a href="{$post->permalink}">
								<div class="item-thumbnail">
									{if $post->hasImage}
									<div class="item-thumbnail-wrap" style="background-image: url('{imageUrl $post->imageUrl, width => $imgWidth, height => $imgHeight, crop => 1}')"></div>
									{else}
									<div class="item-thumbnail-wrap" style="background-image: url('{imageUrl $noFeatured, width => $imgWidth, height => $imgHeight, crop => 1}')"></div>
									{/if}

									{var $nextDates = AitEventsPro::getEventClosestDate($post->id)}
									{var $date_timestamp = strtotime($nextDates['dateFrom'])}
									{var $day = date_i18n('d', $date_timestamp)}
									{var $month = date_i18n('M', $date_timestamp)}
									{var $moreDates = count(AitEventsPro::getEventRecurringDates($post->id)) - 1}

									<div class="entry-date">
										<div class="day">{$day}</div>
										<div class="month">{$month}</div>
										{if $moreDates > 0}
										<div class="more"><span>+{$moreDates}</span></div>
										{/if}
									</div>
								</div>

								<div class="item-data">
									<div class="item-title">
										<h3>{!$post->title}</h3>

										<div class="item-categories">
											{foreach $post->categories('ait-events-pro') as $cat}
												<span class="item-category">{!$cat->title}</span>
											{/foreach}
										</div>
									</div>

									<div class="item-text">
										<div class="item-excerpt"><p>{!$post->excerpt|striptags|trim|truncate: 260}</p></div>
									</div>

									<div class="item-location">
										<p class="location">
										{foreach $post->categories('ait-locations') as $loc}
											<span>{!$loc->title}</span>
										{/foreach}
										</p>
									</div>
								</div>
							</a>

						</div>

					{/customLoop}

					{includePart parts/pagination, location => pagination-below, max => $wp_query->max_num_pages}
				</div>
			</div>

			{else}
				{includePart parts/none, message => empty-site}
			{/if}
		</div>
	</div>
