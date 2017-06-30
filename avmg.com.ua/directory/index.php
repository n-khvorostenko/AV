<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Справочники продукции");

$APPLICATION->IncludeComponent
	(
	"av:directories", "",
		array(
		"IBLOCK_TYPE"     => 'references',
		"IBLOCK_ID"       => array(43, 44, 45, 46),
		"FILTER_VAR_NAME" => '',

		"SORT_FIELD"          => 'NAME',
		"SORT_TYPE"           => 'ASC',
		"LIST_FIELDS"         => array(),
		"LIST_ELEMENTS_COUNT" => 5,

		"SHOW_FILTER"   => 'Y',
		"FILTER_FIELDS" => array("IBLOCK_ID", "NAME"),

		"ELEMENT_FIELDS"          => array("NAME", "DETAIL_TEXT", "DETAIL_PICTURE"),
		"SHOW_RELATIVE_ELEMENTS"  => 'Y',
		"RELATIVE_ELEMENTS_COUNT" => 10,

		"SEF_MODE"          => 'Y',
		"SEF_FOLDER"        => '/directory/',
		"SEF_URL_TEMPLATES" => array("element" => '#ELEMENT_CODE#/'),

		"CACHE_TYPE"   => 'A',
		"CACHE_TIME"   => 36000000,
		"CACHE_FILTER" => 'Y',
		"CACHE_GROUPS" => 'Y'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';