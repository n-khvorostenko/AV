<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_site"]);

AvComponentsIncludings::getInstance()
	->setIncludings("bitrix", "news.list",     "av_career_same_articles")
	->setIncludings("av",     "form_elements", "av_site_alt", "button");