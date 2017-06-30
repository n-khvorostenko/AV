$(function()
	{
	$(document)
		/* -------------------------------------------------------------------- */
		/* ----------------------- input focus/focusout ----------------------- */
		/* -------------------------------------------------------------------- */
		.on("vclick", '.av-form-elements-iblock-element-search .input-label', function()
			{
			$(this).children('input').focus();
			})
		.on("focus", '.av-form-elements-iblock-element-search .input-label > input', function()
			{
			var $seacrhResultBlock = $(this).closest('.av-form-elements-iblock-element-search').children('ul');

			$(this)
				.show()
				.controlFormSubmit("off")
				.parent()
					.addClass("active")
					.children('.placeholder').hide();

			if($seacrhResultBlock.children().length) $seacrhResultBlock.slideDown();
			})
		.on("focusout", '.av-form-elements-iblock-element-search .input-label > input', function()
			{
			$(this)
				.controlFormSubmit("on")
				.parent()
					.removeClass("active")
					.closest('.av-form-elements-iblock-element-search').children('ul')
						.slideUp()
						.children('li').removeClass("selected");

			if(!$(this).val())
				$(this)
					.hide()
					.parent().children('.placeholder').show();
			})
		/* -------------------------------------------------------------------- */
		/* --------------------------- input keyup ---------------------------- */
		/* -------------------------------------------------------------------- */
		.on("keyup", '.av-form-elements-iblock-element-search .input-label > input', function(event)
			{
			var
				$searchField       = $(this),
				keyCode            = event.keyCode,
				$inputBlock        = $searchField.closest('.av-form-elements-iblock-element-search'),
				$seacrhResultBlock = $inputBlock.children('ul'),
				$valueField        = $inputBlock.children('input'),
				$selectedElement   = $seacrhResultBlock.find('.selected'),
				elementsValue = [], selectIndex = '', $newSelectedElement = '';
			/* ------------------------------------------- */
			/* ------------- no search value ------------- */
			/* ------------------------------------------- */
			if(!$searchField.val())
				$seacrhResultBlock.slideUp().children('li').remove();
			/* ------------------------------------------- */
			/* ------------------ submit ----------------- */
			/* ------------------------------------------- */
			else if(keyCode == 13 && $valueField.attr("value"))
				$searchField.submitForm();
			/* ------------------------------------------- */
			/* ---------------- navigation --------------- */
			/* ------------------------------------------- */
			else if(keyCode == 38 || keyCode == 40)
				{
				$selectedElement.removeClass("selected");
				$seacrhResultBlock.children('li').each(function()
					{
					var value = $(this).attr("value");
					if(value) elementsValue.push(value);
					});
				if(!elementsValue.length) return;

				selectIndex = elementsValue.indexOf($selectedElement.attr("value"));
				if(selectIndex != -1)
					{
					if(keyCode == 40) selectIndex++;
					if(keyCode == 38) selectIndex--;
					}
				if(!elementsValue[selectIndex])
					{
					if(keyCode == 40) selectIndex = 0;
					if(keyCode == 38) selectIndex = elementsValue.length - 1;
					}

				$newSelectedElement = $seacrhResultBlock.find('[value="'+elementsValue[selectIndex]+'"]');
				if(!$newSelectedElement.length) return;

				$newSelectedElement.addClass("selected");
				$searchField.val($newSelectedElement.text());
				$valueField .attr("value", $newSelectedElement.attr("value"));
				}
			/* ------------------------------------------- */
			/* ------------------ search ----------------- */
			/* ------------------------------------------- */
			else if(keyCode != 37 && keyCode != 39 && keyCode != 13)
				{
				$valueField.attr("value", '');
				setTimeout(function()
					{
					var searchString = $searchField.val();
					if($searchField.attr("searching") == searchString) return;
					$searchField.attr("searching", searchString);
					$.ajax
						({
						type    : 'POST',
						url     : AvFeIblockAjaxSearch,
						data    :
							{
							"iblock_id"     : $searchField.attr("data-iblock-id"),
							"search_type"   : $searchField.attr("data-search-type"),
							"parent_section": $searchField.attr("data-parent-section"),
							"empty_value"   : $searchField.attr("data-empty-value-title"),
							"value"         : searchString
							},
						success : function(result)
							{
							$seacrhResultBlock.html(result);
							if(!$seacrhResultBlock.is(':visible'))
								$seacrhResultBlock.slideDown();
							},
						complete: function() {AvWaitingScreen("off")}
						});
					AvWaitingScreen("on");
					}, 1500);
				}
			})
		/* -------------------------------------------------------------------- */
		/* ----------------------- select item by click ----------------------- */
		/* -------------------------------------------------------------------- */
		.on("vclick", '.av-form-elements-iblock-element-search > ul li', function()
			{
			var
				value        = $(this).attr("value"),
				$inputBlock  = $(this).closest('.av-form-elements-iblock-element-search');

			if(!value) return;
			$inputBlock.children('input').attr("value", value);
			$inputBlock.find('.input-label > input').val($(this).text()).submitForm();
			});
	});