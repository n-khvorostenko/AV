<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (!is_array($arResult["arMap"]) || count($arResult["arMap"]) < 1)
	return;
$arRootNode = Array();
foreach($arResult["arMap"] as $index => $arItem)
{
	if ($arItem["LEVEL"] == 0)
		$arRootNode[] = $index;
}
$allNum = count($arRootNode);
$colNum = ceil($allNum / $arParams["COL_NUM"]);
	$previousLevel = -1;
	$counter = 0;
	$column = 1;
?>
<div class="sitemapWrap">
<?php foreach($arResult["arMap"] as $index => $arItem):?>

	<?if (array_key_exists($index+1, $arResult["arMap"]) && $arItem["LEVEL"] < $arResult["arMap"][$index+1]["LEVEL"]):?>
		<div class="col-md-12"><b><a href="<?=$arItem["FULL_PATH"]?>"><?=$arItem["NAME"]?></a></b></div>
	<?if ($arParams["SHOW_DESCRIPTION"] == "Y" && strlen($arItem["DESCRIPTION"]) > 0) {?>
		<div><?=$arItem["DESCRIPTION"]?></div>
	<?}?>

	<?elseif($arItem["LEVEL"] == 0):?>
		<div class="col-md-12">
			<b><a href="<?=$arItem["FULL_PATH"]?>"><?=$arItem["NAME"]?></a></b>
		</div>
	<?else:?>
		<div class="col-md-4"><a href="<?=$arItem["FULL_PATH"]?>"><?=$arItem["NAME"]?></a>
			<?if ($arParams["SHOW_DESCRIPTION"] == "Y" && strlen($arItem["DESCRIPTION"]) > 0) {?>
				<div><?=$arItem["DESCRIPTION"]?></div>
			<?}?>
		</div>
	<?endif?>
	<?endforeach?>
</div>