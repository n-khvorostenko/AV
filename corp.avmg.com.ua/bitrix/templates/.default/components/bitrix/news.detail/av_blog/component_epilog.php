<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

AvComponentsIncludings::getInstance()
	->setIncludings("bitrix", "news.list",     "av_same_articles")
	->setIncludings("av",     "form_elements", "av_site_alt", "button");