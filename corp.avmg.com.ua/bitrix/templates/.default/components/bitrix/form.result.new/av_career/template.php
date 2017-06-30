<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["av_form_elements"]);
/* -------------------------------------------------------------------- */
/* --------------------------- form sended ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] == 'Y'):?>
<div class="av-form-career-result-ok"><?=GetMessage("AV_FORM_CAREER_RESULT_OK")?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != 'Y'):?>
<div class="av-form-career" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>">
	<?if($arResult["isFormErrors"] == 'Y'):?>
	<div class="errors-block"><?=$arResult["FORM_ERRORS"]?></div>
	<?endif?>

	<?=$arResult["FORM_HEADER"]?>
		<?
		/* ------------------------------------------- */
		/* ----------------- fields ------------------ */
		/* ------------------------------------------- */
		?>
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
			?>

			<?if($fieldCode == 'comments'):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form_elements", "av_site",
						[
						"TYPE"    => 'checkbox',
						"NAME"    => 'comments-trigger',
						"CHECKED" => $fieldInfo["VALUE"] ? 'Y' : 'N',
						"TITLE"   => GetMessage("AV_FORM_CAREER_COMMENTS_TRIGGER")
						]
					);
				?>
				<div class="comments-field<?if(!$fieldInfo["VALUE"]):?> hidden-field<?endif?>">
					<?$APPLICATION->IncludeComponent("av:form_elements", "av_site", $fieldComponentParams)?>
				</div>
			<?elseif($fieldCode == 'upload_file'):?>
				<?$APPLICATION->IncludeComponent("av:form_elements", "av_site", $fieldComponentParams)?>

				<?if(count($fieldInfo["VALIDATORS"])):?>
				<ul class="validation-info">
					<?foreach($fieldInfo["VALIDATORS"] as $arrayInfo):?>
					<li>
						<?if($arrayInfo["NAME"]     == 'file_size'):?><?=GetMessage("AV_FORM_CAREER_FORM_VALIDATION_FILE_SIZE", ["#SIZE#" => ceil($arrayInfo["PARAMS"]["SIZE_TO"]/1048576)])?>
						<?elseif($arrayInfo["NAME"] == 'file_type'):?><?=GetMessage("AV_FORM_CAREER_FORM_VALIDATION_FILE_TYPE", ["#TYPE#" => implode(', ', explode(',', $arrayInfo["PARAMS"]["EXT"]))])?>
						<?endif?>
					</li>
					<?endforeach?>
				</ul>
				<?endif?>
			<?else:?>
				<?$APPLICATION->IncludeComponent("av:form_elements", "av_site", $fieldComponentParams)?>
			<?endif?>
		</div>
		<?endforeach?>
		<?
		/* ------------------------------------------- */
		/* ----------------- buttons ----------------- */
		/* ------------------------------------------- */
		?>
		<div class="buttons-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'web_form_submit',
					"TITLE"       => GetMessage("AV_FORM_CAREER_SUBMIT")
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
	BX.message({"AV_FORM_CAREER_FORM_VALIDATION_ALERT": '<?=GetMessage("AV_FORM_CAREER_FORM_VALIDATION_ALERT")?>'});
	BX.message({"AV_FORM_CAREER_RESULT_OK_MESSAGE"    : '<?=GetMessage("AV_FORM_CAREER_RESULT_OK_MESSAGE")?>'});

	<?if($arResult["isFormNote"] == 'Y'):?>
	AvBlurScreen("on", 1000);
	var $avFomrCareerPopUpOk =
		CreateAvAlertPopup(BX.message("AV_FORM_CAREER_RESULT_OK_MESSAGE"), "ok")
			.positionCenter(1100)
			.on("remove", function() {AvBlurScreen("off")});

	$(document)
		.on("vclick", function()
			{
			if($avFomrCareerPopUpOk.isClicked()) return;
			$avFomrCareerPopUpOk.remove();
			AvBlurScreen("off");
			});
	$(window)
		.scroll(function()
			{
			$avFomrCareerPopUpOk.positionCenter();
			})
		.resize(function()
			{
			$avFomrCareerPopUpOk.positionCenter();
			});
	<?endif?>
</script>