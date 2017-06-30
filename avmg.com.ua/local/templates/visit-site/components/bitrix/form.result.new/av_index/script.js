$(function()
	{
	SetFormElementsCurrentLibrary("av_site");
	var $avFomrIndexPopUpAlert = $();

	$(document)
		.on("vclick", '.av-form-index [type="submit"]', function()
			{
			if($(this).closest('form').checkFormValidation()) return true;
			$avFomrIndexPopUpAlert = CreateAvAlertPopup(BX.message("AV_FORM_INDEX_FORM_VALIDATION_ALERT"), "alert").positionCenter(1000);
			return false;
			})
		.on("vclick", function()
			{
			if(!$avFomrIndexPopUpAlert.isClicked()) $avFomrIndexPopUpAlert.remove();
			});

	$(window)
		.resize(function()
			{
			$avFomrIndexPopUpAlert.positionCenter();
			});
	});