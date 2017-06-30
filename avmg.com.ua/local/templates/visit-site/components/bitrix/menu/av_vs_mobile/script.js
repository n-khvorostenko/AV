/* -------------------------------------------------------------------- */
/* ------------------- mobile menu behavior function ------------------ */
/* -------------------------------------------------------------------- */
function AvMenuMobileBehavior(workType)
	{
	var
		$menu       = $('.av-menu-mobile'),
		$callButton = $('.av-menu-mobile-call-button');

	if(!workType)
		{
		if($menu.is(':visible')) workType = 'diactivate';
		else                     workType = 'activate';
		}
	if(workType == 'activate')
		{
		$callButton.addClass("active");
		AvMenuMobilePosition();
		$menu.slideDown();
		}
	if(workType == 'diactivate')
		$menu.slideUp
			(
			"slow",
			function() {$callButton.removeClass("active")}
			);
	}
/* -------------------------------------------------------------------- */
/* ------------------- mobile menu position function ------------------ */
/* -------------------------------------------------------------------- */
function AvMenuMobilePosition()
	{
	var $callButton = $('.av-menu-mobile-call-button');
	$('.av-menu-mobile').css
		({
		"top" : $callButton.offset().top  + $callButton.height(),
		"left": 0
		});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$('body').append($('.av-menu-mobile').remove());

	$(document)
		.on("hide", '.av-menu-mobile-call-button', function()
			{
			AvMenuMobileBehavior("diactivate");
			})
		.on("vclick", '.av-menu-mobile-call-button', function()
			{
			AvMenuMobileBehavior();
			})
		.on("vclick", '.av-menu-mobile .open-child-menu', function()
			{
			var $subMenu = $(this).parent().children('ul');
			if($subMenu.is(':visible')) {$(this).removeClass("active");$subMenu.slideUp();}
			else                        {$(this).addClass("active");   $subMenu.slideDown();}
			});

	$(window)
		.scroll(function()
			{
			var
				$menu            = $('.av-menu-mobile'),
				$callButton      = $('.av-menu-mobile-call-button'),
				callButtonBottom = $callButton.offset().top + $callButton.height() + 15;

			if(!$menu.is(':visible') || $menu.offset().top < callButtonBottom) return;
			AvMenuMobilePosition();
			setTimeout(function() {AvMenuMobilePosition()}, 1000);
			})
		.resize(function()
			{
			if($('.av-menu-mobile-call-button').is(':visible')) AvMenuMobilePosition();
			else                                                AvMenuMobileBehavior("diactivate");
			});
	});