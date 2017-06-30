<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

$remoteIncluding = get_class($this) == 'AvComponentsIncludings' ? true : false;
$templateFolder  = $remoteIncluding ? AvComponentsIncludings::getInstance()->getCurrentIncludingsParams()["dir_path"] : explode(SITE_SERVER_NAME, __DIR__)[1];

CJSCore::Init(["wait_for_images"]);
Asset::getInstance()->addString('<script>AvVsCertifitacesListElementFile = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$templateFolder.'/ajax/element.php";</script>');

AvComponentsIncludings::getInstance()->setIncludings("bitrix", "news.detail", "av_certificates");