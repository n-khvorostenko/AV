<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* --------------------------- form sended ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] == 'Y'):?>
<div class="av-form-result-ok"><?=GetMessage("AV_FORM_RESULT_OK")?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != 'Y'):?>
<div class="av-form" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>">
	<?if($arResult["isFormErrors"] == 'Y'):?>
	<div class="errors-block"><?=$arResult["FORM_ERRORS"]?></div>
	<?endif?>

	<?=$arResult["FORM_HEADER"]?>
		<?foreach($arResult["FIELDS"] as $fieldCode => $fieldInfo):?>
		<div class="field-row <?=$fieldCode?>">
			<?
			$fieldComponentParams =
				[
				"TYPE"     => 'input',
				"NAME"     => $fieldInfo["NAME"],
				"VALUE"    => $fieldInfo["VALUE"],
				"TITLE"    => $fieldInfo["TITLE"],
				"REQUIRED" => $fieldInfo["REQUIRED"]
				];

			switch($fieldInfo["TYPE"])
				{
				case "textarea": $fieldComponentParams["TYPE"] = 'textarea';                                                break;
				case "password": $fieldComponentParams["TYPE"] = 'password';                                                break;
				case "date"    : $fieldComponentParams["TYPE"] = 'date';                                                    break;
				case "radio"   : $fieldComponentParams["TYPE"] = 'radio';$fieldComponentParams["LIST"] = $fieldInfo["LIST"];break;
				case "dropdown": $fieldComponentParams["TYPE"] = 'list'; $fieldComponentParams["LIST"] = $fieldInfo["LIST"];break;
				case "file"    :
				case "image"   : $fieldComponentParams["TYPE"] = 'file';                                                    break;
				case "email"   : $fieldComponentParams["TYPE"] = 'input';                                                   break;
				}
			if($fieldCode == 'contact_phone') $fieldComponentParams["TYPE"] = 'phone';

			$APPLICATION->IncludeComponent("av:form_elements", "av_site", $fieldComponentParams);
			?>
		</div>
		<?endforeach?>

		<div class="buttons-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'web_form_submit',
					"TITLE"       => GetMessage("AV_FORM_SUBMIT")
					]
				);
			?>
		</div>
	<?=$arResult["FORM_FOOTER"]?>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_FORM_FORM_VALIDATION_ALERT": '<?=GetMessage("AV_FORM_FORM_VALIDATION_ALERT")?>'});
	BX.message({"AV_FORM_RESULT_OK_MESSAGE"    : '<?=GetMessage("AV_FORM_RESULT_OK_MESSAGE")?>'});

	<?if($arResult["isFormNote"] == 'Y'):?>
	AvBlurScreen("on", 1000);
	var $avFomrPopUpOk =
		CreateAvAlertPopup(BX.message("AV_FORM_RESULT_OK_MESSAGE"), "ok")
			.positionCenter(1100)
			.on("remove", function() {AvBlurScreen("off")});

	$(document)
		.on("vclick", function()
			{
			if($avFomrPopUpOk.isClicked()) return;
			$avFomrPopUpOk.remove();
			AvBlurScreen("off");
			});
	$(window)
		.scroll(function()
			{
			$avFomrPopUpOk.positionCenter();
			})
		.resize(function()
			{
			$avFomrPopUpOk.positionCenter();
			});
	<?endif?>
</script>