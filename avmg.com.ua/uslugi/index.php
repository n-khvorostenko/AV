<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetPageProperty("title", "Продажа, резка и доставка металла АВ металл групп | 🏠 Украина, г. Днепр, ул. Шолом-Алейхема, 5, ☎ (056) 790-01-22 | ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Резка и доставка металла ► АВ металл груп ™ ✓Современное оборудование ✓Оптимальные цены ✓Квалифицированные специалисты ☎ (056)790-01-22 Звоните!");
$APPLICATION->SetTitle("Услуги компании");

$APPLICATION->IncludeComponent("av:visit_site.menu.tablet", "", array("MENU_TYPE" => 'left'));

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';