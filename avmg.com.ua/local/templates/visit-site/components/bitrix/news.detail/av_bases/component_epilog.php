<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

CJSCore::Init(["av_site"]);
if(GOOGLE_API_KEY) Asset::getInstance()->addJs('https://maps.googleapis.com/maps/api/js?key='.GOOGLE_API_KEY.'&callback=initMap');

AvComponentsIncludings::getInstance()
	->setIncludings("av",     "form_elements", "av_site", "button")
	->setIncludings("av",     "visit_site.menu.tablet", "icons")
	->setIncludings("bitrix", "news.list", "av_bases_same_bases")
	->setIncludings("av",     "form_elements", "av_site_alt", "button");