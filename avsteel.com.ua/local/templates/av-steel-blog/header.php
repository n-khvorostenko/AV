<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__); 
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
CJSCore::RegisterExt("bootstrap",    ["css" => "/bitrix/css/main/bootstrap.css"]);
CJSCore::RegisterExt("font_awesome", ["css" => "/bitrix/css/main/font-awesome.css"]);
CJSCore::RegisterExt
	(
	"av_site",
		[
		"js"  => "/bitrix/js/av_site/main.js",
		"css" => "/bitrix/css/av_site/main.css",
		"rel" => ["jquery", "font_awesome"]
		]
	);
CJSCore::RegisterExt
	(
	"av_form_elements",
		[
		"js"  => "/bitrix/js/av_site/form_elements.js",
		"rel" => ["av_site"]
		]
	);
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- HEAD ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<head>
		<title><?$APPLICATION->ShowTitle()?></title>
		<link rel="icon" type="image/x-icon" href="/bitrix/favicon.ico" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, width=device-width">
		<?$APPLICATION->ShowHead()?>
		<?CJSCore::Init(["jquery","av_site", "bootstrap"])?>
		<?
		$APPLICATION->SetAdditionalCSS("/bitrix/css/main/bootstrap.css");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/script.js');
		?>
	</head>

	<body id="av-shpola-blog" class="main-wrap">
		<a id="upLinks"></a>
<div call-back-form="" hidden="">
		<div popup-form-wrap="">
	<?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"av-steel-call-back",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "av-steel",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NOT_SHOW_FILTER" => array(0=>"",1=>"",),
		"NOT_SHOW_TABLE" => array(0=>"",1=>"",),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "index.php",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("action"=>"action",),
		"WEB_FORM_ID" => "15"
	)
);?><br>
		</div></div>
<div id="panel"><?$APPLICATION->ShowPanel()?></div>
<a id="upLinks"></a>
		<ul class="col-md-12 main-menu main-menu-fixed hidden-xs hidden-sm text-center text-uppercase">
			<a href="https://www.avsteel.com.ua"><li logo-main-menu=""></li></a>
			<li><a href="https://www.avsteel.com.ua/#profnastil">профнастил</a></li>
			<li><a href="https://www.avsteel.com.ua/#metalochereitsa">металлочерепица</a></li>
			<li><a href="https://www.avsteel.com.ua/#ral_colors_href">ral цвета</a></li>
			<li><a href="https://www.avsteel.com.ua/#how_we_work">как мы работаем</a></li>
			<li><a href="https://www.avsteel.com.ua/blog/">блог</a></li>
			<li call-btn=""><a href="" onclick="event.preventDefault()">заказать звонок</a></li>
		</ul>

<div id="mobile-menu-wrap" class="hidden-lg hidden-md">
	<div id="hamburger">
		<span></span><span></span><span></span>
	</div>

	<div class="bg-mobile-menu hidden ">
		<ul id="mobile-menu" class=" text-center text-uppercase">
			<li><a href="https://www.avsteel.com.ua/#profnastil">профнастил</a></li>
			<li><a href="https://www.avsteel.com.ua/#metalochereitsa">металлочерепица</a></li>
			<li><a href="https://www.avsteel.com.ua/#ral_colors_href">ral цвета</a></li>
			<li><a href="https://www.avsteel.com.ua/#how_we_work">как мы работаем</a></li>
			<li><a href="https://www.avsteel.com.ua/blog/">блог</a></li>
					<li call-btn=""><a href="" onclick="event.preventDefault()">заказать звонок</a></li>
		</ul>
	</div>
	<div class="pull-right text-uppercase" id="mobile-btn"><ul><li call-btn=""><a href="" onclick="event.preventDefault()">заказать звонок</a></li></ul></div>
</div>

