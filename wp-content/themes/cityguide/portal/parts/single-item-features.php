{if $meta->displayFeatures}

	{if !is_array($meta->features)}
		{var $meta->features = array()}
	{/if}

	{if defined('AIT_ADVANCED_FILTERS_ENABLED')}
		{var $item_meta_filters = $post->meta('filters-options')}
		{if is_array($item_meta_filters->filters) && count($item_meta_filters->filters) > 0}
			{var $custom_features = array()}
			{foreach $item_meta_filters->filters as $filter_id}
				{var $filter_data = get_term($filter_id, 'ait-items_filters', "OBJECT")}
				{if $filter_data}
					{var $filter_meta = get_option( "ait-items_filters_category_".$filter_data->term_id )}
					{var $filter_icon = isset($filter_meta['icon']) ? $filter_meta['icon'] : ""}
					{? array_push($meta->features, array(
						"icon" => $filter_icon,
						"text" => $filter_data->name,
						"desc" => $filter_data->description
					))}
				{/if}
			{/foreach}
		{/if}
	{/if}

	{if !empty($meta->features)}
		{var $numOfColumns = $settings->featuresColumns}
		{var $displayDesc = $settings->featuresDisplayDesc}
		<div n:class='features-container, "column-{$numOfColumns}"'>
			<h2>{__ 'Features'}</h2>
			<div class="content">
				{foreach $meta->features as $feature}
				{var $hasImage = $feature['icon'] != '' ? true : false}
				<div n:class='feature-container, "feature-{$iterator->counter}", $iterator->isFirst($numOfColumns) ? feature-first, $iterator->isLast($numOfColumns) ? feature-last, $hasImage ? image-present, $displayDesc ? desc-on : desc-off'>
					{if $hasImage}
					<div class="feature-icon">
						<img src="{imageUrl $feature['icon'], width => $settings->featuresIconSize, height => $settings->featuresIconSize, crop => 1}" alt="{!$feature['text']}">
					</div>
					{/if}
					<div class="feature-data">
						<h4>{!$feature['text']}</h4>
						{if $displayDesc}
						<div class="feature-desc">
							<p>{!$feature['desc']}</p>
						</div>
						{/if}
					</div>
				</div>
				{/foreach}
			</div>
		</div>
	{/if}
{/if}