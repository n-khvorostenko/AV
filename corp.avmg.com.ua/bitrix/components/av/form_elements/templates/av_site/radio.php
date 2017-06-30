<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"] || !count($arParams["LIST"]))             return;
?>
<div
	data-av-form-item="radio"
	class="av-form-elements-av_site-radio<?if($arParams["REQUIRED"]):?> required<?endif?>"
	<?=$arParams["ATTR"]?>
>
	<label><?=$arParams["TITLE"]?></label>
	<?foreach($arParams["LIST"] as $value => $title):?>
	<span>
		<input
			type="radio"
			name="<?=$arParams["NAME"]?>"
			value="<?=$value?>"
			title="<?=$title?>"
			<?if($value == $arParams["VALUE"]):?>checked<?endif?>
		>
		<label title="<?=$title?>"></label>
		<label title="<?=$title?>"><?=$title?></label>
	</span>
	<?endforeach?>
</div>