<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<div class="av-form-elements-select-def-alt">
	<select name="<?=$arParams["NAME"]?>" title="<?=$arParams["TITLE"]?>" <?=$arParams["ATTR"]?>>
		<option value>0</option>
		<?foreach($arParams["LIST"] as $value => $title):?>
		<option value="<?=$value?>" <?if($value == $arParams["VALUE"]):?>selected<?endif?>><?=$title?></option>
		<?endforeach?>
	</select>

	<?if($arParams["TITLE"]):?>
	<div <?if(!$arParams["VALUE"]):?>class="selected"<?endif?> data-label-value>
		<?=$arParams["TITLE"]?>
	</div>
	<?endif?>

	<?foreach($arParams["LIST"] as $value => $title):?>
	<div <?if($value == $arParams["VALUE"]):?>class="selected"<?endif?> data-label-value="<?=$value?>">
		<?=$title?>
	</div>
	<?endforeach?>
</div>