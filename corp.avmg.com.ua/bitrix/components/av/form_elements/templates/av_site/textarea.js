/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameTAV     = function()      {return this.find('textarea').attr("name")};
	jQuery.fn.setFormElememtNameTAV     = function(value) {this.find('textarea').attr("name", value)};
	jQuery.fn.getFormElememtValueTAV    = function()      {return this.find('textarea').text()};
	jQuery.fn.setFormElememtValueTAV    = function(value) {this.find('textarea').text(value).val(value)};
	jQuery.fn.getFormElememtRequiredTAV = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredTAV = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertTAV    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertTAV    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_site", "textarea", "getFormElememtName",     "getFormElememtNameTAV");
SetFormElementsFunction("av_site", "textarea", "setFormElememtName",     "setFormElememtNameTAV");
SetFormElementsFunction("av_site", "textarea", "getFormElememtValue",    "getFormElememtValueTAV");
SetFormElementsFunction("av_site", "textarea", "setFormElememtValue",    "setFormElememtValueTAV");
SetFormElementsFunction("av_site", "textarea", "getFormElememtRequired", "getFormElememtRequiredTAV");
SetFormElementsFunction("av_site", "textarea", "setFormElememtRequired", "setFormElememtRequiredTAV");
SetFormElementsFunction("av_site", "textarea", "getFormElememtAlert",    "getFormElememtAlertTAV");
SetFormElementsFunction("av_site", "textarea", "setFormElememtAlert",    "setFormElememtAlertTAV");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-form-elements-av_site-textarea label', function()
			{
			$(this).next('textarea').focus();
			})
		.on("focus", '.av-form-elements-av_site-textarea textarea', function()
			{
			$(this).closest('.av-form-elements-av_site-textarea').addClass("active");
			})
		.on("focusout", '.av-form-elements-av_site-textarea textarea', function()
			{
			if(!$(this).val())
				$(this).closest('.av-form-elements-av_site-textarea').removeClass("active");
			});
	});