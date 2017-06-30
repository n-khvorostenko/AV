<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$arParams["MARKUP_TYPE"] = $arParams["MARKUP_TYPE"] ? $arParams["MARKUP_TYPE"] : 'STANDART';

$arResult["FILTER_HTML"]             = '';
$arResult["LIST_HTML"]               = '';
$arResult["SHARING_HTML"]            = '';
$arResult["CATEGORY_APPLIED_FILTER"] = [];
$arResult["LIST_DESCRIPTION"]        = '';
$arResult["SECTION_DESCRIPTION"]     = '';
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
if($arResult["VARIABLES"]["ELEMENT_ID"] || $arResult["VARIABLES"]["ELEMENT_CODE"])
	$elementInfo = CIBlockElement::GetList
		(
		[],
			[
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ID"        => $arResult["VARIABLES"]["ELEMENT_ID"],
			"CODE"      => $arResult["VARIABLES"]["ELEMENT_CODE"]
			],
		false, false,
		["ID", "CODE", "NAME", "IBLOCK_SECTION_ID"]
		)->GetNext();
if($arResult["VARIABLES"]["SECTION_ID"] || $arResult["VARIABLES"]["SECTION_CODE"])
	$sectionInfo = CIBlockSection::GetList
		(
		[],
			[
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ID"        => $arResult["VARIABLES"]["SECTION_ID"],
			"CODE"      => $arResult["VARIABLES"]["SECTION_CODE"]
			],
		false, false,
		["ID", "CODE", "NAME", "DESCRIPTION"]
		)->GetNext();
if($arResult["VARIABLES"]["PARENT_SECTION_ID"] || $arResult["VARIABLES"]["PARENT_SECTION_CODE"])
	$parentSectionInfo = CIBlockSection::GetList
		(
		[],
			[
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ID"        => $arResult["VARIABLES"]["PARENT_SECTION_ID"],
			"CODE"      => $arResult["VARIABLES"]["PARENT_SECTION_CODE"]
			],
		false, false,
		["ID", "CODE", "NAME", "DESCRIPTION"]
		)->GetNext();

$urlTemplates = $arResult["URL_TEMPLATES"];
$pageType     = 'list';

if($elementInfo["ID"] || $elementInfo["CODE"])         $pageType = 'detail';
elseif($sectionInfo["ID"] || $parentSectionInfo["ID"]) $pageType = 'section';

$currentListPage = $_GET["PAGEN_1"] ? $_GET["PAGEN_1"] : 1;
/* -------------------------------------------------------------------- */
/* --------------------------- filter html ---------------------------- */
/* -------------------------------------------------------------------- */
if($pageType != 'detail' && $arParams["USE_FILTER"] == 'Y')
	{
	$emptyFilterUrl   = $urlTemplates["news"];
	$appliedFilterUrl = $urlTemplates["filter"];

	if(count($parentSectionInfo))
		{
		$emptyFilterUrl   = str_replace(["#PARENT_SECTION_ID#", "#PARENT_SECTION_CODE#", "#SECTION_ID#", "#SECTION_CODE#"], [$parentSectionInfo["ID"], $parentSectionInfo["CODE"], $sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["subsection"]);
		$appliedFilterUrl = str_replace(["#PARENT_SECTION_ID#", "#PARENT_SECTION_CODE#", "#SECTION_ID#", "#SECTION_CODE#"], [$parentSectionInfo["ID"], $parentSectionInfo["CODE"], $sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["subsection_filter"]);
		}
	elseif(count($sectionInfo))
		{
		$emptyFilterUrl   = str_replace(["#SECTION_ID#", "#SECTION_CODE#"], [$sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["section"]);
		$appliedFilterUrl = str_replace(["#SECTION_ID#", "#SECTION_CODE#"], [$sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["section_filter"]);
		}

	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog.filter", $arParams["FILTER_TEMPLATE"],
			[
			"IBLOCK_TYPE"   => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"     => $arParams["IBLOCK_ID"],
			"FILTER_NAME"   => $arParams["FILTER_NAME"],
			"FIELD_CODE"    => $arParams["FILTER_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],

			"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
			"CACHE_TIME"   => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

			"SAVE_IN_SESSION"   => 'N',
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

			"PARENT_SECTION"      => $parentSectionInfo["ID"]   ? $parentSectionInfo["ID"]   : $sectionInfo["ID"],
			"PARENT_SECTION_CODE" => $parentSectionInfo["CODE"] ? $parentSectionInfo["CODE"] : $sectionInfo["CODE"],
			"SUBSECTION"          => $parentSectionInfo["ID"]   ? $sectionInfo["ID"]         : '',
			"SUBSECTION_CODE"     => $parentSectionInfo["CODE"] ? $sectionInfo["CODE"]       : '',

			"MARKUP_TYPE"        => $arParams["FILTER_MARKUP_TYPE"],
			"FIELDS_SORT"        => $arParams["FILTER_FIELDS_SORT"],
			"LIST_URL"           => $arResult["FOLDER"].$urlTemplates["news"],
			"EMPTY_FILTER_URL"   => $arResult["FOLDER"].$emptyFilterUrl,
			"APPLIED_FILTER_URL" => $appliedFilterUrl           ? $arResult["FOLDER"].$appliedFilterUrl           : '',
			"SECTION_URL"        => $urlTemplates["section"]    ? $arResult["FOLDER"].$urlTemplates["section"]    : '',
			"SUBSECTION_URL"     => $urlTemplates["subsection"] ? $arResult["FOLDER"].$urlTemplates["subsection"] : '',
			"FILTER_URL_PARAMS"  => $arResult["VARIABLES"]["FILTER_PARAMS"],
			"SUBSECTION_TITLE"   => $arParams["FILTER_SUBSECTION_TITLE"]
			]
		);
	$arResult["FILTER_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- list html ----------------------------- */
/* -------------------------------------------------------------------- */
if($pageType != 'detail')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:news.list", $arParams["LIST_TEMPLATE"],
			[
			"AJAX_MODE"           => $arParams["AJAX_MODE"],
			"AJAX_OPTION_JUMP"    => $arParams["AJAX_OPTION_JUMP"],
			"AJAX_OPTION_STYLE"   => $arParams["AJAX_OPTION_STYLE"],
			"AJAX_OPTION_HISTORY" => $arParams["AJAX_OPTION_HISTORY"],

			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"   => $arParams["IBLOCK_ID"],
			"NEWS_COUNT"  => $arParams["NEWS_COUNT"],

			"SORT_BY1"    => $arParams["SORT_BY1"],
			"SORT_ORDER1" => $arParams["SORT_ORDER1"],
			"SORT_BY2"    => $arParams["SORT_BY2"],
			"SORT_ORDER2" => $arParams["SORT_ORDER2"],

			"FILTER_NAME"   => $arParams["FILTER_NAME"],
			"FIELD_CODE"    => $arParams["LIST_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"CHECK_DATES"   => $arParams["CHECK_DATES"],

			"DETAIL_URL"         => $arResult["FOLDER"].$urlTemplates["detail"],
			"IBLOCK_URL"         => $arResult["FOLDER"].$urlTemplates["news"],
			"SECTION_URL"        => $urlTemplates["section"]        ? $arResult["FOLDER"].$urlTemplates["section"]        : '',
			"FILTER_SECTION_URL" => $urlTemplates["section_filter"] ? $arResult["FOLDER"].$urlTemplates["section_filter"] : '',

			"PREVIEW_TRUNCATE_LEN"      => $arParams["PREVIEW_TRUNCATE_LEN"],
			"ACTIVE_DATE_FORMAT"        => $arParams["LIST_ACTIVE_DATE_FORMAT"],
			"SET_TITLE"                 => $arParams["SET_TITLE"],
			"SET_BROWSER_TITLE"         => 'Y',
			"SET_META_KEYWORDS"         => 'Y',
			"SET_META_DESCRIPTION"      => 'Y',
			"SET_LAST_MODIFIED"         => $arParams["SET_LAST_MODIFIED"],
			"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
			"ADD_SECTIONS_CHAIN"        => $arParams["ADD_SECTIONS_CHAIN"],
			"HIDE_LINK_WHEN_NO_DETAIL"  => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
			"PARENT_SECTION"            => $sectionInfo["ID"]   ? $sectionInfo["ID"]   : $arParams["PARENT_SECTION"],
			"PARENT_SECTION_CODE"       => $sectionInfo["CODE"] ? $sectionInfo["CODE"] : $arParams["PARENT_SECTION_CODE"],
			"INCLUDE_SUBSECTIONS"       => 'Y',
			"DISPLAY_DATE"              => $arParams["DISPLAY_DATE"],
			"DISPLAY_NAME"              => $arParams["DISPLAY_NAME"],
			"DISPLAY_PICTURE"           => $arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT"      => $arParams["DISPLAY_PREVIEW_TEXT"],

			"PAGER_TEMPLATE"                  => $arParams["PAGER_TEMPLATE"],
			"DISPLAY_TOP_PAGER"               => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER"            => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE"                     => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS"               => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_DESC_NUMBERING"            => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL"                  => $arParams["PAGER_SHOW_ALL"],
			"PAGER_BASE_LINK_ENABLE"          => $arParams["PAGER_BASE_LINK_ENABLE"],
			"PAGER_BASE_LINK"                 => $arParams["PAGER_BASE_LINK"],
			"PAGER_PARAMS_NAME"               => $arParams["PAGER_PARAMS_NAME"],

			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"SHOW_404"       => $arParams["SHOW_404"],
			"MESSAGE_404"    => $arParams["MESSAGE_404"],
			"FILE_404"       => $arParams["FILE_404"],

			"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
			"CACHE_TIME"   => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

			"USE_RATING" => $arParams["USE_RATING"],
			"MAX_VOTE"   => $arParams["MAX_VOTE"],
			"VOTE_NAMES" => $arParams["VOTE_NAMES"],

			"MARKUP_TYPE"       => $arParams["LIST_MARKUP_TYPE"],
			"FILTER_URL_PARAMS" => $arResult["VARIABLES"]["FILTER_PARAMS"],
			"FULL_PARAMS"       => $arParams
			]
		);
	$arResult["LIST_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* --------------------------- sharing html --------------------------- */
/* -------------------------------------------------------------------- */
if($pageType != 'detail' && $arParams["USE_SHARE"] == 'Y')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:main.share", $arParams["SHARE_TEMPLATE"],
			[
			"HANDLERS"   => $arParams["SHARE_HANDLERS"],
			"PAGE_TITLE" => $APPLICATION->GetTitle(),
			"PAGE_URL"   => CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.str_replace('index.php', '', $_SERVER["SCRIPT_URL"])
			]
		);
	$arResult["SHARING_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ----------------------- same articles filter ----------------------- */
/* -------------------------------------------------------------------- */
if($pageType == 'detail' && $arParams["USE_CATEGORIES"] == 'Y')
	foreach($arParams["CATEGORY_IBLOCK"] as $iblockId)
		{
		$filterArray = [];

		if($arParams["CATEGORY_CODE"])
			{
			$queryList = CIBlockElement::GetProperty($iblockId, $elementInfo["ID"], ["SORT" => 'asc'], ["ACTIVE" => 'Y', "CODE" => $arParams["CATEGORY_CODE"]]);
			while($queryInfo = $queryList->Fetch()) $filterArray['PROPERTY_'.$arParams["CATEGORY_CODE"]] = $queryInfo["VALUE"];
			}
		if($arParams["SAME_ARTICLES_SEARCH_IN_SECTION"] == 'Y') $filterArray["SECTION_ID"] = $elementInfo["IBLOCK_SECTION_ID"];
		if(count($arParams["CATEGORY_ADDITIONAL_FILTER"]))      $filterArray = array_merge($filterArray, $arParams["CATEGORY_ADDITIONAL_FILTER"]);

		if(!count($filterArray)) return;
		$GLOBALS['AV_NEWS_SAME_ARTICLES_FILTER_'.$iblockId] = array_merge($filterArray, ["!ID" => $elementInfo["ID"], "ACTIVE" => 'Y', "ACTIVE_DATE" => 'Y']);
		$arResult["CATEGORY_APPLIED_FILTER"][$iblockId] = 'AV_NEWS_SAME_ARTICLES_FILTER_'.$iblockId;
		}
/* -------------------------------------------------------------------- */
/* ------------------------- list/section info ------------------------ */
/* -------------------------------------------------------------------- */
if($pageType == 'list' && ($arParams["MARKUP_TYPE"] == 'TWO_COLUMNS' || $currentListPage == 1))
	$arResult["LIST_DESCRIPTION"] = CIBlock::GetArrayByID($arParams["IBLOCK_ID"])["DESCRIPTION"];

if(in_array($pageType, ["section", "subsection"]) && $currentListPage == 1)
	{
	$sectionSeoInfo = (new \Bitrix\Iblock\InheritedProperty\SectionValues($arParams["IBLOCK_ID"], $sectionInfo["ID"]))->getValues();
	$APPLICATION->SetTitle($sectionSeoInfo["SECTION_PAGE_TITLE"]);
	$arResult["SECTION_DESCRIPTION"] = CIBlockSection::GetList([], ["ID" => $sectionInfo["ID"]], false, ["ID", "DESCRIPTION"])->GetNext()["DESCRIPTION"];
	}
/* -------------------------------------------------------------------- */
/* ------------------------- navigation chain ------------------------- */
/* -------------------------------------------------------------------- */
if($arParams["ADD_SUBSECTIONS_CHAIN"] == 'Y' && $arParams["ADD_SECTIONS_CHAIN"] != 'Y')
	{
	if(count($parentSectionInfo))
		$APPLICATION->AddChainItem
			(
			$parentSectionInfo["NAME"],
			str_replace
				(
				["#SECTION_ID#", "#SECTION_CODE#"],
				[$parentSectionInfo["ID"], $parentSectionInfo["CODE"]],
				$arResult["FOLDER"].$urlTemplates["section"]
				)
			);
	if(count($sectionInfo))
		$APPLICATION->AddChainItem
			(
			$sectionInfo["NAME"],
			str_replace
				(
				["#PARENT_SECTION_ID#",    "#PARENT_SECTION_CODE#",    "#SECTION_ID#",     "#SECTION_CODE#"],
				[$parentSectionInfo["ID"], $parentSectionInfo["CODE"], $sectionInfo["ID"], $sectionInfo["CODE"]],
				$arResult["FOLDER"].$urlTemplates["subsection"]
				)
			);
	}