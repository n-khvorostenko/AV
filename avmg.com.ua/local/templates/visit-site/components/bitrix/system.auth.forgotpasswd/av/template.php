<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if($USER->IsAuthorized())                                       die();
?>
<form class="av-forgotpass-form" name="bform" method="post" action="<?=$arResult["AUTH_URL"]?>">
	<?if($arResult["BACKURL"]):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>">
	<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<input type="hidden" name="USER_EMAIL">

	<div class="title"><?=GetMessage("AV_FORGOT_PASS_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_FORGOT_PASS_TEXT")?></div>

	<div class="input-row">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"  => 'input',
				"NAME"  => 'USER_LOGIN',
				"TITLE" => GetMessage("AV_FORGOT_PASS_INPUT_TITLE"),
				"VALUE" => $arResult["LAST_LOGIN"]
				]
			);
		?>
	</div>

	<?if($arResult["USE_CAPTCHA"]):?>
	<div class="captcha-row">
		<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA" title="CAPTCHA">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"  => 'input',
				"NAME"  => 'captcha_word',
				"TITLE" => GetMessage("AV_FORGOT_PASS_CAPCHA_TITLE"),
				"ATTR"  => ["autocomplete" => 'off']
				]
			);
		?>
	</div>
	<?endif?>

	<div class="button-row">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'submit',
				"NAME"        => 'send_account_info',
				"TITLE"       => GetMessage("AV_FORGOT_PASS_SUBMIT_TITLE")
				]
			);
		?>
	</div>
</form>