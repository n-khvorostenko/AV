<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["ITEMS"]))                                  return;
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	?>
	<div class="av-same-articles-item" id="<?=$this->GetEditAreaId($arItem["ID"])?>">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="nofollow">
			<img
				src="<?=($arItem["PREVIEW_PICTURE"]["SRC"] ? $arItem["PREVIEW_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
			>
		</a>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
	</div>
<?endforeach?>