<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/* -------------------------------------------------------------------- */
/* ---------------------- auth/registration form ---------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["AUTH"]) || count($arResult["REGISTER"])):?>
<div id="av-auth-mobile-guest-bar" class="av-auth-form-call-button">
	<img
		src="<?=$this->GetFolder()?>/images/user_default_icon.png"
		alt="<?=GetMessage("AV_AUTH_MOBILE_LOGIN_TITLE")?>"
		title="<?=GetMessage("AV_AUTH_MOBILE_LOGIN_TITLE")?>"
	>
	<span><?=GetMessage("AV_AUTH_MOBILE_LOGIN_TEXT")?></span>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- logined bar --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["LOGINED"])):?>
<div id="av-auth-mobile-user-panel">
	<img
		src="<?=$arResult["LOGINED"]["USER_PHOTO"] ? $arResult["LOGINED"]["USER_PHOTO"] : $this->GetFolder().'/images/user_default_icon.png'?>"
		alt="<?=$arResult["LOGINED"]["USER_NAME"]?>"
		title="<?=$arResult["LOGINED"]["USER_NAME"]?>"
	>
	<span><?=$arResult["LOGINED"]["USER_NAME"]?></span>
	<div></div>
</div>

<form id="av-auth-mobile-user-menu">
	<input type="hidden" name="logout" value="yes">
	<?if($arParams["PROFILE_URL"]):?>
	<a class="menu-item profile" href="<?=$arParams["PROFILE_URL"]?>"><?=GetMessage("AV_AUTH_MOBILE_PROFILE_LINK")?></a>
	<?endif?>

	<?if($arParams["BASKET_URL"]):?>
	<a class="menu-item basket" href="<?=$arParams["BASKET_URL"]?>"><?=GetMessage("AV_AUTH_MOBILE_BASKET_LINK")?></a>
	<?endif?>

	<button class="menu-item logout" name="logout_butt"><?=GetMessage("AV_AUTH_MOBILE_LOGOUT_BUTTON")?></button>
</form>
<?endif?>