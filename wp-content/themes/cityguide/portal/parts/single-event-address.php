{var $address                = aitEventAddress($post, true)}
{var $eventAdress            = $address['address']}
{var $eventLocationLatitude  = $address['latitude']}
{var $eventLocationLongitude = $address['longitude']}
{var $addressHideGpsField    = $eventsProOptions['addressHideGpsField']}
{var $addressHideEmptyFields = $eventsProOptions['addressHideEmptyFields']}

<div class="address-container">
	<h2>{__ 'Event Venue'}</h2>
	<div class="content">
		{if !$eventAdress && $addressHideEmptyFields}{else}
		<div class="address-row row-postal-address">
			<div class="address-name"><h5>{__ 'Address'}:</h5></div>
			<div class="address-data"><p>{if $eventAdress}{$eventAdress}{else}-{/if}</p></div>
		</div>
		{/if}

		{if !$addressHideGpsField}
		<div class="address-row row-gps">
			<div class="address-name"><h5>{__ 'GPS'}:</h5></div>
			<div class="address-data">
				<p>
					{if $eventLocationLatitude && $eventLocationLongitude}
						{$eventLocationLatitude}, {$eventLocationLongitude}
					{else}-{/if}
				</p>
			</div>
		</div>
		{/if}
	</div>
</div>
