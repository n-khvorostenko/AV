<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["ERRORS"] = [];
$userLogin = htmlspecialcharsbx($_COOKIE[COption::GetOptionString("main", "cookie_name", "BITRIX_SM")."_LOGIN"]);
if(isset($APPLICATION->arAuthResult) && $APPLICATION->arAuthResult !== true)
	$arResult["ERRORS"][] = $APPLICATION->arAuthResult["MESSAGE"];