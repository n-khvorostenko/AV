/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameInputAvCorp     = function()      {return this.find('input').attr("name")};
	jQuery.fn.setFormElememtNameInputAvCorp     = function(value) {this.find('input').attr("name", value)};
	jQuery.fn.getFormElememtValueInputAvCorp    = function()      {return this.find('input').val()};
	jQuery.fn.setFormElememtValueInputAvCorp    = function(value)
		{
		this.find('input').attr("value", value).val(value);
		this.behaviorFormElememtInputAvCorp();
		};
	jQuery.fn.getFormElememtRequiredInputAvCorp = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredInputAvCorp = function(value)
		{
		if(value == 'on')  this.addClass("required");
		if(value == 'off') this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertInputAvCorp    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertInputAvCorp    = function(value)
		{
		if(value == 'on')  this.addClass("alert-input");
		if(value == 'off') this.removeClass("alert-input");
		};
	jQuery.fn.behaviorFormElememtInputAvCorp    = function(value)
		{
		var
			$input       = this.find('input'),
			$placeholder = this.find('label');
		if(!$placeholder.length) return;

		if($input.val() || value == 'on')
			{
			$input.show();
			$placeholder.hide();
			}
		else
			{
			$input.hide();
			$placeholder.show();
			}
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av", "input", "getFormElememtName",     "getFormElememtNameInputAvCorp");
SetFormElementsFunction("av", "input", "setFormElememtName",     "setFormElememtNameInputAvCorp");
SetFormElementsFunction("av", "input", "getFormElememtValue",    "getFormElememtValueInputAvCorp");
SetFormElementsFunction("av", "input", "setFormElememtValue",    "setFormElememtValueInputAvCorp");
SetFormElementsFunction("av", "input", "getFormElememtRequired", "getFormElememtRequiredInputAvCorp");
SetFormElementsFunction("av", "input", "setFormElememtRequired", "setFormElememtRequiredInputAvCorp");
SetFormElementsFunction("av", "input", "getFormElememtAlert",    "getFormElememtAlertInputAvCorp");
SetFormElementsFunction("av", "input", "setFormElememtAlert",    "setFormElememtAlertInputAvCorp");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	SetFormElementsCurrentLibrary("av");
	$(document)
		.on("vclick",   '.av-form-input',       function() {$(this).parent().find('input').focus()})
		.on("focus",    '.av-form-input input', function() {$(this).parent().addClass("active")   .behaviorFormElememtInputAvCorp("on")})
		.on("focusout", '.av-form-input input', function() {$(this).parent().removeClass("active").behaviorFormElememtInputAvCorp()});
	});