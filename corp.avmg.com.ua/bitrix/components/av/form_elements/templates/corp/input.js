/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameCorp     = function()      {return this.attr("name")};
	jQuery.fn.setFormElememtNameCorp     = function(value) {this.attr("name", value)};
	jQuery.fn.getFormElememtValueCorp    = function()      {return this.val()};
	jQuery.fn.setFormElememtValueCorp    = function(value) {this.attr("value", value).val(value)};
	jQuery.fn.getFormElememtRequiredCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("corp", "input", "getFormElememtName",     "getFormElememtNameCorp");
SetFormElementsFunction("corp", "input", "setFormElememtName",     "setFormElememtNameCorp");
SetFormElementsFunction("corp", "input", "getFormElememtValue",    "getFormElememtValueCorp");
SetFormElementsFunction("corp", "input", "setFormElememtValue",    "setFormElememtValueCorp");
SetFormElementsFunction("corp", "input", "getFormElememtRequired", "getFormElememtRequiredCorp");
SetFormElementsFunction("corp", "input", "setFormElememtRequired", "setFormElememtRequiredCorp");
SetFormElementsFunction("corp", "input", "getFormElememtAlert",    "getFormElememtAlertCorp");
SetFormElementsFunction("corp", "input", "setFormElememtAlert",    "setFormElememtAlertCorp");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-form-elements-corp-input-placeholder', function()
			{
			$(this).prev('.av-form-elements-corp-input').focus();
			})
		.on("focus", '.av-form-elements-corp-input', function()
			{
			$(this).next('.av-form-elements-corp-input-placeholder').hide();
			})
		.on("focusout", '.av-form-elements-corp-input', function()
			{
			if(!$(this).val())
				$(this).next('.av-form-elements-corp-input-placeholder').show();
			});
	});