<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if(count($arParams["IBLOCK_SECTION_MENU"]))
	foreach($arResult["arMap"] as $index => $menuInfoArray)
		foreach($arParams["IBLOCK_SECTION_MENU"] as $iblockInfoArray)
			if($menuInfoArray["FULL_PATH"] == $iblockInfoArray["url"] && $iblockInfoArray["iblock_id"])
				{
				$menuArray = [];
				$queryList = CIBlockSection::GetList
					(
					["NAME" => 'ASC'],
						[
						"IBLOCK_ID"  => $iblockInfoArray["iblock_id"],
						"ACTIVE"     => 'Y',
						"SECTION_ID" => false
						],
					false,
					["ID", "CODE", "NAME"]
					);
				while($queryElement = $queryList->GetNext())
					$menuArray[] =
						[
						"LEVEL"     => $menuInfoArray["LEVEL"] + 1,
						"NAME"      => $queryElement["NAME"],
						"FULL_PATH" => str_replace(["#SECTION_ID#", "#SECTION_CODE#"], [$queryElement["ID"], $queryElement["CODE"]], $iblockInfoArray["path_template"])
						];

				$arResult["arMap"] = array_merge
					(
					array_slice($arResult["arMap"], 0,          $index + 1),
					$menuArray,
					array_slice($arResult["arMap"], $index + 1, count($arResult["arMap"]))
					);
				}