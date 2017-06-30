<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription =
	[
	"NAME"        => GetMessage("AV_DIRECTORIES_FILTER_DESC_NAME"),
	"DESCRIPTION" => GetMessage("AV_DIRECTORIES_FILTER_DESC_DESCRIPTION"),
	"PATH"        =>
		[
		"ID"    => 'av',
		"CHILD" => ["ID" => 'directories']
		]
	];
?>