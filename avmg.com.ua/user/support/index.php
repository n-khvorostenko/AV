<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обращение клиентов");
?><?$APPLICATION->IncludeComponent(
	"bitrix:support.wizard",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"IBLOCK_ID" => "80",
		"IBLOCK_TYPE" => "services",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGES_PER_PAGE" => "20",
		"MESSAGE_MAX_LENGTH" => "70",
		"MESSAGE_SORT_ORDER" => "asc",
		"PROPERTY_FIELD_TYPE" => "",
		"PROPERTY_FIELD_VALUES" => "",
		"SECTIONS_TO_CATEGORIES" => "N",
		"SET_PAGE_TITLE" => "Y",
		"SET_SHOW_USER_FIELD" => array(),
		"SHOW_COUPON_FIELD" => "N",
		"SHOW_RESULT" => "Y",
		"TEMPLATE_TYPE" => "standard",
		"TICKETS_PER_PAGE" => "50",
		"VARIABLE_ALIASES_ID" => "ID"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>