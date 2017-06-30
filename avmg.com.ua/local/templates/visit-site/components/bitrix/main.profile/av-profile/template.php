<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<div class="bx-auth-profile">
<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="av-user-profile">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
	<div class="col-md-8">
	<div class="profile-link profile-user-div-link "><h3><?=GetMessage("USER_PERSONAL_INFO")?></h3></div>
	<?
	if($arResult["ID"]>0)
	{
	?>

	<?
	}
	?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "LOGIN",
								"VALUE"    => $arResult["arUser"]["LOGIN"],
								"TITLE"    => GetMessage('LOGIN'),
								"REQUIRED" => 'Y'
								]
							);
					?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "NAME",
								"VALUE"    => $arResult["arUser"]["NAME"],
								"TITLE"    => GetMessage('NAME'),
								"REQUIRED" => 'Y'
								]
							);
					?>



					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "LAST_NAME",
								"VALUE"    => $arResult["arUser"]["LAST_NAME"],
								"TITLE"    => GetMessage('LAST_NAME')
								]
							);
					?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "SECOND_NAME",
								"VALUE"    => $arResult["arUser"]["SECOND_NAME"],
								"TITLE"    => GetMessage('SECOND_NAME')
								]
							);
					?>

					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "EMAIL",
								"VALUE"    => $arResult["arUser"]["EMAIL"],
								"TITLE"    => GetMessage('EMAIL'),
								"REQUIRED" => $arResult["EMAIL_REQUIRED"] ? 'Y' : 'N'
								]
							);
					?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'phone',
								"NAME"     => "PERSONAL_MOBILE",
								"VALUE"    => $arResult["arUser"]["PERSONAL_MOBILE"],
								"TITLE"    => GetMessage('USER_MOBILE')
								]
							);
					?>



<?if($arResult["arUser"]["EXTERNAL_AUTH_ID2"] == ''):?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'password',
								"NAME"     => $arrayInfo["NEW_PASSWORD"],
								"VALUE"    => "",
								"TITLE"    => GetMessage('NEW_PASSWORD_REQ'),
								"CLASS"    => "bx-auth-input"
								]
							);
					?>

<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
<?endif?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'password',
								"NAME"     => $arrayInfo["NEW_PASSWORD_CONFIRM"],
								"VALUE"    => "",
								"TITLE"    => GetMessage('NEW_PASSWORD_CONFIRM')
								]
							);
					?>


<?endif?>


		<? /*


					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "USER_POSITION",
								"VALUE"    => $arResult["arUser"]["USER_POSITION"],
								"TITLE"    => GetMessage('USER_POSITION'),
								"REQUIRED" => $arrayInfo["REQUIRED"]
								]
							);
					?>







			<td><?=GetMessage("USER_BIRTHDAY_DT")?> (<?=$arResult["DATE_FORMAT"]?>):</td>
			<td><?
			$APPLICATION->IncludeComponent(
				'bitrix:main.calendar',
				'',
				array(
					'SHOW_INPUT' => 'Y',
					'FORM_NAME' => 'form1',
					'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
					'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
					'SHOW_TIME' => 'N'
				),
				null,
				array('HIDE_ICONS' => 'Y')
			);

			//=CalendarDate("PERSONAL_BIRTHDAY", $arResult["arUser"]["PERSONAL_BIRTHDAY"], "form1", "15")
			?>
*/?>





			<? /*
		<tr>
			<td colspan="2" class="profile-header"><?=GetMessage("USER_POST_ADDRESS")?></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_COUNTRY')?></td>
			<td>
				<?
				$listArray = [];
				foreach(GetCountryArray()["reference_id"] as $index => $value)
					$listArray[$value] = GetCountryArray()["reference"][$index];

				$APPLICATION->IncludeComponent
					(
					"av:form_elements", "",
						[
						"TYPE"          => 'select',
						"NAME"          => "PERSONAL_COUNTRY",
						"VALUE"         => $arResult["arUser"]["PERSONAL_COUNTRY"],
						"TITLE"         => 'НЕ ВЫБРАННО',
						"DEFAULT_VALUE" => !$arResult["arUser"]["PERSONAL_COUNTRY"] ? '' : 'ПУСТО',
						"LIST"          => $listArray
						]
					);
				?>
			</td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_STATE')?></td>
			<td><input type="text" name="PERSONAL_STATE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_STATE"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_CITY')?></td>
			<td><input type="text" name="PERSONAL_CITY" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_ZIP')?></td>
			<td><input type="text" name="PERSONAL_ZIP" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_ZIP"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_STREET")?></td>
			<td><textarea cols="30" rows="5" name="PERSONAL_STREET"><?=$arResult["arUser"]["PERSONAL_STREET"]?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_MAILBOX')?></td>
			<td><input type="text" name="PERSONAL_MAILBOX" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_MAILBOX"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_NOTES")?></td>
			<td><textarea cols="30" rows="5" name="PERSONAL_NOTES"><?=$arResult["arUser"]["PERSONAL_NOTES"]?></textarea></td>
		</tr>


	<div class="profile-link profile-user-div-link"><h4><?=GetMessage("USER_WORK_INFO")?></h4></div>


					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "USER_COMPANY",
								"VALUE"    => $arResult["arUser"]["USER_COMPANY"],
								"TITLE"    => GetMessage('USER_COMPANY'),
								]
							);
					?>

					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "WORK_PROFILE",
								"VALUE"    => $arResult["arUser"]["WORK_PROFILE"],
								"TITLE"    => GetMessage('USER_WORK_PROFILE'),
								]
							);
					?>

				<div av-form-element="input" class="av-form-elements-av_site-input">
					<label><?=GetMessage('USER_COUNTRY')?></label>
				</div>
				<?
				$listArray = [];
				foreach(GetCountryArray()["reference_id"] as $index => $value)
					$listArray[$value] = GetCountryArray()["reference"][$index];

				$APPLICATION->IncludeComponent
					(
					"av:form_elements", "",
						[
						"TYPE"          => 'select',
						"NAME"          => "PERSONAL_COUNTRY",
						"VALUE"         => $arResult["COUNTRY_SELECT_WORK"],
						"TITLE"         => 'НЕ ВЫБРАННО',
						"DEFAULT_VALUE" => !$arResult["COUNTRY_SELECT_WORK"] ? '' : 'ПУСТО',
						"LIST"          => $listArray
						]
					);
				?>

					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "WORK_CITY",
								"VALUE"    => $arResult["arUser"]["WORK_CITY"],
								"TITLE"    => GetMessage('USER_CITY'),
								]
							);
					?>

					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "WORK_STREET",
								"VALUE"    => $arResult["arUser"]["WORK_STREET"],
								"TITLE"    => GetMessage('USER_STREET'),
								]
							);
					?>

					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'input',
								"NAME"     => "WORK_ZIP",
								"VALUE"    => $arResult["arUser"]["WORK_ZIP"],
								"TITLE"    => GetMessage('USER_ZIP'),
								]
							);
					?>
						<br>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form_elements", "av_site",
								[
								"TYPE"     => 'textarea',
								"NAME"     => $arResult["arUser"]["WORK_NOTES"],
								"VALUE"    => "",
								"TITLE"    => "Дополнительный заметки"
								]
							);
					?>


	<?// ********************* User properties ***************************************************?>
	<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></a></div>
	<div id="user_div_user_properties" class="profile-block-<?=strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</thead>
		<tbody>
		<?$first = true;?>
		<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
		<tr><td class="field-name">
			<?if ($arUserField["MANDATORY"]=="Y"):?>
				<span class="starrequired">*</span>
			<?endif;?>
			<?=$arUserField["EDIT_FORM_LABEL"]?>:</td><td class="field-value">
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.field.edit",
					$arUserField["USER_TYPE"]["USER_TYPE_ID"],
					array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
		<?endforeach;?>
		</tbody>
	</table>
	</div>
	<?endif;?>
*/?>
<br>
<div class="hidden-sm hidden-xs text-center">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'save',
					"TITLE"       => GetMessage("MAIN_SAVE"),
					"ATTR"        => 'submit-button'
					]
				);
			?>
&nbsp;&nbsp;
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'reset',
					"NAME"        => 'reset',
					"TITLE"       => GetMessage("MAIN_RESET"),
					"ATTR"        => ''
					]
				);
			?>
</div>
</div>
<div class="col-md-4 userPhotoSection">

		<span id="downloadPhoto">Загрузить фото</span>
		<div hidden ><?=$arResult["arUser"]["PERSONAL_PHOTO_INPUT"]?></div>
			<?
			if (strlen($arResult["arUser"]["PERSONAL_PHOTO"])>0)
			{
			?>
				<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML"]?>
		<span id="deletePhoto">Удалить фото</span>
			<?
			}
			?>
<br>
<div class="hidden-lg hidden-md text-center">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'save',
					"TITLE"       => GetMessage("MAIN_SAVE"),
					"ATTR"        => 'submit-button'
					]
				);
			?>
&nbsp;&nbsp;
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'reset',
					"NAME"        => 'reset',
					"TITLE"       => GetMessage("MAIN_RESET"),
					"ATTR"        => ''
					]
				);
			?>
</div>
<br>
<?
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent(
	"bitrix:socserv.auth.split", 
	"av-twitpost", 
	array(
		"SHOW_PROFILES" => "Y",
		"ALLOW_DELETE" => "Y",
		"COMPONENT_TEMPLATE" => "av-twitpost",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
}
?>


</div>
	<?// ******************** /User properties ***************************************************?>


</form></div>
