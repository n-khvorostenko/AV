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
	case "checkbox":
		Asset::getInstance()->addCss($templateFolder.'/checkbox.css');
		Asset::getInstance()->addJs ($templateFolder.'/checkbox.js');
		break;
	case "file":
		Asset::getInstance()->addCss($templateFolder.'/file.css');
		Asset::getInstance()->addJs ($templateFolder.'/file.js');
		break;
	case "input":
		Asset::getInstance()->addCss($templateFolder.'/input.css');
		Asset::getInstance()->addJs ($templateFolder.'/input.js');
		break;
	case "password":
		Asset::getInstance()->addCss($templateFolder.'/input.css');
		Asset::getInstance()->addJs ($templateFolder.'/input.js');
		break;
	case "phone":
		Asset::getInstance()->addCss($templateFolder.'/input.css');
		Asset::getInstance()->addJs ($templateFolder.'/input.js');
		Asset::getInstance()->addJs ($templateFolder.'/input_phone_mask.js');
		Asset::getInstance()->addJs ($templateFolder.'/phone.js');
		break;
	case "radio":
		Asset::getInstance()->addCss($templateFolder.'/radio.css');
		Asset::getInstance()->addJs ($templateFolder.'/radio.js');
		break;
	case "textarea":
		Asset::getInstance()->addCss($templateFolder.'/textarea.css');
		Asset::getInstance()->addJs ($templateFolder.'/textarea.js');
		break;
	}