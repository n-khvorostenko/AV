$(function()
	{
	$(document)
		.on("vclick", '.av-search-page .items-list', function()
			{
			$(this).find('a')[0].click();
			});
	});