<?php //netteCache[01]000584a:2:{s:4:"time";s:21:"0.04652600 1529937682";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:98:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-address.php";i:2;i:1528301827;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-address.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '06af2q9v3h')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<div class="address-container">
	<h2><?php echo NTemplateHelpers::escapeHtml(__('Lokasi', 'wplatte'), ENT_NOQUOTES) ?></h2>
	<div class="content">
		<?php if (!$meta->map['address'] && $settings->addressHideEmptyFields) { } else { ?>
		<div class="address-row row-postal-address" itemscope itemtype="http://schema.org/PostalAddress">
			<div class="address-name"><h5><?php echo NTemplateHelpers::escapeHtml(__('Alamat', 'wplatte'), ENT_NOQUOTES) ?>:</h5></div>
			<div class="address-data" itemprop="streetAddress"><p><?php if ($meta->map['address']) { echo NTemplateHelpers::escapeHtml($meta->map['address'], ENT_NOQUOTES) ;} else { ?>
-<?php } ?></p></div>
		</div>
<?php } ?>

<?php if (!$settings->addressHideGpsField) { if (($meta->map['latitude'] === "1" && $meta->map['longitude'] === "1") != true) { ?>
		<div class="address-row row-gps" itemscope itemtype="http://schema.org/Place">
			<div class="address-name"><h5><?php echo NTemplateHelpers::escapeHtml(__('GPS', 'wplatte'), ENT_NOQUOTES) ?>:</h5></div>
			<div class="address-data" itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
				<p>
<?php if ($meta->map['latitude'] && $meta->map['longitude']) { ?>
						<?php echo NTemplateHelpers::escapeHtml($meta->map['latitude'], ENT_NOQUOTES) ?>
, <?php echo NTemplateHelpers::escapeHtml($meta->map['longitude'], ENT_NOQUOTES) ?>

						<meta itemprop="latitude" content="<?php echo NTemplateHelpers::escapeHtml($meta->map['latitude'], ENT_COMPAT) ?>" />
						<meta itemprop="longitude" content="<?php echo NTemplateHelpers::escapeHtml($meta->map['longitude'], ENT_COMPAT) ?>" />
					<?php } else { ?>-<?php } ?>

				</p>
			</div>
		</div>
<?php } } ?>

		<?php if (!$meta->email && $settings->addressHideEmptyFields) { } else { ?>
		<div class="address-row row-gps">
			<div class="address-name"><h5><?php echo NTemplateHelpers::escapeHtml(__('Desa', 'wplatte'), ENT_NOQUOTES) ?>:</h5></div>
			<div class="address-data"><p><?php if ($meta->email && $meta->showEmail) { ?>
<a href="#" target="_top" itemprop="email"><?php echo NTemplateHelpers::escapeHtml($meta->email, ENT_NOQUOTES) ?>
</a><?php } else { ?>-<?php } ?></p></div>
		</div>
<?php } ?>

		<?php if (!$meta->telephone && $settings->addressHideEmptyFields) { } else { ?>
		<div class="address-row row-telephone">
			<div class="address-name"><h5><?php echo NTemplateHelpers::escapeHtml(__('No. Telepon', 'wplatte'), ENT_NOQUOTES) ?>:</h5></div>
			<div class="address-data">
<?php if ($meta->telephone) { ?>
				<p>
					<span itemprop="telephone"><a href="tel:<?php echo NTemplateHelpers::escapeHtml($meta->telephone, ENT_COMPAT) ?>
" class="phone"><?php echo NTemplateHelpers::escapeHtml($meta->telephone, ENT_NOQUOTES) ?></a></span>
				</p>
<?php } else { ?>
				<p>-</p>
<?php } ?>

<?php if (is_array($meta->telephoneAdditional) && count($meta->telephoneAdditional) > 0) { $iterations = 0; foreach ($meta->telephoneAdditional as $data) { ?>
					<p>
						<span itemprop="telephone"><a href="tel:<?php echo NTemplateHelpers::escapeHtml($data['number'], ENT_COMPAT) ?>
" class="phone"><?php echo NTemplateHelpers::escapeHtml($data['number'], ENT_NOQUOTES) ?></a></span>
					</p>
<?php $iterations++; } } ?>
			</div>

		</div>
<?php } ?>

	

		<?php if (!$meta->web && $settings->addressHideEmptyFields) { } else { ?>
		<div class="address-row row-web">
			<div class="address-name"><h5><?php echo NTemplateHelpers::escapeHtml(__('Link Toko', 'wplatte'), ENT_NOQUOTES) ?>:</h5></div>
			<div class="address-data"><p><?php if ($meta->web) { ?><a href="<?php echo NTemplateHelpers::escapeHtml($meta->web, ENT_COMPAT) ?>
" target="_blank" itemprop="url" <?php if ($settings->addressWebNofollow) { ?>rel="nofollow"<?php } ?>
><?php if ($meta->webLinkLabel) { echo NTemplateHelpers::escapeHtml($meta->webLinkLabel, ENT_NOQUOTES) ;} else { echo NTemplateHelpers::escapeHtml($meta->web, ENT_NOQUOTES) ;} ?>
</a><?php } else { ?>-<?php } ?></p></div>
		</div>
<?php } ?>
	</div>
</div>