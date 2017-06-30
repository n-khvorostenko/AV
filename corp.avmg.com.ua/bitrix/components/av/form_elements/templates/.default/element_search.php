<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<input
	class="av-form-elements-element-search"
	name="<?=$arParams["NAME"]?>"
	placeholder="<?=$arParams["PLACEHOLDER"]?>"
	value="<?=$arParams["VALUE"]?>"
	autocomplete="off"
	<?=$arParams["ATTR"]?>
>