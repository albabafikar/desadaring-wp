{*
required part parameters:
	$eventId
*}

{if !empty($meta->dates)}
	{var $firstDate = $meta->dates}
	{var $firstDate = reset($firstDate)}

	{var $nextDates = AitEventsPro::getEventClosestDate($eventId)}

	{var $dateFormat = get_option('date_format');}
	{var $timeFormat = get_option('time_format');}


	{if !empty($nextDates)}

		{var $dateFrom_timestamp = strtotime($nextDates['dateFrom'])}
		{var $dateFrom_formatted = date_i18n($dateFormat, $dateFrom_timestamp)}
		{var $timeFrom_formatted = date_i18n($timeFormat, $dateFrom_timestamp)}

		{if $nextDates['dateTo']}

			{var $dateTo_timestamp = strtotime($nextDates['dateTo'])}
			{var $dateTo_formatted = date_i18n($dateFormat, $dateTo_timestamp)}
			{var $timeTo_formatted = date_i18n($timeFormat, $dateTo_timestamp)}

		{/if}
	{else}
		{var $dateFrom_timestamp = strtotime($firstDate['dateFrom'])}
		{var $dateFrom_formatted = date_i18n($dateFormat, $dateFrom_timestamp)}
		{var $timeFrom_formatted = date_i18n($timeFormat, $dateFrom_timestamp)}
		{if $firstDate['dateTo']}

			{var $dateTo_timestamp = strtotime($firstDate['dateTo'])}
			{var $dateTo_formatted = date_i18n($dateFormat, $dateTo_timestamp)}
			{var $timeTo_formatted = date_i18n($timeFormat, $dateTo_timestamp)}

		{/if}

	{/if}


	{if isset($place) and $place == 'header'}

		{var $day = date_i18n('d', $dateFrom_timestamp)}
		{var $month = date_i18n('M', $dateFrom_timestamp)}
		{var $year = date_i18n('Y', $dateFrom_timestamp)}

		<div class="entry-date updated">
			<div class="date">
				{if $firstDate['dateFrom']}
					<span class="link-day">{$day}</span>
					<span class="link-month">{$month}</span>
					{if !empty($showYear)}
						<span class="link-year">{$year}</span>
					{/if}
				{/if}
			</div>
		</div>

	{else}

		{var $moreDates = count(AitEventsPro::getEventRecurringDates($eventId)) - 1}

		<div class="date-container data-container">
			<div class="field-container event-date">
				{if $firstDate['dateFrom']}
				<div class="field-wrapper">
					{if $firstDate['dateTo']}
					<div class="field-title"><h5>{__ 'Start:'}</h5></div>
					{/if}
					<div class="field-data">
						<p>{$dateFrom_formatted} <span class="right"><strong>{$timeFrom_formatted}</strong></span></p>
					</div>
				</div>
				{/if}
				{if $firstDate['dateTo']}
				<div class="field-wrapper">
					<div class="field-title"><h5>{__ 'End:'}</h5></div>
					<div class="field-data">
						<p>{$dateTo_formatted} <span class="right"><strong>{$timeTo_formatted}</strong></span></p>
					</div>
				</div>
				{/if}
			</div>
			{if $moreDates > 0}
			<a href="#schedule" class="event-more-dates">
				<div class="field-container more-dates">
					<div class="field-wrapper">
						<div class="field-title"><span>+{$moreDates}</span></div>
						<div class="field-data">
							<p><strong>{__ 'More scheduled dates'}</strong><span class="right"><i class="fa fa-angle-down"></i></span></p>
						</div>
					</div>
				</div>
			</a>
			{/if}

			<div class="date-export data-content">
				{includePart "parts/ics-export-button"}
			</div>
		</div>

	{/if}

{/if}
