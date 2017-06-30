<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams = unserialize(base64_decode($_POST["component_params"]));
if(!$arParams["ELEMENTS_COUNT"]) return;

$arParams["DEFAULT_FILTER"] =
	[
	"!ID"  => $_POST["uploaded_elements"],
	"NAME" => $_POST["letter"]
	];

$APPLICATION->IncludeComponent("av:directories.list", "default_ajax", $arParams);