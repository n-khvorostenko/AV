<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!\Bitrix\Main\Loader::includeModule("iblock"))               return;
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["IBLOCK_ID"]       = is_array($arParams["IBLOCK_ID"]) ? array_values(array_diff($arParams["IBLOCK_ID"], [''])) : [];
$arParams["FILTER_VAR_NAME"] = $arParams["FILTER_VAR_NAME"]     ? trim($arParams["FILTER_VAR_NAME"])                     : 'AV_DIRECTORIES_FILTER';
$arParams["FIELDS"]          = is_array($arParams["FIELDS"])    ? array_values(array_diff($arParams["FIELDS"],    [''])) : [];

foreach($arParams["IBLOCK_ID"] as $iblockId)
	$arParams['PROPS_'.$iblockId] = is_array($arParams['PROPS_'.$iblockId]) ? array_values(array_diff($arParams['PROPS_'.$iblockId], [''])) : [];

$arParams["CACHE_TIME"]      = (int)$arParams["CACHE_TIME"]     ? (int)$arParams["CACHE_TIME"] : 36000000;
$arParams["CACHE_FILTER"]    = $arParams["CACHE_FILTER"] == 'Y' ? 'Y'                          : 'N';
$arParams["CACHE_GROUPS"]    = $arParams["CACHE_GROUPS"] == 'Y' ? 'Y'                          : 'N';
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$iblocksInfo     = [];                                                                                            // iblockes info
$iblockPropsInfo = [];                                                                                            // props info
$formFieldsInfo  = [];                                                                                            // form fields info
$appliedFilter   = count($_SESSION[$arParams["FILTER_VAR_NAME"]]) ? $_SESSION[$arParams["FILTER_VAR_NAME"]] : []; // applied filter
$formPrefixName  = 'AV_DIRECTORIES_FILTER';                                                                       // form fields name prefix
$formSubmitName  = 'AV_DIRECTORIES_FILTER_APPLY';                                                                 // submit button name
$formCancelName  = 'AV_DIRECTORIES_FILTER_CANCEL';                                                                // cancel button name
/* -------------------------------------------------------------------- */
/* ----------------------------- handler ------------------------------ */
/* -------------------------------------------------------------------- */
if(is_set($_REQUEST[$formSubmitName]) || is_set($_REQUEST[$formCancelName]))
	{
	// url redirect link
	$redirectUrl = $APPLICATION->GetCurPage(false);
	if(count($_GET))
		{
		$varsValueArray = [];
		foreach($_GET as $index => $value) $varsValueArray[] = $index.'='.$value;
		$redirectUrl .= '?'.implode('&', $varsValueArray);
		}
	// set filter
	unset($_SESSION[$arParams["FILTER_VAR_NAME"]]);
	if(is_set($_REQUEST[$formSubmitName]))
		foreach($arParams["FIELDS"] as $field)
			{
			$value = $_REQUEST[$formPrefixName]["fields"][$field];
			if($value != false) $_SESSION[$arParams["FILTER_VAR_NAME"]][$field] = $value;
			}
	// redirect
	LocalRedirect($redirectUrl);
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
			($arParams["CACHE_FILTER"] == 'Y' ? $appliedFilter     : false)
			]
		)
	)
	{
	/* ------------------------------------------- */
	/* -------------- iblockes info -------------- */
	/* ------------------------------------------- */
	$iblockNeedQuery = [];
	foreach($arParams["IBLOCK_ID"] as $iblockId)
		if(!count($GLOBALS["AV_DIRECTORIES_IBLOCKS_INFO"][$iblockId]))
			$iblockNeedQuery[] = $iblockId;

	if(count($iblockNeedQuery))
		{
		$queryList = CIBlock::GetList(["SORT" => 'ASC'], ["ID" => $iblockNeedQuery, "ACTIVE" => 'Y']);
		while($queryInfo = $queryList->GetNext()) $GLOBALS["AV_DIRECTORIES_IBLOCKS_INFO"][$queryInfo["ID"]] = $queryInfo;
		}

	foreach($arParams["IBLOCK_ID"] as $iblockId)
		$iblocksInfo[$iblockId] = $GLOBALS["AV_DIRECTORIES_IBLOCKS_INFO"][$iblockId];

	$arParams["IBLOCK_ID"] = array_keys($iblocksInfo);
	if(!count($arParams["IBLOCK_ID"])) return;
	/* ------------------------------------------- */
	/* --------------- props info ---------------- */
	/* ------------------------------------------- */
	foreach($arParams["IBLOCK_ID"] as $iblockId)
		foreach($arParams['PROPS_'.$iblockId] as $property)
			{
			if(!count($GLOBALS["AV_DIRECTORIES_IBLOCK_PROPS_INFO"][$property]))
				{
				$queryList = CIBlockProperty::GetList(["SORT" => 'ASC'], ["IBLOCK_ID" => $iblockId, "ACTIVE" => 'Y']);
				while($queryInfo = $queryList->GetNext()) $GLOBALS["AV_DIRECTORIES_IBLOCK_PROPS_INFO"][$queryInfo["ID"]] = $queryInfo;
				}
			$iblockPropsInfo[$property] = $GLOBALS["AV_DIRECTORIES_IBLOCK_PROPS_INFO"][$property];
			}
	/* ------------------------------------------- */
	/* -------------- filter fields -------------- */
	/* ------------------------------------------- */
	foreach($arParams["FIELDS"] as $field)
		{
		$arrayInfo =
			[
			"FIELD" => $field,
			"NAME"  => $formPrefixName.'[fields]['.$field.']',
			"VALUE" => $appliedFilter[$field]
			];

		switch($field)
			{
			case "NAME":
				$arrayInfo["TYPE"]      = 'SEARCH';
				$arrayInfo["IBLOCK_ID"] = $arParams["IBLOCK_ID"];
				break;
			case "IBLOCK_ID":
				$arrayInfo["TYPE"] = 'LIST';
				$arrayInfo["LIST"] = [];
				foreach($arParams["IBLOCK_ID"] as $iblockId)
					$arrayInfo["LIST"][$iblockId] = $iblocksInfo[$iblockId]["NAME"];
				break;
			}

		$formFieldsInfo[] = $arrayInfo;
		}
	/* ------------------------------------------- */
	/* ------------------ output ----------------- */
	/* ------------------------------------------- */
	$arResult =
		[
		"FIELDS_INFO"    => $formFieldsInfo,
		"SUBMIT_NAME"    => $formSubmitName,
		"CANCEL_NAME"    => $formCancelName,
		"FILTER_APPLIED" => count($_SESSION[$arParams["FILTER_VAR_NAME"]]) ? true : false
		];

	$this->IncludeComponentTemplate();
	}
?>