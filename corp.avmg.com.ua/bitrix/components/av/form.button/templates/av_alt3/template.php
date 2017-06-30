<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ button ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["BUTTON_TYPE"] == 'button' && $arResult["NAME"]):?>
<button
	class="av-form-button-alt3"
	name="<?=$arResult["NAME"]?>"
	value="<?=$arResult["VALUE"]?>"
	title="<?=$arResult["PLACEHOLDER"]?>"
	<?=$arResult["ATTR"]?>
>
	<?=$arResult["TITLE"]?>
</button>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ label ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["BUTTON_TYPE"] == 'label'):?>
<span
	class="av-form-button-alt3"
	title="<?=$arResult["PLACEHOLDER"]?>"
	<?=$arResult["ATTR"]?>
>
	<?=$arResult["TITLE"]?>
</span>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- link ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["BUTTON_TYPE"] == 'link' && $arResult["LINK"]):?>
<a
	class="av-form-button-alt3"
	href="<?=$arResult["LINK"]?>"
	title="<?=$arResult["PLACEHOLDER"]?>"
	<?=$arResult["ATTR"]?>
>
	<?=$arResult["TITLE"]?>
</a>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ submit ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["BUTTON_TYPE"] == 'submit' && $arResult["NAME"]):?>
<input
	class="av-form-button-alt3"
	type="submit"
	name="<?=$arResult["NAME"]?>"
	value="<?=$arResult["TITLE"]?>"
	title="<?=$arResult["PLACEHOLDER"]?>"
	<?=$arResult["ATTR"]?>
>
<?endif?>