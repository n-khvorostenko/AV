/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameCBAV     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameCBAV     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueCBAV    = function()      {return this.find('input').is('[checked]')};
	jQuery.fn.setFormElememtValueCBAV    = function(value)
		{
		if(value) this.find('input').attr("checked", true);
		else      this.find('input').removeAttr("checked");
		};
	jQuery.fn.getFormElememtRequiredCBAV = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredCBAV = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertCBAV    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertCBAV    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_site", "checkbox", "getFormElememtName",     "getFormElememtNameCBAV");
SetFormElementsFunction("av_site", "checkbox", "setFormElememtName",     "setFormElememtNameCBAV");
SetFormElementsFunction("av_site", "checkbox", "getFormElememtValue",    "getFormElememtValueCBAV");
SetFormElementsFunction("av_site", "checkbox", "setFormElememtValue",    "setFormElememtValueCBAV");
SetFormElementsFunction("av_site", "checkbox", "getFormElememtRequired", "getFormElememtRequiredCBAV");
SetFormElementsFunction("av_site", "checkbox", "setFormElememtRequired", "setFormElememtRequiredCBAV");
SetFormElementsFunction("av_site", "checkbox", "getFormElememtAlert",    "getFormElememtAlertCBAV");
SetFormElementsFunction("av_site", "checkbox", "setFormElememtAlert",    "setFormElememtAlertCBAV");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document).on("vclick", '.av-form-elements-av_site-checkbox label', function()
		{
		var
			$fullBlock = $(this).parent(),
			$input     = $fullBlock.find('input');

		if($input.is('[checked]')) $input.removeAttr("checked");
		else                       $input.attr("checked", true);
		$input.add($fullBlock).trigger("change");
		});
	});