<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<div class="av-form-elements-iblock-element-search">
	<input value="<?=$arParams["VALUE"]?>" name="<?=$arParams["NAME"]?>" title="">

	<div class="input-label">
		<input
			data-iblock-id="<?=$arParams["IBLOCK_ID"]?>"
			data-search-type="<?=($arParams["SEARCH_TYPE"] == 'section' ? 'section' : 'element')?>"
			data-parent-section="<?=$arParams["PARENT_SECTION"]?>"
			data-empty-value-title="<?=$arParams["EMPTY_RESULT_TITLE"]?>"
			value="<?=$arParams["VALUE_TITLE"]?>"
			autocomplete="off"
			title="<?=$arParams["TITLE"]?>"
		>
		<div class="placeholder"><?=$arParams["VALUE_TITLE"] ? $arParams["VALUE_TITLE"] : $arParams["TITLE"]?></div>
		<div class="icon"></div>
	</div>

	<ul></ul>
</div>