{block content}

	{loop as $post}
		{* SETTINGS AND DATA *}
		{var $meta = $post->meta('item-data')}
		{var $settings = $options->theme->item}
		{* SETTINGS AND DATA *}

		{*RICH SNIPPET WRAP*}
		<div class="item-content-wrap" itemscope itemtype="http://schema.org/LocalBusiness">
			<meta itemprop="name" content="{$post->title}">
			<meta itemprop="image" content="{$post->imageUrl}">
			{if $meta->map['address']}
			<meta itemprop="address" content="{$meta->map['address']}">
			{/if}
		{*RICH SNIPPET WRAP*}

			{* CONTENT SECTION *}
			<div class="entry-content">
				{* GALLERY SECTION *}
				{includePart portal/parts/single-item-gallery}
				{* GALLERY SECTION *}

				<div class="entry-content-wrap" itemprop="description">
				{if $post->hasContent}
					{!$post->content}
				{else}
					{!$post->excerpt}
				{/if}
				</div>
			</div>
			{* CONTENT SECTION *}

			<div class="column-grid column-grid-2">
				<div class="column column-span-1 column-narrow column-first">
					{* ADDRESS SECTION *}
					{includePart portal/parts/single-item-address}
					{* ADDRESS SECTION *}

					{* CONTACT OWNER SECTION *}
					{includePart portal/parts/single-item-contact-owner}
					{* CONTACT OWNER SECTION *}

					{* GET DIRECTIONS SECTION *}
					{if defined('AIT_GET_DIRECTIONS_ENABLED')}
						{includePart portal/parts/get-directions-button}
					{/if}
					{* GET DIRECTIONS SECTION *}

					{* SOCIAL SECTION *}
					{includePart portal/parts/single-item-social}

					{includePart portal/parts/single-item-social-icons}
					{* SOCIAL SECTION *}
				</div>

				<div class="column column-span-1 column-narrow column-last">
					{* OPENING HOURS SECTION *}
					{includePart portal/parts/single-item-opening-hours}
					{* OPENING HOURS SECTION *}
				</div>
			</div>

			{* ITEM EXTENSION *}
			{if defined('AIT_EXTENSION_ENABLED')}
				{includePart portal/parts/item-extension}
			{/if}
			{* ITEM EXTENSION *}

			{* SPECIAL OFFERS SECTION *}
			{if (defined('AIT_SPECIAL_OFFERS_ENABLED'))}
				{includePart parts/single-item-special-offers}
			{/if}
			{* SPECIAL OFFERS SECTION *}

			{* EVENTS SECTION *}
			{if defined('AIT_EVENTS_PRO_ENABLED') && AitEventsPro::getEventsByItem($post->id)->found_posts}
				{includePart portal/parts/single-item-events, itemId => $post->id}
			{/if}
			{* EVENTS SECTION *}

			{* CLAIM LISTING SECTION *}
			{if defined('AIT_CLAIM_LISTING_ENABLED')}
				{includePart portal/parts/claim-listing}
			{/if}
			{* CLAIM LISTING SECTION *}

			{* MAP SECTION *}
			{includePart portal/parts/single-item-map}
			{* MAP SECTION *}

			{* GET DIRECTIONS SECTION *}
			{if defined('AIT_GET_DIRECTIONS_ENABLED')}
				{includePart portal/parts/get-directions-container}
			{/if}
			{* GET DIRECTIONS SECTION *}

			{* FEATURES SECTION *}
			{includePart portal/parts/single-item-features}
			{* FEATURES SECTION *}

			{* REVIEWS SECTION *}
			{if defined('AIT_REVIEWS_ENABLED')}
			{includePart portal/parts/single-item-reviews}
			{/if}
			{* REVIEWS SECTION *}

		{*RICH SNIPPET WRAP*}
		</div>
		{*RICH SNIPPET WRAP*}

	{/loop}
