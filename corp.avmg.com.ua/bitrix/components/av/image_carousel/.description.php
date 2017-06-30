<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription =
	[
	"NAME"        => GetMessage("AV_IMAGE_CAROUSEL_TITLE"),
	"DESCRIPTION" => GetMessage("AV_IMAGE_CAROUSEL_DECSR"),
	"PATH"        =>
		[
		"ID"    => 'av',
		"CHILD" => ["ID" => 'other']
		]
	];
?>