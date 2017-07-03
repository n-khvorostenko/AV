<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="input"
	class="
		av-form-input-password
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["DISABLED"]):?>disabled<?endif?>
		"
	title="<?=$arResult["TITLE"]?>"
>
	<?if($arResult["PLACEHOLDER"]):?>
	<label <?if($arResult["VALUE"]):?>style="display: none"<?endif?>>
		<?=$arResult["PLACEHOLDER"]?>
	</label>
	<?endif?>

	<input
		type="password"
		autocomplete="off"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title="<?=$arResult["TITLE"]?>"
		<?if($arResult["DISABLED"]):?>disabled<?endif?>

		data-avat="form-input-<?=$arResult["NAME"]?>"
		<?if($arResult["PLACEHOLDER"] && !$arResult["VALUE"]):?>style="display: none"<?endif?>
		<?=$arResult["ATTR"]?>
	>
</div>