<?php //netteCache[01]000591a:2:{s:4:"time";s:21:"0.05276100 1529937682";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:104:"/home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-contact-owner.php";i:2;i:1527759702;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.2";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"3.30";}}}?><?php

// source file: /home/seey4565/public_html/daring/wp-content/themes/cityguide/portal/parts/single-item-contact-owner.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'hm8mumo77m')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
$disabled = 'yes' ?>

<?php if ($meta->contactOwnerBtn && $meta->email) { $disabled = '' ;} ?>

<div<?php if ($_l->tmp = array_filter(array('contact-owner-container', $disabled ? 'contact-owner-disabled':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>

<?php if (!$disabled) { ?>
	<a href="#contact-owner-popup-form" id="contact-owner-popup-button" class="contact-owner-popup-button"><?php echo NTemplateHelpers::escapeHtml($template->trimWords($settings->contactOwnerButtonTitle, 10), ENT_NOQUOTES) ?></a>
	<div class="contact-owner-popup-form-container" style="display: none">

		<form id="contact-owner-popup-form" class="contact-owner-popup-form" onSubmit="javascript:contactOwnerSubmit(event);">
			<h3><?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerButtonTitle, ENT_NOQUOTES) ?></h3>
			<input type="hidden" name="response-email-address" value="<?php echo NTemplateHelpers::escapeHtml($meta->email, ENT_COMPAT) ?>" />
			<input type="hidden" name="response-email-content" value="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerMailForm, ENT_COMPAT) ?>" />
<?php if ($settings->contactOwnerMailFromName) { ?>
			<input type="hidden" name="response-email-sender-name" value="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerMailFromName, ENT_COMPAT) ?>" />
<?php } ?>

<?php if ($settings->contactOwnerMailFromEmail) { ?>
			<input type="hidden" name="response-email-sender-address" value="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerMailFromEmail, ENT_COMPAT) ?>" />
<?php } else { ?>
			<input type="hidden" name="response-email-sender-address" value="<?php echo NTemplateHelpers::escapeHtml(get_option('admin_email'), ENT_COMPAT) ?>" />
<?php } ?>

			<div class="input-container">
				<input type="text" class="input name" name="user-name" value="" placeholder="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerInputNameLabel, ENT_COMPAT) ?>" id="user-name" />
<?php if (isset($settings->contactOwnerInputNameHelper) && $settings->contactOwnerInputNameHelper != "") { ?>
					<span class="input-helper"><?php echo $settings->contactOwnerInputNameHelper ?></span>
<?php } ?>
			</div>

			<div class="input-container">
				<input type="text" class="input email" name="user-email" value="" placeholder="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerInputEmailLabel, ENT_COMPAT) ?>" id="user-email" />
<?php if (isset($settings->contactOwnerInputEmailHelper) && $settings->contactOwnerInputEmailHelper != "") { ?>
					<span class="input-helper"><?php echo $settings->contactOwnerInputEmailHelper ?></span>
<?php } ?>
			</div>

			<div class="input-container">
				<input type="text" class="input subject" name="response-email-subject" value="" placeholder="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerInputSubjectLabel, ENT_COMPAT) ?>" id="user-subject" />
<?php if (isset($settings->contactOwnerInputSubjectHelper) && $settings->contactOwnerInputSubjectHelper != "") { ?>
					<span class="input-helper"><?php echo $settings->contactOwnerInputSubjectHelper ?></span>
<?php } ?>
			</div>

			<div class="input-container">
				<textarea class="user-message" name="user-message" cols="30" rows="4" placeholder="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerInputMessageLabel, ENT_COMPAT) ?>" id="user-message"></textarea>
<?php if (isset($settings->contactOwnerInputMessageHelper) && $settings->contactOwnerInputMessageHelper != "") { ?>
					<span class="input-helper"><?php echo $settings->contactOwnerInputMessageHelper ?></span>
<?php } ?>
			</div>

<?php if ($settings->contactOwnerCaptcha && class_exists("AitReallySimpleCaptcha")) { $captcha = new AitReallySimpleCaptcha() ;$captcha->tmp_dir = aitPaths()->dir->cache . '/captcha' ;$cacheUrl = aitPaths()->url->cache . '/captcha' ;$rand = rand() ;$img = $captcha->generate_image('ait-contact-owner-captcha-'.$rand, $captcha->generate_random_word()) ;$imgUrl = $cacheUrl . "/" . $img ?>
				<div class="input-container captcha-check">
					<img src="<?php echo NTemplateHelpers::escapeHtml($imgUrl, ENT_COMPAT) ?>" alt="captcha-input" />
					<input type="text" class="input user-captcha" name="user-captcha" value="" placeholder="<?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerInputCaptchaLabel, ENT_COMPAT) ?>" />
					<input type="hidden" class="rand-captcha" name="rand" value="<?php echo NTemplateHelpers::escapeHtml($rand, ENT_COMPAT) ?>" />
				</div>
			
<?php } ?>

			<div class="input-container btn">
				<button class="contact-owner-send" type="submit"><?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerSendButtonLabel, ENT_NOQUOTES) ?></button>
				<i class="fa fa-refresh fa-spin" style="margin-left: 10px; display: none;"></i>
			</div>

			<div class="messages">
				<div class="message message-success" style="display: none"><?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerMessageSuccess, ENT_NOQUOTES) ?></div>
				<div class="message message-error-user" style="display: none"><?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerMessageErrorUser, ENT_NOQUOTES) ?></div>
				<div class="message message-error-server" style="display: none"><?php echo NTemplateHelpers::escapeHtml($settings->contactOwnerMessageErrorServer, ENT_NOQUOTES) ?></div>
			</div>
		</form>

	</div>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#contact-owner-popup-button").colorbox({ inline:true, href:"#contact-owner-popup-form" });
	});
	function contactOwnerSubmit(e){
		e.preventDefault();

		var $form = jQuery("#"+e.target.id);
		var $inputs = $form.find('input, textarea');
		var $submitButton = $form.find("button.contact-owner-send");
		var $loader = $form.find("i.fa-refresh");
		$loader.fadeIn('slow');
		var $messages = $form.find('.messages');
		var mailCheck = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var mailParsed = $form.find('.email').val();
		// validate form data
			var passedInputs = 0;
			// check for empty inputs -- all inputs must be filled
			$inputs.each(function(){
				var inputValue = jQuery(this).val();
				if(inputValue !== ""){
					passedInputs = passedInputs + 1;
				}
			});
			// check for email field -- must be a valid email form

			//check if captcha is turned on
			if($form.find('.input-container.captcha-check').length){
				var $captchaContainer = $form.find('.input-container.captcha-check');
				var data = {"captcha-check": $captchaContainer.find(".user-captcha").val(), "captcha-hash": $captchaContainer.find(".rand-captcha").val()};
				ait.ajax.post("contact-owner-captcha:check", data).done(function(rdata){
					if(rdata.data == true){
						//captcha is OK
						if(passedInputs == $inputs.length && mailCheck.test(mailParsed) ){
							// ajax post -- if data are filled
							var data = {};
							$inputs.each(function(){
								data[jQuery(this).attr('name')] = jQuery(this).val();
							});
							//disable send button
							$submitButton.attr('disabled', true);
							//send email
							ait.ajax.post('contact-owner:send', data).done(function(data){
								if(data.success == true){
									$messages.find('.message-success').fadeIn('fast').delay(3000).fadeOut("fast", function(){
										//regenerate captcha
										regenerateCaptcha($captchaContainer);
										jQuery.colorbox.close();
										$form.find('input[type=text], textarea').each(function(){
											jQuery(this).attr('value', "");
										});
										$submitButton.removeAttr('disabled');
									});
									$loader.fadeOut('slow');
								} else {
									$messages.find('.message-error-server').fadeIn('fast').delay(3000).fadeOut("fast");
									$submitButton.removeAttr('disabled');
									//regenerate captcha
									regenerateCaptcha($captchaContainer);
									$loader.fadeOut('slow');
								}
								
							}).fail(function(){
								$messages.find('.message-error-server').fadeIn('fast').delay(3000).fadeOut("fast");
								$submitButton.removeAttr('disabled');
								//regenerate captcha
								regenerateCaptcha($captchaContainer);
								$loader.fadeOut('slow');
							});
							// display result based on response data
						} else {
							// display bad message result
							$messages.find('.message-error-user').fadeIn('fast').delay(3000).fadeOut("fast");
							//regenerate captcha
							regenerateCaptcha($captchaContainer);
							$loader.fadeOut('slow');
						}

					} else {
						//captcha check failed
						// display bad message result
						$messages.find('.message-error-user').fadeIn('fast').delay(3000).fadeOut("fast");
						//regenerate captcha
						regenerateCaptcha($captchaContainer);
						$loader.fadeOut('slow');

					}
				}).fail(function(rdata){
					//captcha ajax failed
					$messages.find('.message-error-server').fadeIn('fast').delay(3000).fadeOut("fast");
					$submitButton.removeAttr('disabled');
					$loader.fadeOut('slow');
				});
			
			}else{
			
				//no captcha used, send mail

				if(passedInputs == $inputs.length && mailCheck.test(mailParsed) ){
					// ajax post -- if data are filled
					var data = {};
					$inputs.each(function(){
						data[jQuery(this).attr('name')] = jQuery(this).val();
					});
					//disable send button
					$submitButton.attr('disabled', true);
					ait.ajax.post('contact-owner:send', data).done(function(data){
						if(data.success == true){
							$messages.find('.message-success').fadeIn('fast').delay(3000).fadeOut("fast", function(){
								jQuery.colorbox.close();
								$form.find('input[type=text], textarea').each(function(){
									jQuery(this).attr('value', "");
								});
								$submitButton.removeAttr('disabled');
							});
						} else {
							$messages.find('.message-error-server').fadeIn('fast').delay(3000).fadeOut("fast");
							$submitButton.removeAttr('disabled');
						}
						$loader.fadeOut('slow');
					}).fail(function(){
						$messages.find('.message-error-server').fadeIn('fast').delay(3000).fadeOut("fast");
						$submitButton.removeAttr('disabled');
						$loader.fadeOut('slow');
					});
					// display result based on response data
				} else {
					// display bad message result
					$messages.find('.message-error-user').fadeIn('fast').delay(3000).fadeOut("fast");
					$loader.fadeOut('slow');
				}
			}

	}
	
	function regenerateCaptcha( $captchaContainer ) {
		/* new captcha */
		if($captchaContainer.find('img').length > 0){
			var $captchaImage = $captchaContainer.find('img');
			$captchaImage.fadeTo("slow", 0);
			// ajax load new captcha
			ait.ajax.get('contact-owner-captcha:getCaptcha', null).done(function(xhr){
					$captchaContainer.find('input.rand-captcha').val(xhr.data.rand);
					var $imageUrl = xhr.data.url;
					$captchaImage.attr('src', $imageUrl);
					$captchaImage.fadeTo("slow", 1);
			}).fail(function(){
				console.error("get captcha failed");
			});
		}
		/* new captcha */
	}


	</script>
<?php } else { ?>
	<a href="#contact-owner-popup-form" id="contact-owner-popup-button" class="contact-owner-popup-button"><?php echo NTemplateHelpers::escapeHtml($template->trimWords($settings->contactOwnerButtonDisabledTitle, 10), ENT_NOQUOTES) ?></a>
<?php } ?>
</div>
