$(function()
	{
	var
		$avCTEFPopUpAlert = $(),
		$deleteForm       = $('.av-cargo-traffic-light-item-form-delete');

	$(document)
		/* ------------------------------------------- */
		/* ------------------- tabs ------------------ */
		/* ------------------------------------------- */
		.on("vclick", '.av-cargo-traffic-light-item-form .tabs > *',  function()
			{
			var
				$editPage   = $(this).closest('.av-cargo-traffic-light-item-form'),
				$form       = $editPage.find('.form').eq($(this).index()),
				$buttonsRow = $editPage.find('.buttons-row');
			if(!$form.length) return;

			$(this).parent().children().removeClass("active");
			$editPage.find('.form').hide();

			$(this).addClass("active");
			$form.show();

			if($(this).is('.history')) $buttonsRow.hide();
			else                       $buttonsRow.show();
			})
		/* ------------------------------------------- */
		/* ------------------ submit ----------------- */
		/* ------------------------------------------- */
		.onFirst("submit", '.av-cargo-traffic-light-item-form', function()
			{
			if($(this).checkFormValidation())
				{
				$(this).find('input, select').removeAttr("disabled");
				AvWaitingScreen("on");
				}
			else
				{
				$avCTEFPopUpAlert = CreateAvAlertPopup(BX.message("AVCTL_FORM_VALIDATION_ALERT"), "alert").positionCenter(1000);
				return false;
				}
			})
		/* ------------------------------------------- */
		/* ---------------- delete form -------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-cargo-traffic-light-item-form .delete-link',  function()
			{
			AvBlurScreen("on");
			$deleteForm.show().positionCenter(1200);
			})
		/* ------------------------------------------- */
		/* ------------------ hiding ----------------- */
		/* ------------------------------------------- */
		.on("vclick", function()
			{
			if(!$avCTEFPopUpAlert.isClicked())
				$avCTEFPopUpAlert.remove();
			if
				(
				(!$deleteForm.isClicked() && !$('.av-cargo-traffic-light-item-form .delete-link').isClicked())
				||
				$deleteForm.find('[data-cancel-button]').isClicked()
				)
				{
				AvBlurScreen("off");
				$deleteForm.hide();
				}
			});

	$(window)
		.resize(function()
			{
			$avCTEFPopUpAlert.positionCenter();
			if($deleteForm.is(':visible')) $deleteForm.positionCenter();
			});
	});