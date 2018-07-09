{if !empty($meta->item)}

{var $relatedItemUrl = get_permalink($meta->item)}
{var $relatedItemFeaturedImage = wp_get_attachment_url(get_post_thumbnail_id($meta->item), 'thumbnail')}
{var $relatedItemThumbnail = $relatedItemFeaturedImage !="" ? $relatedItemFeaturedImage : $options->theme->item->noFeatured}
{var $relatedItemMeta[showEmail] = isset($relatedItemMeta[showEmail]) ? $relatedItemMeta[showEmail] : true}

<div class="organizer-container">

	<div class="content">

		<div class="thumbnail">
			<a href="{$relatedItemUrl}">
				<div class="thumbnail-wrap" style="background-image: url('{!$relatedItemThumbnail}')"></div>
				{* translators: Organizer as a person who organize events *}
				<h2 class="title">{__ 'Organizer'}</h2>
			</a>
		</div>

		<div class="data-container">

			<h3><a href="{$relatedItemUrl}">{get_the_title($meta->item)|noescape}</a></h3>

			<div class="address-container">
				{if $relatedItemMeta[telephone]}
				<div class="address-row row-telephone">
					<div class="address-name"><h5>{__ 'Telephone'}:</h5></div>
					<div class="address-data">
						<p><a href="tel:{str_replace(' ', '', $relatedItemMeta[telephone])}" class="phone">{$relatedItemMeta[telephone]}</a></p>
					</div>
				</div>
				{/if}

				{if $relatedItemMeta[email] and $relatedItemMeta[showEmail]}
				<div class="address-row row-email">
					<div class="address-name"><h5>{__ 'Email'}:</h5></div>
					<div class="address-data">
						<p><a href="mailto:{$relatedItemMeta[email]}" target="_top">{$relatedItemMeta[email]}</a></p>
					</div>
				</div>
				{/if}

				{if $relatedItemMeta[web]}
				<div class="address-row row-web">
					<div class="address-name"><h5>{__ 'Web'}:</h5></div>
					<div class="address-data">
						<p>
							<a href="{$relatedItemMeta[web]}" target="_blank" {if $options->theme->item->addressWebNofollow}rel="nofollow"{/if}>
							{if !empty( $relatedItemMeta[webLinkLabel] )}
								{$relatedItemMeta[webLinkLabel]}
							{else}
								{$relatedItemMeta[web]}
							{/if}
							</a>
						</p>
					</div>
				</div>
				{/if}
			</div>

			<div class="more data">
				<a href="{$relatedItemUrl}"><i class="fa fa-search-plus"></i></a>
			</div>

		</div>

	</div>

</div>

{/if}
