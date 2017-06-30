/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameRBAV  = function()      {return this.find('input:first-child').attr("name")};
	jQuery.fn.setFormElememtNameRBAV  = function(value) {this.find('input').each(function() {$(this).attr("name", value)})};
	jQuery.fn.getFormElememtValueRBAV = function()
		{
		var $checkedElement = this.find('input[checked]');
		if(!$checkedElement.length)        return false;
		if(!$checkedElement.attr("value")) return true;
		else                               return $checkedElement.attr("value");
		};
	jQuery.fn.setFormElememtValueRBAV = function(value)
		{
		this.find('input')                   .removeAttr('checked');
		this.find('input[value="'+value+'"]').attr("checked", true);
		};
	jQuery.fn.getFormElememtRequiredRBAV = function()   {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredRBAV = function(value)
		{
		if(value == 'on')       this.addClass("required");
		else if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertRBAV = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertRBAV = function(value)
		{
		if(value == 'on')       this.addClass("alert-input");
		else if(value == 'off') this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_site", "radio", "getFormElememtName",     "getFormElememtNameRBAV");
SetFormElementsFunction("av_site", "radio", "setFormElememtName",     "setFormElememtNameRBAV");
SetFormElementsFunction("av_site", "radio", "getFormElememtValue",    "getFormElememtValueRBAV");
SetFormElementsFunction("av_site", "radio", "setFormElememtValue",    "setFormElememtValueRBAV");
SetFormElementsFunction("av_site", "radio", "getFormElememtRequired", "getFormElememtRequiredRBAV");
SetFormElementsFunction("av_site", "radio", "setFormElememtRequired", "setFormElememtRequiredRBAV");
SetFormElementsFunction("av_site", "radio", "getFormElememtAlert",    "getFormElememtAlertRBAV");
SetFormElementsFunction("av_site", "radio", "setFormElememtAlert",    "setFormElememtAlertRBAV");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document).on("vclick", '.av-form-elements-av_site-radio > span label', function()
		{
		$(this).closest('.av-form-elements-av_site-radio')
			.trigger("change")
			.removeClass("alert-input")
			.find('input').removeAttr("checked");
		$(this).parent().find('input').attr("checked", true);
		});
	});