<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!\Bitrix\Main\Loader::includeModule("iblock"))               return;
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["IBLOCK_ID"] = is_array($arParams["IBLOCK_ID"]) ? $arParams["IBLOCK_ID"] : [$arParams["IBLOCK_ID"]];

$arParams["SEF_URL_TEMPLATES"] =
	[
	"LIST"    => $arParams["SEF_URL_TEMPLATES"]["list"],
	"ELEMENT" => $arParams["SEF_URL_TEMPLATES"]["element"] ? $arParams["SEF_URL_TEMPLATES"]["element"] : '#ELEMENT_ID#/'
	];
$arParams["VARIABLE_ALIASES"] =
	[
	"ELEMENT_ID" => $arParams["VARIABLE_ALIASES"]["ELEMENT_ID"] ? $arParams["VARIABLE_ALIASES"]["ELEMENT_ID"] : 'ELEMENT_ID'
	];
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$componentPage = 'list';
$urlVariables  = [];
$urlTemplates  = [];
/* -------------------------------------------------------------------- */
/* -------------------------- pages adresses -------------------------- */
/* -------------------------------------------------------------------- */
if($arParams["SEF_MODE"] == 'Y')
	{
	CComponentEngine::ParseComponentPath($arParams["SEF_FOLDER"], $arParams["SEF_URL_TEMPLATES"], $urlVariables);
	foreach($arParams["SEF_URL_TEMPLATES"] as $index => $value)
		$urlTemplates[$index] = $arParams["SEF_FOLDER"].$value;
	}
else
	{
	CComponentEngine::InitComponentVariables(false, array_keys($arParams["VARIABLE_ALIASES"]), $arParams["VARIABLE_ALIASES"], $urlVariables);
	$urlTemplates["LIST"]    = $APPLICATION->GetCurPage(false);
	$urlTemplates["ELEMENT"] = $APPLICATION->GetCurPage(false).'?'.$arParams["VARIABLE_ALIASES"]["ELEMENT_ID"].'=#ELEMENT_ID#';
	}

if($urlVariables["ELEMENT_ID"] || $urlVariables["ELEMENT_CODE"]) $componentPage = 'element';
/* -------------------------------------------------------------------- */
/* --------------------- get iBlock ID dy element --------------------- */
/* -------------------------------------------------------------------- */
if($urlVariables["ELEMENT_ID"] && !$urlVariables["IBLOCK_ID"])
	{
	$queryList = CIBlockElement::GetList([], ["ID" => $urlVariables["ELEMENT_ID"], "ACTIVE" => 'Y'], false, false, ["ID", "IBLOCK_ID"]);
	while($queryInfo = $queryList->GetNext()) $urlVariables["IBLOCK_ID"] = $queryInfo["IBLOCK_ID"];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
$arResult =
	[
	"URL_VARIABLES" => $urlVariables,
	"URL_TEMPLATES" => $urlTemplates
	];
$this->IncludeComponentTemplate($componentPage);
?>