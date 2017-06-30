<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- basic ------------------------------- */
/* --------------------------------------------------------------------- */
$arParams["REQUIRED"] = $arParams["REQUIRED"] == 'Y' ? true : false;
$arParams["DISABLED"] = $arParams["DISABLED"] == 'Y' ? true : false;
$arParams["CHECKED"]  = $arParams["CHECKED"]  == 'Y' ? true : false;
if(is_array($arParams["ATTR"]))
	{
	$attrArray = [];
	foreach($arParams["ATTR"] as $index => $value)
		{
		$attrString = $index;
		if($value) $attrString .= '='.$value;
		$attrArray[] = $attrString;
		}
	$arParams["ATTR"] = implode(' ', $attrArray);
	}
/* --------------------------------------------------------------------- */
/* ------------------------ form element types ------------------------- */
/* --------------------------------------------------------------------- */
switch($arParams["TYPE"])
	{
	/* -------------------------------------------- */
	/* ---------- iblock element search ----------- */
	/* -------------------------------------------- */
	case "iblock_element_search":
		$arParams["VALUE_TITLE"] = '';
		if($arParams["VALUE"])
			{
			$queryList = CIBlockElement::GetList([], ["ID" => $arParams["VALUE"]], false, ["nTopCount" => 1], ["ID", "NAME"]);
			while($queryInfo = $queryList->GetNext()) $arParams["VALUE_TITLE"] = $queryInfo["NAME"];
			}
		break;
	/* -------------------------------------------- */
	/* ------------------ button ------------------ */
	/* -------------------------------------------- */
	case "button":
		$arParams["BUTTON_TYPE"]  = in_array($arParams["BUTTON_TYPE"], ["button", "submit", "link", "label"]) ? $arParams["BUTTON_TYPE"]  : 'button';
		$arParams["IMG_POSITION"] = in_array($arParams["IMG_POSITION"], ["left", "right"])                    ? $arParams["IMG_POSITION"] : 'right';
		$arParams["LINK"]         = $arParams["BUTTON_TYPE"] == 'link'                                        ? $arParams["LINK"]         : '';
		break;
	}
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
if($arParams["TYPE"]) $this->IncludeComponentTemplate($arParams["TYPE"]);