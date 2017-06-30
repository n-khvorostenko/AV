<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ металл групп - корпоративный сайт компании");
$APPLICATION->SetPageProperty("title", "АВ металл групп ведущая компания Украины на рынке металлопроката | Официальный сайт avmg.com.ua ✔ Адрес г. Днепр, ул. Шолом-Алейхема, 5 ☎ телефон (056) 790-01-22");
$APPLICATION->SetPageProperty("description", "АВ металл групп ™ крупнейший металлотрейдер Украины ✔ г. Днепр, ул. Шолом-Алейхема, 5 Звоните! ☎ (056)790-01-22");

CJSCore::Init(["bootstrap"]);
$APPLICATION->SetAdditionalCSS('/bitrix/css/av_site/pages/index.css');
$APPLICATION->AddHeadScript   ('/bitrix/js/av_site/pages/index.js');
/* -------------------------------------------------------------------- */
/* ------------------------------ banner ------------------------------ */
/* -------------------------------------------------------------------- */
$APPLICATION->IncludeComponent
	(
	"bitrix:advertising.banner", "bootstrap_av",
		array(
		"ANIMATION_DURATION" => 500,
		"BS_WRAP" => "Y",
		"CYCLING" => "N",
		"QUANTITY" => "12",
		"SCALE" => "N",
		"TYPE" => "MAIN_CORP_SITE",
		"COMPONENT_TEMPLATE" => "bootstrap_av",
		"NOINDEX" => "N",
		"DEFAULT_TEMPLATE" => "bootstrap",
		"BS_EFFECT" => "fade",
		"BS_CYCLING" => "Y",
		"BS_INTERVAL" => "6500",
		"BS_PAUSE" => "Y",
		"BS_KEYBOARD" => "N",
		"BS_ARROW_NAV" => "N",
		"BS_BULLET_NAV" => "Y",
		"BS_HIDE_FOR_TABLETS" => "N",
		"BS_HIDE_FOR_PHONES" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
		)
	);
/* -------------------------------------------------------------------- */
/* --------------------------- main streams --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="container">
		<a class="av-page-title av-index-title-link" href="/products/">Основные направления</a>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:visit_site.menu.tablet", "",
				array(
				"MENU_PATH"   => '/products/',
				"MENU_TYPE"   => 'left',
				"MENU_VALUES" => array("/products/black-metal/", "/products/stainless-steel-metal/", "/products/galvanized-metal/", "/products/ironwares/", "/products/profnastil-metallocherepitsa/", "/products/building-hardware/", "/products/elektrody-svarochnye/", "/products/plenka-i-upakovka/", "/products/setka/")
				)
			);
		?>
		<div class="active-button-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					array(
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"LINK"        => '/products/',
					"TITLE"       => 'Все направления',
					"ATTR"        => ["rel" => 'nofollow']
					)
				);
			?>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ tablets ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="av-index-products-block">
		<div>
			<picture>
				<source srcset="/upload/av_site/index/proizvodstvo.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/proizvodstvo_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/proizvodstvo_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/proizvodstvo.jpg" alt="Производство" title="Производство">
			</picture>
			<a href="/proizvodstvo/">Производство</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/uslugi.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/uslugi_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/uslugi_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/uslugi.jpg" alt="Услуги" title="Услуги">
			</picture>
			<a href="/uslugi/">Услуги</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/partnerstvo.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/partnerstvo_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/partnerstvo_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/partnerstvo.jpg" alt="Партнерство" title="Партнерство">
			</picture>
			<a href="/about/partnersavmg/">Партнерство</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/kariera.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/kariera_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/kariera_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/kariera.jpg" alt="Карьера" title="Карьера">
			</picture>
			<a href="/career/">Карьера</a>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- bases ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="container av-index-bases-block">
		<a class="av-page-title av-index-title-link" href="/metallobaza/">Филиалы и металлобазы</a>
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:catalog.section.list", "av_bases_map",
				array(
				"VIEW_MODE"        => '',
				"SHOW_PARENT_NAME" => '',

				"IBLOCK_TYPE"  => 'av_storages',
				"IBLOCK_ID"    => 58,
				"SECTION_ID"   => '',
				"SECTION_CODE" => '',

				"SECTION_URL" => '/metallobaza/#CODE#/',

				"COUNT_ELEMENTS"      => 'Y',
				"TOP_DEPTH"           => 1,
				"SECTION_FIELDS"      => array(),
				"SECTION_USER_FIELDS" => array(),

				"CACHE_TYPE"   => 'A',
				"CACHE_TIME"   => 360000,
				"CACHE_GROUPS" => 'Y',

				"ADD_SECTIONS_CHAIN" => 'N',

				"SUBSECTION_MAX_COUNT"   => 5,
				"SUBSECTION_SORT_BY"     => 'ID',
				"SUBSECTION_SORT_ORDER"  => 'DESC',
				"SUBSECTION_SORT_BY2"    => 'NAME',
				"SUBSECTION_SORT_ORDER2" => 'ASC',
				"SUBSECTION_URL"         => '#SUBSECTION_CODE#/'
				)
			);
		?>
		<div class="active-button-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					array(
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"LINK"        => '/metallobaza/',
					"TITLE"       => 'Посмотреть все',
					"ATTR"        => ["rel" => 'nofollow']
					)
				);
			?>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- blog ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block dark">
	<a class="av-page-title av-index-title-link" href="/about/blog/">Блог</a>
	<div class="blog-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:news.list", "av_blog_index",
				array(
				"AJAX_MODE" => 'N',

				"IBLOCK_TYPE" => 'news',
				"IBLOCK_ID"   => 50,
				"NEWS_COUNT"  => 4,

				"SORT_BY1"    => 'ACTIVE_FROM',
				"SORT_ORDER1" => 'DESC',
				"SORT_BY2"    => 'NAME',
				"SORT_ORDER2" => 'ASC',

				"FILTER_NAME"   => '',
				"FIELD_CODE"    => '',
				"PROPERTY_CODE" => '',
				"CHECK_DATES"   => '',

				"DETAIL_URL" => '/about/blog/#ELEMENT_CODE#/',

				"PREVIEW_TRUNCATE_LEN"      => '',
				"ACTIVE_DATE_FORMAT"        => '',
				"SET_LAST_MODIFIED"         => '',
				"HIDE_LINK_WHEN_NO_DETAIL"  => '',
				"PARENT_SECTION"            => '',
				"PARENT_SECTION_CODE"       => '',
				"INCLUDE_SUBSECTIONS"       => 'Y',
				"DISPLAY_DATE"              => '',
				"DISPLAY_NAME"              => 'Y',
				"DISPLAY_PICTURE"           => 'Y',
				"DISPLAY_PREVIEW_TEXT"      => '',

				"CACHE_TYPE"   => 'A',
				"CACHE_TIME"   => 360000,
				"CACHE_FILTER" => 'Y',
				"CACHE_GROUPS" => 'Y'
				)
			);
		?>
	</div>
	<div class="active-button-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				array(
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => '/about/blog/',
				"TITLE"       => 'Читать больше',
				"ATTR"        => ["rel" => 'nofollow']
				)
			);
		?>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="container">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
			<div class="av-page-title">Заказать прайс-лист</div>
			Чтобы сделать заказ, заполните форму или напишите по <a href="mailto:office@avmg.com.ua">электронной почте</a>.
			<div class="av-index-feadback-form">
				<?
				$APPLICATION->IncludeComponent
					(
					"bitrix:form.result.new", "av_index",
						array(
						"AJAX_MODE"           => 'Y',
						"AJAX_OPTION_JUMP"    => 'N',
						"AJAX_OPTION_STYLE"   => 'N',
						"AJAX_OPTION_HISTORY" => 'N',

						"SEF_MODE"    => 'N',
						"WEB_FORM_ID" => 24,

						"START_PAGE"     => 'new',
						"SHOW_LIST_PAGE" => 'N',
						"SHOW_EDIT_PAGE" => 'N',
						"SHOW_VIEW_PAGE" => 'N',
						"SUCCESS_URL"    => '',

						"SHOW_ANSWER_VALUE"      => 'N',
						"SHOW_ADDITIONAL"        => 'N',
						"SHOW_STATUS"            => 'N',
						"EDIT_ADDITIONAL"        => 'N',
						"EDIT_STATUS"            => 'N',
						"IGNORE_CUSTOM_TEMPLATE" => 'N',
						"USE_EXTENDED_ERRORS"    => 'N',

						"CACHE_TYPE" => 'A',
						"CACHE_TIME" => 360000
						)
					)
				?>
			</div>
		</div>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php'?>