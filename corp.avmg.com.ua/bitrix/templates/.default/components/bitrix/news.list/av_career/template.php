<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
<div class="av-career-list-pager top"><?=$arResult["NAV_STRING"]?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- empty list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(!count($arResult["ITEMS"])):?>
<?=GetMessage("AV_CAREER_LIST_NO_ITEMS")?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-career-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	?>
	<div
		<?if($arItem["DISPLAY_PROPERTIES"]["type_vacancy"]["VALUE_XML_ID"] == 'closed'):?>class="closed"<?endif?>
		id="<?=$this->GetEditAreaId($arItem["ID"])?>"
	>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
		<div>
			<?
			$infoArray =
				[
				strip_tags($arItem["DISPLAY_PROPERTIES"]["city"]["DISPLAY_VALUE"]),
				explode(' ', $arItem["ACTIVE_FROM"])[0],
				$arItem["DISPLAY_PROPERTIES"]["type_vacancy"]["DISPLAY_VALUE"]
				];
			$infoArray = array_diff($infoArray, ['']);
			?>
			<?=implode(' | ', array_diff($infoArray, ['']))?>
		</div>
	</div>
<?endforeach?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<div class="av-career-list-pager bottom"><?=$arResult["NAV_STRING"]?></div>
<?endif?>