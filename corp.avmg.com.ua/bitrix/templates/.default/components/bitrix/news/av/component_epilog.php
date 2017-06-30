<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if($arParams["USE_SHARE"]  == 'Y') AvComponentsIncludings::getInstance()->setIncludings("bitrix", "main.share",  $arParams["SHARE_TEMPLATE"]);
if($arParams["USE_RATING"] == 'Y') AvComponentsIncludings::getInstance()->setIncludings("bitrix", "iblock.vote", "av");