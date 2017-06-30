$(function()
	{
	$(document)
		.on("vclick", function()
			{
			var $callButton = $('#av-auth-mobile-guest-bar');
			if($callButton.isClicked())
				{
				GetAvAuthForm().activateAvAuthForm();
				$callButton.addClass("active");
				}
			else
				$callButton.removeClass("active");
			})
		.on("vclick", '#av-auth-mobile-user-panel', function()
			{
			var $userMenu = $('#av-auth-mobile-user-menu');
			if($userMenu.is(':visible')) {$(this).removeClass("active");$userMenu.slideUp()}
			else                         {$(this).addClass("active");   $userMenu.slideDown()}
			});
	});