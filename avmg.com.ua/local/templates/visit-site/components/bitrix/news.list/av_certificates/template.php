<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-certificates-list-pager top"><?=$arResult["NAV_STRING"]?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- empty list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(!count($arResult["ITEMS"])):?>
<?=GetMessage("AV_CERTIFICATES_LIST_NO_ITEMS")?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-certificates-list" data-component-params="<?=base64_encode(serialize($arParams["FULL_PARAMS"]))?>">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	?>
	<div data-element-id="<?=$arItem["ID"]?>" id="<?=$this->GetEditAreaId($arItem["ID"])?>">
		<img
			src="<?=($arItem["DETAIL_PICTURE"]["SRC"] ? $arItem["DETAIL_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
			alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
		>
		<div class="date"><?=explode(' ', $arItem["DATE_CREATE"])[0]?></div>
		<div class="name"><?=$arItem["NAME"]?></div>
	</div>
<?endforeach?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-certificates-list-pager bottom"><?=$arResult["NAV_STRING"]?></div>
<?endif?>