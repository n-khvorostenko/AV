<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-blog-index-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	?>
	<div id="<?=$this->GetEditAreaId($arItem["ID"])?>">
		<div>
			<img
				src="<?=($arItem["PREVIEW_PICTURE"]["SRC"] ? $arItem["PREVIEW_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
			>
		</div>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
	</div>
<?endforeach?>
</div>