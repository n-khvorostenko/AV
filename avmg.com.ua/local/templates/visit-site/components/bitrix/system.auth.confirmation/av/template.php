<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["av_site"]);
AvComponentsIncludings::getInstance()->setIncludings("av", "visit_site.user.panel");
?>
<div class="av-registration-confirmation">
<?
/* -------------------------------------------------------------------- */
/* -------------------------- user not found -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["MESSAGE_CODE"] == 'E01'):?>
	<div class="title"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_1_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_1_TEXT")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_REGISTRATION_LINK"),
				"ATTR"        => 'data-registration-form-link'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => '/',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_HOME_LINK")
				]
			);
		?>
	</div>
<?
/* -------------------------------------------------------------------- */
/* ---------------------- successfully authorized --------------------- */
/* -------------------------------------------------------------------- */
?>
<?elseif($arResult["MESSAGE_CODE"] == 'E02'):?>
	<div class="title"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_2_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_2_TEXT")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arParams["PROFILE_URL"],
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_PROFILE_LINK")
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => '/',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_HOME_LINK")
				]
			);
		?>
	</div>
<?
/* -------------------------------------------------------------------- */
/* -------------- user already confirm his registration --------------- */
/* -------------------------------------------------------------------- */
?>
<?elseif($arResult["MESSAGE_CODE"] == 'E03'):?>
	<div class="title"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_3_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_3_TEXT")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_LOGIN_LINK"),
				"ATTR"        => 'data-login-form-link'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => '/',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_HOME_LINK")
				]
			);
		?>
	</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------ missed/wrong confirmation code ------------------ */
/* -------------------------------------------------------------------- */
?>
<?elseif($arResult["MESSAGE_CODE"] == 'E04' || $arResult["MESSAGE_CODE"] == 'E05'):?>
	<div class="title"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_4_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_4_TEXT")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_REGISTRATION_LINK"),
				"ATTR"        => 'data-registration-form-link'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => '/',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_HOME_LINK")
				]
			);
		?>
	</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------- confirmation was successfull ------------------- */
/* -------------------------------------------------------------------- */
?>
<?elseif($arResult["MESSAGE_CODE"] == 'E06'):?>
	<div class="title"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_6_TITLE")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_LOGIN_LINK"),
				"ATTR"        => 'data-login-form-link'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => '/',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_HOME_LINK")
				]
			);
		?>
	</div>
<?
/* -------------------------------------------------------------------- */
/* -------------- some error occured during confirmation -------------- */
/* -------------------------------------------------------------------- */
?>
<?elseif($arResult["MESSAGE_CODE"] == 'E07'):?>
	<div class="title"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_7_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_AUTH_CONFIRMATION_STATUS_7_TEXT")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_REGISTRATION_LINK"),
				"ATTR"        => 'data-registration-form-link'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => '/',
				"TITLE"       => GetMessage("AV_AUTH_CONFIRMATION_HOME_LINK")
				]
			);
		?>
	</div>
<?endif?>
</div>