<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Новости");
$APPLICATION->SetPageProperty("description", "Новости АВ металл групп ™ ✓Выгодная партнерская программа ✓Широкая региональная сеть ✓Доставка по Украине");
$APPLICATION->SetPageProperty("title", "Новости и события компании АВ металл групп | ™ avmg.com.ua");

$APPLICATION->IncludeComponent
	(
	"bitrix:news", "av",
		array(
		"SEF_MODE"          => 'Y',
		"SEF_FOLDER"        => '/about/blog/',
		"SEF_URL_TEMPLATES" =>
			array(
			"detail" => '#ELEMENT_CODE#/',
			"filter" => 'filter/#FILTER_PARAMS#/apply/'
			),

		"AJAX_MODE"           => 'N',
		"AJAX_OPTION_JUMP"    => '',
		"AJAX_OPTION_STYLE"   => '',
		"AJAX_OPTION_HISTORY" => '',

		"IBLOCK_TYPE" => 'news',
		"IBLOCK_ID"   => 50,
		"NEWS_COUNT"  => 5,
		"USE_SEARCH"  => 'Y',

		"USE_RSS"  => 'N',
		"NUM_NEWS" => '',
		"NUM_DAYS" => '',
		"YANDEX"   => '',

		"USE_RATING" => 'Y',
		"MAX_VOTE"   => 5,
		"VOTE_NAMES" => array(1, 2, 3, 4, 5),

		"USE_CATEGORIES"       => 'Y',
		"CATEGORY_IBLOCK"      => array(50),
		"CATEGORY_CODE"        => 'SECTIONS_ARTICLES',
		"CATEGORY_ITEMS_COUNT" => 3,

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
		"FILTER_FIELD_CODE"    => array("NAME"),
		"FILTER_PROPERTY_CODE" => array("SECTIONS_ARTICLES"),

		"SORT_BY1"    => 'ACTIVE_FROM',
		"SORT_ORDER1" => 'DESC',
		"SORT_BY2"    => '',
		"SORT_ORDER2" => '',
		"CHECK_DATES" => 'Y',

		"PREVIEW_TRUNCATE_LEN"     => '',
		"LIST_ACTIVE_DATE_FORMAT"  => '',
		"LIST_FIELD_CODE"          => array("PREVIEW_TEXT"),
		"LIST_PROPERTY_CODE"       => array(),
		"HIDE_LINK_WHEN_NO_DETAIL" => 'N',

		"DISPLAY_NAME"              => 'Y',
		"META_KEYWORDS"             => '',
		"META_DESCRIPTION"          => '',
		"BROWSER_TITLE"             => '',
		"DETAIL_SET_CANONICAL_URL"  => 'N',
		"DETAIL_ACTIVE_DATE_FORMAT" => '',
		"DETAIL_FIELD_CODE"         => array("DETAIL_TEXT","DATE_ACTIVE_FROM"),
		"DETAIL_PROPERTY_CODE"      => array(),

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
		"DISPLAY_AS_RATING"           => 'rating',

		"TAGS_CLOUD_ELEMENTS" => '',
		"PERIOD_NEW_TAGS"     => '',
		"FONT_MAX"            => '',
		"FONT_MIN"            => '',
		"COLOR_NEW"           => '',
		"COLOR_OLD"           => '',
		"TAGS_CLOUD_WIDTH"    => '',

		"USE_SHARE"               => 'N',
		"SHARE_HIDE"              => '',
		"SHARE_TEMPLATE"          => '',
		"SHARE_HANDLERS"          => '',
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
		"FILTER_FIELDS_SORT" => array("SECTIONS_ARTICLES", "NAME"),
		"LIST_TEMPLATE"      => 'av',
		"DETAIL_TEMPLATE"    => 'av_blog'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';