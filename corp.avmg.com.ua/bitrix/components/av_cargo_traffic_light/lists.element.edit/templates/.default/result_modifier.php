<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$arResult["CURRENT_STATUS"] = '';
/* -------------------------------------------------------------------- */
/* ------------------------- fields refactor -------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult["FIELDS"] as $field => $fieldInfo)
	{
	// NAME
	if($field == 'NAME')
		$arResult["FIELDS"][$field]["VALUE"] = $arResult["FORM_DATA"][$field];
	// string/number
	if($fieldInfo["TYPE"] == 'S' || $fieldInfo["TYPE"] == 'N')
		{
		$arResult["FIELDS"][$field]["VALUE"] = [];
		foreach($arResult["FORM_DATA"][$field] as $value)
			$arResult["FIELDS"][$field]["VALUE"][] = $value["VALUE"];
		}
	// list
	elseif($fieldInfo["TYPE"] == 'L')
		{
		$arResult["FIELDS"][$field]["LIST_ITEMS"] = [];
		$arResult["FIELDS"][$field]["VALUE"]      = [];

		if(is_array($arResult["FORM_DATA"][$field]))
			foreach($arResult["FORM_DATA"][$field] as $value)
				$arResult["FIELDS"][$field]["VALUE"][] = $value;
		else
			$arResult["FIELDS"][$field]["VALUE"][] = $arResult["FORM_DATA"][$field];

		$queryList = CIBlockProperty::GetPropertyEnum($fieldInfo["ID"]);
		while($queryElement = $queryList->Fetch())
			{
			$arResult["FIELDS"][$field]["LIST_ITEMS"][$queryElement["ID"]] = $queryElement["VALUE"];
			if($fieldInfo["CODE"] == 'status' && in_array($queryElement["ID"], $arResult["FIELDS"][$field]["VALUE"]))
				$arResult["CURRENT_STATUS"] = $queryElement["XML_ID"];
			}
		}
	// iblock element
	elseif($fieldInfo["TYPE"] == 'E' && $fieldInfo["LINK_IBLOCK_ID"])
		{
		$arResult["FIELDS"][$field]["TYPE"]          = 'L';
		$arResult["FIELDS"][$field]["PROPERTY_TYPE"] = 'L';
		$arResult["FIELDS"][$field]["NATURAL_TYPE"]  = 'E';
		$arResult["FIELDS"][$field]["LIST_ITEMS"]    = [];
		$arResult["FIELDS"][$field]["VALUE"]         = [];

		if(is_array($arResult["FORM_DATA"][$field]))
			foreach($arResult["FORM_DATA"][$field] as $value)
				$arResult["FIELDS"][$field]["VALUE"][] = $value;
		else
			$arResult["FIELDS"][$field]["VALUE"][] = $arResult["FORM_DATA"][$field];

		$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $fieldInfo["LINK_IBLOCK_ID"]], false, false, ["ID", "NAME"]);
		while($queryElement = $queryList->GetNext()) $arResult["FIELDS"][$field]["LIST_ITEMS"][$queryElement["ID"]] = $queryElement["NAME"];
		}
	// html/text
	elseif($fieldInfo["TYPE"] == 'S:HTML')
		{
		$arResult["FIELDS"][$field]["VALUE"] = [];
		foreach($arResult["FORM_DATA"][$field] as $value)
			$arResult["FIELDS"][$field]["VALUE"][] = $value["VALUE"]["TEXT"];
		}
	// not used
	elseif(in_array($field, ["DATE_CREATE", "TIMESTAMP_X", "CREATED_BY", "MODIFIED_BY"]))
		unset($arResult["FIELDS"][$field]);
	}
/* -------------------------------------------------------------------- */
/* ------------------------- fields show/hide ------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult["FIELDS"] as $field => $fieldInfo)
	{
	// closed
	if($arResult["CURRENT_STATUS"] == 'uploaded_unloaded' || $arResult["CURRENT_STATUS"] == 'empty')
		{
		$arResult["FIELDS"][$field]["SETTINGS"]["EDIT_READ_ONLY_FIELD"] = 'Y';
		$arResult["CAN_DELETE_ELEMENT"] = false;
		}
	// create form
	elseif(!$arResult["ELEMENT_ID"])
		switch($fieldInfo["CODE"])
			{
			case "status":
			case "storage_geter":
				$arResult["FIELDS"][$field]["SETTINGS"]["SHOW_ADD_FORM"] = 'N';
				break;
			}
	// edit form
	else
		switch($fieldInfo["CODE"])
			{
			case "operation_type":
			case "storage_sender":
				$arResult["FIELDS"][$field]["SETTINGS"]["EDIT_READ_ONLY_FIELD"] = 'Y';
				break;
			case "items_number":
			case "tonnage":
				if(count($fieldInfo["VALUE"]))
					$arResult["FIELDS"][$field]["SETTINGS"]["EDIT_READ_ONLY_FIELD"] = 'Y';
				break;
			}
	}
/* -------------------------------------------------------------------- */
/* ------------------------- element history -------------------------- */
/* -------------------------------------------------------------------- */
$currentValuesArray           = [];
$previousElement              = [];
$startElementInfo             = [];
$arResult["HISTORY_ELEMENTS"] = [];

$queryList = CIBlockElement::GetList
	(
	["ID" => 'DESC'],
	["WF_PARENT_ELEMENT_ID" => $arResult["ELEMENT_ID"], "SHOW_HISTORY" => 'Y'],
	false, false, array_merge(["ID", "CREATED_BY", "DATE_CREATE"], array_keys($arResult["FIELDS"]))
	);
while($queryElement = $queryList->GetNext())
	{
	$differentValuesArray = [];
	foreach($arResult["FIELDS"] as $field => $fieldInfo)
		{
		$fieldValueArray = [];
		if($fieldInfo["TYPE"] == 'L' && $fieldInfo["NATURAL_TYPE"] != 'E') $fieldValueArray = is_array($queryElement[$field.'_ENUM_ID']) ? $queryElement[$field.'_ENUM_ID'] : [$queryElement[$field.'_ENUM_ID']];
		elseif($fieldInfo["TYPE"] == 'S:HTML')                             $fieldValueArray = [$queryElement[$field.'_VALUE']["TEXT"]];
		elseif($fieldInfo["PROPERTY_TYPE"])                                $fieldValueArray = is_array($queryElement[$field.'_VALUE'])   ? $queryElement[$field.'_VALUE']   : [$queryElement[$field.'_VALUE']];
		else                                                               $fieldValueArray = is_array($queryElement[$field])            ? $queryElement[$field]            : [$queryElement[$field]];

		if($fieldInfo["TYPE"] == 'L')
			foreach($fieldValueArray as $index => $value)
				$fieldValueArray[$index] = $fieldInfo["LIST_ITEMS"][$value];

		if(count($previousElement))
			foreach($fieldValueArray as $index => $value)
				if($value != $currentValuesArray[$field][$index])
					{
					$differentValuesArray[$field] = $currentValuesArray[$field];
					break;
					}

		$currentValuesArray[$field] = $fieldValueArray;
		}

	if(count($differentValuesArray) && count($previousElement))
		$arResult["HISTORY_ELEMENTS"][] = array_merge
			(
				[
				"CREATED_BY"  => $previousElement["CREATED_BY"],
				"DATE_CREATE" => $previousElement["DATE_CREATE"]
				],
			$differentValuesArray
			);

	$previousElement = $queryElement;
	}

if(count($arResult["HISTORY_ELEMENTS"]))
	$arResult["HISTORY_ELEMENTS"][] = array_merge
		(
			[
			"CREATED_BY"  => $previousElement["CREATED_BY"],
			"DATE_CREATE" => $previousElement["DATE_CREATE"]
			],
		$currentValuesArray
		);