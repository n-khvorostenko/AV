<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Результаты поиска");

$APPLICATION->IncludeComponent
	(
	"bitrix:search.page", "av",
		array(
		"USE_LANGUAGE_GUESS" => 'Y',
		"USE_SUGGEST"        => 'Y',

		"SHOW_RATING"           => '',
		"RATING_TYPE"           => '',
		"PATH_TO_USER_PROFILE"  => '',
		"SHOW_ITEM_TAGS"        => 'Y',
		"SHOW_ITEM_DATE_CHANGE" => 'Y',
		"SHOW_ORDER_BY"         => 'N',
		"SHOW_TAGS_CLOUD"       => 'N',

		"TAGS_INHERIT"       => 'N',
		"TAGS_SORT"          => '',
		"TAGS_PAGE_ELEMENTS" => '',
		"TAGS_PERIOD"        => '',
		"TAGS_URL_SEARCH"    => '',
		"FONT_MAX"           => '',
		"FONT_MIN"           => '',
		"COLOR_NEW"          => '',
		"COLOR_OLD"          => '',
		"PERIOD_NEW_TAGS"    => '',
		"SHOW_CHAIN"         => '',
		"COLOR_TYPE"         => '',
		"WIDTH"              => '',

		"AJAX_MODE"              => 'N',
		"AJAX_OPTION_SHADOW"     => '',
		"AJAX_OPTION_JUMP"       => '',
		"AJAX_OPTION_STYLE"      => '',
		"AJAX_OPTION_HISTORY"    => '',
		"AJAX_OPTION_ADDITIONAL" => '',

		"RESTART"        => 'Y',
		"NO_WORD_LOGIC"  => 'Y',
		"CHECK_DATES"    => 'Y',
		"USE_TITLE_RANK" => 'Y',
		"DEFAULT_SORT"   => 'rank',
		"FILTER_NAME"    => '',

		"arrFILTER"                    => array("main", "iblock_news", "iblock_services", "iblock_catalog", "iblock_references", "iblock_av_storages"),
		"arrFILTER_iblock_news"        => array(50),
		"arrFILTER_iblock_services"    => array(59),
		"arrFILTER_iblock_catalog"     => array("all"),
		"arrFILTER_iblock_references"  => array("all"),
		"arrFILTER_iblock_av_storages" => array("all"),

		"SHOW_WHERE"        => 'N',
		"arrWHERE"          => '',
		"SHOW_WHEN"         => 'N',
		"PAGE_RESULT_COUNT" => 5,

		"CACHE_TYPE" => 'A',
		"CACHE_TIME" => 360000,

		"DISPLAY_TOP_PAGER"    => 'N',
		"DISPLAY_BOTTOM_PAGER" => 'Y',
		"PAGER_TITLE"          => '',
		"PAGER_SHOW_ALWAYS"    => 'N',
		"PAGER_TEMPLATE"       => 'av',

		"PRODUCTS_LINK" => '/products/'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';