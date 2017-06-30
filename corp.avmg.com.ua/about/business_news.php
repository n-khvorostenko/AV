<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/about/business_news.php");
$APPLICATION->SetTitle(GetMessage("ABOUT_TITLE"));
?><?$APPLICATION->IncludeComponent(
	"bitrix:desktop", 
	".default", 
	array(
		"ID" => "business_news",
		"CAN_EDIT" => "Y",
		"COLUMNS" => "1",
		"COLUMN_WIDTH_0" => "100%",
		"GADGETS" => array(
			0 => "UPDATES",
		),
		"G_RSSREADER_CACHE_TIME" => "3600",
		"G_RSSREADER_SHOW_URL" => "Y",
		"G_RSSREADER_PREDEFINED_RSS" => "",
		"GU_RSSREADER_CNT" => "25",
		"GU_RSSREADER_RSS_URL" => (LANGUAGE_ID=="en")?"http://rss.cnn.com/rss/edition_business.rss":((LANGUAGE_ID=="de")?"http://www.tagesschau.de/xml/rss2/":"http://news.yandex.ru/business.rss"),
		"COMPONENT_TEMPLATE" => ".default",
		"PM_URL" => "/company/personal/messages/chat/#USER_ID#/",
		"PATH_TO_CONPANY_DEPARTMENT" => "/company/structure.php?set_filter_structure=Y&structure_UF_DEPARTMENT=#ID#",
		"NAME_TEMPLATE" => "",
		"SHOW_LOGIN" => "Y",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"DATE_FORMAT" => "d.m.Y",
		"DATE_FORMAT_NO_YEAR" => "d.m",
		"SHOW_YEAR" => "M",
		"GADGETS_FIXED" => array(
		),
		"G_UPDATES_USER_VAR" => "user_id",
		"G_UPDATES_GROUP_VAR" => "group_id",
		"G_UPDATES_PAGE_VAR" => "page",
		"G_UPDATES_PATH_TO_USER" => "/company/personal/user/#user_id#/",
		"G_UPDATES_PATH_TO_GROUP" => "/workgroups/group/#group_id#/",
		"G_UPDATES_LIST_URL" => "/company/personal/log/",
		"GU_UPDATES_TITLE_STD" => "",
		"GU_UPDATES_LOG_CNT" => "7",
		"GU_UPDATES_ENTITY_TYPE" => "",
		"GU_UPDATES_EVENT_ID" => array(
		),
		"GU_UPDATES_AVATAR_SIZE" => "",
		"GU_UPDATES_AVATAR_SIZE_COMMENT" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>