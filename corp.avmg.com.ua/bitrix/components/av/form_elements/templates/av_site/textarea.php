<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<div
	data-av-form-item="textarea"
	class="
		av-form-elements-av_site-textarea
		<?if($arParams["REQUIRED"]):?>required<?endif?>
		<?if($arParams["VALUE"]):?>active<?endif?>
		"
>
	<label><?=$arParams["TITLE"]?></label>
	<textarea
		name="<?=$arParams["NAME"]?>"
		title="<?=$arParams["TITLE"]?>"
		<?=$arParams["ATTR"]?>
	><?=$arParams["VALUE"]?></textarea>
</div>