<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_EDU_LOGIN_REGISTRATION_VALIDATION_ALERT": '<?=GetMessage("AV_EDU_LOGIN_REGISTRATION_VALIDATION_ALERT")?>'});
</script>
<?
/* -------------------------------------------------------------------- */
/* ------------------------ registration form ------------------------- */
/* -------------------------------------------------------------------- */
?>
<form class="av-edu-login-registration-form" name="bform" method="post" action="<?=$arResult["AUTH_URL"]?>">
	<?
	/* ------------------------------------------- */
	/* -------------- hidden fields -------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["BACKURL"]):?>
	<input type="hidden" name="backurl"   value="<?=$arResult["BACKURL"]?>">
	<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE"      value="REGISTRATION">
	<?
	/* ------------------------------------------- */
	/* ------------------- text ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="title"><?=GetMessage("AV_EDU_LOGIN_REGISTRATION_TITLE")?></div>
	<?
	/* ------------------------------------------- */
	/* ------------------ fields ----------------- */
	/* ------------------------------------------- */
	?>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_REGISTRATION_NAME")?>:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av",
					[
					"NAME"  => 'USER_NAME',
					"VALUE" => $arResult["USER_NAME"]
					]
				);
			?>
		</div>
	</div>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_REGISTRATION_LAST_NAME")?>:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av",
					[
					"NAME"  => 'USER_LAST_NAME',
					"VALUE" => $arResult["USER_LAST_NAME"]
					]
				);
			?>
		</div>
	</div>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_REGISTRATION_LOGIN")?> *:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av",
					[
					"NAME"     => 'USER_LOGIN',
					"REQUIRED" => 'Y',
					"VALUE"    => $arResult["USER_LOGIN"]
					]
				);
			?>
		</div>
	</div>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_REGISTRATION_PASSWORD")?> *:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input.password", "av",
					[
					"NAME"     => 'USER_PASSWORD',
					"REQUIRED" => 'Y',
					"VALUE"    => $arResult["USER_PASSWORD"]
					]
				);
			?>
		</div>
	</div>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_REGISTRATION_PASSWORD_CONFIRM")?> *:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input.password", "av",
					[
					"NAME"     => 'USER_CONFIRM_PASSWORD',
					"REQUIRED" => 'Y',
					"VALUE"    => $arResult["USER_CONFIRM_PASSWORD"]
					]
				);
			?>
		</div>
	</div>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_REGISTRATION_EMAIL")?><?if($arResult["EMAIL_REQUIRED"]):?> *<?endif?>:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av",
					[
					"NAME"     => 'USER_EMAIL',
					"REQUIRED" => $arResult["EMAIL_REQUIRED"] ? 'Y' : 'N',
					"VALUE"    => $arResult["USER_EMAIL"]
					]
				);
			?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------------- captcha ----------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["USE_CAPTCHA"] == 'Y'):?>
	<div class="captcha">
		<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA">

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av",
				[
				"NAME"        => 'captcha_word',
				"PLACEHOLDER" => GetMessage("AV_EDU_LOGIN_REGISTRATION_CAPTCHA")
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
	<input class="submit-button" type="submit" name="Register">
</form>