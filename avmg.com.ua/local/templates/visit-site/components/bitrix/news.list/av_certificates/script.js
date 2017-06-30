$(function()
	{
	/* ------------------------------------------- */
	/* ---------------- handlers ----------------- */
	/* ------------------------------------------- */
	$(document)
		.on("vclick", '.av-certificates-list > div', function()
			{
			var
				elementId     = $(this).attr("data-element-id"),
				$elementPopup = $('.av-certificates-list-element-popup[data-element-id="'+elementId+'"]');

			$('.av-certificates-list-element-popup').hide();
			if($elementPopup.length)
				{
				$elementPopup.show().positionCenter(1100);
				AvBlurScreen("on", 1000);
				return;
				}

			AvWaitingScreen("on");
			$.ajax
				({
				type    : 'POST',
				url     : AvVsCertifitacesListElementFile,
				data    :
					{
					"COMPONENT_PARAMS": $('.av-certificates-list').attr("data-component-params"),
					"ELEMENT_ID"      : elementId,
					"CLOSE_FORM_ATTR" : 'data-close-form'
					},
				success : function(scriptResult)
					{
					AvBlurScreen("on", 1000);
					$('<div class="av-certificates-list-element-popup" data-element-id="'+elementId+'"></div>')
						.appendTo('body')
						.html(scriptResult)
						.positionCenter(1100)
						.on("vclick", '[data-close-form]', function ()
							{
							$(this).closest('.av-certificates-list-element-popup').hide();
							AvBlurScreen("off");
							});
					},
				complete: function() {AvWaitingScreen("off")}
				});
			})
		.on("vclick", function()
			{
			var $popup = $('.av-certificates-list-element-popup');
			if
				(
				!$('.av-certificates-list > div').isClicked()
				&&
				$popup.filter(':visible').length
				&&
				!$popup.isClicked()
				)
				{
				$popup.hide();
				AvBlurScreen("off");
				}
			});
	/* ------------------------------------------- */
	/* -------------- scroll/resize -------------- */
	/* ------------------------------------------- */
	$(window)
		.resize(function()
			{
			$('.av-certificates-list-element-popup:visible').positionCenter();
			});
	});