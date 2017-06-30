<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_site"]);
if(GOOGLE_API_KEY) $GLOBALS["APPLICATION"]->AddHeadScript('https://maps.googleapis.com/maps/api/js?key='.GOOGLE_API_KEY.'&callback=initMap');