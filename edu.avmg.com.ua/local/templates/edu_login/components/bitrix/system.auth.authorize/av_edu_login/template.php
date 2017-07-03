<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_EDU_LOGIN_AUTH_FORM_VALIDATION_ALERT": '<?=GetMessage("AV_EDU_LOGIN_AUTH_FORM_VALIDATION_ALERT")?>'});
</script>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<form class="av-edu-login-auth-form" name="form_auth" method="post" action="<?=$arResult["AUTH_URL"]?>">
	<?
	/* ------------------------------------------- */
	/* -------------- hidden fields -------------- */
	/* ------------------------------------------- */
	?>
	<input type="hidden" name="AUTH_FORM"   value="Y">
	<input type="hidden" name="TYPE"        value="AUTH">
	<?if($arResult["BACKURL"]):?>
	<input type="hidden" name="backurl"     value="<?=$arResult["BACKURL"]?>">
	<?endif?>
	<?foreach($arResult["POST"] as $index => $value):?>
	<input type="hidden" name="<?=$index?>" value="<?=$value?>">
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* ------------------- text ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="title"><?=GetMessage("AV_EDU_LOGIN_AUTH_FORM_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_EDU_LOGIN_AUTH_FORM_TEXT")?>:</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ fields ----------------- */
	/* ------------------------------------------- */
	?>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_AUTH_LOGIN")?> *:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av",
					[
					"NAME"     => 'USER_LOGIN',
					"REQUIRED" => 'Y',
					"VALUE"    => $arResult["LAST_LOGIN"]
					]
				);
			?>
		</div>
	</div>
	<div class="field-row">
		<div class="field-title"><?=GetMessage("AV_EDU_LOGIN_AUTH_PASS")?> *:</div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input.password", "av",
					[
					"NAME"     => 'USER_PASSWORD',
					"REQUIRED" => 'Y',
					"VALUE"    => $arResult["LAST_LOGIN"]
					]
				);
			?>
		</div>
	</div>
	<?if($arResult["STORE_PASSWORD"] == 'Y'):?>
	<div class="field-row">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.checkbox", "av",
				[
				"NAME"  => 'USER_REMEMBER',
				"TITLE" => GetMessage("AV_EDU_LOGIN_AUTH_REMEMBER_ME"),
				"VALUE" => 'Y'
				]
			);
		?>
	</div>
	<?endif?>
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
				"PLACEHOLDER" => GetMessage("AV_EDU_LOGIN_AUTH_FORM_CAPTCHA")
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
	<input class="submit-button" type="submit" name="Login">
</form>