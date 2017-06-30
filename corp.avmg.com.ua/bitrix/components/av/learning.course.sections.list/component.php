<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!CModule::IncludeModule("learning"))                         return ShowError(GetMessage("AV_LEARNING_COURSE_SECTION_LIST_MODULE_NOT_FOUND"));
/* --------------------------------------------------------------------- */
/* -------------------------- params validate -------------------------- */
/* --------------------------------------------------------------------- */
$arParams["CHECK_PERMISSIONS"] = in_array($arParams["CHECK_PERMISSIONS"], ["Y", "N"]) ? $arParams["CHECK_PERMISSIONS"] : 'Y';
/* --------------------------------------------------------------------- */
/* ------------------------- section user field ------------------------ */
/* --------------------------------------------------------------------- */
$result = [];
$sectionFieldInfo = $arParams["SECTION_FIELD"] ? CUserTypeEntity::GetList([], ["ENTITY_ID" => 'LEARNING_LESSONS', "FIELD_NAME" => $arParams["SECTION_FIELD"], "USER_TYPE_ID" => 'enumeration'])->GetNext() : false;
if(!$sectionFieldInfo) return ShowError(GetMessage("AV_LEARNING_COURSE_SECTION_LIST_SECTION_FIELD_NOT_FOUND"));

$queryList = CUserFieldEnum::GetList(["SORT" => 'ASC'], ["USER_FIELD_ID" => $sectionFieldInfo["ID"]]);
while($queryElement = $queryList->GetNext())
	{
	$hasCourses = CCourse::GetList
		(
		[],
			[
			"ACTIVE"                   => 'Y',
			$arParams["SECTION_FIELD"] => $queryElement["ID"],
			"CHECK_PERMISSIONS"        => $arParams["CHECK_PERMISSIONS"]
			],
		["nTopCount" => 1], ["ID"]
		)->GetNext();

	$result[$queryElement["XML_ID"]] =
		[
		"TITLE"       => $queryElement["VALUE"],
		"HAS_COURSES" => !$hasCourses ? false : true
		];
	}
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult =
	[
	"SECTIONS" => $result
	];

$this->IncludeComponentTemplate();