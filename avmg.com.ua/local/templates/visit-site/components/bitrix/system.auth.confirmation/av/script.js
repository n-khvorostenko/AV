$(function()
	{
	if(typeof GetAvAuthForm == 'function')
		$(document)
			.on("vclick", function()
				{
				if($('.av-registration-confirmation [data-registration-form-link]').isClicked())
					GetAvAuthForm()
						.activateAvAuthForm()
						.changeAvAuthFormTab("register")
						.positionCenter();
				if($('.av-registration-confirmation [data-login-form-link]').isClicked())
					GetAvAuthForm()
						.activateAvAuthForm()
						.changeAvAuthFormTab("auth")
						.positionCenter();
				});
	});