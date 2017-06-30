<?
$aMenuLinks = array(
	array("Новости",           "/about/news/"),
	array("Карьера, вакансии", "/about/career/"),
	array("Контакты",          "/about/contacts.php"),
	array("Реквизиты",         "/about/info/"),
	array(
		"Фотогалерея", 
		"/about/gallery/", 
		array(), 
		array(), 
		"CBXFeatures::IsFeatureEnabled('CompanyPhoto')" 
	),
	array(
		"Видеогалерея", 
		"/about/media.php", 
		array(), 
		array(), 
		"CBXFeatures::IsFeatureEnabled('CompanyVideo')" 
	),
	array(
		"Новости отрасли", 
		"/about/business_news.php", 
		array(), 
		array(), 
		"" 
	)
);
?>