{getHeader}


{if $wp->isSingular(item)}
	{* ITEM DETAIL *}

	{var $meta = $post->meta('item-data')} {* $post is global entity available on singular pages *}

	{* get header type settings from package options and override it with header type setting from the item *}
	{* when the user has no capability to change this, it will fallback to the setting from the packages *}

	{* GET ITEM PACKAGE *}
	{var $packageSlug = getPostPackageSlug($post->id)}
	{if $packageSlug != ""}
		{var $packages = new ThemePackages()}
		{var $package = $packages->getPackageBySlug($packageSlug)}
		{var $packageOptions = $package->getOptions()}

		{var $headerType = $packageOptions['headerDefault']}
	{/if}
	{* GET ITEM PACKAGE *}

	{if isset($meta->headerType)}
		{var $headerType = $meta->headerType}	{* setting from item *}
	{/if}



	{if $headerType === 'map' || $headerType === 'street'}

		{if $elements->unsortable[header-map]->display}
			<div class="header-wrap">
				{includeElement $elements->unsortable[header-map]}
			</div>
		{/if}

	{elseif $headerType === 'image'}
		{ifset $meta->headerImageAlign}
			<div class="header-wrap {$meta->headerImageAlign}">
		{else}
			<div class="header-wrap image-left">
		{/ifset}

		{if isset($meta->headerImage) and !empty($meta->headerImage)}
			<img src="{$meta->headerImage}" alt="header image">
		{else}
			<img src="{$options->theme->item->noHeader}" alt="header image">
		{/if}
		</div>
	{else}
		{* this is none option *}

	{/if}

{elseif $wp->isSingular(event-pro)}
	{var $meta = $post->meta('event-pro-data')}

	{if isset($meta->headerType)}
		{var $headerType = $meta->headerType}
	{/if}
	{if $headerType === 'map' || $headerType === 'street'}
		{if $elements->unsortable[header-map]->display}
			<div class="header-wrap">
				{includeElement $elements->unsortable[header-map]}
			</div>
		{/if}

	{elseif $headerType === 'image'}
		{if isset($meta->headerImage) and !empty($meta->headerImage)}
			{* why 375? because there is no option in theme to manage it - use custom css *}
			<div class="header-wrap has-image" style="height: 375px; overflow: hidden; background: url('{!$meta->headerImage}') no-repeat"></div>
		{else}
			<div class="header-wrap image-left">
				<img src="{$options->theme->item->noHeader}" alt="header image">
			</div>
		{/if}
	{/if}

{elseif $wp->isTax(items) or $wp->isTax(locations)}
	{* ITEM CATEGORY && LOCATION *}
	{var $meta = (object) get_option("{$taxonomyTerm->taxonomy}_category_{$taxonomyTerm->id}")} {* $taxonomyTerm is global entity available on taxonomy pages *}

	{ifset $meta->header_type} {* due to one bug, sometimes header_type is not saved in term meta *}
		{if $meta->header_type === 'map'}
			{if $elements->unsortable[header-map]->display}
			<div class="header-wrap">
				{includeElement $elements->unsortable[header-map]}
			</div>
			{/if}
		{elseif $meta->header_type === 'image'}
			{if isset($meta->header_image) && $meta->header_image != ""}
				{ifset $meta->header_image_align}
				<div class="header-wrap {$meta->header_image_align}">
				{else}
				<div class="header-wrap image-left">
				{/ifset}
					<img src="{$meta->header_image}" alt="header image">
				</div>
			{else}
				{* Default Header Image *}
				{if$wp->isTax(items)}
				<div class="header-wrap has-image" style="height: {$options->theme->items->headerImageHeight}px; overflow: hidden; background: url('{!$options->theme->items->categoryDefaultImage}') no-repeat"></div>
				{else}
				<div class="header-wrap has-image" style="height: {$options->theme->items->headerImageHeight}px; overflow: hidden; background: url('{!$options->theme->items->locationDefaultImage}') no-repeat"></div>
				{/if}
			{/if}
		{/if}
	{/ifset}

{else}

	{* USE THE DEFAULT SETTINGS *}
	{if $options->layout->general->headerType == 'map'}

		{if $elements->unsortable[header-map]->display}
		<div class="header-wrap">
			{includeElement $elements->unsortable[header-map]}
		</div>
		{/if}

	{elseif $options->layout->general->headerType == 'revslider'}

		{if $elements->unsortable[revolution-slider]->display}
		<div class="header-wrap">
			{includeElement $elements->unsortable[revolution-slider]}
		</div>
		{/if}

	{elseif $options->layout->general->headerType == 'image'}

		{if $options->layout->general->headerImage}
		{ifset $options->layout->general->headerImageAlign}
		<div class="header-wrap {$options->layout->general->headerImageAlign}">
		{else}
		<div class="header-wrap image-left">
		{/ifset}
			<img src="{$options->layout->general->headerImage}" alt="header image">
		</div>
		{/if}

	{/if}
{/if}

{if $elements->unsortable[search-form]->display}
	{includeElement $elements->unsortable[search-form]}
{/if}


<div id="main" class="elements">

	{if $elements->unsortable[page-title]->display}
	    {includeElement $elements->unsortable[page-title]}
	{/if}


	<div class="main-sections">
	{foreach $elements->sortable as $element}

		{if $element->id == sidebars-boundary-start}

		<div class="elements-with-sidebar">
			<div class="elements-sidebar-wrap">
				<div class="right-bck"></div>
				{if $wp->hasSidebar(left)}
					{getSidebar left}
				{/if}
				<div class="elements-area">

		{elseif $element->id == sidebars-boundary-end}

				</div><!-- .elements-area -->
				{if $wp->hasSidebar(right)}
					{getSidebar}
				{/if}
				</div><!-- .elements-sidebar-wrap -->
			</div><!-- .elements-with-sidebar -->

		{else}
			{? global $post}
			{if $element->id == 'comments' && $post == null}
				<!-- COMMENTS DISABLED - IS NOT SINGLE PAGE -->
			{elseif $element->id == 'comments' && !comments_open($post->ID) && get_comments_number($post->ID) == 0}
				<!-- COMMENTS DISABLED -->
			{else}
				<section n:if="$element->display" id="{$element->htmlId}-main" class="{$element->htmlClasses}">

					<div class="elm-wrapper {$element->htmlClass}-wrapper">

						{includeElement $element}

					</div><!-- .elm-wrapper -->

				</section>
			{/if}
		{/if}
	{/foreach}
	</div><!-- .main-sections -->
</div><!-- #main .elements -->

{getFooter}
