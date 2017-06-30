<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("Карьера");

$APPLICATION->IncludeComponent
	(
	"bitrix:news", "av",
		array(
		"SEF_MODE"          => 'Y',
		"SEF_FOLDER"        => '/about/career/',
		"SEF_URL_TEMPLATES" =>
			array(
			"detail" => '#ELEMENT_CODE#/',
			"filter" => 'filter/#FILTER_PARAMS#/apply/'
			),

		"AJAX_MODE"           => 'N',
		"AJAX_OPTION_JUMP"    => '',
		"AJAX_OPTION_STYLE"   => '',
		"AJAX_OPTION_HISTORY" => '',

		"IBLOCK_TYPE" => 'services',
		"IBLOCK_ID"   => 59,
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
		"CATEGORY_IBLOCK"      => array(59),
		"CATEGORY_CODE"        => 'city',
		"CATEGORY_ITEMS_COUNT" => 25,

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
		"FILTER_NAME"          => '',
		"FILTER_FIELD_CODE"    => array("SECTION_ID"),
		"FILTER_PROPERTY_CODE" => array("city"),

		"SORT_BY1"    => 'PROPERTY_type_vacancy',
		"SORT_ORDER1" => 'DESC',
		"SORT_BY2"    => 'SORT',
		"SORT_ORDER2" => 'ASC',
		"CHECK_DATES" => 'Y',

		"PREVIEW_TRUNCATE_LEN"     => '',
		"LIST_ACTIVE_DATE_FORMAT"  => '',
		"LIST_FIELD_CODE"          => array("NAME", "DATE_ACTIVE_FROM"),
		"LIST_PROPERTY_CODE"       => array("city", "type_vacancy"),
		"HIDE_LINK_WHEN_NO_DETAIL" => 'N',

		"DISPLAY_NAME"              => 'Y',
		"META_KEYWORDS"             => '',
		"META_DESCRIPTION"          => '',
		"BROWSER_TITLE"             => '',
		"DETAIL_SET_CANONICAL_URL"  => 'N',
		"DETAIL_ACTIVE_DATE_FORMAT" => '',
		"DETAIL_FIELD_CODE"         => array("DETAIL_TEXT", "DATE_ACTIVE_FROM"),
		"DETAIL_PROPERTY_CODE"      => array("type_job", "city", "type_vacancy"),

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
		"DISPLAY_PREVIEW_TEXT"        => 'N',
		"DISPLAY_AS_RATING"           => 'rating',

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

		"MARKUP_TYPE"                     => 'TWO_COLUMNS',
		"MARKUP_TYPE_FIRST_COLUMN_TITLE"  => 'Открытые вакансии',
		"MARKUP_TYPE_SECOND_COLUMN_TITLE" => 'Карьерные возможности',

		"FILTER_TEMPLATE"                 => 'av',
		"FILTER_FIELDS_SORT"              => array("SECTION_ID", "city"),
		"FILTER_MARKUP_TYPE"              => 'TWO_COLUMNS',

		"LIST_TEMPLATE"                   => 'av_career',
		"DETAIL_TEMPLATE"                 => 'av_career',
		"DETAIL_PAGE_WEBFORM_ID"          => 19,
		"DETAIL_PAGE_WEBFORM_TEMPLATE"    => 'av_career',
		"SAME_ARTICLES_SEARCH_IN_SECTION" => 'Y',
		"CATEGORY_ADDITIONAL_FILTER"      => ["!PROPERTY_type_vacancy" => 389]
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';