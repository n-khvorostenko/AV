<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if($arResult["NavPageCount"] <= 1)                              return;

$baseUrl = $arResult["sUrlPath"].($arResult["NavQueryString"] ? '?'.$arResult["NavQueryString"] : '');
$pageUrl = $baseUrl.($arResult["NavQueryString"] ? '&' : '?').'PAGEN_'.$arResult["NavNum"].'=';
?>
<div class="av-pager">
	<?
	/* ------------------------------------------- */
	/* ----------------- "back" ------------------ */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] > 1):?>
	<a class="pager-switch back" href="<?=$pageUrl.($arResult["NavPageNomer"] - 1)?>" rel="nofollow"></a>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* --------------- first page ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] == 1):?><div class="page selected">1</div>
	<?else:?>                              <a class="page" href="<?=$baseUrl?>">1</a>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* --------------- pages list ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] >= 5):?><div class="space">...</div><?endif?>
	<?if($arResult["NavPageNomer"] >= 3):?><div class="space mobile">...</div><?endif?>

	<?foreach([$arResult["NavPageNomer"] - 2, $arResult["NavPageNomer"] - 1, $arResult["NavPageNomer"], $arResult["NavPageNomer"] + 1, $arResult["NavPageNomer"] + 2] as $page):?>
		<?if($page >= 2 && $page <= $arResult["NavPageCount"] - 1):?>
			<?if($page == $arResult["NavPageNomer"]):?><div class="page additional selected"><?=$page?></div>
			<?else:?>                                  <a class="page additional" href="<?=$pageUrl.$page?>"><?=$page?></a>
			<?endif?>
		<?endif?>
	<?endforeach?>

	<?if($arResult["NavPageNomer"] <= $arResult["NavPageCount"] - 4):?><div class="space">...</div><?endif?>
	<?if($arResult["NavPageNomer"] <= $arResult["NavPageCount"] - 2):?><div class="space mobile">...</div><?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- last page ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] == $arResult["NavPageCount"]):?><div class="page selected"><?=$arResult["NavPageCount"]?></div>
	<?else:?>                                                      <a class="page" href="<?=$pageUrl.$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- "forward" ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
	<a class="pager-switch next" href="<?=$pageUrl.($arResult["NavPageNomer"]+1)?>" rel="nofollow"></a>
	<?endif?>
</div>