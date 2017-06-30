<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<form class="av-change-pass-form" method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform">
	<?if($arResult["BACKURL"]):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>">
	<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="CHANGE_PWD">

	<h3><?=GetMessage("AV_CHANGE_PASS_TITLE")?></h3>

	<?if($arParams["~AUTH_RESULT"]):?>
	<div class="alert-text">
		<?=str_replace(["<br>", "<br />"], "\n", $arParams["~AUTH_RESULT"]["MESSAGE"])?>
	</div>
	<?endif?>

	<?
	$APPLICATION->IncludeComponent
		(
		"av:form_elements", "av_site",
			[
			"TYPE"  => 'input',
			"NAME"  => 'USER_LOGIN',
			"TITLE" => GetMessage("AV_CHANGE_PASS_LOGIN"),
			"VALUE" => $arResult["LAST_LOGIN"]
			]
		);
	$APPLICATION->IncludeComponent
		(
		"av:form_elements", "av_site",
			[
			"TYPE"  => 'input',
			"NAME"  => 'USER_CHECKWORD',
			"TITLE" => GetMessage("AV_CHANGE_PASS_CHECKWORD"),
			"VALUE" => $arResult["USER_CHECKWORD"]
			]
		);
	$APPLICATION->IncludeComponent
		(
		"av:form_elements", "av_site",
			[
			"TYPE"  => 'password',
			"NAME"  => 'USER_PASSWORD',
			"TITLE" => GetMessage("AV_CHANGE_PASS_NEW_PASS"),
			"VALUE" => $arResult["USER_PASSWORD"]
			]
		);
	$APPLICATION->IncludeComponent
		(
		"av:form_elements", "av_site",
			[
			"TYPE"  => 'password',
			"NAME"  => 'USER_CONFIRM_PASSWORD',
			"TITLE" => GetMessage("AV_CHANGE_PASS_NEW_PASS_CONFIRM"),
			"VALUE" => $arResult["USER_CONFIRM_PASSWORD"]
			]
		);
	?>

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
				"TITLE" => GetMessage("AV_CHANGE_PASS_CAPCHA"),
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
				"NAME"        => 'change_pwd',
				"TITLE"       => GetMessage("AV_CHANGE_PASS_SUBMIT")
				]
			);
		?>
	</div>
</form>