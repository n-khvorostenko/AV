<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription =
	[
	"NAME"        => GetMessage("AV_LEARNING_COURSE_SECTIONS_NAME"),
	"DESCRIPTION" => GetMessage("AV_LEARNING_COURSE_SECTIONS_DESC"),
	"PATH" =>
		[
		"ID"    => "service",
		"CHILD" =>
			[
			"ID"   => 'learning',
			"NAME"  => GetMessage("LEARNING_SERVICE"),
			"CHILD" =>
				[
				"ID"   => "course",
				"NAME" => GetMessage("LEARNING_COURSE_SERVICE")
				]
			]
		]
	];