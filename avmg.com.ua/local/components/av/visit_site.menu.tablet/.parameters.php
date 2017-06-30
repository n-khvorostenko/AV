<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ---------------------------- menu array ---------------------------- */
/* -------------------------------------------------------------------- */
$menuArray = [];
if($arCurrentValues["MENU_PATH"])
	{
	$menuObj = new CMenu($arCurrentValues["MENU_TYPE"]);
	$menuObj->Init($arCurrentValues["MENU_PATH"]);
	foreach($menuObj->arMenu as $menuInfo) $menuArray[$menuInfo[1]] = $menuInfo[0];
	}
/* -------------------------------------------------------------------- */
/* --------------------------- main params ---------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["MENU_TYPE"] =
	[
	"NAME"   => GetMessage("AV_VS_MENU_INDEX_MENU_TYPE"),
	"TYPE"   => 'LIST',
	"VALUES" => GetMenuTypes($_REQUEST["site"] ? $_REQUEST["site"] : ($_REQUEST["src_site"] ? $_REQUEST["src_site"] : false))
	];
$arComponentParameters["PARAMETERS"]["MENU_PATH"] =
	[
	"NAME" => GetMessage("AV_VS_MENU_INDEX_MENU_PATH"),
	"TYPE" => 'STRING'
	];
if(count($menuArray))
	$arComponentParameters["PARAMETERS"]["MENU_VALUES"] =
			[
			"NAME"     => GetMessage("AV_VS_MENU_INDEX_MENU_VALUES"),
			"TYPE"     => 'LIST',
			"SIZE"     => 5,
			"MULTIPLE" => 'Y',
			"VALUES"   => array_merge(["all" => GetMessage("AV_VS_MENU_INDEX_MENU_VALUES_DEFAULT")], $menuArray)
			];