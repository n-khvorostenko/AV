<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
CJSCore::RegisterExt("bootstrap", ["css" => "/bitrix/css/av_site/bootstrap.supermin.css"]);
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
		$APPLICATION->AddHeadScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyA46WZQVEJSS2zf5hZPQW3-oV6P5RSCUDQ&callback=initMap');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/script.js');
		?>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-88853738-1', 'auto');
			ga('send', 'pageview');
		</script>

		<script type="text/javascript">
			(function (d, w, c)
				{
				(w[c] = w[c] || []).push(function() {
				try {
				w.yaCounter41532584 = new Ya.Metrika({
				id:41532584,
				clickmap:true,
				trackLinks:true,
				accurateTrackBounce:true,
				webvisor:true
				});
				} catch(e) { }
				});

				var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
				s.type = "text/javascript";
				s.async = true;
				s.src = "https://mc.yandex.ru/metrika/watch.js";
				
				if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
				} else { f(); }
				})
			(document, window, "yandex_metrika_callbacks");
		</script>

		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-88853738-1']);
			_gaq.push(['_trackPageview']);
			setTimeout(_gaq.push(['_trackEvent', '15_seconds', 'read']), 15000);

			(function()
				{
				var ga   = document.createElement('script');
				ga.type  = 'text/javascript';
				ga.async = true;
				ga.src   = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s    = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
				})();
		</script>
	</head>
<div id="panel"><?$APPLICATION->ShowPanel()?></div>
	<body id="av-steel">

<div hidden>
<div xmlns:v="http://rdf.data-vocabulary.org/#">
<span typeof="v:Breadcrumb"><a href="/" rel="v:url" property="v:title">avsteel.com.ua</a> › </span>
<span typeof="v:Breadcrumb"><a href="#profnastil" rel="v:url" property="v:title">Производитель профнастила №1 в Украине</a> › </span>
</div>
</div>
<script async="async" src="https://w.uptolike.com/widgets/v1/zp.js?pid=1618008" type="text/javascript"></script>

<div id="mobile-menu-wrap" class="hidden-lg hidden-md">
	<div id="hamburger">
		<span></span><span></span><span></span>
	</div>

	<div class="bg-mobile-menu hidden ">
		<ul id="mobile-menu" class=" text-center text-uppercase">
					<li><a href="#profnastil-mobile">профнастил</a></li>
					<li><a href="#metalochereitsa">металлочерепица</a></li>
					<li><a href="#ral_colors_href">ral цвета</a></li>
					<li><a href="#how_we_work">как мы работаем</a></li>
					<li><a href="/blog/">блог</a></li>
			<li call-btn=""><a href="" onclick="event.preventDefault()">заказать звонок</a></li>
		</ul>
	</div>
</div>

<div class="main-wrap">
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
		</div>
	</div>
<div partners-form="" hidden="">
		<div popup-form-wrap="">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"av-steel-partners-form",
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
		"WEB_FORM_ID" => "14"
	)
);?><br>
		</div>
	</div>
	<div id="bg-img-1">
<a id="upLinks"></a>
		<ul class="col-md-12 main-menu main-menu-fixed hidden-xs hidden-sm text-center text-uppercase">
			<a href="#upLinks"><li logo-main-menu=""></li></a>
			<li><a href="#profnastil">профнастил</a></li>
			<li><a href="#metalochereitsa">металлочерепица</a></li>
			<li><a href="#ral_colors_href">ral цвета</a></li>
			<li><a href="#how_we_work">как мы работаем</a></li>
			<li><a href="/blog/">блог</a></li>
			<li call-btn=""><a href="" onclick="event.preventDefault()">заказать звонок</a></li>
		</ul>
		<div class="container">
			<ul class="col-md-12 main-menu hidden-xs hidden-sm text-center text-uppercase">
				<li><a href="#profnastil">профнастил</a></li>
				<li><a href="#metalochereitsa">металлочерепица</a></li>
				<li><a href="#ral_colors_href">ral цвета</a></li>
				<li><a href="#how_we_work">как мы работаем</a></li>
				<li><a href="/blog/">блог</a></li>
				<li call-btn=""><a href="" onclick="event.preventDefault()">заказать звонок</a></li>
			</ul>
		</div>
		<div class="container">
			<div class="col-md-12" main-logo="">
				<div class="hidden-sm hidden-xs pull-right text-uppercase text-right">
					<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/include/phone.php"
					)
				);?>
				</div>
				<div class="hidden-lg hidden-md">
					<div class="hidden-lg hidden-md pull-right text-uppercase text-right" mobile-phone>
					<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/include/phone.php"
					)
					);?>
					</div>
				</div>
				<div logo="" class="hidden-sm hidden-xs text-center">
				</div>
				<div class="hidden-lg hidden-md col-sm-12 col-xs-12 ">
					<div logo="" class="text-center">
					</div>
				</div>
			</div>
		</div>
		<div class="container">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/main_h1.php"
				)
			);?>
 <br class="hidden-sm hidden-xs">
			<div class="col-md-5 col-md-offset-2  col-sm-6 hidden-xs" av-page1-text="">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/page1_text.php"
				)
			);?>
			</div>
		<div class="col-md-4 col-sm-6 col-md-offset-1" first-page-form="">
<?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"av-steel", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"CALL_ITEM_TITLE" => $_POST["element_name"],
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "N",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NOT_SHOW_FILTER" => array(
			0 => "",
			1 => "",
		),
		"NOT_SHOW_TABLE" => array(
			0 => "",
			1 => "",
		),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "13",
		"COMPONENT_TEMPLATE" => "av-steel",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" id="triangle-main-page">
	</div>
	</div>
	<div class="col-md-12 av-grey-bg">
		<div class="container">
			<div class="col-md-12 text-center" circle-1="" circle-first>
				<br>
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/weAreBest.php"
				)
			);?>

 <br>
			<div class="col-md-6">
				<div class="col-md-6 col-sm-6 col-xs-6 text-uppercase ">
					<div class="hidden-xs " circle-1-img-1="">
					</div>
					<p>
 <span red-text="">3</span> года<br>
						 успешной работы
					</p>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-6 text-uppercase">
					<div class="hidden-xs" circle-1-img-2="">
					</div>
					<p>
 <span red-text="">40 000</span><br>
						 заказов
					</p>
				</div>
			</div>
<br class="hidden-lg hidden-md">
			<div class="col-md-6">
				<div class="col-md-6 col-sm-6 col-xs-6 text-uppercase">
					<div class="hidden-xs" circle-1-img-3="">
					</div>
					<p>
 <span red-text="">12 000 000</span> м<sup>2</sup><br>
						 кровли
					</p>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 text-uppercase">
					<div class="hidden-xs" circle-1-img-4="">
					</div>
					<p>
						 До <span red-text="">35</span> лет<br>
						 срок службы
					</p>
				</div>
			</div>
			</div>
		</div>
 <br>
	</div>
 <br class="hidden-sm hidden-xs">
 <br class="hidden-sm hidden-xs"><a id="profnastil-mobile" ></a>
 <br class="hidden-sm hidden-xs">
	<div id="placeholder-hover-wrap" hidden="">
	</div><a id="profnastil" ></a>
	<div class="container">
<br class="hidden-lg hidden-md hidden-sm">
		<div class="col-md-12" hover-section-1="">
			<div class="text-center text-uppercase img-responsive" red-text="">
 <strong> <span red-text="">ПРОФНАСТИЛ</span></strong>
			</div>
			<div class="col-md-6">
				<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-1-plus-img-1" placeholdertext="Национальный<br>
					 производитель">
				</div>
				<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-1-plus-img-2" placeholdertext="Все цвета<br>
					 в наличии">
				</div>
				<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-1-plus-img-3" placeholdertext="Легкость<br>
					 монтажа">
				</div>
				<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-1-plus-img-4" placeholdertext="Малый вес<br>
					 конструкции">
				</div>
				<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-1-plus-img-5" placeholdertext="Большой срок<br>
					 службы">
				</div>
				<div id="hover-section-1-roof-img" class="hidden-sm hidden-xs">
				</div>
			</div>
			<div class="col-md-6">
				<p>
				</p>
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/ hoverSection1Text.php"
				)
			);?>
			</div>
 <br class="hidden-sm hidden-xs">
 <br class="hidden-sm hidden-xs">


</div>

 <br class="hidden-sm hidden-xs">
 <?
$GLOBALS["AV_STEEL_CATALOG_FILTER_WALL"]["PROPERTY_type_profnastila"] = 334;
$GLOBALS["AV_STEEL_CATALOG_FILTER_MAIN"]["PROPERTY_type_profnastila"] = 335;
$GLOBALS["AV_STEEL_CATALOG_FILTER_ROOF"]["PROPERTY_type_profnastila"] = 336;
?>  <br class="hidden-sm hidden-xs">
 <br>

<div class="text-center av-steel-catalog-text-wrap">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/profnastilStenavoy.php"
				)
			);?>
		</div>
<div class="av-center-cetalog">
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"av-board", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "AV_STEEL_CATALOG_FILTER_WALL",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "39",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PROPERTY_CODE" => array(
			0 => "type_profnastila",
			1 => "tolshina_metalla",
			2 => "visota_volni",
			3 => "dlina",
			4 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => "310",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "av-board"
	),
	false
);?></div><br><div class="text-center av-steel-catalog-text-wrap">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/profnastilKrovelniy.php"
				)
			);?>
		</div>
<div class="av-center-cetalog">
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"av-board", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "AV_STEEL_CATALOG_FILTER_ROOF",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "39",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PROPERTY_CODE" => array(
			0 => "type_profnastila",
			1 => "tolshina_metalla",
			2 => "visota_volni",
			3 => "dlina",
			4 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => "310",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "av-board"
	),
	false
);?></div><br><div class="text-center av-steel-catalog-text-wrap">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/profnastilNesushiy.php"
				)
			);?>
		</div>
	<div class="av-center-cetalog">
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"av-board", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "AV_STEEL_CATALOG_FILTER_MAIN",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "39",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PROPERTY_CODE" => array(
			0 => "type_profnastila",
			1 => "tolshina_metalla",
			2 => "visota_volni",
			3 => "dlina",
			4 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => "310",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "av-board"
	),
	false
);?>
	</div><br>
	</div>

	 <?$APPLICATION->IncludeComponent(
	"av:image_carousel", 
	"av-steel-desktop-banner", 
	array(
		"COMPONENT_TEMPLATE" => "av-steel-desktop-banner",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"IMAGE_ALT" => array(
			0 => "Профнастил профлист забор Фото",
			1 => "Металлочерепица крыша Фото",
			2 => "Профнастил профлист ворота Фото",
			3 => "Листы профнастила для забора, дял крыши Фото",
			4 => "Профнастил профлист крыша Фото",
			5 => "",
		),
		"IMAGE_LINK" => array(
			0 => "Крыша из профнастила",
			1 => "Забор из профнастила ",
			2 => "Ворота из профнастила",
			3 => "Лист профнастила",
			4 => "Крыша из металлочерепицы",
			5 => "",
		),
		"IMAGE_NAME" => array(
			0 => "Купить профнастил для крыши: цена, фото, отзывы",
			1 => "Купить профнастил для забора: цена, фото, отзывы",
			2 => "Купить ворота из профнастила: цена, фото, отзывы",
			3 => "Купить профнастил: цена за лист, фото, отзывы",
			4 => "Купить металлочерепицу на крышу: цена, фото, отзывы",
			5 => "",
		),
		"IMAGE_URL" => array(
			0 => "/upload/av_site/landings/av-steel/roof_profnastil.jpg",
			1 => "/upload/av_site/landings/av-steel/zabor_profnastil.jpg",
			2 => "/upload/av_site/landings/av-steel/gate_profnastil.jpg",
			3 => "/upload/av_site/landings/av-steel/list_profnastil.jpg",
			4 => "/upload/av_site/landings/av-steel/roof_stellcherepica.jpg",
			5 => "",
		)
	),
	false
);?>


<br>
	<div id="placeholder-hover-wrap-1" hidden="">
	</div>
	 <a id="metalochereitsa" ></a>
	<div class="container">
		<div class="col-md-12" id="hover-section-2" hover-section-1="">
			<div class="text-center text-uppercase img-responsive" red-text="">


 <strong> <span red-text>МЕТАЛЛОЧЕРЕПИЦА Монтеррей</span></strong>
			</div>
			<div class="col-md-5">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/cherepicaMonterey.php"
				)
			);?>
				<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"av-board-catalog-cherepica", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_DETAIL_TO_SLIDER" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BRAND_USE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_SECTION_ID_VARIABLE" => "N",
		"COMPONENT_TEMPLATE" => "av-board-catalog-cherepica",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "400",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "Y",
		"IBLOCK_ID" => "39",
		"IBLOCK_TYPE" => "catalog",
		"LABEL_PROP" => "-",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "0",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
			1 => "Себестоимость реализации",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => "722",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SET_VIEWED_IN_COMPONENT" => "N",
		"SHOW_404" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "blue",
		"USE_COMMENTS" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "Y",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_VOTE_RATING" => "N"
	),
	false
);?>

	<div class="text-center">
	<div class="text-uppercase" red-btn>заказать</div>
</div>
</div>
<div class="col-md-6 pull-right">
	<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-2-plus-img-1" placeholdertext="Металлочерепица от<br>
					 производителя">
		<div id="boubled"></div>
	</div>
	<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-2-plus-img-2" placeholdertext="Новые технологии<br>
					 в производстве">
		<div id="boubled"></div>
	</div>
	<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-2-plus-img-3" placeholdertext="В наличии<br>
					 все цвета"> </div>
	<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-2-plus-img-4" placeholdertext="Простой монтаж "> </div>
	<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-2-plus-img-5" placeholdertext="Легкий вес"> </div>
	<div class="hover-section-1-plus-img hidden-sm hidden-xs" id="hover-section-2-plus-img-6" placeholdertext="Высокий срок<br>
					 службы"> </div>
	<div id="hover-section-2-roof-img" class="hidden-sm hidden-xs"> </div>
</div>
</div>
 <br>
 <br class="hidden-sm hidden-xs">
<br class="hidden-sm hidden-xs"> </div>
<div class="container">
	<div class="col-md-12 text-center" circle-1="" circle-2="">
		<br class="hidden-sm hidden-xs">
		<br class="hidden-sm hidden-xs">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/dopUslugi.php"
				)
			);?>
		<? /*
		<br>
		<div id="download-file">
			<p> <a href="http://avsteel.com.ua/price/profnastil_price.xls" download="">СКАЧАТЬ ПРАЙС</a> </p>
</div>*/?>
		<br class="hidden-md hidden-sm">
		<div class="col-md-4 col-sm-4 col-xs-12" delay-time=".5s">
			<div circle-2-img-1=""> </div>

			<p> <span class="text-uppercase"><strong>доборные элементы </strong></span>
				<br>Планки для кровли и фасада из профнастила</p>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12" delay-time="0s">
			<div circle-2-img-2=""> </div>
			<p> <span class="text-uppercase"><strong>саморезы для профнастила</strong></span>
				<br>Окрашенные в цвет профнастила шурупы по дереву и металлу</p>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12" delay-time=".5s">
			<div circle-2-img-3=""> </div>
			<p> <span class="text-uppercase"><strong>вызов замерщика</strong></span>
				<br>Профессиональный расчет кровли и забора из профнастила</p>
		</div>
	</div>
</div>
<?/*----------------------- RAL COLOR -----------------------*/?>
	<br class="hidden-sm hidden-xs">
	<br>
	<br>
	<a id="ral_colors_href"></a>
	<div class="col-md-12" id="ral-color-wrap">
		<div class="col-lg-5 col-md-4 col-sm-4 col-xs-4" id="ral-color-bg-left"> </div>
		<div class="col-lg-5 col-md-4 col-sm-4 col-xs-4" id="ral-color-bg-right"> </div>
		<div class="container text-center">
	<br class="hidden-lg hidden-md hidden-sm">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/ralTitleText.php"
				)
			);?>
			<br class="hidden-sm hidden-xs">
			<div class="ral-image-tab text-uppercase active" id="ral-image-tab-1"> профнастил </div>
			<div class="ral-image-tab text-uppercase" id="ral-image-tab-2"> металлочерепица </div>
		</div>
		<div class="container text-center">
			<div class="col-md-2 hidden-sm hidden-xs pull-left">
				<br>
				<br>
				<div class="ral-color-btn active" ral-color="#1F53A0" ral-btn-1=""> 5005 </div>
				<div class="ral-color-btn" ral-color="#02682C" ral-btn-2=""> 6005 </div>
				<div class="ral-color-btn" ral-color="#8C1717" ral-btn-3=""> 3005 </div>
				<div class="ral-color-btn" ral-color="#59332D" ral-btn-4=""> 8017 </div>
				<div class="ral-color-btn" ral-color="#E2E2E2" ral-btn-5=""> 9003 </div>
			</div>
			<div class="ral-main-img-1">
				<svg version="1.1" id="Layer_1" fill="#073177" viewBox="110 75 670 390" style="fill: #1F53A0;">
					<path d="M111.1,110.1l152.2,185.1c0.2,0.3,0.7,0.3,0.9-0.1l1.3-2.1c0.1-0.2,0.3-0.3,0.5-0.4l3.9-1.4
						c0.4-0.1,0.8,0,1.1,0.3l1.4,1.6c0.2,0.2,0.4,0.3,0.6,0.2l20.7-6.1c0.4-0.1,0.8-0.4,1-0.8l0.8-1.6c0.3-0.6,0.8-1,1.5-1.2l2-0.6
						c0.6-0.2,1.3-0.1,1.8,0.2l1.4,0.8c0.5,0.3,1.2,0.4,1.8,0.2l18.5-5.5c0.5-0.1,0.9-0.5,1.1-0.9l1.2-2.1c0.2-0.3,0.5-0.5,0.8-0.6
						l2.2-0.7c0.4-0.1,0.9,0,1.3,0.3l1.1,0.9c0.5,0.4,1.1,0.5,1.7,0.3l17.9-5.3c0.3-0.1,0.6-0.3,0.7-0.5l1.6-2.6c0.2-0.4,0.6-0.7,1.1-0.8
						l1.1-0.3c0.6-0.2,1.3,0,1.8,0.4l0.8,0.8c0.5,0.4,1.1,0.6,1.8,0.4l16.8-5c0.4-0.1,0.7-0.4,0.9-0.7l1.1-2.2c0.2-0.3,0.4-0.5,0.7-0.6
						l1.9-0.6c0.5-0.1,1,0,1.4,0.4l0.7,0.8c0.4,0.4,0.9,0.6,1.5,0.4l16.4-4.9c0.5-0.1,0.9-0.5,1-1l0.5-1.4c0.2-0.5,0.6-0.9,1.1-1l1.1-0.3
						c0.6-0.2,1.3,0,1.7,0.5l0.5,0.6c0.4,0.4,1,0.6,1.6,0.5l15.6-4.6c0.2-0.1,0.3-0.2,0.4-0.4l0.5-1.9c0.1-0.3,0.3-0.5,0.6-0.6l2.3-0.7
						c0.3-0.1,0.6,0,0.8,0.2l1.1,1.2c0.2,0.2,0.4,0.2,0.6,0.2l15.5-4.6c0.4-0.1,0.8-0.4,1-0.8l0.7-1.4c0.2-0.3,0.4-0.5,0.8-0.6l1.5-0.4
						c0.4-0.1,0.8-0.1,1.1,0.2l1,0.7c0.4,0.3,0.9,0.3,1.4,0.2l13.7-4c0.3-0.1,0.7,0,1,0.2l74.7,58.9c0.3,0.3,0.9,0.7,1.3,0.6l0.6-0.2
						c0.4-0.2,0.7-0.5,0.8-0.9l0.4-1.2c0.1-0.4,0.4-0.7,0.8-0.9l0.5-0.2c0.5-0.2,1.1-0.1,1.5,0.2l0.3,0.2c0.5,0.4,1.2,0.6,1.9,0.3
						l13.3-5.4c0.3-0.1,0.5-0.3,0.6-0.6l0.4-1.2c0.1-0.3,0.3-0.5,0.6-0.6l1.5-0.6c0.3-0.1,0.7-0.1,1,0.1l0.6,0.5c0.3,0.2,0.7,0.3,1,0.2
						l12.7-5.2c0.3-0.1,0.6-0.4,0.7-0.8l0.3-1.2c0.1-0.2,0.2-0.4,0.4-0.5l1.7-0.7c0.3-0.1,0.6-0.1,0.8,0.1l0.6,0.5
						c0.3,0.3,0.8,0.4,1.2,0.2l11.7-4.8c0.4-0.2,0.7-0.5,0.8-1l0.2-0.7c0.1-0.4,0.4-0.8,0.8-0.9l1.5-0.6c0.4-0.2,0.9-0.1,1.3,0.1l0.5,0.3
						c0.4,0.3,0.9,0.3,1.3,0.1l10.7-4.3c0.3-0.1,0.5-0.3,0.6-0.6l0.6-1.2c0.1-0.2,0.3-0.4,0.5-0.5l1.3-0.5c0.3-0.1,0.6-0.1,0.8,0l0.8,0.4
						c0.3,0.2,0.6,0.2,0.9,0l11-4.5c0.3-0.1,0.6-0.4,0.7-0.8l0.2-0.7c0.1-0.3,0.3-0.5,0.5-0.6l1.5-0.6c0.2-0.1,0.4-0.1,0.7,0l1.1,0.4
						c0.3,0.1,0.6,0.1,0.8,0l9.3-3.8c0.3-0.1,0.6-0.4,0.6-0.7l0.2-0.9c0.1-0.3,0.3-0.5,0.5-0.6l1.1-0.4c0.3-0.1,0.7-0.1,0.9,0.2l0.4,0.3
						c0.3,0.3,0.7,0.4,1.1,0.2l9.9-4.1c0.3-0.1,0.6-0.4,0.6-0.8l0.1-0.7c0-0.3,0.3-0.6,0.6-0.7l1.9-0.8c0.3-0.1,0.6-0.1,0.9,0.1l0.6,0.4
						c0.3,0.2,0.6,0.2,1,0.1l8.1-3.3c0.3-0.1,0.6-0.4,0.7-0.7l0.5-1.3c0.2-0.4,0.5-0.7,0.7-0.7l2-0.8c0.4-0.1,0.8-0.1,1.1,0.1l0.7,0.5
						c0.4,0.2,0.8,0.3,1.2,0.1l7.1-2.9c0.3-0.1,0.5-0.4,0.6-0.7l0.2-0.8c0.1-0.3,0.3-0.6,0.6-0.7l0.8-0.3c0.3-0.1,0.7-0.1,1,0.1l0.6,0.4
						c0.3,0.2,0.6,0.2,0.9,0.1l7.9-3.2c0.2-0.1,0.3-0.3,0.4-0.5l0.1-0.7c0.1-0.5,0.4-0.9,0.9-1.1l1.3-0.5c0.5-0.2,1.1,0.6,0.7,0.3
						L443.7,74.2c-0.4-0.2-0.9-0.3-1.4-0.1l-1.4,0.7c-0.2,0.1-0.3,0.1-0.5,0.1l-8.4,0.8c-0.2,0-0.5,0-0.7,0l-1.4-0.3
						c-0.5-0.1-1.1,0-1.6,0.2l-0.9,0.5c-0.2,0.1-0.5,0.2-0.8,0.2l-8.5,0.9c-0.1,0-0.3,0-0.4,0l-1.8-0.4c-0.4-0.1-0.9,0-1.2,0.1l-1.6,0.7
						c-0.1,0.1-0.3,0.1-0.5,0.1l-8.3,0.8c-0.1,0-0.2,0-0.3,0l-2.1-0.4c-0.3-0.1-0.6,0-0.9,0.1l-2,0.8c-0.1,0-0.2,0-0.3,0.1l-9.7,1
						c-0.2,0-0.3,0-0.5,0l-1.7-0.5c-0.6-0.2-1.3-0.1-1.8,0.2l-1.3,0.7c-0.2,0.1-0.3,0.1-0.5,0.2l-8.7,0.9c-0.1,0-0.2,0-0.4,0l-2.1-0.5"> </path>
				</svg>
			</div>
			<div class="col-md-8 ral-main-img-2" hidden="">
				<svg version="1.1" id="Layer_1" x="0px" y="0px" style="fill: #1F53A0;" viewBox="0 0 800 453" enable-background="new 0 0 800 453">
					<path d="M5.4,150.8l107.8,130.1l7.6-4.4c0,0,7.9,2.4,12.1-2.5c5.9,1.2,30.4,3.6,54.7-12.5c5.3,0.5,7.9,1.1,11.8-3
								c8.4,1.7,32,3.3,50.1-11.7c4.1,1,7.6,1.1,10.1-2.3c7.7,1.1,31.5,2.4,45.7-10.9c4.3,0.6,8,1.2,9.9-2c6.9,0.6,25.8,3.9,42.2-9.8
								c4.8,1.1,6.9,0.5,9-2c5.1,1,25.2,3,39.4-9.5c3.5,1.3,6.1,1.3,7.5-1.6c3.7,0.9,19.5,4.6,31.4-4.5c10.7,6.5,50.4,31.5,50.4,31.5
								l0.6,5.2l77.4,48l0.4,5.2l8.1,3.9l54.8-20.4l6.8-1.9l30-11.1l9-2.4l18.6-7.9l8-2.9l6-1c1.8-0.3,3.5-0.9,5.2-1.7l10.6-5.6
								c0.5-0.3,1.1-0.5,1.6-0.7l2.7-1c1.7-0.7,3.5-1,5.3-1.1l7-0.1l13.2-8.3c0,0,7.4-4.9,16.1-3.7c3.3-1.3,17.5-9.1,19.6-10.3
								c-1.3-0.6-3.5-1.7-3.5-1.7l-0.1-3.8l-74.6-34.1v-3.8l-66.3-30.2l-0.3-3.5l-58.5-27l-0.1-3.2l-54.6-24.7l-0.1-3.4l-11.5-5
								c0,0-2.5,1.5-6.4,0.7c-3.9,1.9-8.5,6.5-24.3,3c-1.4,0.9-3.1,2.2-6.4,1.3c-0.9,0.9-9.2,6.4-22.7,3.2c-2,1.1-4.2,2.3-8.4,0.9
								c-2.2,1.5-10.8,6.5-26,3.5c-1.2,0.9-2.9,1.8-5.9,1c-4,2.1-12.7,7.3-27,3.6c-3,1.3-3.7,2.3-9.9,1c-2.3,1.9-9.1,7.6-27.5,4
								c-1.4,1-3.3,2.5-8,1c-3,2.3-19.7,8.6-32.6,4.4c-1.8,1.1-3.6,2.3-7.5,0.5c-2.6,2.1-17.2,9.8-34.9,4.4c-1.7,1-3.2,2-7.6,0.9
								c-2.7,2-12.3,9.6-36.4,4.8c-1.2,1.1-2.9,2.2-7.7,0.8c-2.2,1.3-20.5,9.7-39.6,5.6c-2.7,1.6-4.8,2.5-8.3,0.7
								c-2.9,1.9-11.3,9.5-43.3,6.4c-1.4,1.5-4.1,3.5-9.4,1.1c-4.1,2-20.2,10.6-45.6,6.1c-2.1,1.6-3.7,2.9-9.9,0.9c-5.3,2.3-20.7,11.1-49,7
								c-2.5,1.5-4.7,2.9-10,1.2C7.3,145.6,5,148.8,5.4,150.8z" /> </svg>
			</div>
			<div class="col-md-2 hidden-sm hidden-xs pull-right">
				<br>
				<br>
				<div class="ral-color-btn" ral-color="#C7C9C7" ral-btn-6=""> 9006 </div>
				<div class="ral-color-btn" ral-color="#871220" ral-btn-7=""> 3011 </div>
				<div class="ral-color-btn" ral-color="#484242" ral-btn-8=""> 8019 </div>
				<div class="ral-color-btn" ral-color="#4D593D" ral-btn-9=""> 6020 </div>
				<div class="ral-color-btn" ral-color="#F7DDB2" ral-btn-10=""> 1015 </div>
			</div>
			<?/*----------------------- RAL COLOR BTN SHOW MOBILE -----------------------*/?>
				<div class="hidden-md hidden-lg col-sm-12 col-xs-12 text-center">
					<div class="ral-color-btn" ral-color="#1F53A0" ral-btn-1=""> 5005 </div>
					<div class="ral-color-btn" ral-color="#02682C" ral-btn-2=""> 6005 </div>
					<div class="ral-color-btn" ral-color="#8C1717" ral-btn-3=""> 3005 </div>
					<div class="ral-color-btn" ral-color="#59332D" ral-btn-4=""> 8017 </div>
					<div class="ral-color-btn" ral-color="#E2E2E2" ral-btn-5=""> 9003 </div>
					<div class="ral-color-btn" ral-color="#C7C9C7" ral-btn-6=""> 9006 </div>
					<div class="ral-color-btn" ral-color="#871220" ral-btn-7=""> 3011 </div>
					<div class="ral-color-btn" ral-color="#484242" ral-btn-8=""> 8019 </div>
					<div class="ral-color-btn" ral-color="#4D593D" ral-btn-9=""> 6020 </div>
					<div class="ral-color-btn" ral-color="#F7DDB2" ral-btn-10=""> 1015 </div>
				</div>
		</div>
	</div>
	<div class="col-md-12 av-grey-bg" id="partners-text-wrap">
		<div class="container">
			<div class="text-center">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/partnersSectionText.php"
				)
			);?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-12 text-center" circle-1="" circle-3="">
			<a id="how_we_work"></a>
			<br> 
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/howWeWorks.php"
				)
			);?>
			<br class="hidden-md hidden-sm ">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div circle-1-img-1=""> </div>
				 <span class="text-uppercase">заказ</span>
					<br><p>Процесс заказа  профнастила и кровли мы сделали максимально простым и прозрачным.</p>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div circle-1-img-2=""> </div>
				<span class="text-uppercase">оплата</span>
					<br><p>Вы можете произвести оплату любым удобным для вас способом, предварительно получив финансовую сверку.</p>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div circle-1-img-3=""> </div>
				<span class="text-uppercase">изготовление</span>
					<br><p>Мы производим профнастил и металлочерепицу безупречного качества,  которые прослужат долгие годы.</p>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div circle-1-img-4=""> </div>
				<span class="text-uppercase">доставка</span>
					<br><p>Отлаженный процесс доставки позволит вам получить  строительный материал в кратчайшие сроки.</p>
			</div>
		</div>
	</div>

	<div class="col-lg-12 col-md-12" id="order-now-wrap">
		<div class="col-md-5  col-sm-6 " >
			<?$APPLICATION->IncludeComponent(
			"bitrix:form", 
			"av-steel-form-order-now", 
			array(
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_SHADOW" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"CACHE_TIME" => "3600",
			"CACHE_TYPE" => "N",
			"CHAIN_ITEM_LINK" => "",
			"CHAIN_ITEM_TEXT" => "",
			"COMPONENT_TEMPLATE" => "av-steel-form-order-now",
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "AUTO",
			"EDIT_ADDITIONAL" => "N",
			"EDIT_STATUS" => "N",
			"IGNORE_CUSTOM_TEMPLATE" => "N",
			"NOT_SHOW_FILTER" => array(
				0 => "",
				1 => "",
			),
			"NOT_SHOW_TABLE" => array(
				0 => "",
				1 => "",
			),
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
			"WEB_FORM_ID" => "16",
			"VARIABLE_ALIASES" => array(
				"action" => "action",
			)
			),
			false
			);?>
		</div>
	</div>
	<div class="container">
		<br>
	<div class="col-md-10 col-md-offset-1">
			<?$APPLICATION->IncludeComponent(
	"av:image_carousel", 
	"av-steel-bottom-slider", 
	array(
		"COMPONENT_TEMPLATE" => "av-steel-bottom-slider",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"IMAGE_ALT" => array(
		),
		"IMAGE_LINK" => array(
			0 => "Профнастил изготавливается из стали оцинкованной с полимерным покрытием и тонколистовой оцинкованой стали. Поставщиками металла являются ведущие производители Азии, Европы и Украины. ",
			1 => "Если необходим профнастил для крыши, выбирайте несущий профнастил марки «Н», для забора используется стеновой профнастил «С». Сложно выбрать? Позвоните нам и мы поможем в выборе.",
			2 => "Высота волны профилированного листа от 8 мм (стеновой профлист С-8) до 75 мм (несущий профлист Н-75)",
			3 => "Оцинкованный лист имеет толщину от 0,3 мм до 0,7 мм, лист с полимерным покрытием от 0,3 мм до 0,45 мм.",
			4 => "Максимальный срок - 5 рабочих дня",
			5 => "Срок службы профилированного листа AV steel до 35 лет",
			6 => "Производство расположено в городах: Днепр, Киев, Херсон, Харьков и Львов. Доставка осуществляется в любой город Украины",
			7 => "Минимальная длина листа 0,3 м, максимальная длина - 14 м. Детальную информацию по нарезке профлиста, вы можете получить у наших менеджеров.",
			8 => "",
		),
		"IMAGE_NAME" => array(
			0 => "Из какого материала изготовлен профнастил?",
			1 => "Какой выбрать профнастил?",
			2 => "Какой высоты профиль профлиста Вы катаете?",
			3 => "Какая толщина металла у профнастила?",
			4 => "Срок изготовления профнастила?",
			5 => "Какой срок службы профлиста?",
			6 => "В каком городе можно купить профнастил АВ металл групп?",
			7 => "Минимальная или максимальная длина листа профнастила, которую можно нарезать?",
			8 => "",
		),
		"IMAGE_URL" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "4",
			4 => "5",
			5 => "6",
			6 => "7",
			7 => "8",
			8 => "",
		)
	),
	false
);?><br>
	</div>
	</div>
	<div class="col-md-12  hidden-sm hidden-xs av-grey-bg" id="pay-method-section">
		<div class="container text-center">
			<div class="col-md-5 col-md-offset-1 col-sm-12 hidden-xs pull-left text-uppercase">
				<span><strong>способы оплаты</strong></span><br><br>
			<div class="col-md-4">
				<svg version="1.1" id="Layer_1"  x="0px" y="0px"
				viewBox="0 0 82 61" enable-background="new 0 0 82 61" xml:space="preserve">
				<g>
				<path fill="#838383" d="M76.3,0H5.8C2.6,0,0,2.6,0,5.8v49.3C0,58.3,2.6,61,5.8,61h70.5c3.2,0,5.8-2.6,5.8-5.8V5.8
				C82.1,2.6,79.5,0,76.3,0z M79.3,55.1c0,1.7-1.4,3.1-3,3.1H5.8c-1.7,0-3-1.4-3-3.1V5.8c0-1.7,1.4-3.1,3-3.1h70.5c1.7,0,3,1.4,3,3.1
				V55.1z"/>
				<path fill="#838485" d="M21.9,40.2H9.6c-0.8,0-1.4,0.6-1.4,1.4S8.8,43,9.6,43h12.3c0.8,0,1.4-0.6,1.4-1.4S22.6,40.2,21.9,40.2z"/>
				<path fill="#838485" d="M39.7,40.2H27.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h12.3c0.8,0,1.4-0.6,1.4-1.4S40.4,40.2,39.7,40.2z"
				/>
				<path fill="#838485" d="M10.9,47.1H9.6c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h1.4c0.8,0,1.4-0.6,1.4-1.4S11.7,47.1,10.9,47.1z"/>
				<path fill="#838485" d="M19.1,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4S19.9,47.1,19.1,47.1z"
				/>
				<path fill="#838485" d="M26,47.1h-1.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4H26c0.8,0,1.4-0.6,1.4-1.4S26.7,47.1,26,47.1z"/>
				<path fill="#838485" d="M34.2,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4S35,47.1,34.2,47.1z"/>
				<path fill="#838485" d="M38.7,47.5c-0.2,0.3-0.4,0.6-0.4,1s0.1,0.7,0.4,1c0.3,0.2,0.6,0.4,1,0.4c0.4,0,0.7-0.2,1-0.4
				c0.2-0.3,0.4-0.6,0.4-1s-0.2-0.7-0.4-1C40.1,47,39.2,47,38.7,47.5z"/>
				<path fill="#838485" d="M65.7,34.6c-1.7,0-3.4,0.5-4.8,1.3c-1.4-0.8-3-1.3-4.8-1.3c-5.3,0-9.6,4.4-9.6,9.7s4.3,9.7,9.6,9.7
				c1.7,0,3.4-0.5,4.8-1.3c1.4,0.8,3,1.3,4.8,1.3c5.3,0,9.6-4.4,9.6-9.7S70.9,34.6,65.7,34.6z M62.9,44.3c0,1.9-0.8,3.7-2.1,4.9
				c-1.3-1.3-2.1-3-2.1-4.9s0.8-3.7,2.1-4.9C62.1,40.7,62.9,42.4,62.9,44.3z M49.2,44.3c0-3.8,3.1-6.9,6.8-6.9c0.9,0,1.7,0.2,2.4,0.5
				c-1.5,1.7-2.4,4-2.4,6.5c0,2.5,0.9,4.7,2.4,6.5c-0.8,0.3-1.6,0.5-2.4,0.5C52.3,51.3,49.2,48.2,49.2,44.3z M65.7,51.3
				c-0.9,0-1.7-0.2-2.4-0.5c1.5-1.7,2.4-4,2.4-6.5c0-2.5-0.9-4.7-2.4-6.5c0.8-0.3,1.6-0.5,2.4-0.5c3.8,0,6.8,3.1,6.8,6.9
				S69.4,51.3,65.7,51.3z"/>
				<path fill="#838485" d="M11.3,30.5h8.2h2h8.2c1.7,0,3.1-1.4,3.1-3.1V16.3v-2.1c0-1.7-1.4-3.1-3.1-3.1H19.5h-8.2
				c-1.7,0-3.1,1.4-3.1,3.1v13.2C8.2,29.1,9.6,30.5,11.3,30.5z M16.4,22.2h-5.5v-2.8h5.5V22.2z M10.9,27.4v-2.4h5.5v2.4
				c0,0.1,0,0.2,0,0.4h-5.2C11.1,27.7,10.9,27.6,10.9,27.4z M30.1,22.2h-5.5v-2.4c0-0.2,0.2-0.4,0.3-0.4h4.8c0.1,0,0.2,0,0.3,0
				C30.1,19.4,30.1,22.2,30.1,22.2z M29.7,27.7h-5.2c0-0.1,0-0.2,0-0.4v-2.4h5.5v2.4C30.1,27.6,29.9,27.7,29.7,27.7z M29.7,13.9
				c0.2,0,0.3,0.2,0.3,0.4v2.1c0,0.2-0.2,0.4-0.3,0.4H25c-1.7,0-3.1,1.4-3.1,3.1v7.6c0,0.2-0.2,0.4-0.3,0.4h-2c-0.2,0-0.3-0.2-0.3-0.4
				V14.2c0-0.2,0.2-0.4,0.3-0.4H29.7z M11.3,13.9h5.2c0,0.1,0,0.2,0,0.4v2.4h-5.5v-2.4C10.9,14,11.1,13.9,11.3,13.9z"/>
				</g>
				</svg>
			</div>
			<div class="col-md-4">
				<svg version="1.1" id="Layer_1"  x="0px" y="0px"
				viewBox="0 0 82 61" enable-background="new 0 0 82 61" xml:space="preserve">
				<g display="none">
				<path display="inline" fill="#838383" d="M76.3,0H5.8C2.6,0,0,2.6,0,5.8v49.3C0,58.3,2.6,61,5.8,61h70.5c3.2,0,5.8-2.6,5.8-5.8V5.8
				C82.1,2.6,79.5,0,76.3,0z M79.3,55.1c0,1.7-1.4,3.1-3,3.1H5.8c-1.7,0-3-1.4-3-3.1V5.8c0-1.7,1.4-3.1,3-3.1h70.5c1.7,0,3,1.4,3,3.1
				V55.1z"/>
				<path display="inline" fill="#838485" d="M21.9,40.2H9.6c-0.8,0-1.4,0.6-1.4,1.4S8.8,43,9.6,43h12.3c0.8,0,1.4-0.6,1.4-1.4
				S22.6,40.2,21.9,40.2z"/>
				<path display="inline" fill="#838485" d="M39.7,40.2H27.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h12.3c0.8,0,1.4-0.6,1.4-1.4
				S40.4,40.2,39.7,40.2z"/>
				<path display="inline" fill="#838485" d="M10.9,47.1H9.6c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h1.4c0.8,0,1.4-0.6,1.4-1.4
				S11.7,47.1,10.9,47.1z"/>
				<path display="inline" fill="#838485" d="M19.1,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S19.9,47.1,19.1,47.1z"/>
				<path display="inline" fill="#838485" d="M26,47.1h-1.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4H26c0.8,0,1.4-0.6,1.4-1.4
				S26.7,47.1,26,47.1z"/>
				<path display="inline" fill="#838485" d="M34.2,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S35,47.1,34.2,47.1z"/>
				<path display="inline" fill="#838485" d="M38.7,47.5c-0.2,0.3-0.4,0.6-0.4,1s0.1,0.7,0.4,1c0.3,0.2,0.6,0.4,1,0.4
				c0.4,0,0.7-0.2,1-0.4c0.2-0.3,0.4-0.6,0.4-1s-0.2-0.7-0.4-1C40.1,47,39.2,47,38.7,47.5z"/>
				<path display="inline" fill="#838485" d="M65.7,34.6c-1.7,0-3.4,0.5-4.8,1.3c-1.4-0.8-3-1.3-4.8-1.3c-5.3,0-9.6,4.4-9.6,9.7
				s4.3,9.7,9.6,9.7c1.7,0,3.4-0.5,4.8-1.3c1.4,0.8,3,1.3,4.8,1.3c5.3,0,9.6-4.4,9.6-9.7S70.9,34.6,65.7,34.6z M62.9,44.3
				c0,1.9-0.8,3.7-2.1,4.9c-1.3-1.3-2.1-3-2.1-4.9s0.8-3.7,2.1-4.9C62.1,40.7,62.9,42.4,62.9,44.3z M49.2,44.3c0-3.8,3.1-6.9,6.8-6.9
				c0.9,0,1.7,0.2,2.4,0.5c-1.5,1.7-2.4,4-2.4,6.5c0,2.5,0.9,4.7,2.4,6.5c-0.8,0.3-1.6,0.5-2.4,0.5C52.3,51.3,49.2,48.2,49.2,44.3z
				M65.7,51.3c-0.9,0-1.7-0.2-2.4-0.5c1.5-1.7,2.4-4,2.4-6.5c0-2.5-0.9-4.7-2.4-6.5c0.8-0.3,1.6-0.5,2.4-0.5c3.8,0,6.8,3.1,6.8,6.9
				S69.4,51.3,65.7,51.3z"/>
				<path display="inline" fill="#838485" d="M11.3,30.5h8.2h2h8.2c1.7,0,3.1-1.4,3.1-3.1V16.3v-2.1c0-1.7-1.4-3.1-3.1-3.1H19.5h-8.2
				c-1.7,0-3.1,1.4-3.1,3.1v13.2C8.2,29.1,9.6,30.5,11.3,30.5z M16.4,22.2h-5.5v-2.8h5.5V22.2z M10.9,27.4v-2.4h5.5v2.4
				c0,0.1,0,0.2,0,0.4h-5.2C11.1,27.7,10.9,27.6,10.9,27.4z M30.1,22.2h-5.5v-2.4c0-0.2,0.2-0.4,0.3-0.4h4.8c0.1,0,0.2,0,0.3,0
				C30.1,19.4,30.1,22.2,30.1,22.2z M29.7,27.7h-5.2c0-0.1,0-0.2,0-0.4v-2.4h5.5v2.4C30.1,27.6,29.9,27.7,29.7,27.7z M29.7,13.9
				c0.2,0,0.3,0.2,0.3,0.4v2.1c0,0.2-0.2,0.4-0.3,0.4H25c-1.7,0-3.1,1.4-3.1,3.1v7.6c0,0.2-0.2,0.4-0.3,0.4h-2c-0.2,0-0.3-0.2-0.3-0.4
				V14.2c0-0.2,0.2-0.4,0.3-0.4H29.7z M11.3,13.9h5.2c0,0.1,0,0.2,0,0.4v2.4h-5.5v-2.4C10.9,14,11.1,13.9,11.3,13.9z"/>
				</g>
				<g>
				<g>
				<g>
				<path fill="#838586" d="M40.3,8.6v5.6c0,0.6,0.5,1.1,1.1,1.1c0.6,0,1.1-0.5,1.1-1.1V8.6c1.8-0.5,3.2-2.2,3.2-4.2
				c0-2.4-1.9-4.3-4.3-4.3c-2.4,0-4.3,1.9-4.3,4.3C37.1,6.5,38.5,8.2,40.3,8.6z M41.4,2.3c1.2,0,2.1,1,2.1,2.2c0,1.2-1,2.2-2.1,2.2
				c-1.2,0-2.1-1-2.1-2.2C39.3,3.3,40.2,2.3,41.4,2.3z"/>
				<path fill="#838586" d="M24.2,29.2c0.4,0,0.8-0.3,1-0.7c0.2-0.6-0.1-1.2-0.6-1.4l-6.9-2.7c0-0.1,0-0.3,0-0.4
				c0-2.4-1.9-4.3-4.3-4.3c-2.4,0-4.3,1.9-4.3,4.3s1.9,4.3,4.3,4.3c1.5,0,2.8-0.7,3.5-1.9l6.8,2.7C24,29.2,24.1,29.2,24.2,29.2z
				 M13.5,26.2c-1.2,0-2.1-1-2.1-2.2s1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2S14.7,26.2,13.5,26.2z"/>
				<path fill="#838586" d="M69.3,19.6C67,19.6,65,21.6,65,24c0,0.1,0,0.3,0,0.4l-6.9,2.7c-0.6,0.2-0.8,0.8-0.6,1.4
				c0.2,0.4,0.6,0.7,1,0.7c0.1,0,0.3,0,0.4-0.1l6.8-2.7c0.8,1.1,2.1,1.9,3.5,1.9c2.4,0,4.3-1.9,4.3-4.3S71.7,19.6,69.3,19.6z
				 M69.3,26.2c-1.2,0-2.1-1-2.1-2.2s1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2S70.5,26.2,69.3,26.2z"/>
				<path fill="#838586" d="M58.6,52.2c-0.6,0-1.2,0.1-1.7,0.4l-4.7-5.7c-0.4-0.5-1.1-0.5-1.5-0.1c-0.5,0.4-0.5,1.1-0.1,1.5l4.7,5.6
				c-0.6,0.7-0.9,1.6-0.9,2.6c0,2.4,1.9,4.3,4.3,4.3c2.4,0,4.3-1.9,4.3-4.3C62.9,54.1,61,52.2,58.6,52.2z M58.6,58.7
				c-1.2,0-2.1-1-2.1-2.2c0-1.2,1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2C60.7,57.7,59.8,58.7,58.6,58.7z"/>
				<path fill="#838586" d="M41.4,27.2c1.2,0,2.1,1,2.1,2.2c0,0.6,0.5,1.1,1.1,1.1s1.1-0.5,1.1-1.1c0-2-1.4-3.7-3.2-4.2v-0.2
				c0-0.6-0.5-1.1-1.1-1.1s-1.1,0.5-1.1,1.1v0.2c-1.8,0.5-3.2,2.2-3.2,4.2c0,2.4,1.9,4.3,4.3,4.3c1.2,0,2.1,1,2.1,2.2
				c0,1.2-1,2.2-2.1,2.2c-1.2,0-2.1-1-2.1-2.2c0-0.6-0.5-1.1-1.1-1.1s-1.1,0.5-1.1,1.1c0,2,1.4,3.7,3.2,4.2v0.2
				c0,0.6,0.5,1.1,1.1,1.1s1.1-0.5,1.1-1.1v-0.2c1.8-0.5,3.2-2.2,3.2-4.2c0-2.4-1.9-4.3-4.3-4.3c-1.2,0-2.1-1-2.1-2.2
				C39.3,28.2,40.2,27.2,41.4,27.2z"/>
				<path fill="#838586" d="M32.1,46.7c-0.5-0.4-1.1-0.3-1.5,0.1l-4.7,5.7c-0.5-0.2-1.1-0.4-1.7-0.4c-2.4,0-4.3,1.9-4.3,4.3
				c0,2.4,1.9,4.3,4.3,4.3s4.3-1.9,4.3-4.3c0-1-0.4-1.9-0.9-2.6l4.7-5.6C32.7,47.8,32.6,47.1,32.1,46.7z M24.2,58.7
				c-1.2,0-2.1-1-2.1-2.2c0-1.2,1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2C26.4,57.7,25.4,58.7,24.2,58.7z"/>
				<path fill="#838586" d="M56.4,32.7c0-8.4-6.7-15.2-15-15.2s-15,6.8-15,15.2s6.7,15.2,15,15.2S56.4,41,56.4,32.7z M41.4,45.7
				c-7.1,0-12.9-5.8-12.9-13s5.8-13,12.9-13s12.9,5.8,12.9,13S48.5,45.7,41.4,45.7z"/>
				</g>
				</g>
				</g>
				</svg>

			</div>
			<div class="col-md-4">
				<svg version="1.1" id="Layer_1"  x="0px" y="0px"
				viewBox="0 0 82 61" enable-background="new 0 0 82 61" xml:space="preserve">
				<g display="none">
				<path display="inline" fill="#838383" d="M76.3,0H5.8C2.6,0,0,2.6,0,5.8v49.3C0,58.3,2.6,61,5.8,61h70.5c3.2,0,5.8-2.6,5.8-5.8V5.8
				C82.1,2.6,79.5,0,76.3,0z M79.3,55.1c0,1.7-1.4,3.1-3,3.1H5.8c-1.7,0-3-1.4-3-3.1V5.8c0-1.7,1.4-3.1,3-3.1h70.5c1.7,0,3,1.4,3,3.1
				V55.1z"/>
				<path display="inline" fill="#838485" d="M21.9,40.2H9.6c-0.8,0-1.4,0.6-1.4,1.4S8.8,43,9.6,43h12.3c0.8,0,1.4-0.6,1.4-1.4
				S22.6,40.2,21.9,40.2z"/>
				<path display="inline" fill="#838485" d="M39.7,40.2H27.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h12.3c0.8,0,1.4-0.6,1.4-1.4
				S40.4,40.2,39.7,40.2z"/>
				<path display="inline" fill="#838485" d="M10.9,47.1H9.6c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h1.4c0.8,0,1.4-0.6,1.4-1.4
				S11.7,47.1,10.9,47.1z"/>
				<path display="inline" fill="#838485" d="M19.1,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S19.9,47.1,19.1,47.1z"/>
				<path display="inline" fill="#838485" d="M26,47.1h-1.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4H26c0.8,0,1.4-0.6,1.4-1.4
				S26.7,47.1,26,47.1z"/>
				<path display="inline" fill="#838485" d="M34.2,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S35,47.1,34.2,47.1z"/>
				<path display="inline" fill="#838485" d="M38.7,47.5c-0.2,0.3-0.4,0.6-0.4,1s0.1,0.7,0.4,1c0.3,0.2,0.6,0.4,1,0.4
				c0.4,0,0.7-0.2,1-0.4c0.2-0.3,0.4-0.6,0.4-1s-0.2-0.7-0.4-1C40.1,47,39.2,47,38.7,47.5z"/>
				<path display="inline" fill="#838485" d="M65.7,34.6c-1.7,0-3.4,0.5-4.8,1.3c-1.4-0.8-3-1.3-4.8-1.3c-5.3,0-9.6,4.4-9.6,9.7
				s4.3,9.7,9.6,9.7c1.7,0,3.4-0.5,4.8-1.3c1.4,0.8,3,1.3,4.8,1.3c5.3,0,9.6-4.4,9.6-9.7S70.9,34.6,65.7,34.6z M62.9,44.3
				c0,1.9-0.8,3.7-2.1,4.9c-1.3-1.3-2.1-3-2.1-4.9s0.8-3.7,2.1-4.9C62.1,40.7,62.9,42.4,62.9,44.3z M49.2,44.3c0-3.8,3.1-6.9,6.8-6.9
				c0.9,0,1.7,0.2,2.4,0.5c-1.5,1.7-2.4,4-2.4,6.5c0,2.5,0.9,4.7,2.4,6.5c-0.8,0.3-1.6,0.5-2.4,0.5C52.3,51.3,49.2,48.2,49.2,44.3z
				M65.7,51.3c-0.9,0-1.7-0.2-2.4-0.5c1.5-1.7,2.4-4,2.4-6.5c0-2.5-0.9-4.7-2.4-6.5c0.8-0.3,1.6-0.5,2.4-0.5c3.8,0,6.8,3.1,6.8,6.9
				S69.4,51.3,65.7,51.3z"/>
				<path display="inline" fill="#838485" d="M11.3,30.5h8.2h2h8.2c1.7,0,3.1-1.4,3.1-3.1V16.3v-2.1c0-1.7-1.4-3.1-3.1-3.1H19.5h-8.2
				c-1.7,0-3.1,1.4-3.1,3.1v13.2C8.2,29.1,9.6,30.5,11.3,30.5z M16.4,22.2h-5.5v-2.8h5.5V22.2z M10.9,27.4v-2.4h5.5v2.4
				c0,0.1,0,0.2,0,0.4h-5.2C11.1,27.7,10.9,27.6,10.9,27.4z M30.1,22.2h-5.5v-2.4c0-0.2,0.2-0.4,0.3-0.4h4.8c0.1,0,0.2,0,0.3,0
				C30.1,19.4,30.1,22.2,30.1,22.2z M29.7,27.7h-5.2c0-0.1,0-0.2,0-0.4v-2.4h5.5v2.4C30.1,27.6,29.9,27.7,29.7,27.7z M29.7,13.9
				c0.2,0,0.3,0.2,0.3,0.4v2.1c0,0.2-0.2,0.4-0.3,0.4H25c-1.7,0-3.1,1.4-3.1,3.1v7.6c0,0.2-0.2,0.4-0.3,0.4h-2c-0.2,0-0.3-0.2-0.3-0.4
				V14.2c0-0.2,0.2-0.4,0.3-0.4H29.7z M11.3,13.9h5.2c0,0.1,0,0.2,0,0.4v2.4h-5.5v-2.4C10.9,14,11.1,13.9,11.3,13.9z"/>
				</g>
				<g>
				<path fill="#838485" d="M40.5,0C23.7,0,10,13.7,10,30.5S23.7,61,40.5,61S71,47.3,71,30.5S57.3,0,40.5,0z M40.5,57
				C25.9,57,14,45.1,14,30.5S25.9,4,40.5,4S67,15.9,67,30.5S55.1,57,40.5,57z"/>
				<path fill="#838485" d="M42.5,28.7V17.3c1.1,0.4,2.1,1.2,2.8,2.2c0.6,0.9,1.9,1.2,2.8,0.6c0.9-0.6,1.2-1.9,0.6-2.8
				c-1.4-2.2-3.7-3.7-6.2-4.2V9.9c0-1.1-0.9-2-2-2c-1.1,0-2,0.9-2,2v3.2c-4.4,0.9-7.8,4.9-7.8,9.6s3.3,8.7,7.8,9.6v11.4
				c-1.1-0.4-2.1-1.2-2.8-2.2c-0.6-0.9-1.9-1.2-2.8-0.6c-0.9,0.6-1.2,1.9-0.6,2.8c1.4,2.2,3.7,3.7,6.2,4.2V51c0,1.1,0.9,2,2,2
				c1.1,0,2-0.9,2-2v-3.2c4.4-0.9,7.8-4.9,7.8-9.6S46.9,29.6,42.5,28.7z M34.7,22.7c0-2.5,1.6-4.6,3.8-5.4v10.8
				C36.3,27.3,34.7,25.2,34.7,22.7z M42.5,43.7V32.9c2.2,0.8,3.8,2.9,3.8,5.4S44.7,42.9,42.5,43.7z"/>
				</g>
				</svg>
			</div>
				<strong>
				<div class="col-md-4">банковская карта</div>
				<div class="col-md-4">Безналичный расчет</div>
				<div class="col-md-4">LIQPAY</div>
				</strong>
			</div>
			<div class="col-md-5 text-uppercase" right>
				<span><strong>мы сотрудничаем с перевозчиками</strong></span
				><p>доставка ав металл групп</p>
					<strong>
						<div class="col-md-5 col-md-offset-1 col-sm-6 text-left"><img src="/upload/av_site/landings/av-steel/new_post.svg"  alt="Новая Почта" /><span>новая почта</span></div>
						<div class="col-md-6 col-sm-6 text-left"><img src="/upload/av_site/landings/av-steel/cat.svg"      alt="CAT доставка" /><span>cat</span></div>
						<div class="col-md-5 col-md-offset-1 col-sm-6 text-left"><img src="/upload/av_site/landings/av-steel/in_time.svg"    alt="Ин-тайм" /><span>ин-тайм</span></div>
						<div class="col-md-6 col-sm-6 text-left"><img src="/upload/av_site/landings/av-steel/delivery-bottom.svg" alt="Деливери" /><span>деливери</span></div>
					</strong>
			</div> 
		</div>
	</div>
	<div id="map-wrap">
		<div class="col-md-12 map-text  text-center">
				<br><?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/mapText.php"
				)
			);?>
		</div>
		<div id="map_canvas"></div>
	</div>

	<div class="col-md-12" id="footer-wrap">
		<div class="container">
			<div class="col-md-7 col-md-offset-2 col-sm-9 text-center" style="padding: 0px;">
				<ul class="text-uppercase hidden-xs">
					<li><a href="#profnastil">профнастил</a></li>
					<li><a href="#metalochereitsa">металлочерепица</a></li>
					<li><a href="#ral_colors_href">ral цвета</a></li>
					<li><a href="#how_we_work">как мы работаем</a></li>
					<li><a href="/blog/">блог</a></li>
				</ul>
				<div class="text-center col-sm-12" style="color: #FFF">
					<div class="col-md-4 col-md-offset-1 col-sm-4   hidden-xs"  >
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/footerAdress.php"
							)
						);?>
					</div>

					<div class="col-md-2 col-sm-3 hidden-xs"  logo></div>

					<div class="col-md-4 col-sm-3"  ><br class="hidden-lg hidden-md hidden-sm ">
						<u>e-mail:</u><br class="hidden-lg hidden-md hidden-sm ">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => "/include/footerEmail.php"
							)
						);?>

					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 footer-right-col text-center" style="padding: 0px;">
				<a href="#upLinks" class="hidden-xs"><div id="arrow-up"> </div></a>
				<div> 
					<ul><a href="https://www.vk.com/avmgua">
						<li>
							<svg version="1.1" id="Layer_1" x="0px" y="0px"
							viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
							<g display="none">
							<g display="inline">
							<path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
							c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
							c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
							c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
							c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z"/>
							</g>
							</g>
							<g display="none">
							<path display="inline" fill="#CACACA" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9
							c0,1.5,1.5,2.9,2.9,2.9h20v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5
							c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3
							C145.9,25.4,144.9,23.9,142.9,23.9z"/>
							</g>
							<g id="XMLID_1_">
							<path id="XMLID_807_" fill="#FFFFFF" d="M171.2,119.5c6.3,8.3,13.7,16.1,19.5,25.4c2.4,3.9,4.9,8.3,6.8,13.2
							c2.4,6.8,0.5,14.1-4.4,14.6h-28.8c-7.3,1-13.2-2.9-18-9.8c-3.9-5.4-7.8-10.7-11.7-16.1c-1.5-2.4-3.4-4.4-5.4-5.9
							c-3.9-3.4-7.3-2.4-9.8,2.9c-2.4,5.4-2.9,11.2-2.9,17.6c-0.5,8.8-2.4,11.2-9.3,11.7c-14.6,1-28.3-2-41-11.7
							c-11.2-8.3-20-20-27.8-33.7C23.9,101.5,12.2,73.2,2,43.4c-2-7.3,0-10.7,5.4-10.7c9.3,0,18.5,0,28.3,0c3.9,0,6.3,2.9,7.8,7.8
							c4.9,16.1,11.2,31.7,19,45.9c2,3.9,4.4,7.8,7.3,10.2c3.4,2.9,5.9,2,7.3-2.9c1-2.9,1.5-6.3,1.5-9.8c1-11.2,1-22.4-0.5-33.7
							c-1-6.8-3.9-11.7-9.3-12.7c-2.9-0.5-2.4-2-1-3.9c2.4-3.4,4.4-5.9,8.8-5.9h32.7c4.9,1.5,6.3,4.4,6.8,10.7v46.8
							c0,2.4,1,10.2,4.4,12.2c2.9,1,4.9-2,6.3-3.9c7.8-10.7,13.2-23.4,18-36.6c2.4-5.9,3.9-11.7,5.9-17.6c1.5-4.4,3.4-6.8,7.3-6.3h31.2
							c1,0,2,0,2.9,0c5.4,1,6.8,3.9,4.9,10.7c-1.5,10.2-6.8,18.5-11.7,27.3c-5.4,9.3-10.7,18.5-16.1,27.8
							C164.9,107.8,165.4,112.2,171.2,119.5L171.2,119.5z"/>
							</g>
							</svg>
						</li></a>
						<a href="https://www.facebook.com/avmg.com.ua/"><li>
							<svg version="1.1" id="Layer_1" x="0px" y="0px"
							viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
							<g display="none">
							<g display="inline">
							<path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
							c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
							c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
							c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
							c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z"/>
							</g>
							</g>
							<g>
							<path fill="#FFFFFF" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9c0,1.5,1.5,2.9,2.9,2.9h20
							v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1
							h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3C145.9,25.4,144.9,23.9,142.9,23.9z"/>
							</g>
							</svg>
							</li></a>
						<a href="https://www.youtube.com/channel/UCuzA3Al_MKninYtzVrgMyOA"><li>
							<svg version="1.1" id="Layer_1"  x="0px" y="0px"
							viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
							<g display="none">
							<g display="inline">
							<path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
							c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
							c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
							c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
							c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z"/>
							</g>
							</g>
							<g display="none">
							<path display="inline" fill="#CACACA" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9
							c0,1.5,1.5,2.9,2.9,2.9h20v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5
							c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3
							C145.9,25.4,144.9,23.9,142.9,23.9z"/>
							</g>
							<g id="XMLID_1_" display="none">
							<path id="XMLID_807_" display="inline" fill="#CACACA" d="M168.8,119.5c6.3,8.3,13.7,16.1,19.5,25.4c2.4,3.9,4.9,8.3,6.8,13.2
							c2.4,6.8,0.5,14.1-4.4,14.6H162c-7.3,1-13.2-2.9-18-9.8c-3.9-5.4-7.8-10.7-11.7-16.1c-1.5-2.4-3.4-4.4-5.4-5.9
							c-3.9-3.4-7.3-2.4-9.8,2.9c-2.4,5.4-2.9,11.2-2.9,17.6c-0.5,8.8-2.4,11.2-9.3,11.7c-14.6,1-28.3-2-41-11.7
							c-11.2-8.3-20-20-27.8-33.7C21.5,101,10.2,72.2,0,42.9c-2.4-6.8-0.5-10.2,4.9-10.2c9.3,0,18.5,0,28.3,0c3.9,0,6.3,2.9,7.8,7.8
							c4.9,16.1,11.2,31.7,19,45.9c2,3.9,4.4,7.8,7.3,10.2c3.4,2.9,5.9,2,7.3-2.9c1-2.9,1.5-6.3,1.5-9.8c1-11.2,1-22.4-0.5-33.7
							c-1-6.8-3.9-11.7-9.3-12.7c-2.9-0.5-2.4-2-1-3.9c2.4-3.4,4.4-5.9,8.8-5.9h32.7c4.9,1.5,6.3,4.4,6.8,10.7v46.8
							c0,2.4,1,10.2,4.4,12.2c2.9,1,4.9-2,6.3-3.9c7.8-10.7,13.2-23.4,18-36.6c2.4-5.9,3.9-11.7,5.9-17.6c1.5-4.4,3.4-6.8,7.3-6.3h31.2
							c1,0,2,0,2.9,0c5.4,1,6.8,3.9,4.9,10.7c-2.4,10.2-7.3,19-12.2,27.8c-5.4,9.3-10.7,18.5-16.1,27.8
							C162.4,107.8,162.9,112.2,168.8,119.5L168.8,119.5z"/>
							</g>
							<g id="XMLID_822_">
							<path id="XMLID_823_" fill="#FFFFFF" d="M189.3,44.4c-6.8-8.3-20-11.7-44.4-11.7H55.1c-24.9,0-38,3.4-45.4,12.7
							c-6.8,8.8-6.8,21.5-6.8,39V118c0,34.1,8.3,51.7,52.2,51.7h89.3c21.5,0,33.2-2.9,41-10.2c7.8-7.3,11.2-20,11.2-41V84.9
							C197.1,65.4,196.1,52.7,189.3,44.4z M127.3,105.9l-40.5,21c-1,0.5-2,0.5-2.9,0.5s-2.4-0.5-3.4-1c-2-1-2.9-2.9-2.9-5.4V78.5
							c0-2,1-4.4,2.9-5.4s4.4-1,6.3,0l40.5,21c2,1,3.4,3.4,3.4,5.4C130.7,102.4,129.8,104.4,127.3,105.9z"/>
							</g>
							</svg>
						</li></a>
						<a href="https://twitter.com/avmgua"><li>
							<svg version="1.1" id="Layer_1" x="0px" y="0px"
							viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
							<g>
							<g>
							<path fill="#FFFFFF" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
							c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
							c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
							c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
							c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z"/>
							</g>
							</g>
							</svg>
						</li></a>
					</ul>
			   </div>
			</div>
		</div>
	</div>
</div>
