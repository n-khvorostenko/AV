<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"bitrix:news.detail", $arParams["DETAIL_TEMPLATE"],
		[
		"IBLOCK_TYPE"  => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"    => $arParams["IBLOCK_ID"],
		"ELEMENT_ID"   => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],

		"CHECK_DATES"   => $arParams["CHECK_DATES"],
		"FIELD_CODE"    => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],

		"DETAIL_URL"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],

		"SET_TITLE"                 => 'Y',
		"SET_CANONICAL_URL"         => $arParams["DETAIL_SET_CANONICAL_URL"],
		"BROWSER_TITLE"             => $arParams["BROWSER_TITLE"],
		"META_KEYWORDS"             => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION"          => $arParams["META_DESCRIPTION"],
		"SET_LAST_MODIFIED"         => $arParams["SET_LAST_MODIFIED"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN"        => $arParams["ADD_SECTIONS_CHAIN"],
		"ADD_ELEMENT_CHAIN"         => $arParams["ADD_ELEMENT_CHAIN"],
		"ACTIVE_DATE_FORMAT"        => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS"           => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS"         => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_DATE"              => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME"              => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE"           => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"      => $arParams["DISPLAY_PREVIEW_TEXT"],

		"USE_SHARE"               => $arParams["USE_SHARE"],
		"SHARE_HIDE"              => $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE"          => $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS"          => $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY"   => $arParams["SHARE_SHORTEN_URL_KEY"],

		"PAGER_TEMPLATE"       => $arParams["DETAIL_PAGER_TEMPLATE"],
		"DISPLAY_TOP_PAGER"    => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE"          => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALL"       => $arParams["DETAIL_PAGER_SHOW_ALL"],

		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404"       => $arParams["SHOW_404"],
		"MESSAGE_404"    => $arParams["MESSAGE_404"],
		"FILE_404"       => $arParams["FILE_404"],

		"USE_CATEGORIES"       => $arParams["USE_CATEGORIES"],
		"CATEGORY_IBLOCK"      => $arParams["CATEGORY_IBLOCK"],
		"CATEGORY_CODE"        => $arParams["CATEGORY_CODE"],
		"CATEGORY_ITEMS_COUNT" => $arParams["CATEGORY_ITEMS_COUNT"],

		"CACHE_TYPE"   => $arParams["DETAIL_PAGE_WEBFORM_ID"] ? 'N' : $arParams["CACHE_TYPE"],
		"CACHE_TIME"   => $arParams["DETAIL_PAGE_WEBFORM_ID"] ? ''  : $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["DETAIL_PAGE_WEBFORM_ID"] ? ''  : $arParams["CACHE_GROUPS"],

		"USE_RATING" => $arParams["USE_RATING"],
		"MAX_VOTE"   => $arParams["MAX_VOTE"],
		"VOTE_NAMES" => $arParams["VOTE_NAMES"],

		"ADDITIONAL_LINKS"        => $arParams["DETAIL_PAGE_ADDITIONAL_LINKS"],
		"ADDITIONAL_LINKS_TITLES" => $arParams["DETAIL_PAGE_ADDITIONAL_LINKS_TITLES"],
		"WEBFORM_ID"              => $arParams["DETAIL_PAGE_WEBFORM_ID"],
		"WEBFORM_TEMPLATE"        => $arParams["DETAIL_PAGE_WEBFORM_TEMPLATE"],
		"TABLET_MENU_PATH"        => $arParams["TABLET_MENU_PATH"],
		"TABLET_MENU_TYPE"        => $arParams["TABLET_MENU_TYPE"],
		"TABLET_MENU_VALUES"      => $arParams["TABLET_MENU_VALUES"],
		"CATEGORY_APPLIED_FILTER" => $arResult["CATEGORY_APPLIED_FILTER"]
		]
	);