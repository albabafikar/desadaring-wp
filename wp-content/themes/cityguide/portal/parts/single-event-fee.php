{if isset($meta->fee)}

{var $count      = count($meta->fee)}
{var $countClass = $count > 3 ? 'multiple-fees' : ''}

<div class="fee-container data-container">

	<h2>{__ 'Fees & Tickets'}</h2>

	{if !$meta->fee or ($count == 1 and $meta->fee[0]['name'] == "" and $meta->fee[0]['price'] == "0")}
		<div class="field-container">
			<div class="field-wrapper">
				<div class="field-data">
					<h5 class="fee-label">{__ 'Free'}</h5>
					<span class="fee-price free"><i class="fa fa-check-circle"></i></span>
					<p class="fee-desc">{__ 'This event has no entrance fee'}</p>
				</div>
			</div>
		</div>
	{else}
		<div class="field-container {!$countClass}">
			{foreach $meta->fee as $feeData}
			<div class="field-wrapper">
				<div class="field-data">
					{if $feeData['name']}
					<h5 class="fee-label">{$feeData['name']}</h5>
					{/if}

					<span class="fee-price">
						{if isset($feeData['url']) and $feeData['url'] != ''}
							<a href="{!$feeData['url']}" target="_blank" title="{__ 'Buy Ticket'}">
						{/if}
							<span>
								{if empty($feeData['price'])}
									<span>{__ 'Free'}</span>
								{else}
									{if isset($feeData['url']) and $feeData['url'] != ''}
									<span class="cart"><i class="fa fa-shopping-cart"></i></span>
									{/if}
									{currency $feeData['price'], $meta->currency}
								{/if}
							</span>
						{if isset($feeData['url']) and $feeData['url'] != ''}
							</a>
						{/if}
					</span>

					{if $feeData['desc']}
					<p class="fee-desc">{$feeData['desc']}</p>
					{/if}
				</div>
			</div>
			{/foreach}
		</div>

		{if $count > 3}
	<div class="more-button"><span class="more">+ {__ 'More'}</span><span class="less">- {__ 'Less'}</span></div>
		{/if}

	{/if}


	<script type="text/javascript">
		jQuery(document).ready(function() {
			/* Prepare for Expand */
			jQuery('.column.event-fee').css('min-height', (function(){
				return jQuery(this).outerHeight(true);
			}));

			/* Expand Another Fees */
			jQuery('.fee-container .more-button').on('click', function() {
				jQuery(this).parent().toggleClass('expanded');
			});
		});
	</script>

</div>

{/if}
