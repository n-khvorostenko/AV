<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<form method="POST" class="av-directories-filter">
	<?
	/* ------------------------------------------- */
	/* ----------------- fields ------------------ */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult["FIELDS_INFO"] as $fieldInfo):?>
	<div class="field-row <?=$fieldInfo["FIELD"]?>">
		<?
		$componenTemplate = '.default';
		$componentParams  =
			[
			"TYPE"  => 'input',
			"NAME"  => $fieldInfo["NAME"],
			"VALUE" => $fieldInfo["VALUE"],
			"TITLE" => $fieldInfo["TITLE"]
			];

		switch($fieldInfo["TYPE"])
			{
			case "LIST"  : $componentParams["TYPE"] = 'select';$componentParams["LIST"] = $fieldInfo["LIST"];break;
			case "SEARCH": $componentParams["TYPE"] = 'element_search';                                      break;
			}
		switch($fieldInfo["FIELD"])
			{
			case "IBLOCK_ID": $componentParams["TITLE"] = GetMessage("AV_DIRECTORIES_FILTER_IBLOCK_LIST_DEFAULT");$componenTemplate = 'default_alt';break;
			case "NAME"     : $componentParams["TITLE"] = GetMessage("AV_DIRECTORIES_FILTER_SEARCH_PLACEHOLDER");                                   break;
			}

		$APPLICATION->IncludeComponent("av:form_elements", $componenTemplate, $componentParams);
		?>
	</div>
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* ----------------- buttons ----------------- */
	/* ------------------------------------------- */
	?>
	<button class="submit-button" name="<?=$arResult["SUBMIT_NAME"]?>">submit</button>
	<?if($arResult["FILTER_APPLIED"]):?>
	<div class="cancel-button">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "default_alt",
				[
				"TYPE"  => 'button',
				"NAME"  => $arResult["CANCEL_NAME"],
				"TITLE" => GetMessage("AV_DIRECTORIES_FILTER_CANCEL_BUTTON")
				]
			);
		?>
	</div>
	<?endif?>
</form>