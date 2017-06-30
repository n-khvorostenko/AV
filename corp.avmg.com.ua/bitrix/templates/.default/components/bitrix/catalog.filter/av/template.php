<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<form
	class="av-filter <?if($arParams["MARKUP_TYPE"] == 'TWO_COLUMNS'):?>two-columns<?endif?>"
	name="<?=$arResult["FILTER_NAME"]."_form"?>"
	action="<?=$arResult["FORM_ACTION"]?>"
	method="get"
>
	<?=implode('', $arResult["HIDDEN_FIELDS"])?>
	<?
	/* ------------------------------------------- */
	/* ------------------ fields ----------------- */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult["FIELDS"] as $field => $fieldInfo):?>
	<div class="field-row">
		<?
		$componenTemplate = '.default';
		$componentParams  =
			[
			"TYPE"  => 'input',
			"NAME"  => $fieldInfo["INPUT_NAME"],
			"VALUE" => $fieldInfo["INPUT_VALUE"],
			"TITLE" => $fieldInfo["NAME"]
			];

		switch($fieldInfo["TYPE"])
			{
			case "RADIO":
				$componentParams["TYPE"]  = 'select';
				$componentParams["LIST"]  = $fieldInfo["VALUE_LIST"];
				$componentParams["TITLE"] = GetMessage("AV_FILTER_LIST_DEFAULT");
				$componenTemplate         = 'default_alt';
				break;
			case "SELECT":
				$componentParams["TYPE"]        = 'select';
				$componentParams["LIST"]        = $fieldInfo["VALUE_LIST"];
				$componentParams["EMPTY_TITLE"] = $fieldInfo["NAME"] ? $fieldInfo["NAME"] : GetMessage("AV_FILTER_LIST_DEFAULT");
				break;
			case "IBLOCK_ELEMENT":
				$componentParams["TYPE"]               = 'iblock_element_search';
				$componentParams["IBLOCK_ID"]          = $fieldInfo["IBLOCK_ID"];
				$componentParams["SEARCH_TYPE"]        = $fieldInfo["SEARCH_TYPE"];
				$componentParams["PARENT_SECTION"]     = $fieldInfo["PARENT_SECTION"];
				$componentParams["EMPTY_RESULT_TITLE"] = GetMessage("AV_FILTER_IBLOCK_EMPTY_RESULT");
				break;
			case "SEARCH":
				$componentParams["TYPE"]        = 'element_search';
				$componentParams["PLACEHOLDER"] = GetMessage("AV_FILTER_SEARCH_PLACEHOLDER");
				break;
			case "LINKS_LIST":
				$componentParams["TYPE"] = 'select';
				$componentParams["LIST"] = $fieldInfo["VALUE_LIST"];
				$componenTemplate        = 'av_site_alt';
				break;
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
	<input class="submit-button" type="submit" name="set_filter">
	<?if($arResult["FILTER_APPLIED"]):?>
	<div class="cancel-button">
		<?
		if($arParams["LIST_URL"] && $arParams["SAVE_IN_SESSION"] != 'Y')
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "default_alt",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arParams["LIST_URL"],
					"TITLE"       => GetMessage("AV_FILTER_CANCEL_FILTER"),
					"ATTR"        => ["rel" => 'nofollow']
					]
				);
		else
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "default_alt",
					[
					"TYPE"  => 'button',
					"NAME"  => 'del_filter',
					"TITLE" => GetMessage("AV_FILTER_CANCEL_FILTER"),
					"ATTR"  => 'cancel-button'
					]
				);
		?>
	</div>
	<?endif?>
</form>