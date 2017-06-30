<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

$remoteIncluding = get_class($this) == 'AvComponentsIncludings' ? true : false;
$templateFolder  = $remoteIncluding ? AvComponentsIncludings::getInstance()->getCurrentIncludingsParams()["dir_path"] : $this->GetTemplate()->GetFolder();
$templateType    = $remoteIncluding ? AvComponentsIncludings::getInstance()->getCurrentIncludingsParams()["type"]     : $arParams["TYPE"];

CJSCore::Init(["av_site"]);

switch($templateType)
	{
	case "input":
		Asset::getInstance()->addCss($templateFolder.'/input.css');
		Asset::getInstance()->addJs ($templateFolder.'/input.js');
		break;
	case "select":
		CJSCore::Init(["js_scrollbar"]);
		Asset::getInstance()->addCss($templateFolder.'/select.css');
		Asset::getInstance()->addJs ($templateFolder.'/select.js');
		break;
	case "element_search":
		Asset::getInstance()->addCss($templateFolder.'/element_search.css');
		Asset::getInstance()->addJs ($templateFolder.'/element_search.js');
		break;
	case "iblock_element_search":
		Asset::getInstance()->addCss   ($templateFolder.'/iblock_element_search.css');
		Asset::getInstance()->addJs    ($templateFolder.'/iblock_element_search.js');
		Asset::getInstance()->addString('<script>AvFeIblockAjaxSearch = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$templateFolder.'/ajax/iblock_search.php";</script>');
		break;
	}