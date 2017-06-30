/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSCorp     = function()      {return this.attr("name")};
	jQuery.fn.setFormElememtNameSCorp     = function(value) {this.attr("name", value)};
	jQuery.fn.getFormElememtValueSCorp    = function()      {return this.children('option[selected]').attr("value")};
	jQuery.fn.setFormElememtValueSCorp    = function(value)
		{
		this.children('option')                   .removeAttr("selected");
		this.children('option[value="'+value+'"]').attr("selected", true);
		};
	jQuery.fn.getFormElememtRequiredSCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSCorp    = function()      {return this.next('.av-form-elements-corp-styled-select').hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSCorp    = function(value)
		{
		if(value == 'on')  this.next('.av-form-elements-corp-styled-select').addClass("alert-input");
		if(value == 'off') this.next('.av-form-elements-corp-styled-select').removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("corp", "select", "getFormElememtName",     "getFormElememtNameSCorp");
SetFormElementsFunction("corp", "select", "setFormElememtName",     "setFormElememtNameSCorp");
SetFormElementsFunction("corp", "select", "getFormElememtValue",    "getFormElememtValueSCorp");
SetFormElementsFunction("corp", "select", "setFormElememtValue",    "setFormElememtValueSCorp");
SetFormElementsFunction("corp", "select", "getFormElememtRequired", "getFormElememtRequiredSCorp");
SetFormElementsFunction("corp", "select", "setFormElememtRequired", "setFormElememtRequiredSCorp");
SetFormElementsFunction("corp", "select", "getFormElememtAlert",    "getFormElememtAlertSCorp");
SetFormElementsFunction("corp", "select", "setFormElememtAlert",    "setFormElememtAlertSCorp");
/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormElementsCorpSelectDiactivate()
	{
	$('.av-form-elements-corp-styled-select')
		.removeClass("active")
		.children('ul').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-form-elements-corp-styled-select ul").mCustomScrollbar({"theme": "dark"});

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-elements-corp-styled-select:not(.disabled) > [title]', function()
			{
			var
				$select      = $(this).closest('.av-form-elements-corp-styled-select'),
				$optionsList = $select.find('.list');

			if($optionsList.is(':visible'))
				AvFormElementsCorpSelectDiactivate();
			else
				{
				AvFormElementsCorpSelectDiactivate();
				$select.addClass("active");
				$optionsList
					.css("width", $(this)[0].getBoundingClientRect().width - 1)
					.slideDown()
					.focus();
				}
			})
		/* ------------------------------------------- */
		/* --------------- check value --------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-elements-corp-styled-select:not(.disabled) .list li', function()
			{
			var
				$selectedElement = $(this),
				$styledSelect    = $selectedElement.closest('.av-form-elements-corp-styled-select'),
				$nativeSelect    = $styledSelect.prev('.av-form-elements-corp-select');

			$nativeSelect
				.find('option').removeAttr("selected");
			$styledSelect.find('.list')
				.find('li').removeClass("selected");

			$styledSelect
				.find('[title] > *:nth-child(1)').text($selectedElement.text());
			$selectedElement
				.addClass("selected");

			$nativeSelect
				.find('option[value="'+$selectedElement.attr("data-list-value")+'"]').attr("selected", true)
				.trigger('change');
			AvFormElementsCorpSelectDiactivate();
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest('.av-form-elements-corp-styled-select').length)
				AvFormElementsCorpSelectDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormElementsCorpSelectDiactivate();
			});
	});