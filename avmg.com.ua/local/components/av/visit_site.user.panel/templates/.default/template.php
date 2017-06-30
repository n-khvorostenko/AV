<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CJSCore::Init(["av_form_elements"]);
$APPLICATION->AddHeadScript('https://www.google.com/recaptcha/api.js');
/* -------------------------------------------------------------------- */
/* ---------------------- auth/registration form ---------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["AUTH"]) || count($arResult["REGISTER"])):?>
<?
$formTabActive = 'auth';
if (count($arResult["REGISTER"]["ERRORS"]) && !count($arResult["AUTH"]["ERRORS"])) $formTabActive = 'register';
/* ------------------------------------------- */
/* -------------- call form bar -------------- */
/* ------------------------------------------- */
?>
<div id="av-auth-guest-bar" class="av-auth-form-call-button">
	<img
		src="<?=$this->GetFolder()?>/images/user_default_icon.png"
		alt="<?=GetMessage("AV_AUTH_LOGIN_TITLE")?>"
		title="<?=GetMessage("AV_AUTH_LOGIN_TITLE")?>"
	>
	<?=GetMessage("AV_AUTH_LOGIN_LINK")?>
</div>
<?
/* ------------------------------------------- */
/* ------------------ form ------------------- */
/* ------------------------------------------- */
?>
<div id="av-auth-guest-form">
	<?
	/* ---------------------------- */
	/* ----------- menu ----------- */
	/* ---------------------------- */
	?>
	<ul class="form-menu">
		<?if(count($arResult["AUTH"])):?>
		<li class="auth<?if($formTabActive == 'auth'):?> active<?endif?>">
			<?=GetMessage("AV_AUTH_GUEST_FORM_MENU_LOGIN")?>
		</li>
		<?endif?>

		<?if(count($arResult["REGISTER"])):?>
		<li class="register<?if($formTabActive == 'register'):?> active<?endif?>">
			<?=GetMessage("AV_AUTH_GUEST_FORM_MENU_REGISTRATION")?>
		</li>
		<?endif?>
	</ul>
	<div class="close-form-button"></div>
	<?
	/* ---------------------------- */
	/* --------- auth form -------- */
	/* ---------------------------- */
	?>
	<?if(count($arResult["AUTH"])):?>
	<form
		name="<?=$arResult["AUTH"]["FORM_NAME"]?>"
		method="post"
		class="auth<?if($formTabActive == 'auth'):?> active<?endif?>"
	>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="AUTH">

		<?if(count($arResult["AUTH"]["ERRORS"])):?>
		<div class="errors-block">
			<?=implode('<br>', $arResult["AUTH"]["ERRORS"])?>
		</div>
		<?endif?>

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"     => 'input',
				"NAME"     => $arResult["AUTH"]["FORM_FIELDS"]["LOGIN"]["INPUT_NAME"],
				"VALUE"    => $arResult["AUTH"]["FORM_FIELDS"]["LOGIN"]["VALUE"],
				"TITLE"    => $arResult["AUTH"]["FORM_FIELDS"]["LOGIN"]["TITLE"],
				"REQUIRED" => 'Y'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"     => 'password',
				"NAME"     => $arResult["AUTH"]["FORM_FIELDS"]["PASS"]["INPUT_NAME"],
				"TITLE"    => $arResult["AUTH"]["FORM_FIELDS"]["PASS"]["TITLE"],
				"REQUIRED" => 'Y'
				]
			);
		?>

		<?if($arResult["AUTH"]["STORE_PASSWORD"]):?>
		<div class="remember-me-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"  => 'checkbox',
					"NAME"  => $arResult["AUTH"]["FORM_FIELDS"]["REMEMBER_ME"]["INPUT_NAME"],
					"TITLE" => GetMessage("AV_AUTH_GUEST_FORM_REMEMBER_ME")
					]
				);
			?>
		</div>
		<?endif?>

		<?if($arParams["FORGOT_PASSWORD_URL"]):?>
		<a href="<?=$arParams["FORGOT_PASSWORD_URL"]?>" rel="nofollow">
			<?=GetMessage("AV_AUTH_GUEST_FORM_FORGOTE_PASS")?>
		</a>
		<?endif?>

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"  => 'button',
				"NAME"  => $arResult["AUTH"]["SUBMIT_BUTTON_NAME"],
				"TITLE" => GetMessage("AV_AUTH_GUEST_FORM_SUBMIT")
				]
			);
		?>

		<?if(count($arResult["AUTH"]["SOC_SERVICES"])):?>
		<div class="soc-services-block">
			<div class="title"><?=GetMessage("AV_AUTH_GUEST_FORM_SOC_SERVICES_TITLE")?></div>
			<?$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "av", ["AUTH_SERVICES"  => $arResult["AUTH"]["SOC_SERVICES"]])?>
		</div>
		<?endif?>
	</form>
	<?endif?>
	<?
	/* ---------------------------- */
	/* ------- registration ------- */
	/* ---------------------------- */
	?>
	<?if(count($arResult["REGISTER"])):?>
	<form
		name="<?=$arResult["REGISTER"]["FORM_NAME"]?>"
		enctype="multipart/form-data"
		method="post"
		class="register<?if($formTabActive == 'register'):?> active<?endif?>"
	>
		<?if(count($arResult["REGISTER"]["ERRORS"])):?>
		<div class="errors-block">
			<?=implode('<br>', $arResult["REGISTER"]["ERRORS"])?>
		</div>
		<?endif?>

		<?foreach($arResult["REGISTER"]["FORM_FIELDS"] as $field => $fieldArray):?>
			<?
			$componentParams =
				[
				"TYPE"     => 'input',
				"NAME"     => $fieldArray["INPUT_NAME"],
				"VALUE"    => $fieldArray["VALUE"],
				"TITLE"    => $fieldArray["TITLE"],
				"REQUIRED" => $fieldArray["REQUIRED"]
				];

			switch($field)
				{
				case"PASSWORD":
				case"CONFIRM_PASSWORD":
					$componentParams["TYPE"]     = 'password';
					$componentParams["REQUIRED"] = 'Y';
					break;
				case"PERSONAL_MOBILE":
					$componentParams["TYPE"] = 'phone';
					break;
				}

			$APPLICATION->IncludeComponent("av:form_elements", "av_site", $componentParams);
			?>
		<?endforeach?>

		<?if($arResult["REGISTER"]["RECAPTCHA_SITEKEY"]):?>
		<div data-sitekey="<?=$arResult["REGISTER"]["RECAPTCHA_SITEKEY"]?>" class="g-recaptcha captcha-block"></div>
		<?endif?>

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"  => 'button',
				"NAME"  => $arResult["REGISTER"]["SUBMIT_BUTTON_NAME"],
				"TITLE" => GetMessage("AV_AUTH_GUEST_FORM_REGISTER")
				]
			);
		?>
	</form>
	<?endif?>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- logined bar --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["LOGINED"])):?>
<div id="av-auth-user-panel">
	<img
		src="<?=$arResult["LOGINED"]["USER_PHOTO"] ? $arResult["LOGINED"]["USER_PHOTO"] : $this->GetFolder().'/images/user_default_icon.png'?>"
		alt="<?=$arResult["LOGINED"]["USER_NAME"]?>"
		title="<?=$arResult["LOGINED"]["USER_NAME"]?>"
	>
	<span><?=$arResult["LOGINED"]["USER_NAME"]?></span>
	<div></div>
</div>

<form id="av-auth-user-menu">
	<input type="hidden" name="logout" value="yes">
	<?if($arParams["PROFILE_URL"]):?>
	<a class="menu-item profile" href="<?=$arParams["PROFILE_URL"]?>" rel="nofollow">
		<?=GetMessage("AV_AUTH_LOGINED_PROFILE_LINK")?>
	</a>
	<?endif?>

	<?if($arParams["BASKET_URL"]):?>
	<a class="menu-item basket" href="<?=$arParams["BASKET_URL"]?>" rel="nofollow">
		<?=GetMessage("AV_AUTH_LOGINED_BASKET_LINK")?>
	</a>
	<?endif?>

	<button class="menu-item logout" name="logout_butt"><?=GetMessage("AV_AUTH_LOGINED_LOGOUT_BUTTON")?></button>
</form>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_REGISTER_FORM_VALIDATION_ERROR": '<?=GetMessage("AV_AUTH_REGISTER_FORM_SUBMIT_ERROR")?>'});

	<?if($arResult["REGISTER"]["CONFIRM_EMAIL_SENDED"]):?>
	AvBlurScreen("on", 1000);
	var $avRegisterOkPopup =
		CreateAvAlertPopup('<?=GetMessage("AV_AUTH_REGISTER_FORM_SUCCESS")?>', "ok")
			.css("position", 'fixed')
			.positionCenter(1200)
			.on("remove", function() {AvBlurScreen("off")});

	$(document)
		.on("vclick", function()
			{
			if(!$avRegisterOkPopup.isClicked())
				$avRegisterOkPopup.remove();
			});
	$(window)
		.resize(function()
			{
			$avRegisterOkPopup.positionCenter();
			});
	<?endif?>

	<?if(count($arResult["AUTH"]["ERRORS"]) || count($arResult["REGISTER"]["ERRORS"])):?>
	GetAvAuthForm().activateAvAuthForm();
	<?endif?>
</script>