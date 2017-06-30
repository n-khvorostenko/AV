/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormElementsSelectDiactivate()
	{
	$('.av-form-elements-styled-select')
		.removeClass("active")
		.children('ul').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-form-elements-styled-select ul").mCustomScrollbar({"theme": "dark"});

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-elements-styled-select .title', function()
			{
			var
				$select      = $(this).closest('.av-form-elements-styled-select'),
				$optionsList = $select.find('.list');

			if($optionsList.is(':visible'))
				AvFormElementsSelectDiactivate();
			else
				{
				AvFormElementsSelectDiactivate();
				$select.addClass("active");
				$optionsList
					.css("width", $select[0].getBoundingClientRect().width)
					.slideDown()
					.focus();
				}
			})
		/* ------------------------------------------- */
		/* --------------- check value --------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-elements-styled-select .list li', function()
			{
			var
				$selectedElement = $(this),
				$styledSelect    = $selectedElement.closest('.av-form-elements-styled-select'),
				$nativeSelect    = $styledSelect.prev('.av-form-elements-select');

			$nativeSelect
				.find('option').removeAttr("selected");
			$selectedElement.find('.list')
				.hide()
				.find('li').removeClass("selected");
			$styledSelect
				.find('.title > *:nth-child(1)').text($selectedElement.text());
			$selectedElement
				.addClass("selected");
			$nativeSelect
				.find('option[value="'+$selectedElement.attr("data-list-value")+'"]').attr("selected", true)
				.trigger('change');
			AvFormElementsSelectDiactivate();
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest('.av-form-elements-styled-select').length)
				AvFormElementsSelectDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormElementsSelectDiactivate();
			});
	});