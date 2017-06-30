<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

$remoteIncluding = get_class($this) == 'AvComponentsIncludings' ? true : false;
$templateFolder  = $remoteIncluding ? AvComponentsIncludings::getInstance()->getCurrentIncludingsParams()["dir_path"] : $this->GetTemplate()->GetFolder();
$templateType    = $remoteIncluding ? AvComponentsIncludings::getInstance()->getCurrentIncludingsParams()["type"]     : $arParams["TYPE"];

CJSCore::Init(["av_site"]);

switch($templateType)
	{
	case "button":
		Asset::getInstance()->addCss($templateFolder.'/button.css');
		break;
	case "select":
		Asset::getInstance()->addCss($templateFolder.'/select.css');
		Asset::getInstance()->addJs ($templateFolder.'/select.js');
		break;
	}