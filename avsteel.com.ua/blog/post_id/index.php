<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("Title");
?>Text here....
sdfgaf<?$APPLICATION->IncludeComponent(
	"bitrix:blog.post", 
	".default", 
	array(
		"BLOG_URL" => $blog,
		"BLOG_VAR" => $id,
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"DATE_TIME_FORMAT" => "d.m.Y ",
		"ID" => $id,
		"IMAGE_MAX_HEIGHT" => "600",
		"IMAGE_MAX_WIDTH" => "600",
		"PAGE_VAR" => "",
		"PATH_TO_BLOG" => "/blog/",
		"PATH_TO_BLOG_CATEGORY" => "",
		"PATH_TO_POST_EDIT" => "",
		"PATH_TO_SMILE" => "",
		"PATH_TO_USER" => "",
		"POST_PROPERTY" => array(
		),
		"POST_VAR" => "",
		"RATING_TYPE" => "",
		"SEO_USE" => "Y",
		"SEO_USER" => "N",
		"SET_NAV_CHAIN" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_RATING" => "",
		"USER_VAR" => "",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';?>