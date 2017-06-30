<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!\Bitrix\Main\Loader::includeModule("iblock"))               return;
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["IBLOCK_ID"]               = (int)$arParams["IBLOCK_ID"];
$arParams["ELEMENT_ID"]              = (int)$arParams["ELEMENT_ID"];
$arParams["ELEMENT_CODE"]            = trim($arParams["ELEMENT_CODE"]);
$arParams["PATH_TO_ELEMENT"]         = trim($arParams["PATH_TO_ELEMENT"]);
$arParams["PATH_TO_LIST"]            = trim($arParams["PATH_TO_LIST"]);
$arParams["FILTER_VAR_NAME"]         = $arParams["FILTER_VAR_NAME"]               ? trim($arParams["FILTER_VAR_NAME"])        : 'AV_DIRECTORIES_FILTER';

$arParams["FIELDS"]                  = array_merge((is_array($arParams["FIELDS"]) ? $arParams["FIELDS"] : []), ["ID", "NAME", "IBLOCK_SECTION_ID"]);
$arParams["PROPS"]                   = is_array($arParams["PROPS"])               ? $arParams["PROPS"]                        : [];
$arParams["SHOW_RELATIVE_ELEMENTS"]  = $arParams["SHOW_RELATIVE_ELEMENTS"] == 'Y' ? true                                      : false;
$arParams["RELATIVE_ELEMENTS_COUNT"] = (int)$arParams["SHOW_RELATIVE_ELEMENTS"]   ? (int)$arParams["RELATIVE_ELEMENTS_COUNT"] : 0;

$arParams["CACHE_TIME"]              = (int)$arParams["CACHE_TIME"]               ? (int)$arParams["CACHE_TIME"]              : 36000000;
$arParams["CACHE_FILTER"]            = $arParams["CACHE_FILTER"] == 'Y'           ? 'Y'                                       : 'N';
$arParams["CACHE_GROUPS"]            = $arParams["CACHE_GROUPS"] == 'Y'           ? 'Y'                                       : 'N';

if
	(
	(!$arParams["ELEMENT_ID"] || !$arParams["ELEMENT_CODE"] || !$arParams["IBLOCK_ID"])
	&&
	($arParams["ELEMENT_ID"]  ||  $arParams["ELEMENT_CODE"])
	)
	{
	$iblockFilter = ["ACTIVE" => 'Y'];
	if($arParams["ELEMENT_ID"]) $iblockFilter["ID"]   = $arParams["ELEMENT_ID"];
	else                        $iblockFilter["CODE"] = $arParams["ELEMENT_CODE"];

	$queryList = CIBlockElement::GetList([], $iblockFilter, false, false, ["ID", "CODE", "IBLOCK_ID"]);
	while($queryInfo = $queryList->GetNext())
		{
		$arParams["ELEMENT_ID"]   = $queryInfo["ID"];
		$arParams["ELEMENT_CODE"] = $queryInfo["CODE"];
		$arParams["IBLOCK_ID"]    = $queryInfo["IBLOCK_ID"];
		}
	}
if(!$arParams["ELEMENT_ID"] || !$arParams["ELEMENT_CODE"] || !$arParams["IBLOCK_ID"]) return;
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$iblockInfo           = [];                                                                                                                 // iblockes info
$propsInfo            = [];                                                                                                                 // props info
$elementInfo          = [];                                                                                                                 // element info
$relativeElementsLink = [];                                                                                                                 // relative elements
$seoInfo              = (new \Bitrix\Iblock\InheritedProperty\ElementValues($arParams["IBLOCK_ID"], $arParams["ELEMENT_ID"]))->getValues(); // SEO info
$filterButtonName     = 'AV_DIRECTORIES_VIEW_IBLOCK_FILTER_'.$arParams["ELEMENT_ID"];                                                       // filter button name
/* -------------------------------------------------------------------- */
/* ----------------------------- handler ------------------------------ */
/* -------------------------------------------------------------------- */
if(is_set($_REQUEST[$filterButtonName]) && $arParams["PATH_TO_LIST"])
	{
	$_SESSION[$arParams["FILTER_VAR_NAME"]]["IBLOCK_ID"] = $arParams["IBLOCK_ID"];
	LocalRedirect($arParams["PATH_TO_LIST"]);
	}
/* -------------------------------------------------------------------- */
/* --------------------------- cache start ---------------------------- */
/* -------------------------------------------------------------------- */
if
	(
	$this->startResultCache
		(
		false,
			[
			($arParams["CACHE_GROUPS"] == 'Y' ? $USER->GetGroups() : false),
			$arParams["ELEMENT_ID"]
			]
		)
	)
	{
	/* ------------------------------------------- */
	/* --------------- iblock info --------------- */
	/* ------------------------------------------- */
	if(!count($GLOBALS["AV_DIRECTORIES_IBLOCKS_INFO"][$arParams["IBLOCK_ID"]]))
		{
		$queryList = CIBlock::GetList([], ["ID" => $arParams["IBLOCK_ID"], "ACTIVE" => 'Y']);
		while($queryInfo = $queryList->GetNext()) $GLOBALS["AV_DIRECTORIES_IBLOCKS_INFO"][$queryInfo["ID"]] = $queryInfo;
		}
	$iblockInfo = $GLOBALS["AV_DIRECTORIES_IBLOCKS_INFO"][$arParams["IBLOCK_ID"]];
	if(!count($iblockInfo)) return;
	/* ------------------------------------------- */
	/* ---------------- props info --------------- */
	/* ------------------------------------------- */
	foreach($arParams["PROPS"] as $property)
		{
		if(!count($GLOBALS["AV_DIRECTORIES_IBLOCK_PROPS_INFO"][$property]))
			{
			$queryList = CIBlockProperty::GetList(["SORT" => 'ASC'], ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => 'Y']);
			while($queryInfo = $queryList->GetNext()) $GLOBALS["AV_DIRECTORIES_IBLOCK_PROPS_INFO"][$queryInfo["ID"]] = $queryInfo;
			}
		$propsInfo[$property] = $GLOBALS["AV_DIRECTORIES_IBLOCK_PROPS_INFO"][$property];
		}
	/* ------------------------------------------- */
	/* ------------------ query ------------------ */
	/* ------------------------------------------- */
	$queryProps = $arParams["FIELDS"];
	foreach($arParams["PROPS"] as $property) $queryProps[] = 'PROPERTY_'.$property;

	$queryList = CIBlockElement::GetList([], ["ID" => $arParams["ELEMENT_ID"], "ACTIVE" => 'Y'], false, false, []);
	while($queryInfo = $queryList->GetNext())
		{
		foreach($arParams["FIELDS"] as $field)
			$elementInfo[$field] = $queryInfo[$field];

		if(count($elementInfo["DETAIL_PICTURE"]))
			{
			$elementInfo["DETAIL_PICTURE"]          = CFile::GetFileArray($elementInfo["DETAIL_PICTURE"]);
			$elementInfo["DETAIL_PICTURE"]["TITLE"] = $seoInfo["ELEMENT_DETAIL_PICTURE_FILE_TITLE"];
			$elementInfo["DETAIL_PICTURE"]["ALT"]   = $seoInfo["ELEMENT_DETAIL_PICTURE_FILE_ALT"];
			}
		if(count($elementInfo["PREVIEW_PICTURE"]))
			{
			$elementInfo["PREVIEW_PICTURE"]          = CFile::GetFileArray($elementInfo["PREVIEW_PICTURE"]);
			$elementInfo["PREVIEW_PICTURE"]["TITLE"] = $seoInfo["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"];
			$elementInfo["PREVIEW_PICTURE"]["ALT"]   = $seoInfo["ELEMENT_PREVIEW_PICTURE_FILE_ALT"];
			}

		foreach($arParams["PROPS"] as $property)
			$elementInfo["PROPS"][$property] =
				[
				"VALUE"             => $queryInfo['PROPERTY_'.$property.'_VALUE'],
				"VALUE_ID"          => $queryInfo['PROPERTY_'.$property.'_VALUE_ID'],
				"DESCRIPTION"       => $queryInfo['PROPERTY_'.$property.'_DESCRIPTION'],
				"PROPERTY_VALUE_ID" => $queryInfo['PROPERTY_'.$property.'_PROPERTY_VALUE_ID']
				];
		}
	/* ------------------------------------------- */
	/* --------- relative elements query --------- */
	/* ------------------------------------------- */
	if($arParams["SHOW_RELATIVE_ELEMENTS"] && $elementInfo["IBLOCK_SECTION_ID"])
		{
		$queryList = CIBlockElement::GetList
			(
			["NAME" => 'ASC'],
				[
				"!ID"        => $arParams["ELEMENT_ID"],
				"IBLOCK_ID"  => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $elementInfo["IBLOCK_SECTION_ID"],
				"ACTIVE"     => 'Y'
				],
			false,
			($arParams["RELATIVE_ELEMENTS_COUNT"] > 0 ? ["nPageSize" => $arParams["RELATIVE_ELEMENTS_COUNT"], "iNumPage"  => 1] : false),
			["ID", "CODE", "NAME"]
			);
		while($queryInfo = $queryList->GetNext())
			$relativeElementsLink[] =
				[
				"title" => trim($queryInfo["NAME"]),
				"link"  => str_replace(["#ELEMENT_ID#", "#ELEMENT_CODE#"], [$queryInfo["ID"], $queryInfo["CODE"]], $arParams["PATH_TO_ELEMENT"])
				];
		}
	/* ------------------------------------------- */
	/* ------------------ output ----------------- */
	/* ------------------------------------------- */
	$arResult =
		[
		"IBLOCK_TYPE_INFO"          => CIBlockType::GetByIdLang($iblockInfo["IBLOCK_TYPE_ID"]),
		"IBLOCK_INFO"               => $iblockInfo,
		"ELEMENT_INFO"              => $elementInfo,
		"SEO_INFO"                  => $seoInfo,
		"RELATIVE_ELEMENTS_LINK"    => $relativeElementsLink,
		"IBLOCK_FILTER_BUTTON_NAME" => $filterButtonName
		];

	$this->setResultCacheKeys
		([
		"IBLOCK_TYPE_INFO",
		"IBLOCK_INFO",
		"ELEMENT_INFO",
		"SEO_INFO"
		]);

	$this->IncludeComponentTemplate();
	}
/* -------------------------------------------------------------------- */
/* ------------------------ non cached actions ------------------------ */
/* -------------------------------------------------------------------- */
$this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), CIBlock::GetPanelButtons($arParams["IBLOCK_ID"], $arParams["ELEMENT_ID"])));
$APPLICATION->SetPageProperty("title",       $arResult["SEO_INFO"]["ELEMENT_META_TITLE"]);
$APPLICATION->SetPageProperty("description", $arResult["SEO_INFO"]["ELEMENT_META_DESCRIPTION"]);
$APPLICATION->SetPageProperty("keywords",    $arResult["SEO_INFO"]["ELEMENT_META_KEYWORDS"]);
$APPLICATION->SetTitle       ($arResult["ELEMENT_INFO"]["NAME"]);
?>