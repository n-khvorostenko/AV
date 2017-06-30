<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------ current action info ----------------------- */
/* -------------------------------------------------------------------- */
$arResult["CURRENT_ACTION"] = [];
if($arResult["PROPERTIES"]["current_action"]["VALUE"])
	{
	$queryList = CIBlockElement::GetList
		(
		[],
		["ID" => $arResult["PROPERTIES"]["current_action"]["VALUE"]],
		false, false,
		["ID", "NAME", "PREVIEW_TEXT", "PROPERTY_ACTION_IMAGE"]
		);
	while($queryElement = $queryList->GetNext())
		$arResult["CURRENT_ACTION"] =
			[
			"NAME"    => $queryElement["NAME"],
			"TEXT"    => $queryElement["PREVIEW_TEXT"],
			"PICTURE" => CFile::GetPath($queryElement["PROPERTY_ACTION_IMAGE_VALUE"])
			];
	}