<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetPageProperty("keywords", "профнастил, профлист, металлочерепица");
$APPLICATION->SetPageProperty("description", "Полезные советы про металлочерепицу и профнастил! Звоните ☎(067)566-05-54 Мы расскажем как правильно рассчитать✔выбрать✔крепить профлист!");
$APPLICATION->SetTitle("Профнастил и металлочерепица: выбор, стоимость, применение и монтаж 🏠 | Статьи AVsteel ✏ avsteel.com.ua");
CJSCore::Init(["jquery", "fx"]);
$APPLICATION->SetAdditionalCSS(implode('/', $pageUrlArray).'/style.css');
?><div class="container av-vs-blog-wrap">
	<div class="text-center" id="h1Blog">
		<h1 class="text-uppercase" red-text="">БЛОГ</h1>
	<span>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/blog/blog-under-h1.php"
				)
			);?>
	</span>
	</div>
	<br>
<?$APPLICATION->IncludeComponent(
	"bitrix:blog",
	"av-steel-blog",
	array(
		"AJAX_POST" => "N",
		"ALLOW_POST_CODE" => "Y",
		"ALLOW_POST_MOVE" => "Y",
		"BLOG_COUNT" => "6",
		"BLOG_COUNT_MAIN" => "6",
		"BLOG_PROPERTY" => array(
		),
		"BLOG_PROPERTY_LIST" => array(
		),
		"BLOG_URL" => "proflist",
		"CACHE_TIME" => "3600",
		"CACHE_TIME_LONG" => "604800",
		"CACHE_TYPE" => "A",
		"CATEGORY_ID" => "",
		"COLOR_TYPE" => "N",
		"COMMENTS_COUNT" => "5",
		"COMMENT_ALLOW_IMAGE_UPLOAD" => "N",
		"COMMENT_ALLOW_VIDEO" => "N",
		"COMMENT_EDITOR_CODE_DEFAULT" => "N",
		"COMMENT_EDITOR_DEFAULT_HEIGHT" => "200",
		"COMMENT_EDITOR_RESIZABLE" => "N",
		"COMMENT_PROPERTY" => array(
		),
		"COMPONENT_TEMPLATE" => "av-steel-blog",
		"DATE_TIME_FORMAT" => "d.m.Y ",
		"DO_NOT_SHOW_MENU" => "Y",
		"DO_NOT_SHOW_SIDEBAR" => "Y",
		"EDITOR_CODE_DEFAULT" => "N",
		"EDITOR_DEFAULT_HEIGHT" => "600",
		"EDITOR_RESIZABLE" => "Y",
		"GROUP_ID" => array(
			0 => "3",
			1 => "",
		),
		"IMAGE_MAX_HEIGHT" => "1200",
		"IMAGE_MAX_WIDTH" => "1200",
		"MESSAGE_COUNT" => "6",
		"MESSAGE_COUNT_MAIN" => "6",
		"MESSAGE_LENGTH" => "6",
		"NAME_TEMPLATE" => "#NOBR##LAST_NAME# #NAME##/NOBR#",
		"NAV_TEMPLATE" => "",
		"NOT_USE_COMMENT_TITLE" => "Y",
		"NO_URL_IN_COMMENTS" => "L",
		"NO_URL_IN_COMMENTS_AUTHORITY" => "",
		"PERIOD" => "",
		"PERIOD_DAYS" => "6",
		"PERIOD_NEW_TAGS" => "",
		"POST_PROPERTY" => array(
		),
		"POST_PROPERTY_LIST" => array(
		),
		"RATING_TYPE" => "",
		"SEF_FOLDER" => "/blog/",
		"SEF_MODE" => "Y",
		"SEO_USE" => "Y",
		"SEO_USER" => "Y",
		"SET_NAV_CHAIN" => "N",
		"SET_TITLE" => "N",
		"SHARE_HANDLERS" => array(
			0 => "facebook",
			1 => "twitter",
			2 => "vk",
		),
		"SHARE_HIDE" => "N",
		"SHARE_SHORTEN_URL_KEY" => "",
		"SHARE_SHORTEN_URL_LOGIN" => "",
		"SHARE_TEMPLATE" => "",
		"SHOW_LOGIN" => "Y",
		"SHOW_NAVIGATION" => "N",
		"SHOW_RATING" => "N",
		"SHOW_SPAM" => "Y",
		"SMILES_COUNT" => "0",
		"THEME" => "red2",
		"USER_PROPERTY" => array(
		),
		"USER_PROPERTY_NAME" => "",
		"USE_ASC_PAGING" => "Y",
		"USE_GOOGLE_CODE" => "Y",
		"USE_SHARE" => "Y",
		"USE_SOCNET" => "N",
		"WIDTH" => "100%",
		"PATH_TO_SMILE" => "/bitrix/images/blog/smile/",
		"PATH_TO_SONET_USER_PROFILE" => "/company/personal/user/#user_id#/",
		"PATH_TO_MESSAGES_CHAT" => "/company/personal/messages/chat/#user_id#/",
		"PATH_TO_CONPANY_DEPARTMENT" => "/company/structure.php?set_filter_structure=Y&structure_UF_DEPARTMENT=#ID#",
		"PATH_TO_USER_POST" => "",
		"PATH_TO_USER_POST_EDIT" => "",
		"PATH_TO_USER_DRAFT" => "",
		"PATH_TO_USER_BLOG" => "",
		"PATH_TO_GROUP_POST" => "",
		"PATH_TO_GROUP_POST_EDIT" => "",
		"PATH_TO_GROUP_DRAFT" => "",
		"PATH_TO_GROUP_BLOG" => "",
		"SEF_URL_TEMPLATES" => array(
			"index" => "index.php",
			"group" => "group/#group_id#/",
			"blog" => "#blog#/",
			"user" => "user/#user_id#/",
			"user_friends" => "friends/#user_id#/",
			"search" => "search.php",
			"user_settings" => "#blog#/user_settings.php",
			"user_settings_edit" => "#blog#/user_settings_edit.php?id=#user_id#",
			"group_edit" => "#blog#/group_edit.php",
			"blog_edit" => "#blog#/blog_edit.php",
			"category_edit" => "#blog#/category_edit.php",
			"post_edit" => "#blog#/post_edit.php?id=#post_id#",
			"draft" => "#blog#/draft.php",
			"moderation" => "#blog#/moderation.php",
			"trackback" => POST_FORM_ACTION_URI.'&blog=#blog#&id=#post_id#&page=trackback',
			"post" => "#blog#/#post_id#/",
			"post_rss" => "#blog#/rss/#type#/#post_id#",
			"rss" => "#blog#/rss/#type#",
			"rss_all" => "rss/#type#/#group_id#",
		),
		"VARIABLE_ALIASES" => array(
			"user_settings_edit" => array(
				"user_id" => "id",
			),
			"post_edit" => array(
				"post_id" => "id",
			),
			"trackback" => array(
				"blog" => "blog",
				"post_id" => "id",
			),
		)
	),
	false
);?>
	</div>
	<br>
	<br>
	<br>
	<br><?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';?>