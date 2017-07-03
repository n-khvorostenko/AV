$(function()
	{
	$(document)
		.on("submit", '.av-edu-login-auth-form', function()
			{
			if($(this).checkFormValidation())
				{
				AvWaitingScreen("on");
				return true;
				}
			else
				{
				CreateAvAlertPopup
					(
					BX.message("AV_EDU_LOGIN_AUTH_FORM_VALIDATION_ALERT"),
					"alert",
						{
						"hide_on_clickout" : 'Y',
						"centering"        : 'Y',
						"z_index"          : 1000
						}
					);
				return false;
				}
			});
	});