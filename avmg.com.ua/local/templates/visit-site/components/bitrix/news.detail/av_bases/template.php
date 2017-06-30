<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$cordinateX   = $arResult["PROPERTIES"]["cordinate_x"]["VALUE"];
$cordinateY   = $arResult["PROPERTIES"]["cordinate_y"]["VALUE"];
$priceLink    = CFile::GetPath($arResult["PROPERTIES"]["price_file"]["VALUE"]);
$sectionTitle = '';
foreach($arResult["SECTION"]["PATH"] as $arrayInfo)
	$sectionTitle = $arrayInfo["NAME"];
/* -------------------------------------------------------------------- */
/* -------------------------- same articles --------------------------- */
/* -------------------------------------------------------------------- */
$sameArticles = '';
if(count($arParams["CATEGORY_APPLIED_FILTER"]))
	{
	ob_start();
	foreach($arParams["CATEGORY_APPLIED_FILTER"] as $iblockId => $filterArrayIndex)
		$APPLICATION->IncludeComponent
			(
			"bitrix:news.list", "av_bases_same_bases",
				[
				"AJAX_MODE"           => 'N',
				"AJAX_OPTION_JUMP"    => '',
				"AJAX_OPTION_STYLE"   => '',
				"AJAX_OPTION_HISTORY" => '',

				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID"   => $iblockId,
				"NEWS_COUNT"  => $arParams["CATEGORY_ITEMS_COUNT"],

				"SORT_BY1"    => 'ID',
				"SORT_ORDER1" => 'ASC',
				"SORT_BY2"    => 'NAME',
				"SORT_ORDER2" => 'ASC',

				"FILTER_NAME"   => $filterArrayIndex,
				"FIELD_CODE"    => array(),
				"PROPERTY_CODE" => array("address", "phone", "closed"),
				"CHECK_DATES"   => $arParams["CHECK_DATES"],

				"DETAIL_URL"  => $arParams["DETAIL_URL"],
				"SECTION_URL" => $arParams["SECTION_URL"],
				"IBLOCK_URL"  => $arParams["IBLOCK_URL"],

				"PREVIEW_TRUNCATE_LEN"      => $arParams["PREVIEW_TRUNCATE_LEN"],
				"ACTIVE_DATE_FORMAT"        => $arParams["ACTIVE_DATE_FORMAT"],
				"SET_TITLE"                 => 'N',
				"SET_BROWSER_TITLE"         => 'N',
				"SET_META_KEYWORDS"         => 'N',
				"SET_META_DESCRIPTION"      => 'N',
				"SET_LAST_MODIFIED"         => $arParams["SET_LAST_MODIFIED"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => 'N',
				"ADD_SECTIONS_CHAIN"        => 'N',
				"HIDE_LINK_WHEN_NO_DETAIL"  => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
				"PARENT_SECTION"            => '',
				"PARENT_SECTION_CODE"       => '',
				"INCLUDE_SUBSECTIONS"       => 'Y',
				"DISPLAY_DATE"              => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME"              => $arParams["DISPLAY_NAME"],
				"DISPLAY_PICTURE"           => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT"      => $arParams["DISPLAY_PREVIEW_TEXT"],

				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404"       => $arParams["SHOW_404"],
				"MESSAGE_404"    => $arParams["MESSAGE_404"],
				"FILE_404"       => $arParams["FILE_404"],

				"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
				"CACHE_TIME"   => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

				"USE_RATING" => $arParams["USE_RATING"],
				"MAX_VOTE"   => $arParams["MAX_VOTE"],
				"VOTE_NAMES" => $arParams["VOTE_NAMES"]
				]
			);
	$sameArticles = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-bases-detail<?if($arResult["PROPERTIES"]["closed"]["VALUE_XML_ID"]):?> closed<?endif?><?if(!$cordinateX || !$cordinateY):?> no-map<?endif?>">
	<?
	/* ------------------------------------------- */
	/* ----------------- info col ---------------- */
	/* ------------------------------------------- */
	?>
	<div class="info-col">
		<h3><?=GetMessage("AV_BASES_ELEMENT_INFO")?></h3>
		<div>
			<?if($arResult["PROPERTIES"]["address"]["VALUE"]["TEXT"]):?>
			<div><?=$arResult["PROPERTIES"]["address"]["VALUE"]["TEXT"]?></div>
			<?endif?>

			<?if($arResult["PROPERTIES"]["phone"]["VALUE"][0]):?>
			<div><?=implode(', ', $arResult["PROPERTIES"]["phone"]["VALUE"])?></div>
			<?endif?>

			<?if($arResult["PROPERTIES"]["open_houres"]["VALUE"][0]):?>
			<div>
				<b><?=$arResult["PROPERTIES"]["open_houres"]["NAME"]?></b><br>
				<?=implode('<br>', $arResult["PROPERTIES"]["open_houres"]["VALUE"])?>
			</div>
			<?endif?>

			<?if($priceLink):?>
			<div>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form_elements", "av_site",
						[
						"TYPE"        => 'button',
						"BUTTON_TYPE" => 'link',
						"LINK"        => $priceLink,
						"TITLE"       => GetMessage("AV_BASES_ELEMENT_DOWNLOAD_PRICE"),
						"ATTR"        => 'download target=_blank'
						]
					);
				?>
			</div>
			<?endif?>

			<?if($arParams["TABLET_MENU_PATH"]):?>
			<div>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:visit_site.menu.tablet", "icons",
						[
						"TITLE"       => GetMessage("AV_BASES_ELEMENT_PRODUCTS_MENU"),
						"MENU_PATH"   => $arParams["TABLET_MENU_PATH"],
						"MENU_TYPE"   => $arParams["TABLET_MENU_TYPE"],
						"MENU_VALUES" => $arParams["TABLET_MENU_VALUES"]
						]
					);
				?>
			</div>
			<?endif?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------------- map col ----------------- */
	/* ------------------------------------------- */
	?>
	<?if($cordinateX && $cordinateY):?>
	<div class="map-col">
		<h3><?=GetMessage("AV_BASES_ELEMENT_MAP")?></h3>
		<div
			class="google-map"
			data-store-name="<?=$arResult["NAME"]?>"
			data-cordinate-x="<?=$cordinateX?>"
			data-cordinate-y="<?=$cordinateY?>"
		></div>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- detail col --------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["DETAIL_TEXT"] || $arResult["DETAIL_PICTURE"]["SRC"]):?>
	<div class="detail-col">
		<h3><?=($arResult["PROPERTIES"]["additional_title"]["VALUE"] ? $arResult["PROPERTIES"]["additional_title"]["VALUE"] : GetMessage("AV_BASES_ELEMENT_DETEIL"))?></h3>
		<div>
			<?if($arResult["DETAIL_PICTURE"]["SRC"]):?>
			<img
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				class="detail-image"
			>
			<?endif?>

			<?=$arResult["DETAIL_TEXT"]?>

			<?if($arParams["USE_SHARE"] == 'Y'):?>
			<div class="share-block">
				<span><?=GetMessage("AV_BASES_ELEMENT_SHARE_BLOCK_TITLE")?>:</span>
				<?
				$APPLICATION->IncludeComponent
					(
					"bitrix:main.share", $arParams["SHARE_TEMPLATE"],
						[
						"HANDLERS"   => $arParams["SHARE_HANDLERS"],
						"PAGE_TITLE" => $APPLICATION->GetTitle(),
						"PAGE_URL"   => CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$APPLICATION->GetCurPage(false)
						]
					);
				?>
			</div>
			<?endif?>
		</div>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- action col --------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["CURRENT_ACTION"]["TEXT"] || $arResult["CURRENT_ACTION"]["PICTURE"]):?>
	<div class="action-col">
		<h3><?=GetMessage("AV_BASES_ELEMENT_CURRENT_ACTION")?></h3>
		<?if($arResult["CURRENT_ACTION"]["PICTURE"]):?>
		<img
			src="<?=$arResult["CURRENT_ACTION"]["PICTURE"]?>"
			alt="<?=$arResult["CURRENT_ACTION"]["NAME"]?>"
			title="<?=$arResult["CURRENT_ACTION"]["NAME"]?>"
			class="detail-image"
		>
		<?endif?>
		<?=$arResult["CURRENT_ACTION"]["TEXT"]?>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* -------------- same bases col ------------- */
	/* ------------------------------------------- */
	?>
	<?if($sameArticles):?>
	<h3 class="av-spoiler-header" data-work-breakpoint="991"><?=GetMessage("AV_BASES_ELEMENT_SAME_BASES", ["#NAME#" => $sectionTitle])?></h3>
	<div class="av-spoiler-body"><?=$sameArticles?></div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- back link ---------------- */
	/* ------------------------------------------- */
	?>
	<div class="buttons-col">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arResult["SECTION_URL"],
				"TITLE"       => GetMessage("AV_BASES_ELEMENT_SECTION_LINK")
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arResult["LIST_PAGE_URL"],
				"TITLE"       => GetMessage("AV_BASES_ELEMENT_LIST_LINK")
				]
			);
		?>
	</div>
</div>