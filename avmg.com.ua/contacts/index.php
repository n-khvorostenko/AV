<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetPageProperty("title", "АВ металл групп контакты компании | ☎ телефон (056) 790-01-22 | 🏠 Адрес: г. Днепр, ул.Шолом-Алейхема, 5");
$APPLICATION->SetPageProperty("description", "АВ металл групп крупнейший металлотрейдер Украины ☎ (056) 790-01-22, 🏠 г. Днепр, ул.Шолом-Алейхема, 5");
$APPLICATION->SetTitle("Контакты");

CJSCore::Init(["bootstrap"]);
$APPLICATION->SetAdditionalCSS('/bitrix/css/av_site/pages/contacts.css');
?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 av-contacts-page-block first-column">
	<h3>Головной офис</h3>
	<p>
		Украина, Днепр,<br>
		ул.Шолом-Алейхема, 5<br>
		тел.: +38 (056) 790-01-22<br>
		тел.: +38 (056) 790-73-00<br>
		e-mail: <a href="mailto:office@avmg.com.ua">office@avmg.com.ua</a>
	</p>
	<h3>Обратная связь</h3>
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:form.result.new", "av",
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
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 av-contacts-page-block second-column">
	<h3>Департаменты</h3>
	<p>
		<b><a href="/products/black-metal/">Черный металлопрокат</a></b><br>
		тел./факс: +38 (056) 790-01-22<br>
		тел./факс: +38 (056) 790-73-00<br>
		e-mail: <a href="mailto:bmetal@avmg.com.ua">bmetal@avmg.com.ua</a>
	</p>
	<p>
		<b><a href="/products/stainless-steel-metal/">Нержавеющий металлопрокат</a></b><br>
		<b><a href="/products/galvanized-metal/">Оцинковка</a></b><br>
		тел./факс: +38 (056) 790-73-02<br>
		e-mail: <a href="mailto:stainless@avmg.com.ua">stainless@avmg.com.ua</a>
	</p>
	<p>
		<b><a href="/products/building-hardware/">Строительный крепеж</a></b><br>
		тел./факс: +38 (056) 376-79-94<br>
		e-mail: <a href="mailto:sk@avmg.com.ua">sk@avmg.com.ua</a>
	</p>
		<p>
		<b><a href="/products/ironwares/">Машиностроительный крепеж</a></b><br>
		тел./факс: +38 (056) 790-73-04<br>
		e-mail: <a href="mailto:metiz@avmg.com.ua">metiz@avmg.com.ua</a>
	</p>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 av-contacts-page-block third-column">
	<h3>Подразделения</h3>
	<p>
		<b><a href="/products/elektrody-svarochnye/">Электроды сварочные</a></b><br>
		тел./факс: +38 (056) 790-01-22<br>
		e-mail: <a href="mailto:bmetal@avmg.com.ua">bmetal@avmg.com.ua</a>
	</p>
	<p>
		<b><a href="/products/profnastil-metallocherepitsa/">Профнастил</a></b><br>
		тел./факс: +38 (056) 376-79-94<br>
		e-mail:&nbsp;<a href="mailto:profnasteel@avmg.com.ua">profnasteel@avmg.com.ua</a><br>
	</p>
	<p>
		<b><a href="/products/setka/">Сетка</a></b><br>
		тел./факс: +38 (056) 790-01-22<br>
		e-mail: <a href="mailto:bmetal@avmg.com.ua">bmetal@avmg.com.ua</a>
	</p>
</div>
<?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php'?>