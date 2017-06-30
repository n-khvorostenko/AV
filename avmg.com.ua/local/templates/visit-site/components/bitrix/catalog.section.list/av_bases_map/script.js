$(function()
	{
	/* -------------------------------------------------------------------- */
	/* ----------------------------- handlers ----------------------------- */
	/* -------------------------------------------------------------------- */
	$(document)
		.on("vclick", '#av-bases-map g', function()
			{
			$('#av-shop-store-map').find('g').removeClass("active");
			$('.av-bases-map-region-form').hide();
			$('.av-bases-map-region-form[data-region-code="'+$(this).attr("data-region-code")+'"]').show().positionCenter();
			})
		.on("vclick", '.av-bases-map-region-form .title > span:last-child', function()
			{
			$(this).closest('.av-bases-map-region-form').hide();
			})
		.on("vclick", function(event)
			{
			var $clickedElement = $(event.target);
			if
				(
				!$clickedElement.closest('#av-bases-map g').length
				&&
				!$clickedElement.closest('.av-bases-map-region-form').length
				)
				{
				$('#av-bases-map').find('g').removeClass("active");
				$('.av-bases-map-region-form').hide();
				}
			});
	/* -------------------------------------------------------------------- */
	/* --------------------------- scroll/resize -------------------------- */
	/* -------------------------------------------------------------------- */
	$(window)
		.resize(function()
			{
			$('.av-bases-map-region-form:visible').positionCenter();
			});
	});