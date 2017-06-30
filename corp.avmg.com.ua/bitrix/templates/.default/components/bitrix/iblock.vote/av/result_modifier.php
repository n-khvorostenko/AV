<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$component = $this->__component;

$arSessionParams = ["PAGE_PARAMS" => ["ELEMENT_ID"]];

foreach($arParams as $index => $value)
	if(strncmp('~', $index, 1) && !in_array($index, $arSessionParams["PAGE_PARAMS"]))
		$arSessionParams[$index] = $value;

$arSessionParams["COMPONENT_NAME"] = $component->GetName();
$arSessionParams["TEMPLATE_NAME"]  = $component->GetTemplateName();

if($parent = $component->GetParent())
	{
	$arSessionParams["PARENT_NAME"]          = $parent->GetName();
	$arSessionParams["PARENT_TEMPLATE_NAME"] = $parent->GetTemplateName();
	$arSessionParams["PARENT_TEMPLATE_PAGE"] = $parent->GetTemplatePage();
	}

$idSessionParams = md5(serialize($arSessionParams));

$component->arResult["AJAX"] =
	[
	"SESSION_KEY"    => $idSessionParams,
	"SESSION_PARAMS" => $arSessionParams,
	];

$arResult["~AJAX_PARAMS"] =
	[
	"SESSION_PARAMS" => $idSessionParams,
	"PAGE_PARAMS"    => ["ELEMENT_ID" => $arParams["ELEMENT_ID"]],
	"sessid"         => bitrix_sessid(),
	"AJAX_CALL"      => "Y"
	];

$arResult["AJAX_PARAMS"] = CUtil::PhpToJSObject($arResult["~AJAX_PARAMS"]);
?>