<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if
	(
	!$arResult["NavShowAlways"]
	&&
	($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
	) return;

$strNavQueryString     = $arResult["NavQueryString"] ? $arResult["NavQueryString"].'&amp;' : '';
$strNavQueryStringFull = $arResult["NavQueryString"] ? '?'.$arResult["NavQueryString"]     : '';
/* -------------------------------------------------------------------- */
/* -------------------------------- bar ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-cargo-navigation">
	<?if($arResult["NavPageNomer"] > 1):?>
		<a
			class="prev"
			href="
				<?=$arResult["sUrlPath"]?>
				<?if($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2):?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>
				<?else:?><?=$strNavQueryStringFull?>
				<?endif?>
				"
		>&lt;</a>
		<?if($arResult["nStartPage"] > 1):?>
			<a href="
				<?=$arResult["sUrlPath"]?>
				<?if($arResult["bSavePage"]):?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1
				<?else:?><?=$strNavQueryStringFull?>
				<?endif?>
				"
			>1</a>

			<?if ($arResult["nStartPage"] > 2):?>
			<div class="separator">...</div>
			<?endif?>
		<?endif?>
	<?endif?>

	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
		<?if($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<span class="current"><?=$arResult["nStartPage"]?></span>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
		<?else:?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["nEndPage"] < $arResult["NavPageCount"]):?>
			<?if($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):?>
			<div class="separator">...</div>
			<?endif?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
		<?endif?>

		<a class="next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">&gt;</a>
	<?endif?>
</div>