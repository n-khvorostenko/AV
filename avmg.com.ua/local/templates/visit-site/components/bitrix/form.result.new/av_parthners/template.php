<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["bootstrap", "av_form_elements"]);
/* -------------------------------------------------------------------- */
/* --------------------------- form sended ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] == 'Y'):?>
	<h3><?=GetMessage("AV_FORM_PARTHNERS_FORM_TITLE")?></h3>
	<div class="av-form-parthners-result-ok"><?=GetMessage("AV_FORM_PARTHNERS_RESULT_OK")?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != 'Y' && (COption::GetOptionString("main", "new_user_registration") == 'Y' || $USER->IsAuthorized())):?>
	<?
	/* ------------------------------------------- */
	/* ------------------ title ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="av-form-parthners-title">
		<?=GetMessage("AV_FORM_PARTHNERS_MAIN_TITLE")?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ text ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="av-form-parthners-text">
		<div>
			<div class="av-form-parthners-work-button authorize<?if($USER->IsAuthorized()):?> passed unactive<?endif?>">
				<div>1</div>
				<div><?=GetMessage("AV_FORM_PARTHNERS_BUTTON_REGISTER")?></div>
				<div></div>
			</div>
			<?$APPLICATION->IncludeComponent("bitrix:main.include", "", ["AREA_FILE_SHOW" => "file", "PATH" => "/include/partners/left_column.php"])?>
		</div>
		<div>
			<div class="av-form-parthners-work-button form-link<?if(!$USER->IsAuthorized()):?> unactive<?endif?>">
				<div>2</div>
				<div><?=GetMessage("AV_FORM_PARTHNERS_BUTTON_FORM_LINK")?></div>
				<div></div>
			</div>
			<?$APPLICATION->IncludeComponent("bitrix:main.include", "", ["AREA_FILE_SHOW" => "file", "PATH" => "/include/partners/right_column.php"])?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ form ------------------- */
	/* ------------------------------------------- */
	?>
	<?if($USER->IsAuthorized()):?>
	<div class="av-form-parthners" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>">
		<h3><?=GetMessage("AV_FORM_PARTHNERS_FORM_TITLE")?></h3>

		<?if($arResult["isFormErrors"] == 'Y'):?>
		<div class="errors-block"><?=$arResult["FORM_ERRORS"]?></div>
		<?endif?>

		<?=$arResult["FORM_HEADER"]?>
			<?
			/* ---------------------------- */
			/* ------- fields params ------ */
			/* ---------------------------- */
			$fieldsParams = [];
			foreach($arResult["FIELDS"] as $fieldCode => $fieldInfo)
				{
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
				if($fieldCode == 'phone' || $fieldCode == 'phone_additional') $fieldComponentParams["TYPE"] = 'phone';

				$fieldsParams[$fieldCode] = $fieldComponentParams;
				}
			/* ---------------------------- */
			/* ------- left column -------- */
			/* ---------------------------- */
			?>
			<div class="left-column">
				<div>
					<div class="title"><?=GetMessage("AV_FORM_PARTHNERS_FORM_BLOCK_MAIN")?></div>
					<?foreach(["Name_company", "adress", "city", "post_index", "law_status"] as $fieldCode):?>
					<div field-row="<?=$fieldCode?>">
						<?$APPLICATION->IncludeComponent("av:form_elements", "av_site", $fieldsParams[$fieldCode])?>
					</div>
					<?endforeach?>
				</div>
				<div>
					<div class="title"><?=GetMessage("AV_FORM_PARTHNERS_FORM_BLOCK_DELIVERY")?></div>
					<?foreach(["adress_delivery_documents", "city_for_delivery", "post_index_delivery"] as $fieldCode):?>
					<div field-row="<?=$fieldCode?>">
						<?$APPLICATION->IncludeComponent("av:form_elements", "av_site", $fieldsParams[$fieldCode])?>
					</div>
					<?endforeach?>
				</div>
			</div>
			<?
			/* ---------------------------- */
			/* ------- right column ------- */
			/* ---------------------------- */
			?>
			<div class="right-column">
				<div class="title"><?=GetMessage("AV_FORM_PARTHNERS_FORM_BLOCK_COMPANY_AGENT")?></div>
				<?foreach(["last_name", "name_secondname", "position", "email", "phone", "phone_additional", "comments"] as $fieldCode):?>
				<div class="field-row <?=$fieldCode?>">
					<?$APPLICATION->IncludeComponent("av:form_elements", "av_site", $fieldsParams[$fieldCode])?>
				</div>
				<?endforeach?>
			</div>
			<?
			/* ---------------------------- */
			/* --------- buttons ---------- */
			/* ---------------------------- */
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
						"TITLE"       => GetMessage("AV_FORM_PARTHNERS_SUBMIT")
						]
					);
				?>
			</div>
		<?=$arResult["FORM_FOOTER"]?>
	</div>
	<?endif?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_FORM_PARTHNERS_FORM_VALIDATION_ALERT": '<?=GetMessage("AV_FORM_PARTHNERS_FORM_VALIDATION_ALERT")?>'});
	BX.message({"AV_FORM_PARTHNERS_RESULT_OK_MESSAGE"    : '<?=GetMessage("AV_FORM_PARTHNERS_RESULT_OK_MESSAGE")?>'});

	<?if($arResult["isFormNote"] == 'Y'):?>
	AvBlurScreen("on", 1000);
	var $avFomrParthnersPopUpOk =
		CreateAvAlertPopup(BX.message("AV_FORM_PARTHNERS_RESULT_OK_MESSAGE"), "ok")
			.positionCenter(1100)
			.on("remove", function() {AvBlurScreen("off")});

	$(document)
		.on("vclick", function()
			{
			if($avFomrParthnersPopUpOk.isClicked()) return;
			$avFomrParthnersPopUpOk.remove();
			AvBlurScreen("off");
			});
	$(window)
		.scroll(function()
			{
			$avFomrParthnersPopUpOk.positionCenter();
			})
		.resize(function()
			{
			$avFomrParthnersPopUpOk.positionCenter();
			});
	<?endif?>
</script>