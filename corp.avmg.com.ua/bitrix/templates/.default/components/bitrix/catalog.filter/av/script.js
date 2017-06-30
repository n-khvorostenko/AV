$(function()
	{
	$(document)
		.on("submit", '.av-filter', function()
			{
			AvWaitingScreen("on");
			})
		.on("change", '.av-filter select', function()
			{
			$(this).closest('form').find('input[type="submit"]').click();
			});
	});