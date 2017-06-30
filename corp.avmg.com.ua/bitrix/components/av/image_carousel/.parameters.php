<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters =
	[
	"PARAMETERS" =>
		[
		"IMAGE_URL" =>
			[
			"NAME"     => GetMessage("AV_IMAGE_CAROUSEL_IMAGE_URL"),
			"TYPE"     => "STRING",
			"MULTIPLE" => 'Y'
			],
		"IMAGE_NAME" =>
			[
			"NAME"     => GetMessage("AV_IMAGE_CAROUSEL_IMAGE_NAME"),
			"TYPE"     => "STRING",
			"MULTIPLE" => 'Y'
			],
		"IMAGE_LINK" =>
			[
			"NAME"     => GetMessage("AV_IMAGE_CAROUSEL_IMAGE_LINK"),
			"TYPE"     => "STRING",
			"MULTIPLE" => 'Y'
			],
		"IMAGE_ALT" =>
			[
			"NAME"     => GetMessage("AV_IMAGE_CAROUSEL_IMAGE_ALT"),
			"TYPE"     => "STRING",
			"MULTIPLE" => 'Y'
			]
		]
	];
?>