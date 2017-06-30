<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>

<?ShowError($arResult["ERROR_MESSAGE"]);?>
<?if($arResult["USER"]):?>
<form
	class="av-learn-user-profile"
	method="post"
	name="learn_studen_profile"
	action="<?=$arResult["CURRENT_PAGE"]?>"
	enctype="multipart/form-data"
>
	<table>
		<tr>
			<th colspan="2"><?=GetMessage("LEARNING_PERSONAL_DATA")?></th>
		</tr>
		<tr>
			<td><?=GetMessage("LEARNING_USER_NAME")?>:</td>
			<td><?$APPLICATION->IncludeComponent("av:form.input", "av_corp", ["NAME" => 'NAME', "VALUE" => $arResult["USER"]["NAME"]])?></td>
		</tr>
		<tr>
			<td><?=GetMessage("LEARNING_USER_LAST_NAME")?>:</td>
			<td><?$APPLICATION->IncludeComponent("av:form.input", "av_corp", ["NAME" => 'LAST_NAME', "VALUE" => $arResult["USER"]["LAST_NAME"]])?></td>
		</tr>
		<tr>
			<td><?=GetMessage("LEARNING_USER_EMAIL")?>:</td>
			<td><?$APPLICATION->IncludeComponent("av:form.input", "av_corp", ["NAME" => 'EMAIL', "VALUE" => $arResult["USER"]["EMAIL"]])?></td>
		</tr>
		<tr>
			<td><?=GetMessage("LEARNING_USER_PERSONAL_WWW")?>:</td>
			<td><?$APPLICATION->IncludeComponent("av:form.input", "av_corp", ["NAME" => 'PERSONAL_WWW', "VALUE" => $arResult["USER"]["PERSONAL_WWW"]])?></td>
		</tr>
		<tr>
			<td><?=GetMessage("LEARNING_USER_PERSONAL_ICQ")?>:</td>
			<td><?$APPLICATION->IncludeComponent("av:form.input", "av_corp", ["NAME" => 'PERSONAL_ICQ', "VALUE" => $arResult["USER"]["PERSONAL_ICQ"]])?></td>
		</tr>
		<tr>
			<th colspan="2"><?=GetMessage("LEARNING_EDIT_PROFILE")?></th>
		</tr>
		<tr>
			<td><?=GetMessage("LEARNING_PUBLIC_PROFILE")?>:</td>
			<td><?$APPLICATION->IncludeComponent("av:form.checkbox", "av_corp", ["NAME" => 'PUBLIC_PROFILE', "VALUE" => 'Y', "CHECKED" => $arResult["STUDENT"]["PUBLIC_PROFILE"]])?></td>
		</tr>
		<?if($arResult["STUDENT"]["TRANSCRIPT"]):?>
		<tr>
			<td><?=GetMessage("LEARNING_TRANSCRIPT")?>:</td>
			<td><a href="<?=$arResult["TRANSCRIPT_DETAIL_URL"]?>"><?=$arResult["STUDENT"]["TRANSCRIPT"]?> - <?=$arResult["STUDENT"]["USER_ID"]?></a></td>
		</tr>
		<?endif?>
		<tr>
			<td><?=GetMessage("LEARNING_RESUME")?>:</td>
			<td><?$APPLICATION->IncludeComponent("av:form.textarea", "av_corp", ["NAME" => 'RESUME', "VALUE" => $arResult["STUDENT"]["RESUME"]])?></td>
		</tr>
		<tr>
			<td><?=GetMessage("LEARNING_USER_PHOTO")?>:</td>
			<td>
				<input name="PERSONAL_PHOTO" size="30" type="file"><br />
				<label><input name="PERSONAL_PHOTO_del" value="Y" type="checkbox"><?=GetMessage("LEARNING_DELETE_FILE");?></label>

				<?if($arResult["USER"]["PERSONAL_PHOTO_ARRAY"]["ID"]):?>
				<?=CFile::ShowImage($arResult["USER"]["PERSONAL_PHOTO_ARRAY"], 200, 200, "border=0", "", true)?>
				<?endif?>
			</td>
		</tr>

<tr>
	<th colspan="2"><?=GetMessage("LEARNING_USER_ADDRESS")?></th>
</tr>


	<tr>
		<td class="field-name"><?=GetMessage("LEARNING_USER_PERSONAL_COUNTRY");?>:</td>
		<td>
			<select name="PERSONAL_COUNTRY">
				<option value="">&nbsp;</option>
			<?for ($i = 0, $countryCount = count($arResult["USER"]["PERSONAL_COUNTRY_ARRAY"]["reference_id"]); $i < $countryCount; $i++ ):?>
				<option value="<?=$arResult["USER"]["PERSONAL_COUNTRY_ARRAY"]["reference_id"][$i]?>"<?if ($arResult["USER"]["PERSONAL_COUNTRY_ARRAY"]["reference_id"][$i]==$arResult["USER"]["PERSONAL_COUNTRY"]):?> selected="selected"<?endif?>><?=$arResult["USER"]["PERSONAL_COUNTRY_ARRAY"]["reference"][$i]?></option>
			<?endfor?>
			</select>
		</td>
	</tr>


	<tr>
		<td class="field-name"><?=GetMessage("LEARNING_USER_PERSONAL_STATE");?>:</td>
		<td><input type="text" name="PERSONAL_STATE" size="35" maxlength="50" value="<?=$arResult["USER"]["PERSONAL_STATE"]?>"></td>
	</tr>

	<tr>
		<td class="field-name"><?=GetMessage("LEARNING_USER_PERSONAL_CITY");?>:</td>
		<td><input type="text" name="PERSONAL_CITY" size="35" maxlength="50" value="<?=$arResult["USER"]["PERSONAL_CITY"]?>"></td>
	</tr>

	<tr>
		<td class="field-name"><?=GetMessage("LEARNING_USER_PERSONAL_ZIP");?>:</td>
		<td><input type="text" name="PERSONAL_ZIP" size="35" maxlength="50" value="<?=$arResult["USER"]["PERSONAL_ZIP"]?>"></td>
	</tr>

	<tr>
		<td class="field-name"><?=GetMessage("LEARNING_USER_PERSONAL_STREET");?>:</td>
		<td><input type="text" name="PERSONAL_STREET" size="35" maxlength="50" value="<?=$arResult["USER"]["PERSONAL_STREET"]?>"></td>
	</tr>

</table>

<p>
<?=bitrix_sessid_post()?>
<input type="hidden" name="ACTION" value="EDIT">
<input type="submit" name="save" value="<?=GetMessage("LEARNING_SAVE")?>">
</p>
</form>



<?endif?>