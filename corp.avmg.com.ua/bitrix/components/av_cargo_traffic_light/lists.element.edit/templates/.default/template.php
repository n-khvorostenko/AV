<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["av_form_elements"]);
/* -------------------------------------------------------------------- */
/* ----------------------- form fields grouping ----------------------- */
/* -------------------------------------------------------------------- */
$fieldsArray  = $arResult["FIELDS"];
$fieldsGroups = [];

foreach($fieldsArray as $field => $fieldInfo)
	{
	if($fieldInfo["TYPE"] == 'S:HTML')
		{
		$fieldsGroups[3][$field] = $fieldInfo;
		unset($fieldsArray[$field]);
		}
	if
		(
		(!$arResult["ELEMENT_ID"] && $fieldInfo["SETTINGS"]["SHOW_ADD_FORM"]  == 'N')
		||
		( $arResult["ELEMENT_ID"] && $fieldInfo["SETTINGS"]["SHOW_EDIT_FORM"] == 'N')
		)
		{
		$fieldsGroups[4][$field] = $fieldInfo;
		unset($fieldsArray[$field]);
		}
	}

$firstGroupSize = ceil(count($fieldsArray)/2);
$currentIndex   = 1;
foreach($fieldsArray as $field => $fieldInfo)
	{
	$fieldsGroups[$currentIndex <= $firstGroupSize ? 1 : 2][$field] = $fieldInfo;
	$currentIndex++;
	}

ksort($fieldsGroups);
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<form
	action="<?=$APPLICATION->GetCurPage(false).(count($_GET) ? '?' : '').http_build_query($_GET)?>"
	method="post"
	enctype="multipart/form-data"
	class="av-cargo-traffic-light-item-form"
>
	<?=bitrix_sessid_post()?>
	<?
	/* ------------------------------------------- */
	/* ------------------- tabs ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="tabs">
		<div class="main active"><?=$arResult["IBLOCK"]["ELEMENT_NAME"]?></div>
		<?if(count($arResult["RIGHTS"]) && $arResult["ELEMENT_ID"]):?>
		<div class="access"><?=GetMessage("AVCTL_TABS_ACCESS")?></div>
		<?endif?>
		<?if(count($arResult["HISTORY_ELEMENTS"])):?>
		<div class="history"><?=GetMessage("AVCTL_TABS_HISTORY")?></div>
		<?endif?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ---------------- main form ---------------- */
	/* ------------------------------------------- */
	?>
	<div class="form main active">
		<h3>
			<span><?=($arResult["ELEMENT_ID"] ? $arResult["FORM_DATA"]["NAME"] : GetMessage("AVCTL_NEW_ELEMENT_TITLE"))?></span>
			<?if($arResult["CAN_DELETE_ELEMENT"]):?>
				<span class="delete-link"><?=$arResult["IBLOCK"]["ELEMENT_DELETE"]?></span>
			<?endif?>
		</h3>

		<?foreach($fieldsGroups as $index => $groupFields):?>
		<div class="column"<?if($index == 4):?> style="display: none"<?endif?>>
			<?foreach($groupFields as $field => $fieldInfo):?>
			<div>
				<div class="title<?if($fieldInfo["IS_REQUIRED"] == 'Y' && $fieldInfo["SETTINGS"]["EDIT_READ_ONLY_FIELD"] != 'Y'):?> required<?endif?>">
					<?=$fieldInfo["NAME"]?>
				</div>
				<div class="input">
					<?
					/* ---------------------------- */
					/* ----------- NAME ----------- */
					/* ---------------------------- */
					if($field == 'NAME'):
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av_corp",
								[
								"NAME"     => 'NAME',
								"TITLE"    => $fieldInfo["NAME"],
								"REQUIRED" => $fieldInfo["IS_REQUIRED"],
								"DISABLED" => $fieldInfo["SETTINGS"]["EDIT_READ_ONLY_FIELD"],
								"VALUE"    => $fieldInfo["VALUE"]
								]
							);
					/* ---------------------------- */
					/* ---------- string ---------- */
					/* ---------------------------- */
					elseif($fieldInfo["TYPE"] == 'S' && $fieldInfo["MULTIPLE"] == 'N'):
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av_corp",
								[
								"NAME"     => $field.'['.$arResult["ELEMENT_ID"].':'.$fieldInfo["ID"].'][VALUE]',
								"TITLE"    => $fieldInfo["NAME"],
								"REQUIRED" => $fieldInfo["IS_REQUIRED"],
								"DISABLED" => $fieldInfo["SETTINGS"]["EDIT_READ_ONLY_FIELD"],
								"VALUE"    => $fieldInfo["VALUE"][0]
								]
							);
					/* ---------------------------- */
					/* ---------- number ---------- */
					/* ---------------------------- */
					elseif($fieldInfo["TYPE"] == 'N' && $fieldInfo["MULTIPLE"] == 'N'):
						$APPLICATION->IncludeComponent
							(
							"av:form.input.number", "av_corp",
								[
								"NAME"     => $field.'['.$arResult["ELEMENT_ID"].':'.$fieldInfo["ID"].'][VALUE]',
								"TITLE"    => $fieldInfo["NAME"],
								"REQUIRED" => $fieldInfo["IS_REQUIRED"],
								"DISABLED" => $fieldInfo["SETTINGS"]["EDIT_READ_ONLY_FIELD"],
								"VALUE"    => $fieldInfo["VALUE"][0]
								]
							);
					/* ---------------------------- */
					/* ----------- list ----------- */
					/* ---------------------------- */
					elseif($fieldInfo["TYPE"] == 'L' && $fieldInfo["MULTIPLE"] == 'N'):
						$APPLICATION->IncludeComponent
							(
							"av:form.select", "av_corp",
								[
								"NAME"        => $field,
								"TITLE"       => $fieldInfo["NAME"],
								"LIST"        => $fieldInfo["LIST_ITEMS"],
								"REQUIRED"    => $fieldInfo["IS_REQUIRED"],
								"DISABLED"    => $fieldInfo["SETTINGS"]["EDIT_READ_ONLY_FIELD"],
								"EMPTY_TITLE" => GetMessage("AVCTL_FIELDS_LIST_EMPTY_VALUE"),
								"VALUE"       => $fieldInfo["VALUE"][0]
								]
							);
					/* ---------------------------- */
					/* ----------- html ----------- */
					/* ---------------------------- */
					?>
					<?elseif($fieldInfo["TYPE"] == 'S:HTML'):?>
						<?if($fieldInfo["SETTINGS"]["EDIT_READ_ONLY_FIELD"] == 'Y'):?>
							<?=$fieldInfo["VALUE"][0]?>
						<?else:?>
							<?$inputName = $field.'['.$arResult["ELEMENT_ID"].':'.$fieldInfo["ID"].'][VALUE][TEXT]'?>
							<input type="hidden" name="<?=$inputName?>" value="html">
							<?
							(new CHTMLEditor)->show
								([
								"name"                       => $inputName,
								"inputName"                  => $inputName,
								"id"                         => 'id_'.$field.'__'.$arResult["ELEMENT_ID"].':'.$fieldInfo["ID"].'_',
								"width"                      => '100%',
								"height"                     => '200px',
								"content"                    => $fieldInfo["VALUE"][0],
								"useFileDialogs"             => false,
								"minBodyWidth"               => 150,
								"normalBodyWidth"            => 150,
								"bAllowPhp"                  => false,
								"limitPhpAccess"             => false,
								"showTaskbars"               => false,
								"showNodeNavi"               => false,
								"beforeUnloadHandlerAllowed" => false,
								"askBeforeUnloadPage"        => false,
								"bbCode"                     => false,
								"siteId"                     => SITE_ID,
								"autoResize"                 => false,
								"saveOnBlur"                 => true,
								"actionUrl"                  => '/bitrix/tools/html_editor_action.php',
								"controlsMap"                =>
									[
									["id"        => 'Bold',          "compact" => true,  "sort" => 80],
									["id"        => 'Italic',        "compact" => true,  "sort" => 90],
									["id"        => 'Underline',     "compact" => true,  "sort" => 100],
									["id"        => 'Strikeout',     "compact" => true,  "sort" => 110],
									["id"        => 'RemoveFormat',  "compact" => true,  "sort" => 120],
									["separator" => true,            "compact" => false, "sort" => 145],
									["id"        => 'OrderedList',   "compact" => true,  "sort" => 150],
									["id"        => 'UnorderedList', "compact" => true,  "sort" => 160],
									["id"        => 'AlignList',     "compact" => false, "sort" => 190],
									["separator" => true,            "compact" => false, "sort" => 200],
									["id"        => 'InsertLink',    "compact" => true,  "sort" => 210],
									["id"        => 'InsertImage',   "compact" => false, "sort" => 220],
									["id"        => 'InsertTable',   "compact" => false, "sort" => 250]
									]
								]);
							?>
						<?endif?>
					<?endif?>
				</div>
			</div>
			<?endforeach?>
		</div>
		<?endforeach?>
	</div>
	<?
	/* ------------------------------------------- */
	/* --------------- rights form --------------- */
	/* ------------------------------------------- */
	?>
	<?if(count($arResult["RIGHTS"]) && $arResult["ELEMENT_ID"]):?>
	<div class="form rights">
		<h3>
			<span><?=($arResult["ELEMENT_ID"] ? $arResult["FORM_DATA"]["NAME"] : GetMessage("AVCTL_NEW_ELEMENT_TITLE"))?></span>
			<?if($arResult["CAN_DELETE_ELEMENT"]):?>
			<span class="delete-link"><?=$arResult["IBLOCK"]["ELEMENT_DELETE"]?></span>
			<?endif?>
		</h3>

		<table>
			<?
			IBlockShowRights
				(
				"element",
				$arResult["IBLOCK_ID"],
				$arResult["ELEMENT_ID"],
				"",
				"RIGHTS",
				$arResult["TASKS"],
				$arResult["RIGHTS"],
				true
				);
			?>
		</table>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* --------------- history form -------------- */
	/* ------------------------------------------- */
	?>
	<?if(count($arResult["HISTORY_ELEMENTS"])):?>
	<table class="form history" cellspacing="0">
		<tr>
			<th><?=GetMessage("AVCTL_HISTORY_CREATED_DATE_TITLE")?></th>
			<th><?=GetMessage("AVCTL_HISTORY_CREATED_BY_TITLE")?></th>
			<?foreach($arResult["FIELDS"] as $field => $fieldInfo):?>
			<th><?=$fieldInfo["NAME"]?></th>
			<?endforeach?>
		</tr>
		<?foreach($arResult["HISTORY_ELEMENTS"] as $elementInfo):?>
		<tr>
			<td><?=$elementInfo["DATE_CREATE"]?></td>
			<td>
				<?$userInfo = CUser::GetList($by = "ID", $order = "ASC", ["ID" => $elementInfo["CREATED_BY"], ["FIELDS" => ["ID", "NAME", "LAST_NAME"]]])->GetNext()?>
				<?=$userInfo["NAME"]?> <?=$userInfo["LAST_NAME"]?>
			</td>
			<?foreach($arResult["FIELDS"] as $field => $fieldInfo):?>
			<td>
				<?if($elementInfo[$field] == 'cleared_value'):?><i><?=GetMessage("AVCTL_HISTORY_VALUE_CLEARED")?></i>
				<?else:?><?=htmlspecialchars_decode(strip_tags(implode('<br>', $elementInfo[$field])))?>
				<?endif?>
			</td>
			<?endforeach?>
		</tr>
		<?endforeach?>
	</table>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ----------------- buttons ----------------- */
	/* ------------------------------------------- */
	?>
	<div class="buttons-row">
		<?if($arResult["EDIT_ACCESS"]):?>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp",
					[
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'save',
					"TITLE"       => GetMessage("AVCTL_BUTTONS_SAVE_NAME"),
					"PLACEHOLDER" => GetMessage("AVCTL_BUTTONS_SAVE_TITLE")
					]
				);
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp_alt",
					[
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'apply',
					"TITLE"       => GetMessage("AVCTL_BUTTONS_APPLY_NAME"),
					"PLACEHOLDER" => GetMessage("AVCTL_BUTTONS_APPLY_TITLE")
					]
				);
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp_alt4",
					[
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arResult["LIST_URL"],
					"TITLE"       => GetMessage("AVCTL_BUTTONS_CANCEL_NAME"),
					"PLACEHOLDER" => GetMessage("AVCTL_BUTTONS_CANCEL_TITLE")
					]
				);
			?>
		<?else:?>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp_alt",
					[
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arResult["LIST_URL"],
					"TITLE"       => GetMessage("AVCTL_BUTTONS_BACK_NAME"),
					"PLACEHOLDER" => GetMessage("AVCTL_BUTTONS_BACK_TITLE")
					]
				);
			?>
		<?endif?>
	</div>
</form>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- delete form ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["CAN_DELETE_ELEMENT"]):?>
<form
	action="<?=$APPLICATION->GetCurPage(false).(count($_GET) ? '?' : '').http_build_query($_GET)?>"
	method="post"
	class="av-cargo-traffic-light-item-form-delete"
>
	<?=bitrix_sessid_post()?>
	<h3><?=GetMessage("AVCTL_DELETE_ELEMENT_TITLE")?></h3>
	<div>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av_corp",
				[
				"BUTTON_TYPE" => 'button',
				"NAME"        => 'delete',
				"TITLE"       => GetMessage("AVCTL_DELETE_ELEMENT_APPLY")
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av_corp_alt",
				[
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AVCTL_DELETE_ELEMENT_CANCEL"),
				"ATTR"        => 'data-cancel-button'
				]
			);
		?>
	</div>
</form>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AVCTL_FORM_VALIDATION_ALERT": '<?=GetMessage("AVCTL_FORM_VALIDATION_ALERT")?>'});
</script>