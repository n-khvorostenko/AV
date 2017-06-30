/* -------------------------------------------------------------------- */
/* -------------------- diactivate select function -------------------- */
/* -------------------------------------------------------------------- */
function AvFormElementsAvSiteAltSelectDiactivate()
	{
	$('.av-form-elements-av_site_alt-select')
		.removeClass("active")
		.children('.list').slideUp();
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-form-elements-av_site_alt-select .list").mCustomScrollbar({"theme": "dark"});

	$(document)
		/* ------------------------------------------- */
		/* ------------ select drop down ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-form-elements-av_site_alt-select .title', function()
			{
			var
				$select      = $(this).closest('.av-form-elements-av_site_alt-select'),
				$optionsList = $select.find('.list');

			if($optionsList.is(':visible'))
				AvFormElementsAvSiteAltSelectDiactivate();
			else
				{
				AvFormElementsAvSiteAltSelectDiactivate();
				$select.addClass("active");
				$optionsList
					.css("width", $select[0].getBoundingClientRect().width)
					.slideDown()
					.focus();
				}
			})
		/* ------------------------------------------- */
		/* -------------- hide selector -------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			if(!$(event.target).closest('.av-form-elements-av_site_alt-select').length)
				AvFormElementsAvSiteAltSelectDiactivate();
			});

	$(window)
		.resize(function()
			{
			AvFormElementsAvSiteAltSelectDiactivate();
			});
	});