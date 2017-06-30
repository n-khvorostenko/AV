<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["ITEMS"]))                                  return;
?>
<div class="av-career-same-articles-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	?>
	<div id="<?=$this->GetEditAreaId($arItem["ID"])?>">
		<h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
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