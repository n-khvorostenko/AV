<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Партнерство");
$APPLICATION->SetPageProperty("description", "Сотрудничество с компанией АВ металл групп ™ ✓Выгодная партнерская программа ✓Широкая региональная сеть ☎ (056)790-01-22 Звоните!");
$APPLICATION->SetPageProperty("title", "Сотрудничество с компанией АВ металл групп | Партнерская программа Украина: Днепр, Киев, Харьков, Львов, Одесса, ☎ (056) 790-01-22 | ™ avmg.com.ua");

CJSCore::Init(["bootstrap"]);
$APPLICATION->SetAdditionalCSS('/bitrix/css/av_site/pages/partners.css');
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-parthners-page-block first-column">
	<h3>Партнерская программа</h3>
	<p>Одной из основных задач компании АВ металл групп является постоянное развитие дилерской региональной сети и привлечение новых партнеров.</p>
	<p>Это становится возможным благодаря постоянному расширению филиальной сети, товарного ассортимента металлопродукции на складах и развитию дополнительных сервисных услуг. В кратчайшие сроки мы доставляем собственным автотранспортом металлопрокат в любую точку Украины.</p>
	<p><a target="_blank" href="/">АВ металл групп</a> максимально соответствует требованиям наших клиентов. Мы предлагаем конкурентные цены, возможностью формирования on-line заказов, оперативной доставке, информационной и технической поддержке партнеров, гибкую систему скидок, отсрочку платежа и различные льготные условия для постоянных клиентов.</p>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-parthners-page-block second-column">
	<h3>Преимущества</h3>
	<p>Наш коллектив - высокопрофессиональные и ответственные менеджеры, которые постоянно отслеживают все тенденции, происходящие на рынке металлопроката и предлагают целый комплекс услуг по предпродажной подготовке, учитывая все потребности клиента.</p>
	<p>Филиалы АВ металл групп работают в крупнейший городах Украины: Киев, Днепр, Львов, Харьков, Запорожье, Одесса, Николаев, Мариуполь, Винница, Житомир, Полтава, Кропивницкий, Ровно, Сумы, Хмельницкий, Черкассы, Каменское, Мелитополь, Кривой Рог. Розничные металлобазы расположены более чем в 100 городах по всей территории Украины.</p>
	<p>Быстрота и качество обслуживания - наши приоритеты. Дружная команда нашего коллектива - это залог успеха и продвижения бизнеса АВ металл групп, на который мы делаем ставку.</p>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 av-parthners-page-block">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:form.result.new", "av_parthners",
			array(
			"AJAX_MODE"              => 'Y',
			"AJAX_OPTION_JUMP"       => 'N',
			"AJAX_OPTION_STYLE"      => 'N',
			"AJAX_OPTION_HISTORY"    => 'N',

			"SEF_MODE"    => 'N',
			"WEB_FORM_ID" => 18,

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
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 av-page-title av-parthners-page-separator">Наши партнеры</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?
	$APPLICATION->IncludeComponent
		(
		"av:image_carousel", "av-parthners",
			array(
			"IMAGE_URL" =>
				array(
				"/upload/av_site/partners/logo_DMKD.png",      "/upload/av_site/partners/logo_alchevsk.png",     "/upload/av_site/partners/logo_arcelormittal.png",
				"/upload/av_site/partners/logo_azovstal.png",  "/upload/av_site/partners/logo_celsa.png",        "/upload/av_site/partners/logo_dtz.png",
				"/upload/av_site/partners/logo_evraz.png",     "/upload/av_site/partners/logo_interpipe.png",    "/upload/av_site/partners/logo_kominmet.png",
				"/upload/av_site/partners/logo_trubostal.png", "/upload/av_site/partners/logo_zaporizhstal.png", "/upload/av_site/partners/logo_slavsant.jpg",
				"/upload/av_site/partners/logo_plasmatec.jpeg"
				),
			"IMAGE_NAME" =>
				array(
				"DMKD",       "Алчевский металлургический комбинат", "ArcelorMittal",
				"Azov Stal",  "Celsa",                               "пао ДТЗ",
				"ЕВРАЗ",      "Interpipe",                           "Коминмет",
				"ТрубоСталь", "Запорожсталь",                        "Славсант",
				"PlasmaTec"
				),
			"IMAGE_ALT"  =>
				array(
				"DMKD",       "Алчевский металлургический комбинат", "ArcelorMittal",
				"Azov Stal",  "Celsa",                               "пао ДТЗ",
				"ЕВРАЗ",      "Interpipe",                           "Коминмет",
				"ТрубоСталь", "Запорожсталь",                        "Славсант",
				"PlasmaTec"
				)
			)
		);
	?>
</div>
<?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php'?>