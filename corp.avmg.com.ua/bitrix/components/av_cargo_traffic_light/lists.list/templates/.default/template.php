<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["av_site"]);
/* -------------------------------------------------------------------- */
/* ----------------------------- toolbar ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-cargo-traffic-light-toolbar">
	<?
	if($arResult["CAN_ADD_ELEMENT"])
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av_corp",
				[
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arResult["LIST_NEW_ELEMENT_URL"],
				"TITLE"       => $arResult["IBLOCK"]["ELEMENT_ADD"],
				"ATTR"        => ["data-avat" => 'cargo-traffic-list-add-element-link']
				]
			);
	if($arParams["CAN_EDIT"])
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av_corp_alt",
				[
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arResult["LIST_EDIT_URL"],
				"TITLE"       => GetMessage("AVCTLL_TOOLBAR_EDIT_LIST"),
				"ATTR"        => ["data-avat" => 'cargo-traffic-list-edit-list-link']
				]
			);
	?>
	<a
		class="excel-export"
		href="<?=$arResult["EXPORT_EXCEL_URL"]?>"
		data-avat="cargo-traffic-list-export-excel-link"
	>
		<?=GetMessage("AVCTLL_TOOLBAR_EXCEL_EXPORT")?>
	</a>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- table ------------------------------ */
/* -------------------------------------------------------------------- */
$APPLICATION->IncludeComponent
	(
	"av_cargo_traffic_light:main.interface.grid", "",
		[
		"GRID_ID"    => $arResult["GRID_ID"],
		"HEADERS"    => $arResult["ELEMENTS_HEADERS"],
		"ROWS"       => $arResult["ELEMENTS_ROWS"],
		"NAV_OBJECT" => $arResult["NAV_OBJECT"],
		"SORT"       => $arResult["SORT"],
		"FILTER"     => $arResult["FILTER"],
		"FOOTER"     =>
			[
				[
				"title" => GetMessage("AVCTLL_LIST_ELEMENTS_COUNT"),
				"value" => $arResult["NAV_OBJECT"]->SelectedRowsCount()
				]
			]
		]
	);
?>