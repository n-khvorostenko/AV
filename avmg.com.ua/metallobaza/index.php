<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetPageProperty("description", "Металлобазы АВ металл групп в Украине ✓Широкий выбор ✓Оптимальные цены ➣ ☎ (056) 790-01-22 Звоните!");
$APPLICATION->SetPageProperty("title", "Филиалы и металлобазы АВ металл групп в Украине | Адреса филиалов где можно купить металлопрокат | Телефон: ☎ (056) 790-01-22");
$APPLICATION->SetTitle("Филиалы и металлобазы");

$APPLICATION->IncludeComponent
	(
	"bitrix:news", "av",
		array(
		"SEF_MODE"          => 'Y',
		"SEF_FOLDER"        => '/metallobaza/',
		"SEF_URL_TEMPLATES" =>
			array(
			"section"           => '#SECTION_CODE#/',
			"subsection"        => '#PARENT_SECTION_CODE#/#SECTION_CODE#/',
			"detail"            => '#PARENT_SECTION_CODE#/#SECTION_CODE#/#ELEMENT_CODE#/',
			"filter"            => 'list/filter/#FILTER_PARAMS#/apply/',
			"section_filter"    => '#SECTION_CODE#/list/filter/#FILTER_PARAMS#/apply/',
			"subsection_filter" => '#PARENT_SECTION_CODE#/#SECTION_CODE#/list/filter/#FILTER_PARAMS#/apply/'
			),

		"AJAX_MODE"           => 'N',
		"AJAX_OPTION_JUMP"    => '',
		"AJAX_OPTION_STYLE"   => '',
		"AJAX_OPTION_HISTORY" => '',

		"IBLOCK_TYPE" => 'av_storages',
		"IBLOCK_ID"   => 58,
		"NEWS_COUNT"  => 10,
		"USE_SEARCH"  => 'N',

		"USE_RSS"  => 'N',
		"NUM_NEWS" => '',
		"NUM_DAYS" => '',
		"YANDEX"   => '',

		"USE_RATING" => 'N',
		"MAX_VOTE"   => '',
		"VOTE_NAMES" => array(),

		"USE_CATEGORIES"       => 'Y',
		"CATEGORY_IBLOCK"      => array(58),
		"CATEGORY_CODE"        => '',
		"CATEGORY_ITEMS_COUNT" => '',

		"USE_REVIEW"         => 'N',
		"MESSAGES_PER_PAGE"  => '',
		"USE_CAPTCHA"        => '',
		"REVIEW_AJAX_POST"   => '',
		"PATH_TO_SMILE"      => '',
		"FORUM_ID"           => '',
		"URL_TEMPLATES_READ" => '',
		"SHOW_LINK_TO_FORUM" => '',
		"POST_FIRST_MESSAGE" => '',

		"USE_FILTER"           => 'Y',
		"FILTER_NAME"          => 'AV_BASES_FILTER',
		"FILTER_FIELD_CODE"    => array("SECTION_ID", "SUBSECTION"),
		"FILTER_PROPERTY_CODE" => array("type_bases"),

		"SORT_BY1"    => 'PROPERTY_type_bases',
		"SORT_ORDER1" => 'ASC',
		"SORT_BY2"    => 'PROPERTY_number_object',
		"SORT_ORDER2" => 'ASC',
		"CHECK_DATES" => 'Y',

		"PREVIEW_TRUNCATE_LEN"     => '',
		"LIST_ACTIVE_DATE_FORMAT"  => '',
		"LIST_FIELD_CODE"          => array(),
		"LIST_PROPERTY_CODE"       => array("address", "phone", "closed", "cordinate_x", "cordinate_y"),
		"HIDE_LINK_WHEN_NO_DETAIL" => 'N',

		"DISPLAY_NAME"              => 'Y',
		"META_KEYWORDS"             => '',
		"META_DESCRIPTION"          => '',
		"BROWSER_TITLE"             => '',
		"DETAIL_SET_CANONICAL_URL"  => 'N',
		"DETAIL_ACTIVE_DATE_FORMAT" => '',
		"DETAIL_FIELD_CODE"         => array(),
		"DETAIL_PROPERTY_CODE"      => array("address", "phone", "open_houres", "current_action", "price_file", "additional_title", "closed", "cordinate_x", "cordinate_y"),

		"SET_LAST_MODIFIED"           => 'N',
		"SET_TITLE"                   => 'N',
		"INCLUDE_IBLOCK_INTO_CHAIN"   => 'N',
		"ADD_SECTIONS_CHAIN"          => 'N',
		"ADD_ELEMENT_CHAIN"           => 'Y',
		"USE_PERMISSIONS"             => 'N',
		"GROUP_PERMISSIONS"           => array(),
		"DETAIL_STRICT_SECTION_CHECK" => 'N',
		"DISPLAY_DATE"                => 'Y',
		"DISPLAY_PICTURE"             => 'Y',
		"DISPLAY_PREVIEW_TEXT"        => 'Y',
		"DISPLAY_AS_RATING"           => '',

		"TAGS_CLOUD_ELEMENTS" => '',
		"PERIOD_NEW_TAGS"     => '',
		"FONT_MAX"            => '',
		"FONT_MIN"            => '',
		"COLOR_NEW"           => '',
		"COLOR_OLD"           => '',
		"TAGS_CLOUD_WIDTH"    => '',

		"USE_SHARE"               => 'Y',
		"SHARE_HIDE"              => '',
		"SHARE_TEMPLATE"          => 'av',
		"SHARE_HANDLERS"          => array("facebook", "gplus", "twitter", "vk"),
		"SHARE_SHORTEN_URL_LOGIN" => '',
		"SHARE_SHORTEN_URL_KEY"   => '',

		"CACHE_TYPE"   => 'A',
		"CACHE_TIME"   => 360000,
		"CACHE_FILTER" => 'Y',
		"CACHE_GROUPS" => 'Y',

		"DISPLAY_TOP_PAGER"               => 'N',
		"DISPLAY_BOTTOM_PAGER"            => 'Y',
		"PAGER_TITLE"                     => '',
		"PAGER_SHOW_ALWAYS"               => '',
		"PAGER_TEMPLATE"                  => 'av',
		"PAGER_DESC_NUMBERING"            => '',
		"PAGER_DESC_NUMBERING_CACHE_TIME" => '',
		"PAGER_SHOW_ALL"                  => '',
		"PAGER_BASE_LINK_ENABLE"          => '',
		"PAGER_BASE_LINK"                 => '',
		"PAGER_PARAMS_NAME"               => '',

		"SET_STATUS_404" => 'Y',
		"SHOW_404"       => 'Y',
		"MESSAGE_404"    => '',
		"FILE_404"       => '',

		"FILTER_TEMPLATE"    => 'av',
		"FILTER_FIELDS_SORT" => array("SUBSECTION", "SECTION_ID", "type_bases"),
		"LIST_TEMPLATE"      => 'av_bases',
		"DETAIL_TEMPLATE"    => 'av_bases',

		"TABLET_MENU_PATH"                => '/products/',
		"TABLET_MENU_TYPE"                => 'left',
		"TABLET_MENU_VALUES"              => array("/products/black-metal/", "/products/stainless-steel-metal/", "/products/galvanized-metal/", "/products/ironwares/", "/products/profnastil-metallocherepitsa/", "/products/building-hardware/", "/products/elektrody-svarochnye/", "/products/plenka-i-upakovka/", "/products/setka/"),
		"FILTER_SUBSECTION_TITLE"         => 'Город',
		"SAME_ARTICLES_SEARCH_IN_SECTION" => 'Y',
		"ADD_SUBSECTIONS_CHAIN"           => 'Y'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';