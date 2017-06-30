<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["ITEMS"]))                                  return;
?>
<div class="av-bases-same-bases-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	$closed = $arItem["PROPERTIES"]["closed"]["VALUE_XML_ID"];
	?>
	<div id="<?=$this->GetEditAreaId($arItem["ID"])?>" <?if($closed):?>class="closed"<?endif?>>
		<h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
			<?if($closed):?><?=GetMessage("AV_BASES_SAME_BASES_LIST_CLOSED_PREFIX")?> <?endif?><?=$arItem["NAME"]?>
		</a></h3>
		<div>
			<?if($arItem["PROPERTIES"]["address"]["VALUE"]["TEXT"]):?>
			<div><?=$arItem["PROPERTIES"]["address"]["VALUE"]["TEXT"]?></div>
			<?endif?>

			<?if($arItem["PROPERTIES"]["phone"]["VALUE"][0]):?>
			<div><?=implode(', ', $arItem["PROPERTIES"]["phone"]["VALUE"])?></div>
			<?endif?>
		</div>
	</div>
	<?endforeach?>
</div>