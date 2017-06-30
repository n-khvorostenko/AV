<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetPageProperty("title", "Основные направления деятельности компании АВ металл групп  | 🏠 Украина: Днепр, Киев, Харьков, Львов, Одесса, ☎ (056) 790-01-22 | ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Продукция АВ металл групп ™ ✓Широкий выбор ✓Оптимальные цены ✓Региональная сеть ✓Доставка по Украине ☎ (056)790-01-22 Звоните!");
$APPLICATION->SetTitle("Основные направления");

$APPLICATION->IncludeComponent("av:visit_site.menu.tablet", "", array("MENU_TYPE" => 'left'));

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';