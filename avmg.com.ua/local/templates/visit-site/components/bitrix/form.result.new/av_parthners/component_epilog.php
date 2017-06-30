<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_form_elements"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form_elements", "",        "textarea")
	->setIncludings("av", "form_elements", "",        "password")
	->setIncludings("av", "form_elements", "",        "date")
	->setIncludings("av", "form_elements", "",        "radio")
	->setIncludings("av", "form_elements", "",        "list")
	->setIncludings("av", "form_elements", "",        "file")
	->setIncludings("av", "form_elements", "",        "input")
	->setIncludings("av", "form_elements", "",        "phone")
	->setIncludings("av", "form_elements", "av_site", "button");