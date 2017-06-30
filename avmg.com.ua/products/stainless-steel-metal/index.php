<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetPageProperty("keywords", "нержавейка лист цена, нержавейка купить, нержавейка цена, нержавейка труба, нержавеющая сталь купить, нержавейка лист цена");
$APPLICATION->SetPageProperty("description", "Нержавейка ассортимент и цены ▻ АВ металл групп ™ ✓Широкий выбор ✓Металлобазы и доставка по всей Украине ☎ (056)790-01-22");
$APPLICATION->SetPageProperty("title", "Нержавеющий металл ► купить нержавейку цена в Украине: Днепр, Киев, Харьков, Львов, Одесса, опт, розница | Направление АВ металл групп ™ avmg.com.ua");
$APPLICATION->SetTitle("Нержавеющий металлопрокат");

$APPLICATION->IncludeComponent
	(
	"bitrix:news", "av",
		array(
		"SEF_MODE"          => 'Y',
		"SEF_FOLDER"        => '/products/stainless-steel-metal/',
		"SEF_URL_TEMPLATES" => array("detail" => '#ELEMENT_CODE#/'),

		"AJAX_MODE"           => 'N',
		"AJAX_OPTION_JUMP"    => '',
		"AJAX_OPTION_STYLE"   => '',
		"AJAX_OPTION_HISTORY" => '',

		"IBLOCK_TYPE" => 'catalog',
		"IBLOCK_ID"   => 36,
		"NEWS_COUNT"  => 50,
		"USE_SEARCH"  => 'N',

		"USE_RSS"  => 'N',
		"NUM_NEWS" => '',
		"NUM_DAYS" => '',
		"YANDEX"   => '',

		"USE_RATING" => 'N',
		"MAX_VOTE"   => '',
		"VOTE_NAMES" => array(),

		"USE_CATEGORIES"       => 'N',
		"CATEGORY_IBLOCK"      => array(),
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

		"USE_FILTER"           => 'N',
		"FILTER_NAME"          => '',
		"FILTER_FIELD_CODE"    => array(),
		"FILTER_PROPERTY_CODE" => array(),

		"SORT_BY1"    => 'SORT',
		"SORT_ORDER1" => 'ASC',
		"SORT_BY2"    => 'ID',
		"SORT_ORDER2" => 'ASC',
		"CHECK_DATES" => 'Y',

		"PARENT_SECTION"           => 727,
		"PREVIEW_TRUNCATE_LEN"     => '',
		"LIST_ACTIVE_DATE_FORMAT"  => '',
		"LIST_FIELD_CODE"          => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE"),
		"LIST_PROPERTY_CODE"       => array(),
		"HIDE_LINK_WHEN_NO_DETAIL" => 'N',

		"DISPLAY_NAME"              => 'Y',
		"META_KEYWORDS"             => '',
		"META_DESCRIPTION"          => '',
		"BROWSER_TITLE"             => '',
		"DETAIL_SET_CANONICAL_URL"  => 'N',
		"DETAIL_ACTIVE_DATE_FORMAT" => '',
		"DETAIL_FIELD_CODE"         => array("NAME","DETAIL_TEXT","DETAIL_PICTURE"),
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
		"DISPLAY_BOTTOM_PAGER"            => 'N',
		"PAGER_TITLE"                     => '',
		"PAGER_SHOW_ALWAYS"               => '',
		"PAGER_TEMPLATE"                  => '',
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

		"LIST_TEMPLATE"                       => 'av',
		"LIST_MARKUP_TYPE"                    => 'SMALLER',
		"DETAIL_TEMPLATE"                     => 'av_products',
		"DETAIL_PAGE_ADDITIONAL_LINKS"        => array('/metallobaza/'),
		"DETAIL_PAGE_ADDITIONAL_LINKS_TITLES" => array('Металлобазы в вашем городе'),
		"DETAIL_PAGE_WEBFORM_ID"              => 24,
		"DETAIL_PAGE_WEBFORM_TEMPLATE"        => 'av'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';