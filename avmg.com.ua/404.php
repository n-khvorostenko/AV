<?
define("ERROR_404", "Y");
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetAdditionalCSS('/bitrix/css/av_site/pages/404.css');
?>
<div class="av-404-page">
	<b>404</b>
	<i>Страница не найдена</i>
	<div>
		Мы не можем найти страницу, которую вы искали.<br>
		Попробуйте вернуться на предыдущую страницу или перейти на главную.
	</div>

	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => 'Предыдущая страница',
				"ATTR"        => ["onclick" => 'parent.history.back()']
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"TITLE"       => 'На главную',
				"LINK"        => '/'
				]
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php'?>