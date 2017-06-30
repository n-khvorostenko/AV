<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<input
	data-av-form-item="input"
	type="text"
	class="av-form-elements-corp-input<?if($arParams["REQUIRED"]):?> required<?endif?>"
	name="<?=$arParams["NAME"]?>"
	value="<?=$arParams["VALUE"]?>"
	title="<?=$arParams["TITLE"]?>"
	<?if($arParams["DISABLED"]):?>disabled<?endif?>
	<?=$arParams["ATTR"]?>
>
<?if($arParams["PLACEHOLDER"]):?>
<div class="av-form-elements-corp-input-placeholder<?if($arParams["VALUE"]):?> hidden<?endif?>">
	<?=$arParams["PLACEHOLDER"]?>
</div>
<?endif?>