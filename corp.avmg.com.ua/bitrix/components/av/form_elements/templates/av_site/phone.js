$(function()
	{
	$(document).on("focus", '.av-form-elements-av_site-input.phone-input:not(.active) input', function()
		{
		$(this).mask("+380(99)999-99-99").addClass("active");
		});
	});