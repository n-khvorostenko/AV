<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------- subsetions query ------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult["SECTIONS"] as $sectionIndex => $sectionInfo)
	{
	$regionCenterId = 0;
	$arResult["SECTIONS"][$sectionIndex]["SUBSECTIONS"]     = [];
	$arResult["SECTIONS"][$sectionIndex]["SUBSECTION_MORE"] = false;
	/* ------------------------------------------- */
	/* -------------- region center -------------- */
	/* ------------------------------------------- */
	$queryList = CIBlockSection::GetList
		(
		[],
			[
			"IBLOCK_ID"        => $arParams["IBLOCK_ID"],
			"SECTION_ID"       => $sectionInfo["ID"],
			"ACTIVE"           => 'Y',
			"UF_SECTION_PRIME" => 1
			],
		false,
		["ID", "CODE", "NAME", "UF_SECTION_PRIME"],
		["nTopCount" => 1]
		);
	while($queryElement = $queryList->GetNext())
		{
		$regionCenterId = $queryElement["ID"];
		$link = str_replace(["#SUBSECTION_ID#", "#SUBSECTION_CODE#"], [$queryElement["ID"], $queryElement["CODE"]], $arParams["SUBSECTION_URL"]);
		$arResult["SECTIONS"][$sectionIndex]["SUBSECTIONS"][$sectionInfo["SECTION_PAGE_URL"].$link] = $queryElement["NAME"];
		}
	/* ------------------------------------------- */
	/* ------------- subsetions query ------------ */
	/* ------------------------------------------- */
	$queryList = CIBlockSection::GetList
		(
			[
			$arParams["SUBSECTION_SORT_BY"]  => $arParams["SUBSECTION_SORT_ORDER"],
			$arParams["SUBSECTION_SORT_BY2"] => $arParams["SUBSECTION_SORT_ORDER2"]
			],
			[
			"IBLOCK_ID"  => $arParams["IBLOCK_ID"],
			"SECTION_ID" => $sectionInfo["ID"],
			"ACTIVE"     => 'Y',
			"!ID"        => $regionCenterId
			],
		false,
		["ID", "CODE", "NAME"],
		["nTopCount" => $regionCenterId ? $arParams["SUBSECTION_MAX_COUNT"] : $arParams["SUBSECTION_MAX_COUNT"] - 1]
		);
	while($queryElement = $queryList->GetNext())
		{
		if(count($arResult["SECTIONS"][$sectionIndex]["SUBSECTIONS"]) < $arParams["SUBSECTION_MAX_COUNT"])
			{
			$link = str_replace(["#SUBSECTION_ID#", "#SUBSECTION_CODE#"], [$queryElement["ID"], $queryElement["CODE"]], $arParams["SUBSECTION_URL"]);
			$arResult["SECTIONS"][$sectionIndex]["SUBSECTIONS"][$sectionInfo["SECTION_PAGE_URL"].$link] = $queryElement["NAME"];
			}
		else
			$arResult["SECTIONS"][$sectionIndex]["SUBSECTION_MORE"] = true;
		}
	}
/* -------------------------------------------------------------------- */
/* ---------------------- sections array refactor --------------------- */
/* -------------------------------------------------------------------- */
$sectionsNewArray = [];
foreach($arResult["SECTIONS"] as $sectionInfo) $sectionsNewArray[$sectionInfo["CODE"]] = $sectionInfo;
$arResult["SECTIONS"] = $sectionsNewArray;