<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["CATEGORIES"]))                             return;
?>
<div class="av-search-title-result-list">
<?foreach($arResult["CATEGORIES"] as $categoryId => $arCategory):?>
	<?foreach($arCategory["ITEMS"] as $index => $arItem):?>
		<?if($arItem["ITEM_ID"] || $categoryId === 'all'):?>
		<div>
			<div>
				<?if($index == 0):?><?=$arCategory["TITLE"]?><?endif?>
			</div>
			<a href="<?=$arItem["URL"]?>" class="<?if($categoryId === 'all'):?>search-all<?else:?>search-item<?endif?>">
				<?=$arItem["NAME"]?>
			</a>
		</div>
		<?endif?>
	<?endforeach?>
<?endforeach?>
</div>