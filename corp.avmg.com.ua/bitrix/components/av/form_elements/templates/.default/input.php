<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<input
	type="text"
	class="av-form-elements-styled-input <?if($arParams["REQUIRED"]):?>required<?endif?>"
	name="<?=$arParams["NAME"]?>"
	value="<?=$arParams["VALUE"]?>"
	title="<?=$arParams["TITLE"]?>"
	<?=$arParams["ATTR"]?>
>