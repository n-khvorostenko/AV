$(function()
	{
	$(document)
		.on("vclick", '.av-career-same-articles-list > div', function()
			{
			$(this).find('a')[0].click();
			});
	});