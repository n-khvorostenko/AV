<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<div
	data-av-form-item="checkbox"
	class="av-form-elements-av_site-checkbox<?if($arParams["REQUIRED"]):?> required<?endif?>"
	<?=$arParams["ATTR"]?>
>
	<input
		type="checkbox"
		name="<?=$arParams["NAME"]?>"
		value="<?=$arParams["VALUE"]?>"
		title=""
		<?if($arParams["CHECKED"]):?>checked<?endif?>
	>
	<label></label>
	<?if($arParams["TITLE"]):?>
	<label><?=$arParams["TITLE"]?></label>
	<?endif?>
</div>