<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_site"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form_elements", "default_alt", "select")
	->setIncludings("av", "form_elements", "",            "element_search")
	->setIncludings("av", "form_elements", "default_alt", "button");