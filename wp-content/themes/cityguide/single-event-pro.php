{block content}

	{loop as $post}
		{* SETTINGS AND DATA *}

		{? wp_enqueue_style( 'full-calendar', aitPaths()->url->ait . '/assets/fullcalendar/fullcalendar.min.css') }
		{? wp_enqueue_script( 'moment', aitPaths()->url->ait . '/assets/fullcalendar/lib/moment.min.js') }
		{? wp_enqueue_script( 'full-calendar', aitPaths()->url->ait . '/assets/fullcalendar/fullcalendar.min.js', 'moment') }
		{if AitLangs::getCurrentLanguageCode() != 'en'}
			{? wp_enqueue_script( 'full-calendar-translation', aitPaths()->url->ait . '/assets/fullcalendar/lang/'.AitLangs::getFullCalendarLocale().'.js') }
		{/if}

		{var $meta = $post->meta('event-pro-data')}
		{var $settings = get_option('ait_events_pro_options', array())}
		{var $relatedItemMeta = $meta->item ? get_post_meta($meta->item, _ait-item_item-data, true) : ""}

		{var $noFeatured = $eventsProOptions['noFeatured']}
		{* SETTINGS AND DATA *}


		<div class="event-content-wrap">
			{* CONTENT SECTION *}
			<div class="entry-content">
				<div class="entry-content-wrap">
					<div class="entry-thumbnail">
						<div class="entry-thumbnail-wrap">
							<a href="{$post->imageUrl}" class="thumb-link">
								<span class="entry-thumbnail-icon">
									{if $post->hasImage}
									<img src="{imageUrl $post->imageUrl, width => 410, crop => 1}" alt="{$post->title}">
									{else}
									<img src="{imageUrl $noFeatured, width => 410, crop => 1}" alt="{$post->title}">
									{/if}
								</span>
							</a>
						</div>
					</div>
					{if $post->hasContent}
						{!$post->content}
					{else}
						{!$post->excerpt}
					{/if}
				</div>
			</div>

			<div class="column-grid column-grid-2">
				<div class="column column-span-1 column-narrow column-first">
					{* DATE SECTION *}
					{includePart portal/parts/single-event-date, eventId => $post->id}
					{* DATE SECTION *}
				</div>

				<div class="column column-span-1 column-narrow column-last event-fee">
					{* FEE SECTION *}
					{includePart portal/parts/single-event-fee}
					{* FEE SECTION *}
				</div>
			</div>

			<div class="column-grid column-grid-2">
				<div class="column column-span-1 column-narrow column-first event-venue">
					{* ADDRESS SECTION *}
					{includePart portal/parts/single-event-address}
					{* ADDRESS SECTION *}
				</div>

				<div class="column column-span-1 column-narrow column-last">
					{* MAP SECTION *}
					{includePart portal/parts/single-event-map}
					{* MAP SECTION *}
				</div>
			</div>

			{* SCHEDULED DATES SECTION *}
			{includePart parts/event-recurring-dates, 'dates' => AitEventsPro::getEventRecurringDates($post->id)}
			{* SCHEDULED DATES SECTION *}

			{* ORGANIZER SECTION *}
			{includePart portal/parts/single-event-organizer}
			{* ORGANIZER SECTION *}

			{* CONTENT SECTION *}
		</div>

		{* RICH SNIPPETS *}
		{includePart portal/parts/single-event-richsnippets}
		{* RICH SNIPPETS *}

	{/loop}
