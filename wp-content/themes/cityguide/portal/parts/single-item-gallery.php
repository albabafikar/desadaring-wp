{if $meta->displayGallery && count($meta->gallery) > 0}
	{if count($meta->gallery) == 1}
		{var $gallery = $meta->gallery}
		<section class="elm-main elm-easy-slider-main">
			<div class="elm-easy-slider-wrapper">
				<div class="elm-easy-slider easy-pager-thumbnails pager-pos-outside detail-thumbnail-wrap detail-thumbnail-slider">
					<div class="loading"><span class="ait-preloader">{!__ 'Loading&hellip;'}</span></div>
					<ul class="easy-slider"><!--
					{foreach $gallery as $item}
					{var $title = AitLangs::getCurrentLocaleText($item['title'])}
					--><li>
							<a href="{imageUrl $item['image'], width => 1000, crop => 1}" title="{$title}" target="_blank" rel="item-gallery">
								<span class="easy-thumbnail">
									{if $title != ""}<span class="easy-title">{$title}</span>{/if}
									<img src="{imageUrl $item['image'], width => 400, crop => 1}" alt="{$title}" />
								</span>
							</a>
						</li><!--
					{/foreach}
					--></ul>
				</div>
				<script type="text/javascript">
					jQuery(window).load(function(){
						{if $options->theme->general->progressivePageLoading}
							if(!isResponsive(1024)){
								jQuery(".detail-thumbnail-slider").waypoint(function(){
									jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
									jQuery('.detail-thumbnail-slider').find('ul').delay(500).animate({'opacity':1}, 500, function(){
										jQuery('.detail-thumbnail-slider').find('.loading').fadeOut('fast');
										jQuery.waypoints('refresh');
									});
								}, { triggerOnce: true, offset: "95%" });
							} else {
								jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
								jQuery('.detail-thumbnail-slider').find('ul').delay(500).animate({'opacity':1}, 500, function(){
									jQuery('.detail-thumbnail-slider').find('.loading').fadeOut('fast');
									jQuery.waypoints('refresh');
								});
							}
						{else}
							jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
							jQuery('.detail-thumbnail-slider').find('ul').delay(500).animate({'opacity':1}, 500, function(){
								jQuery('.detail-thumbnail-slider').find('.loading').fadeOut('fast');
								jQuery.waypoints('refresh');
							});
						{/if}
					});
				</script>
			</div>
		</section>
	{else}
		{var $gallery = $meta->gallery}
		<section class="elm-main elm-easy-slider-main">
			<div class="elm-easy-slider-wrapper">
				<div class="elm-easy-slider easy-pager-thumbnails pager-pos-outside detail-thumbnail-wrap detail-thumbnail-slider">
					<div class="loading"><span class="ait-preloader">{!__ 'Loading&hellip;'}</span></div>
					<ul class="easy-slider"><!--
					{foreach $gallery as $item}
					{var $title = AitLangs::getCurrentLocaleText($item['title'])}
					--><li>
							<a href="{$item['image']}" title="{$title}" target="_blank" rel="item-gallery">
								<span class="easy-thumbnail">
									{if $title != ""}<span class="easy-title">{$title}</span>{/if}
									<img src="{imageUrl $item['image'], width => 400, crop => 1}" alt="{$title}" />
								</span>
							</a>
						</li><!--
					{/foreach}
					--></ul>
					<div class="easy-slider-pager">
					{foreach $gallery as $item}
					{var $title = AitLangs::getCurrentLocaleText($item['title'])}
						<a data-slide-index="{$iterator->getCounter()-1}" href="#" title="{$title}">
							<span class="entry-thumbnail-icon">
								<img src="{imageUrl $item['image'], width => 100, height => 75, crop => 1}" alt="{!$title}" class="detail-image">
							</span>
						</a>
					{/foreach}
					</div>
				</div>
				<script type="text/javascript">
					jQuery(window).load(function(){
						{if $options->theme->general->progressivePageLoading}
							if(!isResponsive(1024)){
								jQuery(".detail-thumbnail-slider").waypoint(function(){
									portfolioSingleEasySlider("4:3");
									jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
								}, { triggerOnce: true, offset: "95%" });
							} else {
								portfolioSingleEasySlider("4:3");
								jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
							}
						{else}
							portfolioSingleEasySlider("4:3");
							jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
						{/if}
					});
				</script>
			</div>
		</section>
	{/if}
{/if}