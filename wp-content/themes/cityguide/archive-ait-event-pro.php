{block content}

	{* template for page title is in parts/page-title.php *}

	{if $wp->havePosts}

	{var $noFeatured = $eventsProOptions['noFeatured']}

		<div class="items-container">
			<div class="content">

				<div class="ajax-container">
					<div class="content">

						{loop as $post}
							{var $categories = get_the_terms($post->id, 'ait-events-pro')}

							{var $meta = $post->meta('event-pro-data')}

							{var $isFeatured = false }

							{var $imgWidth = 768}
							{var $imgHeight = 400}

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

											{if !empty($categories)}
											<div class="item-categories">
												{foreach $post->categories('ait-events-pro') as $cat}
													<span class="item-category">{!$cat->title}</span>
												{/foreach}
											</div>
											{/if}
										</div>

										<div class="item-text">
											<div class="item-excerpt"><p>{!$post->excerpt(100)|striptags}</p></div>
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

						{/loop}
						{includePart parts/pagination, location => pagination-below}
					</div>
				</div>


			</div>
		</div>










	{else}
		{includePart parts/none, message => no-posts}
	{/if}
