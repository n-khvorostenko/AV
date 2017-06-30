$(function()
	{
	SetFormElementsCurrentLibrary("av_site");
	var $avFomrParthnersPopUpAlert = $();

	$(document)
		.on("vclick", '.av-form-parthners-work-button.form-link:not(.unactive)', function()
			{
			$('html, body').animate({scrollTop: $('.av-form-parthners > h3').offset().top - 120}, 1100);
			})
		.on("vclick", '.av-form-parthners [submit-button]', function()
			{
			if($(this).closest('form').checkFormValidation()) return true;
			$avFomrParthnersPopUpAlert = CreateAvAlertPopup(BX.message("AV_FORM_PARTHNERS_FORM_VALIDATION_ALERT"), "alert").positionCenter(1000);
			return false;
			})
		.on("vclick", function()
			{
			if(!$avFomrParthnersPopUpAlert.isClicked())
				$avFomrParthnersPopUpAlert.remove();

			if(typeof GetAvAuthForm == 'function' && $('.av-form-parthners-work-button.authorize:not(.unactive)').isClicked())
				GetAvAuthForm()
					.activateAvAuthForm()
					.changeAvAuthFormTab("register")
					.positionCenter();
			});
	$(window)
		.resize(function()
			{
			$avFomrParthnersPopUpAlert.positionCenter();
			});
	});