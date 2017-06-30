<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["bootstrap"]);
$APPLICATION->SetAdditionalCss($this->GetFolder().'/list.css');
/* -------------------------------------------------------------------- */
/* -------------------------- filter column --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["SHOW_FILTER"] == 'Y'):?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 av-directories-filter-col">
	<?
	$componentParams =
		[
		"IBLOCK_TYPE"     => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"       => $arParams["IBLOCK_ID"],
		"FILTER_VAR_NAME" => $arParams["FILTER_VAR_NAME"],

		"FIELDS"          => $arParams["FILTER_FIELDS"],

		"CACHE_TIME"      => $arParams["CACHE_TIME"],
		"CACHE_FILTER"    => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS"    => $arParams["CACHE_GROUPS"]
		];
	foreach($arParams["IBLOCK_ID"] as $iblockId)
		$componentParams['PROPS_'.$iblockId] = $arParams['LIST_PROPS_'.$iblockId];

	$APPLICATION->IncludeComponent("av:directories.filter", "", $componentParams);
	?>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- list column ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div
	class="
	<?if($arParams["SHOW_FILTER"] == "Y"):?>col-lg-8  col-md-8  col-sm-12 col-xs-12 filter-use
	<?else:?>                               col-lg-12 col-md-12 col-sm-12 col-xs-12
	<?endif?>
	 av-directories-list-col
	"
>
	<?
	$componentParams =
		[
		"IBLOCK_TYPE"     => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"       => $arParams["IBLOCK_ID"],
		"PATH_TO_ELEMENT" => $arResult["URL_TEMPLATES"]["ELEMENT"],
		"FILTER_VAR_NAME" => $arParams["FILTER_VAR_NAME"],

		"SORT_FIELD"      => $arParams["SORT_FIELD"],
		"SORT_TYPE"       => $arParams["SORT_TYPE"],
		"FIELDS"          => $arParams["LIST_FIELDS"],
		"ELEMENTS_COUNT"  => $arParams["LIST_ELEMENTS_COUNT"],

		"CACHE_TIME"      => $arParams["CACHE_TIME"],
		"CACHE_FILTER"    => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS"    => $arParams["CACHE_GROUPS"]
		];
	foreach($arParams["IBLOCK_ID"] as $iblockId)
		$componentParams['PROPS_'.$iblockId] = $arParams['LIST_PROPS_'.$iblockId];

	$APPLICATION->IncludeComponent("av:directories.list", "", $componentParams);
	?>
</div>