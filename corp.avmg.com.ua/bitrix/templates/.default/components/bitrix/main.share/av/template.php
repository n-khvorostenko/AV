<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arResult["PAGE_URL"] || !count($arResult["BOOKMARKS"]))    return;
?>
<div class="av-share-block">
	<?foreach($arParams["HANDLERS"] as $socService):?>
		<?if($arResult["BOOKMARKS"][$socService]["ICON"]):?>
			<?=$arResult["BOOKMARKS"][$socService]["ICON"]?>
		<?endif?>
	<?endforeach?>
</div>