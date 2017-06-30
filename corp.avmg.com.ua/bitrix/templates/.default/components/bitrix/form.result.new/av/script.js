$(function()
	{
	SetFormElementsCurrentLibrary("av_site");
	var $avFomrPopUpAlert = $();

	$(document)
		.on("vclick", '.av-form [type="submit"]', function()
			{
			if($(this).closest('form').checkFormValidation()) return true;
			$avFomrPopUpAlert = CreateAvAlertPopup(BX.message("AV_FORM_FORM_VALIDATION_ALERT"), "alert").positionCenter(1000);
			return false;
			})
		.on("vclick", function()
			{
			if(!$avFomrPopUpAlert.isClicked()) $avFomrPopUpAlert.remove();
			});

	$(window)
		.resize(function()
			{
			$avFomrPopUpAlert.positionCenter();
			});
	});