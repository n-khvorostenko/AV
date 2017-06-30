$(function()
	{
	$(document)
		.on("vclick", '.av-menu-tablet-icons-mobile-title', function()
			{
			var $block = $('.av-menu-tablet-icons-mobile');
			if($block.is(':visible'))
				{
				$(this).removeClass("active");
				$block .slideUp();
				}
			else
				{
				$(this).addClass("active");
				$block .slideDown();
				}
			})
		.on("vclick", function()
			{
			var
				$title = $('.av-menu-tablet-icons-mobile-title'),
				$block = $('.av-menu-tablet-icons-mobile');

			if(!$title.isClicked() && !$block.isClicked())
				{
				$title.removeClass("active");
				$block.slideUp();
				}
			});

	$(window)
		.resize(function()
			{
			$('.av-menu-tablet-icons-mobile-title').removeClass("active");
			$('.av-menu-tablet-icons-mobile')      .slideUp();
			});
	});