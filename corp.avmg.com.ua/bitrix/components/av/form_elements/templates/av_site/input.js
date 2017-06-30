/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameIAV     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameIAV     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueIAV    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueIAV    = function(value) {this.find('input').attr("value", value).val(value)};
	jQuery.fn.getFormElememtRequiredIAV = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredIAV = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertIAV    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertIAV    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_site", "input", "getFormElememtName",     "getFormElememtNameIAV");
SetFormElementsFunction("av_site", "input", "setFormElememtName",     "setFormElememtNameIAV");
SetFormElementsFunction("av_site", "input", "getFormElememtValue",    "getFormElememtValueIAV");
SetFormElementsFunction("av_site", "input", "setFormElememtValue",    "setFormElememtValueIAV");
SetFormElementsFunction("av_site", "input", "getFormElememtRequired", "getFormElememtRequiredIAV");
SetFormElementsFunction("av_site", "input", "setFormElememtRequired", "setFormElememtRequiredIAV");
SetFormElementsFunction("av_site", "input", "getFormElememtAlert",    "getFormElememtAlertIAV");
SetFormElementsFunction("av_site", "input", "setFormElememtAlert",    "setFormElememtAlertIAV");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-form-elements-av_site-input label', function()
			{
			$(this).next('input').focus();
			})
		.on("focus", '.av-form-elements-av_site-input input', function()
			{
			$(this).closest('.av-form-elements-av_site-input').addClass("active");
			})
		.on("focusout", '.av-form-elements-av_site-input input', function()
			{
			if(!$(this).val())
				$(this).closest('.av-form-elements-av_site-input').removeClass("active");
			});
	});