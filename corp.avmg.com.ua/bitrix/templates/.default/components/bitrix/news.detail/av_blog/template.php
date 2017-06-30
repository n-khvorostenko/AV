<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
			"bitrix:news.list", "av_same_articles",
				[
				"AJAX_MODE"           => 'N',
				"AJAX_OPTION_JUMP"    => '',
				"AJAX_OPTION_STYLE"   => '',
				"AJAX_OPTION_HISTORY" => '',

				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID"   => $iblockId,
				"NEWS_COUNT"  => $arParams["CATEGORY_ITEMS_COUNT"],

				"SORT_BY1"    => 'ID',
				"SORT_ORDER1" => 'DESC',
				"SORT_BY2"    => 'NAME',
				"SORT_ORDER2" => 'ASC',

				"FILTER_NAME"   => $filterArrayIndex,
				"FIELD_CODE"    => ["NAME", "PREVIEW_PICTURE"],
				"PROPERTY_CODE" => array(),
				"CHECK_DATES"   => $arParams["CHECK_DATES"],

				"DETAIL_URL"  => $arParams["DETAIL_URL"],
				"SECTION_URL" => '',
				"IBLOCK_URL"  => '',

				"PREVIEW_TRUNCATE_LEN"      => $arParams["PREVIEW_TRUNCATE_LEN"],
				"ACTIVE_DATE_FORMAT"        => $arParams["LIST_ACTIVE_DATE_FORMAT"],
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

				"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
				"CACHE_TIME"   => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"]
				]
			);
	$sameArticles = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-blog-detail" id="<?=$this->GetEditAreaId($arParams["ELEMENT_ID"])?>">
	<?
	/* ------------------------------------------- */
	/* ------------------ image ------------------ */
	/* ------------------------------------------- */
	?>
	<img
		src="<?=($arResult["DETAIL_PICTURE"]["SRC"] ? $arResult["DETAIL_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
		alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
		title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
	>
	<?
	/* ------------------------------------------- */
	/* ------------------ info ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="info-block">
		<?if($arResult["DATE_ACTIVE_FROM"] || $arParams["USE_RATING"] == 'Y'):?>
		<div class="rating-row">
			<?if($arResult["DATE_ACTIVE_FROM"]):?>
			<span class="element-date"><?=explode(' ', $arResult["DATE_ACTIVE_FROM"])[0]?></span>
			<?endif?>

			<?
			if($arParams["USE_RATING"] == 'Y')
				$APPLICATION->IncludeComponent
					(
					"bitrix:iblock.vote", "av",
						[
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID"   => $arParams["IBLOCK_ID"],
						"ELEMENT_ID"  => $arResult["ID"],

						"MAX_VOTE"       => $arParams["MAX_VOTE"],
						"VOTE_NAMES"     => $arParams["VOTE_NAMES"],
						"SET_STATUS_404" => 'Y',

						"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
						"CACHE_TIME"   => $arParams["CACHE_TIME"]
						]
					);
			?>
		</div>
		<?endif?>

		<div><?=$arResult["FIELDS"]["DETAIL_TEXT"]?></div>

		<div class="back-link-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site_alt",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arResult["LIST_PAGE_URL"],
					"TITLE"       => GetMessage("AV_BLOG_VIEW_BACK_LINK")
					]
				);
			?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* -------------- same articles -------------- */
	/* ------------------------------------------- */
	?>
	<?if($sameArticles):?>
	<div class="same-articles-block">
		<h3><?=GetMessage("AV_BLOG_VIEW_SAME_ARTICLES")?></h3>
		<?=$sameArticles?>
	</div>
	<?endif?>
</div>