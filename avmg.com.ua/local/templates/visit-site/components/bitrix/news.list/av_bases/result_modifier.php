<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Application;
/* -------------------------------------------------------------------- */
/* ------------------------- using subcatagory ------------------------ */
/* -------------------------------------------------------------------- */
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
/* -------------------------------------------------------------------- */
/* ------------------------------ streams ----------------------------- */
/* -------------------------------------------------------------------- */
$arResult["STREAMS_INFO"] = [];
if(in_array('streams', $arParams["PROPERTY_CODE"]))
	{
	$streamsIblockId = CIBlockProperty::GetList([], ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => 'Y', "CODE" => 'streams'])->GetNext()["LINK_IBLOCK_ID"];
	if($streamsIblockId)
		{
		$queryList = CIBlockElement::GetList(["SORT" => 'ASC'], ["IBLOCK_ID" => $streamsIblockId, "ACTIVE" => 'Y'], false, false, ["ID", "NAME", "PROPERTY_icon"]);
		while($queryElement = $queryList->GetNext())
			{
			$iconInfo = CFile::GetByID($queryElement["PROPERTY_ICON_VALUE"])->Fetch();
			$iconPath = explode('.', $iconInfo["ORIGINAL_NAME"])[1] == 'svg'
				? '/upload/'.$iconInfo["SUBDIR"].'/'.$iconInfo["ORIGINAL_NAME"]
				: $this->GetFolder().'/images/stream_default_icon.svg';

			$svgContent       = file_get_contents(Application::getDocumentRoot().$iconPath);
			$svgViewboxParams = explode(' ', simplexml_load_string($svgContent)->attributes()["viewBox"]);
			$svgHeight        = 35;
			$svgWidth         = $svgHeight*$svgViewboxParams[2]/$svgViewboxParams[3];

			$arResult["STREAMS_INFO"][$queryElement["ID"]] =
				[
				"NAME"        => $queryElement["NAME"],
				"SVG_CONTENT" => $svgContent,
				"SVG_WIDTH"   => $svgWidth,
				"SVG_HEIGHT"  => $svgHeight
				];
			}
		}
	}