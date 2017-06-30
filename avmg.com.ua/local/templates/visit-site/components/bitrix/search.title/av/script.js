/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.activateAvSearchField = function()
		{
		this.addClass("active");
		$('.av-search-title-result-list').parent().hide().html('');
		};
	jQuery.fn.diactivateAvSearchField = function()
		{
		this.removeClass("active");
		$('.av-search-title-result-list').parent().hide().html('');
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-search-title:not(.active)', function()
			{
			$(this).find('input[type="text"]').focus();
			})
		.on("focus", '.av-search-title input[type="text"]', function()
			{
			$(this)
				.controlFormSubmit("off")
				.closest('.av-search-title').activateAvSearchField();
			})
		.on("keyup", '.av-search-title input[type="text"]', function(event)
			{
			var
				keyCode            = event.keyCode,
				$seacrhResultBlock = $('.av-search-title-result-list:visible'),
				$selectedElement   = $seacrhResultBlock.find('a.selected');
			/* ------------------------------------------- */
			/* ---------------- navigation --------------- */
			/* ------------------------------------------- */
			if((keyCode == 38 || keyCode == 40) && $seacrhResultBlock.length)
				{
				var elementsLinks = [];
				$selectedElement.removeClass("selected");
				$seacrhResultBlock.find('a').each(function() {elementsLinks.push($(this).attr("href"))});
				if(!elementsLinks.length) return;

				var selectIndex = elementsLinks.indexOf($selectedElement.attr("href"));
				if(selectIndex != -1)
					{
					if(keyCode == 40) selectIndex++;
					if(keyCode == 38) selectIndex--;
					}
				if(!elementsLinks[selectIndex])
					{
					if(keyCode == 40) selectIndex = 0;
					if(keyCode == 38) selectIndex = elementsLinks.length - 1;
					}

				$seacrhResultBlock.find('a[href="'+elementsLinks[selectIndex]+'"]').addClass("selected");
				this.selectionStart = this.value.length;
				}
			/* ------------------------------------------- */
			/* ------------------ submit ----------------- */
			/* ------------------------------------------- */
			if(keyCode == 13)
				{
				if($selectedElement.length) $selectedElement[0].click();
				else if($(this).val())      $(this).submitForm();
				}
			});
	});