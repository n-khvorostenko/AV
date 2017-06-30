$(function()
	{
	$(document)
		.onFirst("submit", '.av-forgotpass-form', function()
			{
			$(this)
				.find('[name="USER_EMAIL"]')
				.val($(this).find('[name="USER_LOGIN"]').val());
			});
	});