<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-list-pager top"><?=$arResult["NAV_STRING"]?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- empty list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(!count($arResult["ITEMS"])):?>
<?=GetMessage("AV_BLOG_LIST_NO_ITEMS")?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-list <?if($arParams["MARKUP_TYPE"] == 'SMALLER'):?>smaller<?endif?>">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	?>
	<div id="<?=$this->GetEditAreaId($arItem["ID"])?>">
		<a class="image-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="nofollow">
			<img
				src="<?=($arItem["PREVIEW_PICTURE"]["SRC"] ? $arItem["PREVIEW_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
			>
		</a>
		<div class="content-cell">
			<?if($arItem["ACTIVE_FROM"] || $arParams["USE_RATING"] == 'Y'):?>
			<div class="rating-row">
				<?if($arItem["ACTIVE_FROM"]):?>
				<span class="element-date"><?=explode(' ', $arItem["ACTIVE_FROM"])[0]?></span>
				<?endif?>

				<?if($arParams["USE_RATING"] == 'Y'):?>
				<div class="rating-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:iblock.vote", "av",
							[
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID"   => $arParams["IBLOCK_ID"],
							"ELEMENT_ID"  => $arItem["ID"],

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
			</div>
			<?endif?>

			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="element-title">
				<?=$arItem["NAME"]?>
			</a>

			<?if($arItem["FIELDS"]["PREVIEW_TEXT"]):?>
			<div class="element-text"><?=$arItem["FIELDS"]["PREVIEW_TEXT"]?></div>
			<?endif?>

			<?if($arParams["MARKUP_TYPE"] != 'SMALLER'):?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="nofollow" class="read-more-link">
				<?=GetMessage("AV_BLOG_LIST_READ_MORE")?>
			</a>
			<?endif?>
		</div>
	</div>
<?endforeach?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-list-pager bottom"><?=$arResult["NAV_STRING"]?></div>
<?endif?>