<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"av:directories.view", "",
		[
		"IBLOCK_ID"               => $arResult["URL_VARIABLES"]["IBLOCK_ID"],
		"ELEMENT_ID"              => $arResult["URL_VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE"            => $arResult["URL_VARIABLES"]["ELEMENT_CODE"],
		"PATH_TO_ELEMENT"         => $arResult["URL_TEMPLATES"]["ELEMENT"],
		"PATH_TO_LIST"            => $arResult["URL_TEMPLATES"]["LIST"],
		"FILTER_VAR_NAME"         => $arParams["FILTER_VAR_NAME"],
		"FIELDS"                  => $arParams["ELEMENT_FIELDS"],
		"PROPS"                   => $arParams['PROPS_'.$arResult["URL_VARIABLES"]["IBLOCK_ID"]],
		"SHOW_RELATIVE_ELEMENTS"  => $arParams["SHOW_RELATIVE_ELEMENTS"],
		"RELATIVE_ELEMENTS_COUNT" => $arParams["RELATIVE_ELEMENTS_COUNT"],

		"CACHE_TIME"      => $arParams["CACHE_TIME"],
		"CACHE_FILTER"    => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS"    => $arParams["CACHE_GROUPS"]
		]
	);
?>