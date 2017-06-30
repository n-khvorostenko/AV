$(function()
	{
	$(document)
		.on("vclick", '.av-list > div', function(event)
			{
			if(!$(event.target).closest('.rating-cell').length)
				$(this).find('a')[0].click();
			});
	});