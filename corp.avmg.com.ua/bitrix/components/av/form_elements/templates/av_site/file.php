<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<div
	data-av-form-item="input"
	data-default-value="<?=$arParams["TITLE"]?>"
	class="av-form-elements-av_site-file<?if($arParams["REQUIRED"]):?> required<?endif?>"
>
	<input type="file" name="<?=$arParams["NAME"]?>" <?=$arParams["ATTR"]?>>
	<label><?=$arParams["TITLE"]?></label>
</div>