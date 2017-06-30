$(function()
	{
	if(typeof GetAvAuthForm == 'function')
		$(document)
			.on("vclick", function()
				{
				if($('.av-auth-alt [data-login-form-link]').isClicked())
					GetAvAuthForm()
						.activateAvAuthForm()
						.changeAvAuthFormTab("auth")
						.positionCenter();
				});
	});