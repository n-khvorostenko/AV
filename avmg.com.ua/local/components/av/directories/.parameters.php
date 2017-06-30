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
$arCurrentValues["IBLOCK_ID"] = array_values(array_diff(is_array($arCurrentValues["IBLOCK_ID"]) ? $arCurrentValues["IBLOCK_ID"] : [$arCurrentValues["IBLOCK_ID"]], ['', 0]));
foreach($arCurrentValues["IBLOCK_ID"] as $iblockId)
	{
	$queryList = CIBlockProperty::GetList(["SORT" => 'asc'], ["IBLOCK_ID" => $iblockId, "ACTIVE" => 'Y']);
	while($queryInfo = $queryList->GetNext()) $propsArray[$iblockId][$queryInfo["ID"]] = $queryInfo["NAME"];
	}
// fields array
$fieldsArray = CIBlockParameters::GetFieldCode()["VALUES"];
/* -------------------------------------------------------------------- */
/* ------------------------------ groups ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["GROUPS"] =
	[
	"MAIN"    => ["NAME" => GetMessage("AV_DIRECTORIES_PARAMS_GROUP_MAIN"),    "SORT" => 10],
	"LIST"    => ["NAME" => GetMessage("AV_DIRECTORIES_PARAMS_GROUP_LIST"),    "SORT" => 20],
	"FILTER"  => ["NAME" => GetMessage("AV_DIRECTORIES_PARAMS_GROUP_FILTER"),  "SORT" => 30],
	"ELEMENT" => ["NAME" => GetMessage("AV_DIRECTORIES_PARAMS_GROUP_ELEMENT"), "SORT" => 40]
	];
/* -------------------------------------------------------------------- */
/* --------------------------- main params ---------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["IBLOCK_TYPE"] =
	[
	"NAME"    => GetMessage("AV_DIRECTORIES_PARAMS_IBLOCK_TYPE"),
	"TYPE"    => 'LIST',
	"VALUES"  => CIBlockParameters::GetIBlockTypes(),
	"REFRESH" => 'Y',
	"PARENT"  => 'MAIN'
	];
if(count($iblockArray))
	$arComponentParameters["PARAMETERS"]["IBLOCK_ID"] =
		[
		"NAME"     => GetMessage("AV_DIRECTORIES_PARAMS_IBLOCK_ID"),
		"TYPE"     => 'LIST',
		"VALUES"   => $iblockArray,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"REFRESH"  => 'Y',
		"PARENT"   => 'MAIN'
		];
$arComponentParameters["PARAMETERS"]["FILTER_VAR_NAME"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_PARAMS_FILTER_VAR_NAME"),
	"TYPE"   => 'STRING',
	"PARENT" => 'MAIN'
	];
/* -------------------------------------------------------------------- */
/* --------------------------- list params ---------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["SORT_FIELD"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_PARAMS_SORT_FIELD"),
	"TYPE"   => 'LIST',
	"VALUES" => $fieldsArray,
	"PARENT" => 'LIST'
	];
$arComponentParameters["PARAMETERS"]["SORT_TYPE"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_PARAMS_SORT_TYPE"),
	"TYPE"   => 'LIST',
	"VALUES" =>
		[
		"ASC"  => GetMessage("AV_DIRECTORIES_PARAMS_SORT_ASC"),
		"DESC" => GetMessage("AV_DIRECTORIES_PARAMS_SORT_DESC")
		],
	"PARENT" => 'LIST'
	];
$arComponentParameters["PARAMETERS"]["LIST_FIELDS"] =
	[
	"NAME"     => GetMessage("AV_DIRECTORIES_PARAMS_WORK_FIELDS"),
	"TYPE"     => 'LIST',
	"VALUES"   => $fieldsArray,
	"SIZE"     => 5,
	"MULTIPLE" => 'Y',
	"PARENT"   => 'LIST'
	];
foreach($propsArray as $iblockId => $propsList)
	$arComponentParameters["PARAMETERS"]['LIST_PROPS_'.$iblockId] =
		[
		"NAME"     => $iblockArray[$iblockId].': '.GetMessage("AV_DIRECTORIES_PARAMS_WORK_PROPS"),
		"TYPE"     => 'LIST',
		"VALUES"   => $propsList,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"PARENT"   => 'LIST'
		];
$arComponentParameters["PARAMETERS"]["LIST_ELEMENTS_COUNT"] =
	[
	"NAME"   => GetMessage("AV_DIRECTORIES_PARAMS_LIST_ELEMENTS_COUNT"),
	"TYPE"   => 'STRING',
	"PARENT" => 'LIST'
	];
/* -------------------------------------------------------------------- */
/* -------------------------- filter params --------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["SHOW_FILTER"] =
	[
	"NAME"    => GetMessage("AV_DIRECTORIES_PARAMS_SHOW_FILTER"),
	"TYPE"    => 'CHECKBOX',
	"REFRESH" => 'Y',
	"PARENT"  => 'FILTER'
	];
if($arCurrentValues["SHOW_FILTER"] == 'Y')
	{
	$arComponentParameters["PARAMETERS"]["FILTER_FIELDS"] =
		[
		"NAME"     => GetMessage("AV_DIRECTORIES_PARAMS_WORK_FIELDS"),
		"TYPE"     => 'LIST',
		"VALUES"   => $fieldsArray,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"PARENT"   => 'FILTER'
		];
	foreach($propsArray as $iblockId => $propsList)
		$arComponentParameters["PARAMETERS"]['FILTER_PROPS_'.$iblockId] =
			[
			"NAME"     => $iblockArray[$iblockId].': '.GetMessage("AV_DIRECTORIES_PARAMS_WORK_PROPS"),
			"TYPE"     => 'LIST',
			"VALUES"   => $propsList,
			"SIZE"     => 5,
			"MULTIPLE" => 'Y',
			"PARENT"   => 'FILTER'
			];
	}
/* -------------------------------------------------------------------- */
/* -------------------------- element params -------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["ELEMENT_FIELDS"] =
	[
	"NAME"     => GetMessage("AV_DIRECTORIES_PARAMS_WORK_FIELDS"),
	"TYPE"     => 'LIST',
	"VALUES"   => $fieldsArray,
	"SIZE"     => 5,
	"MULTIPLE" => 'Y',
	"PARENT"   => 'ELEMENT'
	];
foreach($propsArray as $iblockId => $propsList)
	$arComponentParameters["PARAMETERS"]['ELEMENT_PROPS_'.$iblockId]  =
		[
		"NAME"     => $iblockArray[$iblockId].': '.GetMessage("AV_DIRECTORIES_PARAMS_WORK_PROPS"),
		"TYPE"     => 'LIST',
		"VALUES"   => $propsList,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"PARENT"   => 'ELEMENT'
		];
$arComponentParameters["PARAMETERS"]["SHOW_RELATIVE_ELEMENTS"] =
	[
	"NAME"    => GetMessage("AV_DIRECTORIES_PARAMS_SHOW_RELATIVE_ELEMENTS"),
	"TYPE"    => 'CHECKBOX',
	"REFRESH" => 'Y',
	"PARENT"  => 'ELEMENT'
	];
if($arCurrentValues["SHOW_RELATIVE_ELEMENTS"] == 'Y')
	$arComponentParameters["PARAMETERS"]["RELATIVE_ELEMENTS_COUNT"] =
		[
		"NAME"   => GetMessage("AV_DIRECTORIES_PARAMS_RELATIVE_ELEMENTS_COUNT"),
		"TYPE"   => 'STRING',
		"PARENT" => 'ELEMENT'
		];
/* -------------------------------------------------------------------- */
/* -------------------------------- SEF ------------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["SEF_MODE"] =
	[
	"list" =>
		[
		"NAME" => GetMessage("AV_DIRECTORIES_PARAMS_SEF_LIST_PAGE")
		],
	"element" =>
		[
		"NAME"      => GetMessage("AV_DIRECTORIES_PARAMS_SEF_ELEMENT_PAGE"),
		"DEFAULT"   => '#ELEMENT_ID#/',
		"VARIABLES" => ["ELEMENT_ID", "ELEMENT_CODE"]
		]
	];
$arComponentParameters["PARAMETERS"]["VARIABLE_ALIASES"] =
	[
	"ELEMENT_ID" => ["NAME" => GetMessage("AV_DIRECTORIES_PARAMS_VAR_ALIASES_ELEMENT_ID")]
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
	"NAME"   => GetMessage("AV_DIRECTORIES_PARAMS_CACHE_FILTER"),
	"PARENT" => 'CACHE_SETTINGS'
	];
$arComponentParameters["PARAMETERS"]["CACHE_GROUPS"] =
	[
	"TYPE"    => 'CHECKBOX',
	"DEFAULT" => 'Y',
	"NAME"    => GetMessage("AV_DIRECTORIES_PARAMS_CACHE_GROUPS"),
	"PARENT"  => 'CACHE_SETTINGS'
	];
?>