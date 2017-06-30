<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!\Bitrix\Main\Loader::includeModule("iblock"))               return;
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["IBLOCK_ID"]       = is_array($arParams["IBLOCK_ID"])                  ? $arParams["IBLOCK_ID"]             : [];
$arParams["PATH_TO_ELEMENT"] = trim($arParams["PATH_TO_ELEMENT"]);
$arParams["FILTER_VAR_NAME"] = $arParams["FILTER_VAR_NAME"]                      ? trim($arParams["FILTER_VAR_NAME"]) : 'AV_DIRECTORIES_FILTER';

$arParams["SORT_FIELD"]      = $arParams["SORT_FIELD"]                           ? trim($arParams["SORT_FIELD"])      : 'ID';
$arParams["SORT_TYPE"]       = in_array($arParams["SORT_TYPE"], ['ASC', 'DESC']) ? $arParams["SORT_TYPE"]             : 'ASC';
$arParams["FIELDS"]          = is_array($arParams["FIELDS"])                     ? $arParams["FIELDS"]                : [];

foreach($arParams["IBLOCK_ID"] as $iblockId)
	$arParams['PROPS_'.$iblockId] = is_array($arParams['PROPS_'.$iblockId]) ? array_values(array_diff($arParams['PROPS_'.$iblockId], [''])) : [];

$arParams["ELEMENTS_COUNT"]  = (int)$arParams["ELEMENTS_COUNT"];
$arParams["DEFAULT_FILTER"]  = is_array($arParams["DEFAULT_FILTER"])             ? $arParams["DEFAULT_FILTER"]        : [];

$arParams["CACHE_TIME"]      = (int)$arParams["CACHE_TIME"]                      ? (int)$arParams["CACHE_TIME"]       : 36000000;
$arParams["CACHE_FILTER"]    = $arParams["CACHE_FILTER"] == 'Y'                  ? 'Y'                                : 'N';
$arParams["CACHE_GROUPS"]    = $arParams["CACHE_GROUPS"] == 'Y'                  ? 'Y'                                : 'N';
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$iblocksInfo       = [];                                                                                                                                        // iblockes info
$iblockPropsInfo   = [];                                                                                                                                        // props info
$lettersQueryArray = [];                                                                                                                                        // alphabet
$iblockQueryResult = [];                                                                                                                                        // query
$appliedFilter     = array_merge($arParams["DEFAULT_FILTER"], (count($_SESSION[$arParams["FILTER_VAR_NAME"]]) ? $_SESSION[$arParams["FILTER_VAR_NAME"]] : [])); // applied filter
$appliedPager      = $arParams["ELEMENTS_COUNT"] ? ["nPageSize" => $arParams["ELEMENTS_COUNT"] + 1, "iNumPage"  => 1] : false;                                  // applied pager
$queryProps        = array_merge($arParams["FIELDS"], ["ID", "CODE", "NAME", "IBLOCK_ID"]);                                                                     // props for query
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
			($arParams["CACHE_FILTER"] == 'Y' ? $appliedFilter     : false),
			$arParams["PAGER_COUNT"], $_SESSION[$arParams["PAGER_VAR_NAME"]]
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
	/* -------------- query params --------------- */
	/* ------------------------------------------- */
	// filter
	foreach($appliedFilter as $index => $value)
		$appliedFilter[$index] = array_values(array_diff(is_array($value) ? $value : [$value], ['']));

	$appliedFilter["ACTIVE"] = 'Y';
	foreach($appliedFilter["IBLOCK_ID"] as $index => $iblockId)
		if(!in_array($iblockId, $arParams["IBLOCK_ID"]))
			unset($appliedFilter["IBLOCK_ID"][$index]);
	if(!count($appliedFilter["IBLOCK_ID"])) $appliedFilter["IBLOCK_ID"] = $arParams["IBLOCK_ID"];
	// props for query
	foreach($arParams["IBLOCK_ID"] as $iblockId)
		foreach($arParams['PROPS_'.$iblockId] as $property)
			$queryProps[] = 'PROPERTY_'.$property;
	/* ------------------------------------------- */
	/* ----------------- alphabet ---------------- */
	/* ------------------------------------------- */
	foreach(range(chr(0xC0), chr(0xDF)) as $letter) $lettersQueryArray[] = iconv('CP1251', 'UTF-8', $letter);
	foreach(range('a', 'z')             as $letter) $lettersQueryArray[] = ToUpper($letter);
	foreach(range('0', '9')             as $letter) $lettersQueryArray[] = $letter;
	/* ------------------------------------------- */
	/* ------------------- query ----------------- */
	/* ------------------------------------------- */
	foreach($lettersQueryArray as $letter)
		{
		$iblockQueryResult[$letter] =
			[
			"elements"      => [],
			"more_elements" => false
			];
		/* ---------------------------- */
		/* ------ filter by name ------ */
		/* ---------------------------- */
		$filterByName = [];
		foreach($appliedFilter["NAME"] as $value)
			{
			if(ToUpper(mb_substr($value, 0, 1, 'UTF-8')) == "$letter") $filterByName[] = $value.'%';
			elseif(strlen($value) > 1)                                 $filterByName[] = $letter.'%'.$value.'%';
			}

		if(count($appliedFilter["NAME"]) && !count($filterByName)) continue;
		if(!count($filterByName)) $filterByName = [$letter.'%'];
		/* ---------------------------- */
		/* ----------- query ---------- */
		/* ---------------------------- */
		$queryList = CIBlockElement::GetList([$arParams["SORT_FIELD"] => $arParams["SORT_TYPE"]], array_merge($appliedFilter, ["NAME" => $filterByName]), false, $appliedPager, $queryProps);
		while($queryInfo = $queryList->GetNext())
			{
			// main info
			$panelButtonsInfo = CIBlock::GetPanelButtons($queryInfo["IBLOCK_ID"], $queryInfo["ID"]);
			$infoArray        =
				[
				"ID"          => $queryInfo["ID"],
				"NAME"        => $queryInfo["NAME"],
				"IBLOCK_ID"   => $queryInfo["IBLOCK_ID"],
				"LINK"        => str_replace(["#ELEMENT_ID#", "#ELEMENT_CODE#"], [$queryInfo["ID"], $queryInfo["CODE"]], $arParams["PATH_TO_ELEMENT"]),
				"EDIT_LINK"   => $panelButtonsInfo["edit"]["edit_element"]  ["ACTION_URL"],
				"DELETE_LINK" => $panelButtonsInfo["edit"]["delete_element"]["ACTION_URL"],
				"PROPS"       => []
				];
			// props values
			foreach($arParams["IBLOCK_ID"] as $iblockId)
				foreach($arParams['PROPS_'.$iblockId] as $property)
					$infoArray["PROPS"][$property] =
						[
						"VALUE"             => $queryInfo['PROPERTY_'.$property.'_VALUE'],
						"VALUE_ID"          => $queryInfo['PROPERTY_'.$property.'_VALUE_ID'],
						"DESCRIPTION"       => $queryInfo['PROPERTY_'.$property.'_DESCRIPTION'],
						"PROPERTY_VALUE_ID" => $queryInfo['PROPERTY_'.$property.'_PROPERTY_VALUE_ID']
						];
			// element full array info
			$iblockQueryResult[$letter]["elements"][] = $infoArray;
			}
		/* ---------------------------- */
		/* --- letter elements count -- */
		/* ---------------------------- */
		if($arParams["ELEMENTS_COUNT"] && count($iblockQueryResult[$letter]["elements"]) > $arParams["ELEMENTS_COUNT"])
			{
			$iblockQueryResult[$letter]["elements"]      = array_splice($iblockQueryResult[$letter]["elements"], 1);
			$iblockQueryResult[$letter]["more_elements"] = true;
			}
		}
	/* ------------------------------------------- */
	/* ------------------ output ----------------- */
	/* ------------------------------------------- */
	$arResult =
		[
		"IBLOCK_TYPE_INFO" => CIBlockType::GetByIdLang($iblocksInfo[array_keys($iblocksInfo)[0]]["IBLOCK_TYPE_ID"]),
		"IBLOCKS_INFO"     => $iblocksInfo,
		"PROPS_INFO"       => $iblockPropsInfo,
		"APPLIED_FILTER"   => $appliedFilter,
		"QUERY"            => $iblockQueryResult
		];

	$this->setResultCacheKeys
		([
		"IBLOCK_TYPE_INFO",
		"IBLOCK_INFO",
		"PROPS_INFO"
		]);

	$this->IncludeComponentTemplate();
	}
?>