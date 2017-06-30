<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if($arParams["PARENT_SECTION_CODE"] && !$arParams["PARENT_SECTION"])
	$arParams["PARENT_SECTION"] = CIBlockSection::GetList([], ["CODE" => $arParams["PARENT_SECTION_CODE"]], false, ["ID"])->GetNext()["ID"];
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$currentSectionUrl =
	($arParams["PARENT_SECTION"] || $arParams["PARENT_SECTION_CODE"])
		? str_replace
			(
			["#SECTION_ID#",             "#SECTION_CODE#"],
			[$arParams["PARENT_SECTION"], $arParams["PARENT_SECTION_CODE"]],
			$arParams["SECTION_URL"]
			)
		: '';
$currentSubsectionUrl =
	($arParams["SUBSECTION"] || $arParams["SUBSECTION_CODE"])
		? str_replace
			(
			["#PARENT_SECTION_ID#",       "#PARENT_SECTION_CODE#",          "#SECTION_ID#",          "#SECTION_CODE#"],
			[$arParams["PARENT_SECTION"], $arParams["PARENT_SECTION_CODE"], $arParams["SUBSECTION"], $arParams["SUBSECTION_CODE"]],
			$arParams["SUBSECTION_URL"]
			)
		: '';
$rootSectionArray = [];
if(in_array('SECTION_ID', $arParams["FIELD_CODE"]) || in_array('SUBSECTION', $arParams["FIELD_CODE"]))
	{
	$queryList = CIBlockSection::GetList(["NAME" => 'ASC'], ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "SECTION_ID" => false], false, ["ID", "CODE", "NAME"]);
	while($queryElement = $queryList->GetNext())
		$rootSectionArray[$queryElement["ID"]] =
			[
			"NAME" => $queryElement["NAME"],
			"CODE" => $queryElement["CODE"]
			];
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- props info ---------------------------- */
/* -------------------------------------------------------------------- */
$propsInfo = [];
$queryList = CIBlockProperty::GetList([], ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => 'Y']);
while($queryInfo = $queryList->GetNext()) $propsInfo[$queryInfo["CODE"]] = $queryInfo;
/* -------------------------------------------------------------------- */
/* --------------------------- url redirect --------------------------- */
/* -------------------------------------------------------------------- */
$urlParamsArray = [];
$needRedirect   = false;

if($arParams["APPLIED_FILTER_URL"])
	foreach([$arResult["FILTER_NAME"].'_ff', $arResult["FILTER_NAME"].'_pf'] as $filterArrayIndex)
		if(is_set($_GET[$filterArrayIndex]))
			foreach($_GET[$filterArrayIndex] as $index => $value)
				{
				$needRedirect = true;
				$value        = is_array($value) ? $value : [$value];
				foreach($value as $valueIndex => $valueString)
					$value[$valueIndex] = urlencode(mb_ereg_replace('%[^A-Za-zА-Яа-я0-9]%', '', str_replace('/', '', $valueString), PREG_OFFSET_CAPTURE));

				if($value[0] && (in_array($index, $arParams["FIELD_CODE"]) || in_array($index, $arParams["PROPERTY_CODE"])))
					$urlParamsArray[] = $index.'-is-'.implode(':', $value);
				}

if($needRedirect)
	{
	$redirectUrl = $arParams["EMPTY_FILTER_URL"];
	foreach($arResult["arrInputNames"] as $index => $value) unset($_GET[$index]);
	if(count($urlParamsArray) && $arParams["APPLIED_FILTER_URL"]) $redirectUrl = str_replace('#FILTER_PARAMS#', implode('-AND-', $urlParamsArray), $arParams["APPLIED_FILTER_URL"]);
	LocalRedirect($redirectUrl.(count($_GET) ? '?' : '').http_build_query($_GET));
	}
/* -------------------------------------------------------------------- */
/* --------------------------- url parsing ---------------------------- */
/* -------------------------------------------------------------------- */
foreach(explode('-AND-', $arParams["FILTER_URL_PARAMS"]) as $string)
	{
	$explodeArray = explode('-is-', $string);
	if(!$explodeArray[0] || !$explodeArray[1]) continue;

	$field = $explodeArray[0];
	$value = explode(':', $explodeArray[1]);

	foreach($value as $index => $valueString)
		$value[$index] = str_replace('/', '', mb_ereg_replace('%[^A-Za-zА-Яа-я0-9]%', '', urldecode($valueString)));
	if(count($value) <= 1) $value = $value[0];

	if(in_array($field, $arParams["FIELD_CODE"]))
		{
		if($field == 'NAME') $field = '?'.$field;
		$GLOBALS[$arResult["FILTER_NAME"]][$field] = $value;
		}
	elseif(in_array($field, $arParams["PROPERTY_CODE"]))
		{
		if($propsInfo[$field]["PROPERTY_TYPE"] == 'E') $field = '?'.$field;
		$GLOBALS[$arResult["FILTER_NAME"]]["PROPERTY"][$field] = $value;
		}
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ fields ------------------------------ */
/* -------------------------------------------------------------------- */
$arResult["HIDDEN_FIELDS"]  = [];
foreach($arResult["ITEMS"] as $field => $fieldInfo)
	{
	if($fieldInfo["HIDDEN"])
		{
		$arResult["HIDDEN_FIELDS"][] = $fieldInfo["INPUT"];
		unset($arResult["ITEMS"][$field]);
		}
	else
		{
		$fieldInfo["VALUE_LIST"]  = [];
		$fieldInfo["INPUT_VALUE"] = $GLOBALS[$arResult["FILTER_NAME"]][$field];

		if($field == 'NAME')
			{
			$fieldInfo["TYPE"]        = 'SEARCH';
			$fieldInfo["INPUT_VALUE"] = $GLOBALS[$arResult["FILTER_NAME"]]['?'.$field];
			}
		if($fieldInfo["TYPE"] == 'SELECT')
			foreach($fieldInfo["LIST"] as $index => $value)
				if($index)
					$fieldInfo["VALUE_LIST"][$index] = str_replace(['.', ' '], '', $value);

		$arResult["ITEMS"][$field] = $fieldInfo;
		}
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ props ------------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult["arrProp"] as $propId => $propInfo)
	{
	$propInfo["TYPE"]        = 'STRING';
	$propInfo["INPUT_NAME"]  = $arResult["FILTER_NAME"].'_pf['.$propInfo["CODE"].']';
	$propInfo["INPUT_VALUE"] = $GLOBALS[$arResult["FILTER_NAME"]]["PROPERTY"][$propInfo["CODE"]];

	if($propInfo["PROPERTY_TYPE"] == 'E')
		{
		$propInfo["TYPE"]        = 'IBLOCK_ELEMENT';
		$propInfo["IBLOCK_ID"]   = $propsInfo[$propInfo["CODE"]]["LINK_IBLOCK_ID"];
		$propInfo["INPUT_VALUE"] = $GLOBALS[$arResult["FILTER_NAME"]]["PROPERTY"]['?'.$propInfo["CODE"]];
		}
	if($propInfo["PROPERTY_TYPE"] == 'L')
		$propInfo["TYPE"] = $propInfo["LIST_TYPE"] == 'C' ? 'RADIO' : 'SELECT';

	$arResult["arrProp"][$propInfo["CODE"]] = $propInfo;
	unset($arResult["ITEMS"]['PROPERTY_'.$propId]);
	unset($arResult["arrProp"][$propId]);
	}
/* -------------------------------------------------------------------- */
/* --------------------------- fields sort ---------------------------- */
/* -------------------------------------------------------------------- */
$arParams["FIELDS_SORT"] = count($arParams["FIELDS_SORT"]) ? $arParams["FIELDS_SORT"] : array_merge($arParams["FIELD_CODE"], $arParams["PROPERTY_CODE"]);

$arResult["FIELDS"] = [];
foreach($arParams["FIELDS_SORT"] as $field)
	$arResult["FIELDS"][$field] = count($arResult["ITEMS"][$field]) ? $arResult["ITEMS"][$field] : $arResult["arrProp"][$field];
/* -------------------------------------------------------------------- */
/* -------------------------- section filter -------------------------- */
/* -------------------------------------------------------------------- */
if(count($arResult["FIELDS"]["SECTION_ID"]))
	{
	$arResult["FIELDS"]["SECTION_ID"]["NAME"] = CIBlock::GetMessages($arParams["IBLOCK_ID"])["SECTION_NAME"];

	if($arParams["LIST_URL"] && $arParams["SECTION_URL"])
		{
		$arResult["FIELDS"]["SECTION_ID"]["TYPE"]        = 'LINKS_LIST';
		$arResult["FIELDS"]["SECTION_ID"]["VALUE_LIST"]  = [];
		$arResult["FIELDS"]["SECTION_ID"]["INPUT_VALUE"] = $currentSectionUrl;
		if($arParams["PARENT_SECTION"])
			$arResult["FIELDS"]["SECTION_ID"]["VALUE_LIST"][$arParams["LIST_URL"]] = $arResult["FIELDS"]["SECTION_ID"]["NAME"];

		foreach($rootSectionArray as $sectiionId => $sectionInfo)
			{
			$link = str_replace(['#SECTION_ID#', '#SECTION_CODE#'], [$sectiionId, $sectionInfo["CODE"]], $arParams["SECTION_URL"]);
			$arResult["FIELDS"]["SECTION_ID"]["VALUE_LIST"][$link] = $sectionInfo["NAME"];
			}
		}
	}
/* -------------------------------------------------------------------- */
/* ------------------------- subsection filter ------------------------ */
/* -------------------------------------------------------------------- */
if(array_key_exists('SUBSECTION', $arResult["FIELDS"]))
	{
	$arResult["FIELDS"]["SUBSECTION"] =
		[
		"TYPE"        => 'LINKS_LIST',
		"NAME"        => $arParams["SUBSECTION_TITLE"],
		"VALUE_LIST"  => [],
		"INPUT_VALUE" => $currentSubsectionUrl,
		];
	if($arParams["SUBSECTION"] || $arParams["SUBSECTION_CODE"])
		$arResult["FIELDS"]["SUBSECTION"]["VALUE_LIST"][$currentSectionUrl] = $arResult["FIELDS"]["SUBSECTION"]["NAME"];

	$queryFilter = ["IBLOCK_ID" => $arParams["IBLOCK_ID"]];
	if($arParams["PARENT_SECTION"]) $queryFilter["SECTION_ID"]  = $arParams["PARENT_SECTION"];
	else                            $queryFilter["DEPTH_LEVEL"] = 2;

	$queryList = CIBlockSection::GetList(["NAME" => 'ASC'], $queryFilter, false, ["ID", "CODE", "NAME", "IBLOCK_SECTION_ID"]);
	while($queryElement = $queryList->GetNext())
		{
		$link = str_replace
			(
			["#PARENT_SECTION_ID#",              "#PARENT_SECTION_CODE#",                                       "#SECTION_ID#",      "#SECTION_CODE#"],
			[$queryElement["IBLOCK_SECTION_ID"], $rootSectionArray[$queryElement["IBLOCK_SECTION_ID"]]["CODE"], $queryElement["ID"], $queryElement["CODE"]],
			$arParams["SUBSECTION_URL"]
			);
		$arResult["FIELDS"]["SUBSECTION"]["VALUE_LIST"][$link] = $queryElement["NAME"];
		}
	}
/* -------------------------------------------------------------------- */
/* -------------------------- filter applied -------------------------- */
/* -------------------------------------------------------------------- */
$arResult["FILTER_APPLIED"] = false;
foreach($arResult["FIELDS"] as $fieldInfo)
	if($fieldInfo["INPUT_VALUE"])
		$arResult["FILTER_APPLIED"] = true;