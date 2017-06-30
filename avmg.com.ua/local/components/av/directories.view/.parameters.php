<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!CModule::IncludeModule("iblock"))                           return;
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
// iblockes array
$iblockArray = [];
$queryList = CIBlock::GetList(["sort" => 'asc'], ["TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE" => 'Y']);
while($queryInfo = $queryList->GetNext()) $iblockArray[$queryInfo["ID"]] = $queryInfo["NAME"];
// iblockes props
$propsArray = [];
if($arCurrentValues["IBLOCK_ID"])
	{
	$queryList = CIBlockProperty::GetList(["SORT" => 'asc'], ["IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"], "ACTIVE" => 'Y']);
	while($queryInfo = $queryList->GetNext()) $propsArray[$queryInfo["ID"]] = $queryInfo["NAME"];
	}
// fields array
$fieldsArray = CIBlockParameters::GetFieldCode()["VALUES"];
/* -------------------------------------------------------------------- */
/* ------------------------------ groups ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["GROUPS"] =
	[
	"MAIN"    => ["NAME" => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_GROUP_MAIN"),    "SORT" => 10],
	"ELEMENT" => ["NAME" => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_GROUP_ELEMENT"), "SORT" => 20]
	];
/* -------------------------------------------------------------------- */
/* --------------------------- main params ---------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["IBLOCK_TYPE"] =
	[
	"NAME"    => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_IBLOCK_TYPE"),
	"TYPE"    => 'LIST',
	"VALUES"  => CIBlockParameters::GetIBlockTypes(),
	"REFRESH" => 'Y',
	"PARENT"  => 'MAIN'
	];
if(count($iblockArray))
	$arComponentParameters["PARAMETERS"]["IBLOCK_ID"] =
		[
		"NAME"    => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_IBLOCK_ID"),
		"TYPE"    => 'LIST',
		"VALUES"  => $iblockArray,
		"REFRESH" => 'Y',
		"PARENT"  => 'MAIN'
		];
$arComponentParameters["PARAMETERS"]["ELEMENT_ID"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_ELEMENT_ID"),
	"TYPE"   => 'STRING',
	"PARENT" => 'MAIN'
	];
$arComponentParameters["PARAMETERS"]["ELEMENT_CODE"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_ELEMENT_CODE"),
	"TYPE"   => 'STRING',
	"PARENT" => 'MAIN'
	];
$arComponentParameters["PARAMETERS"]["PATH_TO_ELEMENT"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_PATH_TO_ELEMENT"),
	"TYPE"   => 'STRING',
	"PARENT" => 'MAIN'
	];
$arComponentParameters["PARAMETERS"]["PATH_TO_LIST"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_PATH_TO_LIST"),
	"TYPE"   => 'STRING',
	"PARENT" => 'MAIN'
	];
$arComponentParameters["PARAMETERS"]["FILTER_VAR_NAME"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_FILTER_VAR_NAME"),
	"TYPE"   => 'STRING',
	"PARENT" => 'MAIN'
	];
/* -------------------------------------------------------------------- */
/* -------------------------- element params -------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["FIELDS"] =
	[
	"NAME"     => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_WORK_FIELDS"),
	"TYPE"     => 'LIST',
	"VALUES"   => $fieldsArray,
	"SIZE"     => 5,
	"MULTIPLE" => 'Y',
	"PARENT"   => 'ELEMENT'
	];
if(count($propsArray))
	$arComponentParameters["PARAMETERS"]["PROPS"] =
		[
		"NAME"     => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_WORK_PROPS"),
		"TYPE"     => 'LIST',
		"VALUES"   => $propsList,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"PARENT"   => 'ELEMENT'
		];
$arComponentParameters["PARAMETERS"]["SHOW_RELATIVE_ELEMENTS"] =
	[
	"NAME"    => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_SHOW_RELATIVE_ELEMENTS"),
	"TYPE"    => 'CHECKBOX',
	"REFRESH" => 'Y',
	"PARENT"  => 'ELEMENT'
	];
if($arCurrentValues["SHOW_RELATIVE_ELEMENTS"] == 'Y')
	$arComponentParameters["PARAMETERS"]["RELATIVE_ELEMENTS_COUNT"] =
		[
		"NAME"   => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_RELATIVE_ELEMENTS_COUNT"),
		"TYPE"   => 'STRING',
		"PARENT" => 'ELEMENT'
		];
/* -------------------------------------------------------------------- */
/* ------------------------------- cache ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["CACHE_TIME"] =
	[
	"DEFAULT" => 36000000
	];
$arComponentParameters["PARAMETERS"]["CACHE_FILTER"] =
	[
	"TYPE"   => 'CHECKBOX',
	"NAME"   => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_CACHE_FILTER"),
	"PARENT" => 'CACHE_SETTINGS'
	];
$arComponentParameters["PARAMETERS"]["CACHE_GROUPS"] =
	[
	"TYPE"    => 'CHECKBOX',
	"DEFAULT" => 'Y',
	"NAME"    => GetMessage("AV_DIRECTORIES_VIEW_PARAMS_CACHE_GROUPS"),
	"PARENT"  => 'CACHE_SETTINGS'
	];
?>