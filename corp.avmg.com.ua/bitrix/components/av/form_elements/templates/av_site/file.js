/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameFAV     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameFAV     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueFAV    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueFAV    = function(value) {};
	jQuery.fn.getFormElememtRequiredFAV = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredFAV = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertFAV    = function()      {return this.hasClass("alert")};
	jQuery.fn.setFormElememtAlertFAV = function(value)
		{
		if(value == 'on')  this.addClass("alert");
		if(value == 'off') this.removeClass("alert");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av_site", "file", "getFormElememtName",     "getFormElememtNameFAV");
SetFormElementsFunction("av_site", "file", "setFormElememtName",     "setFormElememtNameFAV");
SetFormElementsFunction("av_site", "file", "getFormElememtValue",    "getFormElememtValueFAV");
SetFormElementsFunction("av_site", "file", "setFormElememtValue",    "setFormElememtValueFAV");
SetFormElementsFunction("av_site", "file", "getFormElememtRequired", "getFormElememtRequiredFAV");
SetFormElementsFunction("av_site", "file", "setFormElememtRequired", "setFormElememtRequiredFAV");
SetFormElementsFunction("av_site", "file", "getFormElememtAlert",    "getFormElememtAlertFAV");
SetFormElementsFunction("av_site", "file", "setFormElememtAlert",    "setFormElememtAlertFAV");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-form-elements-av_site-file label', function()
			{
			$(this).closest('.av-form-elements-av_site-file').find('input').click();
			})
		.on("change", '.av-form-elements-av_site-file input', function()
			{
			var
				value       = $(this).val(),
				$inputBlock = $(this).closest('.av-form-elements-av_site-file');

			if(value)
				$inputBlock
					.addClass("active")
					.append('<span class="clear-value"></span>')
					.find('label').text(value.split('\\').pop());
			else
				{
				$inputBlock.removeClass("active").find('.clear-value').remove();
				$inputBlock.find('label').text($inputBlock.attr("data-default-value"));
				}
			})
		.on("vclick", '.av-form-elements-av_site-file .clear-value', function()
			{
			var $inputBlock = $(this).closest('.av-form-elements-av_site-file');

			$(this).remove();
			$inputBlock
				.find('input').val('');
			$inputBlock
				.removeClass("active")
				.find('label').text($inputBlock.attr("data-default-value"));
			});
	});