<?
$aMenuLinks = array(
	array("Компания",          "/about/"),
	array("Сотрудники",        "/company/"),
	array("АВ Грузоперевозки", "/cargo_traffic/"),
	array("Диски",             "/docs/",        array(), array(), "CBXFeatures::IsFeatureEnabled('CommonDocuments')"),
	array("Сервисы",           "/services/"),
	array("Группы",            "/workgroups/",  array(), array(), "CBXFeatures::IsFeatureEnabled('Workgroups')"),
	array("CRM",               "/crm/",         array(), array(), "CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()"),
	array("Приложения",        "/marketplace/", array(), array(), "IsModuleInstalled('rest')")
	);