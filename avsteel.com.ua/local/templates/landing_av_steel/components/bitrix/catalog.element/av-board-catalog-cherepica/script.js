$(function()
{
	// AJAX
	$('#hover-section-2 [red-btn]').on('click', function()
			{
			AvWaitingScreen("on");
			$.ajax
				({
				type    : 'POST',
				url     : AvSteelCSAjaxElement5,
				data    :
					{
					"element_id"   : $('#av-steel-catalog-wrap-cherepica').attr("element-id"),
					"element_name" : $('#av-steel-catalog-wrap-cherepica').attr("element-name")
					},
				success : function(scriptResult)
					{
					AvBlurScreen("on", 999);
					CreateAvAlertPopup4(scriptResult)
						.positionCenter(9999)
						.on('remove', function() {AvBlurScreen("off")});
					},
				complete: function() {AvWaitingScreen("off");  }
				});
			});

});

	function checkFormYYYY() { 
		$(' [name="av_steel_catalog_order"]').submit(function() {
		timeoutID = window.setTimeout(msg1, 1000);
		});
	};
function msg1() {
$(' #catalog-form-wrap .col-md-12').addClass("text-center").html("<br><span>Спасибо за заявку!<br>Наш эксперт свяжется с вами в течении дня.</span><br>");
}
function CreateAvAlertPopup4(html, type)
	{
	$('.av-alert-popup').remove();

	return $('<div class="av-alert-popup" id="alertpopup4">'+ html +'<div close-form4></div>'+'</div>')
			.appendTo('body')
			.on('click', '[close-form4]', function()
				{
				$(this).closest('.av-alert-popup').remove();
				$('[form-input-error-123]').removeClass("show");

				AvBlurScreen("off");
				});
	}
