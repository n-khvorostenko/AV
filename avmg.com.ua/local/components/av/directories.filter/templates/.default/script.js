$(function()
	{
	$(document)
		.on("submit", '.av-directories-filter', function()
			{
			AvWaitingScreen("on");
			})
		.on("change", '.av-directories-filter .field-row.IBLOCK_ID select', function()
			{
			var $filter = $(this).closest('.av-directories-filter');
			$filter.find('.field-row.NAME input').val('').attr("value", '');
			$filter.find('.submit-button').click();
			});
	});