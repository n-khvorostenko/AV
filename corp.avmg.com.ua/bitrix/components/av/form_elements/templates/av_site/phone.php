<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<div
	data-av-form-item="input"
	class="
		av-form-elements-av_site-input
		phone-input
		<?if($arParams["REQUIRED"]):?>required<?endif?>
		<?if($arParams["VALUE"]):?>active<?endif?>
		"
>
	<label><?=$arParams["TITLE"]?></label>
	<input
		type="text"
		name="<?=$arParams["NAME"]?>"
		value="<?=$arParams["VALUE"]?>"
		title="<?=$arParams["TITLE"]?>"
		<?=$arParams["ATTR"]?>
	>
</div>