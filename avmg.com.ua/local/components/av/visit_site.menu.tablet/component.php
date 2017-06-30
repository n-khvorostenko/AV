<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["MENU_TYPE"]   = trim($arParams["MENU_TYPE"])                                                     ? trim($arParams["MENU_TYPE"]) : 'left';
$arParams["MENU_PATH"]   = trim($arParams["MENU_PATH"])                                                     ? trim($arParams["MENU_PATH"]) : $APPLICATION->GetCurPage();
$arParams["MENU_VALUES"] = is_array($arParams["MENU_VALUES"]) && !in_array("all", $arParams["MENU_VALUES"]) ? $arParams["MENU_VALUES"]     : [];
/* -------------------------------------------------------------------- */
/* ---------------------------- menu array ---------------------------- */
/* -------------------------------------------------------------------- */
$menuArray  = [];
$userRights = $USER->GetAccessCodes();
$menuObj    = new CMenu($arParams["MENU_TYPE"]);
$menuObj->Init($arParams["MENU_PATH"]);

foreach($menuObj->arMenu as $menuInfo)
	if(in_array($menuInfo[1], $arParams["MENU_VALUES"]) || !count($arParams["MENU_VALUES"]))
		{
		$dirPropsList = $APPLICATION->GetDirPropertyList($menuInfo[1]);
		$menuArray[]  =
			[
			"TITLE"      => $menuInfo[0],
			"LINK"       => $menuInfo[1],
			"PARAMS"     => $menuInfo[3],
			"IMAGE"      => $dirPropsList["TITLE_BACKGROUND_ALT"] ? $dirPropsList["TITLE_BACKGROUND_ALT"] : $dirPropsList["TITLE_BACKGROUND"],
			"ICON"       => $dirPropsList["TITLE_BACKGROUND_ICON"],
			"PERMISSION" => $APPLICATION->GetFileAccessPermission(GetFileFromURL($menuInfo[1]), $userRights)
			];
		}
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
$arResult =
	[
	"MENU_ARRAY" => $menuArray
	];

$this->IncludeComponentTemplate();