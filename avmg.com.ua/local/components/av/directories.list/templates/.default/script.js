$(function()
	{
	$(document)
		.on("vclick", '.av-directories-list .letter-block > a', function()
			{
			var
				$addButton       = $(this),
				$letterBlock     = $addButton.closest('.letter-block'),
				uploadedElements = [];

			$letterBlock.find('li').each(function()
				{
				uploadedElements.push($(this).attr("data-element-id"));
				});

			AvWaitingScreen("on");
			$.ajax
				({
				type    : 'POST',
				url     : AvDLShowMoreFile,
				data    :
					{
					"component_params" : $('.av-directories-list').find('.main-title').attr("data-component-params"),
					"uploaded_elements": uploadedElements,
					"letter"           : $letterBlock.children('div').html()
					},
				success : function(scriptResult)
					{
					scriptResult = jQuery.parseJSON(scriptResult);
					if(!scriptResult || scriptResult.status == 'failed') return;

					$letterBlock.find('ul').append(scriptResult.result);
					if(!scriptResult.more_element) $addButton.remove();
					},
				complete: function() {AvWaitingScreen("off")}
				});
			});
	});