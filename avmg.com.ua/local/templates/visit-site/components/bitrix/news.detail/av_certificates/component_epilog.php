<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_site"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form_elements", "av_site_alt", "button")
	->setIncludings("av", "form_elements", "av_site",     "button");