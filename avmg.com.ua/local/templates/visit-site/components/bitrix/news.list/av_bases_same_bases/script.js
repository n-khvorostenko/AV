$(function()
	{
	$(document)
		.on("vclick", '.av-bases-same-bases-list > div', function()
			{
			$(this).find('a')[0].click();
			});
	});