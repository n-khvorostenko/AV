<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?if($arResult["isFormNote"] == "Y"):?>
	<div id="form-anwer123" hidden>
		<span id="popUp-text-fromForm" back-url=>
			<br><span>Спасибо за заявку!<br>Наш эксперт свяжется с вами в течении дня.</span><br>
		</span>
	</div>
	<script>
		ShowPopUp();changeUrl();
	</script>
<?endif?>   

<div id="title-form-1" class="text-uppercase text-center"><span>заказать звонок</span><p>оставьте свои контактные данные и<br>менеджер свяжется с вами в ближайшее время</p></div>
<?=$arResult["FORM_HEADER"]?><div class="av-form-wrap-2">

	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------ ошибки ------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
	<?if($arResult["isFormErrors"] == "Y"):?>
		<?=$arResult["FORM_ERRORS_TEXT"]?>
	<?endif?>
	<span form-input-error-123 >Пожалуйста, введите корректные данные!</span>
	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------- поля -------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
	<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
		<?
		$fieldTypes = [];
		foreach($arQuestion["STRUCTURE"] as $fieldInfo) $fieldTypes[] = $fieldInfo["FIELD_TYPE"];
		?>
		<div
			fom-row
			<?if($arQuestion["REQUIRED"] == "Y"):?>required<?endif?>
			<?if($arResult['FORM_ERRORS'][$FIELD_SID]):?>form-error<?endif?>
			field-types="<?=implode('|', $fieldTypes)?>"
		>
			<span title><?=$arQuestion["CAPTION"]?></span>
			<?=$arQuestion["HTML_CODE"]?>
		</div>
	<?endforeach?>
	<div class="text-center" security-text-form>Ваши персональные данные<br>в безопасности</div>
	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------ Submit ------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
<div class="text-center">
				<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
</div></div><?=$arResult["FORM_FOOTER"]?>