<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->IncludeComponent
	(
	"bitrix:learning.search", "av_corp",
		array(
		"DISPLAY_TOP_PAGER"    => 'N',
		"DISPLAY_BOTTOM_PAGER" => 'Y',
		"PAGE_RESULT_COUNT"    => 10,
		"NAV_TEMPLATE"         => 'av_corp'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';