$(function()
	{
	$(document)
		.on("submit", '.av-edu-login-forgotpass-form', function()
			{
			$(this).find('[name="USER_EMAIL"]').val($(this).find('[name="USER_LOGIN"]').val());
			});
	});