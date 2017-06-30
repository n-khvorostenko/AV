<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

CJSCore::Init(["av_site"]);
Asset::getInstance()->addString('<script>AvDLShowMoreFile = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$this->GetPath().'/templates/.default/ajax/show_more.php";</script>');