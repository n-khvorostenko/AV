$(function()
	{
	SetFormElementsCurrentLibrary("av_site");
	var $avFomrCareerPopUpAlert = $();

	$(document)
		.on("change", '.av-form-career [name="comments-trigger"]', function()
			{
			var
				$form            = $(this).closest('form'),
				$commentsTrigger = $form.getFormElememt({"name": 'comments-trigger'}),
				$textareaBlock   = $form.find('.comments-field');

			if($commentsTrigger.getFormElememtParam("value")) $textareaBlock.slideDown();
			else                                              $textareaBlock.slideUp();
			})
		.on("vclick", '.av-form-career [type="submit"]', function()
			{
			var $form = $(this).closest('form');

			if(!$form.checkFormValidation())
				{
				$avFomrCareerPopUpAlert = CreateAvAlertPopup(BX.message("AV_FORM_CAREER_FORM_VALIDATION_ALERT"), "alert").positionCenter(1000);
				return false;
				}
			else if(!$form.getFormElememt({"name": 'comments-trigger'}).getFormElememtParam("value"))
				$form.find('.comments-field').getFormElememt().setFormElememtParam("value", '');
			})
		.on("vclick", function()
			{
			if(!$avFomrCareerPopUpAlert.isClicked()) $avFomrCareerPopUpAlert.remove();
			});

	$(window)
		.resize(function()
			{
			$avFomrCareerPopUpAlert.positionCenter();
			});
	});