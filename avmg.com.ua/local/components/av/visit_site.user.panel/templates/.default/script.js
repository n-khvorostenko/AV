/* -------------------------------------------------------------------- */
/* ----------------------------- functions ---------------------------- */
/* -------------------------------------------------------------------- */
function GetAvAuthFormCallButton() {return $('#av-auth-guest-bar')}
function GetAvAuthForm()           {return $('#av-auth-guest-form')}
function GetAvUserMenuCallButton() {return $('#av-auth-user-panel')}
function GetAvUserMenu()           {return $('#av-auth-user-menu')}
/* -------------------------------------------------------------------- */
/* ----------------------------- methods ------------------------------ */
/* -------------------------------------------------------------------- */
(function($)
	{
	/* ------------------------------------------- */
	/* ---------- auth/registration form --------- */
	/* ------------------------------------------- */
	jQuery.fn.activateAvAuthForm = function()
		{
		GetAvAuthFormCallButton().addClass("active");
		AvBlurScreen("on", 1000);
		return this.show().positionCenter(1100);
		};
	jQuery.fn.diactivateAvAuthForm = function()
		{
		if(!this.is(':visible')) return this;
		GetAvAuthFormCallButton().removeClass("active");
		AvBlurScreen("off");
		return this.hide();
		};
	jQuery.fn.changeAvAuthFormTab = function(tab)
		{
		var $menu = this.find('.form-menu');
		if(!tab) return;

		$menu.find('li')  .removeClass("active");
		this .find('form').removeClass("active");

		$menu.find('li.'+tab)  .addClass("active");
		this .find('form.'+tab).addClass("active");

		return this;
		};
	/* ------------------------------------------- */
	/* ---------------- user menu ---------------- */
	/* ------------------------------------------- */
	jQuery.fn.activateAvUserMenu = function()
		{
		GetAvUserMenuCallButton().addClass("active");
		return this.positionAvUserMenu();
		};
	jQuery.fn.positionAvUserMenu = function()
		{
		var
			$callButton     = GetAvUserMenuCallButton(),
			callButtonWidth = $callButton.width();

		return this
			.css
				({
				"position": 'absolute',
				"top"     : $callButton.offset().top + $callButton.height(),
				"left"    : $callButton.offset().left,
				"width"   : callButtonWidth >= 170 ? callButtonWidth : 170,
				"z-index" : 300
				})
			.slideDown();
		};
	jQuery.fn.diactivateAvUserMenu = function(type)
		{
		if(!this.is(':visible')) return this;
		GetAvUserMenuCallButton().removeClass("active");
		if(type == 'fast') return this.hide();
		else               return this.slideUp();
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	/* ------------------------------------------- */
	/* ---------------- variables ---------------- */
	/* ------------------------------------------- */
	var
		$avAuthForm           = GetAvAuthForm(),
		$avUserMenu           = GetAvUserMenu(),
		$avAuthFormAlertPopup = $();
	/* ------------------------------------------- */
	/* -------------- dom changings -------------- */
	/* ------------------------------------------- */
	SetFormElementsCurrentLibrary("av_site");
	$('body')
		.append(GetAvAuthForm().remove())
		.append(GetAvUserMenu().remove());
	/* ------------------------------------------- */
	/* ---------------- handlers ----------------- */
	/* ------------------------------------------- */
	$avAuthForm
		.on("vclick", '.form-menu li.auth',     function() {$avAuthForm.changeAvAuthFormTab("auth")    .positionCenter()})
		.on("vclick", '.form-menu li.register', function() {$avAuthForm.changeAvAuthFormTab("register").positionCenter()})
		.on("vclick", '.close-form-button',     function() {$avAuthForm.diactivateAvAuthForm()})
		.on("submit", 'form',                   function()
			{
			if(!$(this).closest('form').checkFormValidation())
				{
				$avAuthFormAlertPopup = CreateAvAlertPopup(BX.message("AV_REGISTER_FORM_VALIDATION_ERROR"), "alert").positionCenter(1200);
				return false;
				}
			else
				AvWaitingScreen("on");
			});
	/* ------------------------------------------- */
	/* --------- scroll/resize hide/show --------- */
	/* ------------------------------------------- */
	$(window)
		.scroll(function()
			{
			$avUserMenu.diactivateAvUserMenu("fast");
			})
		.resize(function()
			{
			if($avAuthForm.is(':visible'))      $avAuthForm.positionCenter();
			else if($avUserMenu.is(':visible')) $avUserMenu.diactivateAvUserMenu("fast");
			$avAuthFormAlertPopup.positionCenter();
			});

	$(document)
		.on("vclick", function()
			{
			if($('.av-auth-form-call-button').isClicked())                          $avAuthForm.activateAvAuthForm();
			else if(!$avAuthForm.isClicked() && !$avAuthFormAlertPopup.isClicked()) $avAuthForm.diactivateAvAuthForm();

			if(GetAvUserMenuCallButton().isClicked())
				{
				if(!$avUserMenu.is(':visible')) $avUserMenu.activateAvUserMenu();
				else                            $avUserMenu.diactivateAvUserMenu();
				}
			else if(!$avUserMenu.isClicked())
				$avUserMenu.diactivateAvUserMenu();

			if(!$avAuthFormAlertPopup.isClicked() && !$avAuthForm.find('form button').isClicked())
				$avAuthFormAlertPopup.remove();
			});
	});