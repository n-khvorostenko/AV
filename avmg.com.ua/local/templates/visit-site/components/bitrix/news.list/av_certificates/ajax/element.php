<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams = unserialize(base64_decode($_POST["COMPONENT_PARAMS"]));

$APPLICATION->IncludeComponent
	(
	"bitrix:news.detail", "av_certificates",
		[
		"IBLOCK_TYPE"  => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"    => $arParams["IBLOCK_ID"],
		"ELEMENT_ID"   => $_POST["ELEMENT_ID"],

		"CHECK_DATES"   => $arParams["CHECK_DATES"],
		"FIELD_CODE"    => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],

		"SET_LAST_MODIFIED"    => $arParams["SET_LAST_MODIFIED"],
		"ACTIVE_DATE_FORMAT"   => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS"      => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS"    => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_DATE"         => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME"         => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE"      => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],

		"USE_CATEGORIES"       => $arParams["USE_CATEGORIES"],
		"CATEGORY_IBLOCK"      => $arParams["CATEGORY_IBLOCK"],
		"CATEGORY_CODE"        => $arParams["CATEGORY_CODE"],
		"CATEGORY_ITEMS_COUNT" => $arParams["CATEGORY_ITEMS_COUNT"],

		"CACHE_TYPE"   => 'N',
		"CACHE_TIME"   => '',
		"CACHE_GROUPS" => '',

		"CLOSE_FORM_ATTR" => $_POST["CLOSE_FORM_ATTR"]
		]
	);