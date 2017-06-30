/* -------------------------------------------------------------------- */
/* -------------------------- vote function --------------------------- */
/* -------------------------------------------------------------------- */
function AvIblockVote($element, $parentId, arParams)
	{
	var arrayInfo = $element.id.match(/^vote_(\d+)_(\d+)$/);

	arParams["vote"]    = 'Y';
	arParams["vote_id"] = arrayInfo[1];
	arParams["rating"]  = arrayInfo[2];

	BX.ajax.post
		(
		'/bitrix/components/bitrix/iblock.vote/component.php',
		arParams,
		function(data)
			{
			var
				obContainer = BX($parentId),
				obResult    = BX.create("DIV");
			if(!obContainer) return;

			obResult.innerHTML = data;
			obContainer.parentNode.replaceChild(obResult.firstChild, obContainer);
			}
		);
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("mouseover", '.av-iblock-rating.vote-available i', function()
			{
			var inedx = $(this).index();
			$(this).closest('.av-iblock-rating')
				.addClass("hovered")
				.children('i').each(function()
					{
					if($(this).index() <= inedx) $(this).addClass("hovered");
					});
			})
		.on("mouseout", '.av-iblock-rating', function()
			{
			$(this).removeClass("hovered").children('i').removeClass("hovered");
			});
	});