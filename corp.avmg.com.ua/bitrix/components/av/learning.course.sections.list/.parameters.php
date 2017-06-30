<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$fieldsList = [];
$queryList = CUserTypeEntity::GetList([], ["ENTITY_ID" => 'LEARNING_LESSONS', "USER_TYPE_ID" => 'enumeration', "LANG" => LANGUAGE_ID]);
while($queryElement = $queryList->GetNext()) $fieldsList[$queryElement["FIELD_NAME"]] = $queryElement["EDIT_FORM_LABEL"];

$arComponentParameters["PARAMETERS"] =
	[
	"SECTION_FIELD" =>
		[
		"NAME"  => GetMessage("AV_LEARNING_COURSE_SECTION_LIST_SECTION_FIELD"),
		"TYPE"  => 'LIST',
		"VALUES" => $fieldsList
		],
	"COURSE_DETAIL_TEMPLATE" =>
		[
		"NAME" => GetMessage("AV_LEARNING_COURSE_SECTION_LIST_URL"),
		"TYPE" => 'STRING'
		],
	"CHECK_PERMISSIONS" =>
		[
		"NAME" => GetMessage("AV_LEARNING_COURSE_SECTION_LIST_CHECK_PERMISSIONS"),
		"TYPE" => 'CHECKBOX'
		]
	];