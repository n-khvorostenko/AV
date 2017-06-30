<?
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/intranet/public/services/learning/.left.menu.php');

$aMenuLinks = array(
	array(GetMessage("SERVICES_MENU_COURSES"),    "index.php"),
	array(GetMessage("SERVICES_MENU_MY_COURSES"), "mycourses.php", array(), array(), "\$GLOBALS['USER']->IsAuthorized()"),
	array(GetMessage("SERVICES_MENU_GRADEBOOK"),  "gradebook.php", array(), array(), "\$GLOBALS['USER']->IsAuthorized()")
	);