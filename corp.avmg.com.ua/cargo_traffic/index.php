<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"av_cargo_traffic_light:lists.list", "",
		array(
		"IBLOCK_TYPE_ID"   => 'av_cargo_trafic_light',
		"IBLOCK_ID"        => 114,
		"SECTION_ID"       => '',
		"LIST_URL"         => '/cargo_traffic/',
		"LIST_EDIT_URL"    => '/cargo_traffic/list_edit.php',
		"LIST_ELEMENT_URL" => '/cargo_traffic/item.php?element_id=#element_id#',
		"EXPORT_EXCEL_URL" => '/cargo_traffic/excel.php',
		"CACHE_TYPE"       => 'A',
		"CACHE_TIME"       => 3600
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';