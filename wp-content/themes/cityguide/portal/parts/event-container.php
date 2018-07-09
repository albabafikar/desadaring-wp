{var $eventOptions = get_option('ait_events_pro_options', array())}
{var $noFeatured = $eventOptions['noFeatured']}
{var $categories = get_the_terms($post->id, 'events-pro')}


{var $imgWidth = 768}
{var $imgHeight = 195}

<div n:class='event-container, layout-box' >

	<a href="{$post->permalink}">
		{var $imgHeight = ($imgWidth / 4) * 3}
		<div class="item-thumbnail">
			{if $post->hasImage}
			<div class="item-thumbnail-wrap" style="background-image: url('{imageUrl $post->imageUrl, width => $imgWidth, height => $imgHeight, crop => 1}')"></div>
			{else}
			<div class="item-thumbnail-wrap" style="background-image: url('{imageUrl $noFeatured, width => $imgWidth, height => $imgHeight, crop => 1}')"></div>
			{/if}

			<div class="item-text">
				<div class="item-excerpt"><p>{!$post->excerpt(200)|striptags}</p></div>
			</div>

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

		<div class="item-title"><h3>{!$post->title}</h3></div>

		<div class="item-categories">
			{foreach $post->categories('ait-events-pro') as $cat}
				<span class="item-category">{!$cat->title}</span>
			{/foreach}
		</div>

		<div class="item-location">
			{foreach $post->categories('ait-locations') as $loc}
				<span class="location">{!$loc->title}</span>
			{/foreach}
		</div>
	</a>

</div>