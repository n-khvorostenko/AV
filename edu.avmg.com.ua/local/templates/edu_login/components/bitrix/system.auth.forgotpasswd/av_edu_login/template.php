<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<form class="av-edu-login-forgotpass-form" name="bform" method="post" action="<?=$arResult["AUTH_URL"]?>">
	<?
	/* ------------------------------------------- */
	/* -------------- hidden fields -------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["BACKURL"]):?>
	<input type="hidden" name="backurl"   value="<?=$arResult["BACKURL"]?>">
	<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE"      value="SEND_PWD">
	<?
	/* ------------------------------------------- */
	/* ------------------- text ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="title"><?=GetMessage("AV_EDU_LOGIN_FORGOTPASS_FORM_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_EDU_LOGIN_FORGOTPASS_FORM_TEXT")?>:</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ fields ----------------- */
	/* ------------------------------------------- */
	?>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_FORGOTPASS_FORM_INPUT")?> *:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av",
					[
					"NAME"  => 'USER_LOGIN',
					"VALUE" => $arResult["LAST_LOGIN"]
					]
				);
			?>
			<input type="hidden" name="USER_EMAIL">
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------------- captcha ----------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["CAPTCHA_CODE"]):?>
	<div class="captcha">
		<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA">

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av",
				[
				"NAME"        => 'captcha_word',
				"PLACEHOLDER" => GetMessage("AV_EDU_LOGIN_FORGOTPASS_FORM_CAPTCHA")
				]
			);
		?>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ------------------ submit ----------------- */
	/* ------------------------------------------- */
	?>
	<input class="submit-button" type="submit" name="send_account_info">
</form>