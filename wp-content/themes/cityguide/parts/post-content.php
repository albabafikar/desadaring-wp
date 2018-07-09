{* VARIABLES *}
{var $concreteTaxonomy = isset($taxonomy) && $taxonomy != "" ? $taxonomy : ''}
{var $maxCategories = $options->theme->items->maxDisplayedCategories}
{* VARIABLES *}


	{if !$wp->isSingular}

		{if $wp->isSearch}

			{if isset($_REQUEST['a']) && $_REQUEST['a'] != ""}
				{var $isAdvanced = true}
			{/if}

			{if $isAdvanced}
				{var $noFeatured = $options->theme->item->noFeatured}

				{var $categories = get_the_terms($post->id, 'ait-items')}
				{* FEATURED CATEGORIES *}
				{var $categories = aitOrderTermsByHierarchy($categories)}
				{var $categories = aitFilterTerms($categories, $options->theme->items->maxDisplayedCategories)}
				{* FEATURED CATEGORIES *}

				{var $meta = $post->meta('item-data')}

				{var $dbFeatured = get_post_meta($post->id, '_ait-item_item-featured', true)}
				{var $isFeatured = $dbFeatured != "" ? filter_var($dbFeatured, FILTER_VALIDATE_BOOLEAN) : false}

				<div n:class='item-container, $isFeatured ? item-featured, defined("AIT_REVIEWS_ENABLED") ? reviews-enabled'>
					<a href="{$post->permalink}">
						<div class="content">
							<div class="item-image">
								{if $post->image}
								<img src="{imageUrl $post->imageUrl, width => 640, height => 384, crop => 1}" alt="{!$post->title}">
								{else}
								<img src="{imageUrl $noFeatured, width => 640, height => 384, crop => 1}" alt="{!$post->title}">
								{/if}
							</div>
							<div class="item-data">
								<div class="item-header">
									<div class="item-title">
										<h3>{!$post->title}</h3>
									</div>
									{if is_array($categories) && count($categories) > 0}
									<div class="item-categories">
										{if $maxCategories > 0 && count($categories) > $maxCategories}
											{* DISPLAY MAXIMUM CATS *}
											{var $counter = 0}
											{foreach $categories as $category}
												{if $counter < $maxCategories}
												<span class="item-category">{!$category->name}</span>
												{var $counter = $counter + 1}
												{/if}
											{/foreach}
										{else}
											{foreach $categories as $category}
												<span class="item-category">{!$category->name}</span>
											{/foreach}
										{/if}
									</div>
									{/if}
								</div>
								<div class="item-body">
									<div class="entry-content">
										<p>{if $post->hasExcerpt}{!$post->excerpt|striptags|trim|truncate: 140}{else}{!$post->content|striptags|trim|truncate: 140}{/if}</p>
									</div>
								</div>
								<div class="item-footer">
									<div class="item-address">
										{$meta->map['address']}
									</div>
									<!--<div class="item-rating" data-rating="85"></div>-->
								</div>
							</div>
						</div>
					</a>
					{if defined('AIT_REVIEWS_ENABLED')}
						{includePart "portal/parts/carousel-reviews-stars", item => $post, showCount => false}
					{/if}
				</div>

			{else}
				{*** SEARCH RESULTS ONLY ***}

				<article {!$post->htmlId} {!$post->htmlClass('hentry')}>
					<header class="entry-header">

						<div class="entry-title">

							<div class="entry-title-wrap">

								<h2><a href="{$post->permalink}">{!$post->title}</a></h2>


							</div><!-- /.entry-title-wrap -->
						</div><!-- /.entry-title -->
					</header><!-- /.entry-header -->

					<div class="entry-content loop">
						{!$post->excerpt}

						<a href="{$post->permalink}" class="more">{!__ 'read more'}</a>

					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<div class="footer-table">
							<div class="footer-row">

								<div class="footer-cell">

								{if $post->type == post}
									{includePart parts/entry-author}
								{/if}

								{var $dateIcon = $post->rawDate}
								{var $dateLinks = 'no'}
								{var $dateShort = 'no'}

								{includePart parts/entry-date-format, dateIcon => $dateIcon, dateLinks => $dateLinks, dateShort => $dateShort}

								</div>

								<div class="footer-cell">

								{if $concreteTaxonomy}
									{includePart parts/entry-categories, taxonomy => $concreteTaxonomy}
								{else}
									{if $post->isInAnyCategory}
										{includePart parts/entry-categories, taxonomy => $concreteTaxonomy}
									{/if}
								{/if}

								</div>

							</div>
						</div>
					</footer><!-- /.entry-footer -->
				</article>
			{/if}

		{else}

			{*** STANDARD LOOP ***}

			<article {!$post->htmlId} {!$post->htmlClass('hentry')}>
				<header class="entry-header {if !$post->hasImage}nothumbnail{/if}">


					<div class="entry-thumbnail">
						{if $post->hasImage}
							<div class="entry-thumbnail-wrap entry-content">
							<a href="{$post->permalink}" class="thumb-link">
								<span class="entry-thumbnail-icon">
									<img src="{imageUrl $post->imageUrl, width => 1000, height => 500, crop => 1}">
								</span>
							</a>
							</div>
						{/if}

						<div class="entry-meta">
							{if $post->isSticky and !$wp->isPaged and $wp->isHome}
								<span class="featured-post">{__ 'Featured post'}</span>
							{/if}

							{capture $editLinkLabel}<span class="edit-link">{!__ 'Edit'}</span>{/capture}
	      					{!$post->editLink($editLinkLabel)}
						</div><!-- /.entry-meta -->
					</div>


					<div class="entry-title">


						<div class="entry-title-wrap">

							<h2><a href="{$post->permalink}">{!$post->title}</a></h2>



						</div><!-- /.entry-title-wrap -->
					</div><!-- /.entry-title -->


				</header><!-- /.entry-header -->

				<div class="entry-content loop">
					{if $post->hasContent}
						{!$post->excerpt}
						<a href="{$post->permalink}" class="more">{!__ 'read more'}</a>
					{else}
						{!$post->content}
						<a href="{$post->permalink}" class="more">{!__ 'read more'}</a>
					{/if}



				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<div class="footer-table">
						<div class="footer-row">

							<div class="footer-cell">

							{if $post->type == post}
								{includePart parts/entry-author}
							{/if}

							{var $dateIcon = $post->rawDate}
							{var $dateLinks = 'no'}
							{var $dateShort = 'no'}

							{includePart parts/entry-date-format, dateIcon => $dateIcon, dateLinks => $dateLinks, dateShort => $dateShort}

							</div>

							<div class="footer-cell">

							{if $post->tagList}
								<span class="tags">
									<span class="tags-links">{!$post->tagList}</span>
								</span>
							{/if}

							{includePart parts/comments-link}

							</div>

						</div>
					</div>
				</footer><!-- .entry-footer -->
			</article>
		{/if}

	{else}

		{*** POST DETAIL ***}

		<article {!$post->htmlId} class="content-block hentry">

			<div class="entry-title hidden-tag">
				<h2>{!$post->title}</h2>
			</div>

			<div class="entry-thumbnail">
					{if $post->hasImage}
						<div class="entry-thumbnail-wrap">
						 <a href="{$post->imageUrl}" class="thumb-link">
						  <span class="entry-thumbnail-icon">
							<img src="{imageUrl $post->imageUrl, width => 1000, height => 500, crop => 1}" alt="{!$post->title}">
						  </span>
						 </a>
						</div>
					{/if}
				</div>

			<div class="entry-content">
				{!$post->content}
				{!$post->linkPages}
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<div class="footer-table">
					<div class="footer-row">

						<div class="footer-cell">

						{if $post->type == post}
							{includePart parts/entry-author}
						{/if}
						{includePart parts/entry-date}

						</div>

						<div class="footer-cell">

						{if $post->tagList}
							<span class="tags">
								<span class="tags-links">{!$post->tagList}</span>
							</span>
						{/if}

						{if $post->categoryList}
							{includePart parts/entry-categories, taxonomy => 'category'}
						{/if}

						</div>

					</div>
				</div>
			</footer><!-- .entry-footer -->

			{includePart parts/author-bio}


		</article>

	{/if}
