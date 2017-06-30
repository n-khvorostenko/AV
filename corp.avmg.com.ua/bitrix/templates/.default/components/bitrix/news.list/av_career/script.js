$(function()
	{
	$(document)
		.on("vclick", '.av-career-list > div', function()
			{
			$(this).find('a')[0].click();
			});
	});