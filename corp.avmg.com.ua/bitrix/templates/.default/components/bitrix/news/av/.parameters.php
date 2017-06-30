<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ markup ------------------------------ */
/* -------------------------------------------------------------------- */
$arTemplateParameters["MARKUP_TYPE"] =
	[
	"NAME"    => GetMessage("AV_NEWS_PARAMS_MARKUP_TYPE"),
	"TYPE"    => 'LIST',
	"VALUES"  =>
		[
		"STANDART"    => GetMessage("AV_NEWS_PARAMS_MARKUP_TYPE_STANDART"),
		"TWO_COLUMNS" => GetMessage("AV_NEWS_PARAMS_MARKUP_TYPE_TWO_COLUMNS")
		],
	"REFRESH" => 'Y'
	];
if($arCurrentValues["MARKUP_TYPE"] == 'TWO_COLUMNS')
	{
	$arTemplateParameters["MARKUP_TYPE_FIRST_COLUMN_TITLE"] =
		[
		"NAME" => GetMessage("AV_NEWS_PARAMS_MARKUP_TYPE_FIRST_COLUMN_TITLE"),
		"TYPE" => 'STRING'
		];
	$arTemplateParameters["MARKUP_TYPE_SECOND_COLUMN_TITLE"] =
		[
		"NAME" => GetMessage("AV_NEWS_PARAMS_MARKUP_TYPE_SECOND_COLUMN_TITLE"),
		"TYPE" => 'STRING'
		];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ filter ------------------------------ */
/* -------------------------------------------------------------------- */
$arTemplateParameters["FILTER_TEMPLATE"] =
	[
	"NAME"    => GetMessage("AV_NEWS_PARAMS_FILTER_TEMPLATE"),
	"TYPE"    => 'STRING',
	"REFRESH" => 'Y'
	];
if($arCurrentValues["FILTER_TEMPLATE"] == 'av')
	{
	$arTemplateParameters["FILTER_FIELDS_SORT"] =
		[
		"NAME"     => GetMessage("AV_NEWS_PARAMS_FILTER_FIELD_SORT"),
		"TYPE"     => 'STRING',
		"MULTIPLE" => 'Y'
		];
	$arTemplateParameters["FILTER_MARKUP_TYPE"] =
		[
		"NAME"   => GetMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE"),
		"TYPE"   => 'LIST',
		"VALUES" =>
			[
			"STANDART"    => GetMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE_STANDART"),
			"TWO_COLUMNS" => GetMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE_TWO_COLUMNS")
			]
		];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ list -------------------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["LIST_TEMPLATE"] =
	[
	"NAME"    => GetMessage("AV_NEWS_PARAMS_LIST_TEMPLATE"),
	"TYPE"    => 'STRING',
	"REFRESH" => 'Y'
	];
if($arCurrentValues["LIST_TEMPLATE"] == 'av')
	{
	$arTemplateParameters["LIST_MARKUP_TYPE"] =
		[
		"NAME"   => GetMessage("AV_NEWS_PARAMS_LIST_MARKUP_TYPE"),
		"TYPE"   => 'LIST',
		"VALUES" =>
			[
			"STANDART" => GetMessage("AV_NEWS_PARAMS_LIST_MARKUP_TYPE_STANDART"),
			"SMALLER"  => GetMessage("AV_NEWS_PARAMS_LIST_MARKUP_TYPE_SMALLER")
			]
		];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ detail ------------------------------ */
/* -------------------------------------------------------------------- */
$arTemplateParameters["DETAIL_TEMPLATE"] =
	[
	"NAME"    => GetMessage("AV_NEWS_PARAMS_DETAIL_TEMPLATE"),
	"TYPE"    => 'STRING',
	"REFRESH" => 'Y'
	];
$arTemplateParameters["SAME_ARTICLES_SEARCH_IN_SECTION"] =
	[
	"NAME" => GetMessage("AV_NEWS_PARAMS_SAME_ARTICLES_SEARCH_IN_SECTION"),
	"TYPE" => 'CHECKBOX'
	];
if(in_array($arCurrentValues["DETAIL_TEMPLATE"], ["av", "av_career"]))
	{
	$arTemplateParameters["DETAIL_PAGE_ADDITIONAL_LINKS"] =
		[
		"NAME"     => GetMessage("AV_NEWS_PARAMS_DETAIL_PAGE_ADDITIONAL_LINKS"),
		"TYPE"     => 'STRING',
		"MULTIPLE" => 'Y'
		];
	$arTemplateParameters["DETAIL_PAGE_ADDITIONAL_LINKS_TITLES"] =
		[
		"NAME"     => GetMessage("AV_NEWS_PARAMS_DETAIL_PAGE_ADDITIONAL_LINKS_TITLES"),
		"TYPE"     => 'STRING',
		"MULTIPLE" => 'Y'
		];
	$arTemplateParameters["DETAIL_PAGE_WEBFORM_ID"] =
		[
		"NAME" => GetMessage("AV_NEWS_PARAMS_DETAIL_PAGE_WEBFORM_ID"),
		"TYPE" => 'STRING'
		];
	$arTemplateParameters["DETAIL_PAGE_WEBFORM_TEMPLATE"] =
		[
		"NAME" => GetMessage("AV_NEWS_PARAMS_DETAIL_PAGE_WEBFORM_TEMPLATE"),
		"TYPE" => 'STRING'
		];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ other ------------------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["ADD_SUBSECTIONS_CHAIN"] =
	[
	"NAME" => GetMessage("AV_NEWS_PARAMS_ADD_SUBSECTIONS_CHAIN"),
	"TYPE" => 'CHECKBOX'
	];
if($arCurrentValues["LIST_TEMPLATE"] == 'av_bases' || $arCurrentValues["DETAIL_TEMPLATE"] == 'av_bases')
	{
	$arTemplateParameters["TABLET_MENU_PATH"] =
		[
		"NAME" => GetMessage("AV_NEWS_PARAMS_TABLET_MENU_PATH"),
		"TYPE" => 'STRING'
		];
	$arTemplateParameters["TABLET_MENU_TYPE"] =
		[
		"NAME" => GetMessage("AV_NEWS_PARAMS_TABLET_MENU_TYPE"),
		"TYPE" => 'STRING'
		];
	$arTemplateParameters["TABLET_MENU_VALUES"] =
		[
		"NAME"     => GetMessage("AV_NEWS_PARAMS_TABLET_MENU_VALUES"),
		"TYPE"     => 'STRING',
		"MULTIPLE" => 'Y'
		];
	}