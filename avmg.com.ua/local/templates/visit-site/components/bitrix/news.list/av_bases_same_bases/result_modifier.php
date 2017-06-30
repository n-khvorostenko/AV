<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if(substr_count($arParams["DETAIL_URL"], '#PARENT_SECTION_ID#') || substr_count($arParams["DETAIL_URL"], '#PARENT_SECTION_CODE#'))
	foreach($arResult["ITEMS"] as $index => $elementInfo)
		{
		$queryList = CIBlockSection::GetList
			(
			[],
				[
				"IBLOCK_ID"   => $arParams["IBLOCK_ID"],
				"ACTIVE"      => 'Y',
				"DEPTH_LEVEL" => 1,
				"HAS_ELEMENT" => $elementInfo["ID"]
				],
			false, ["ID", "CODE"]
			);
		while($queryElement = $queryList->GetNext())
			$arResult["ITEMS"][$index]["DETAIL_PAGE_URL"] =
				str_replace
					(
					["#PARENT_SECTION_ID#", "#PARENT_SECTION_CODE#"],
					[$queryElement["ID"], $queryElement["CODE"]],
					$elementInfo["DETAIL_PAGE_URL"]
					);
		}