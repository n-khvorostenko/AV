<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* -------------------------- fields grouping ------------------------- */
/* -------------------------------------------------------------------- */
$fieldsGroups = [];
$arrayIndex   = 1;
$counter      = 0;
foreach($arParams["FILTER"] as $fieldInfo)
	if(!in_array($fieldInfo["id"], ["list_section_id", "TIMESTAMP_X", "CREATED_BY", "MODIFIED_BY"]))
		{
		$fieldSize = 1;
		if(in_array($fieldInfo["id"], ["DATE_CREATE"]) || in_array($fieldInfo["type"], ["number"])) $fieldSize = 2;
		if(($counter + $fieldSize) > 4)
			{
			$arrayIndex++;
			$counter = $fieldSize;
			}
		else
			$counter += $fieldSize;
		$fieldsGroups[$arrayIndex][] = $fieldInfo;
		}
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<form
	class="av-cargo-traffic-light-filter"
	name="filter_<?=$arParams["GRID_ID"]?>"
	method="GET"
	data-avat="cargo-traffic-list-filter"
>
	<?
	/* ------------------------------------------- */
	/* ----------------- GET vars ---------------- */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult["GET_VARS"] as $var => $value):?>
		<?if(is_array($value)):?>
			<?foreach($value as $k => $v):?>
				<?if(!is_array($v)):?>
				<input type="hidden" name="<?=htmlspecialcharsbx($var)?>[<?=htmlspecialcharsbx($k)?>]" value="<?=htmlspecialcharsbx($v)?>">
				<?endif?>
			<?endforeach?>
		<?else:?>
			<input type="hidden" name="<?=htmlspecialcharsbx($var)?>" value="<?=htmlspecialcharsbx($value)?>">
		<?endif?>
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* ------------------- head ------------------ */
	/* ------------------------------------------- */
	?>
	<h3>
		<span class="title<?if(count($arResult["FILTER"])):?> active<?endif?>"><?=GetMessage("AVCTLF_TITLE")?></span>
		<?if(count($fieldsGroups) > 1):?>
		<span
			class="open-button<?if($_COOKIE["AV_CTL_FILTER_CONDITION"] == 'open'):?> active<?endif?>"
			data-avat="slide-button"
		></span>
		<?endif?>
	</h3>
	<?
	/* ------------------------------------------- */
	/* ------------------- body ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="body">
		<?
		/* ---------------------------- */
		/* ---------- fields ---------- */
		/* ---------------------------- */
		?>
		<div>
			<?foreach($fieldsGroups as $index => $group):?>
			<div
				class="fields-row"
				<?if($index != 1 && count($fieldsGroups) > 1 && $_COOKIE["AV_CTL_FILTER_CONDITION"] != 'open'):?>style="display: none"<?endif?>
			>
				<?foreach($group as $fieldInfo):?>
					<?
					/* ---------------- */
					/* ----- NAME ----- */
					/* ---------------- */
					?>
					<?if($fieldInfo["id"] == 'NAME'):?>
						<div class="field-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"av:form.input", "av_corp",
									[
									"NAME"        => 'NAME',
									"TITLE"       => $fieldInfo["name"],
									"PLACEHOLDER" => $fieldInfo["name"],
									"VALUE"       => $arResult["FILTER"]["NAME"]
									]
								);
							?>
						</div>
					<?
					/* ---------------- */
					/* -- DATE CREATE - */
					/* ---------------- */
					?>
					<?elseif($fieldInfo["id"] == 'DATE_CREATE'):?>
						<div class="field-cell double date-interval">
							<div>
								<?
								$APPLICATION->IncludeComponent
									(
									"av:form.input.date", "av_corp",
										[
										"NAME"        => 'DATE_CREATE_from',
										"TITLE"       => $fieldInfo["name"],
										"PLACEHOLDER" => $fieldInfo["name"].': '.GetMessage("AVCTLF_FIELDS_INTERVAL_START"),
										"VALUE"       => $arResult["FILTER"]["DATE_CREATE_from"]
										]
									);
								?>
							</div>
							<div>...</div>
							<div>
								<?
								$APPLICATION->IncludeComponent
									(
									"av:form.input.date", "av_corp",
										[
										"NAME"        => 'DATE_CREATE_to',
										"TITLE"       => $fieldInfo["name"],
										"PLACEHOLDER" => GetMessage("AVCTLF_FIELDS_INTERVAL_END"),
										"VALUE"       => $arResult["FILTER"]["DATE_CREATE_to"]
										]
									);
								?>
							</div>
						</div>
					<?
					/* ---------------- */
					/* ---- number ---- */
					/* ---------------- */
					?>
					<?elseif($fieldInfo["type"] == 'number'):?>
						<div class="field-cell double">
							<div>
								<?
								$APPLICATION->IncludeComponent
									(
									"av:form.input.number", "av_corp",
										[
										"NAME"        => $fieldInfo["id"].'_from',
										"TITLE"       => $fieldInfo["name"],
										"PLACEHOLDER" => $fieldInfo["name"].': '.GetMessage("AVCTLF_FIELDS_INTERVAL_START"),
										"VALUE"       => $arResult["FILTER"][$fieldInfo["id"].'_from']
										]
									);
								?>
							</div>
							<div>...</div>
							<div>
								<?
								$APPLICATION->IncludeComponent
									(
									"av:form.input.number", "av_corp",
										[
										"NAME"        => $fieldInfo["id"].'_to',
										"TITLE"       => $fieldInfo["name"],
										"PLACEHOLDER" => GetMessage("AVCTLF_FIELDS_INTERVAL_END"),
										"VALUE"       => $arResult["FILTER"][$fieldInfo["id"].'_to']
										]
									);
								?>
							</div>
						</div>
					<?
					/* ---------------- */
					/* ----- list ----- */
					/* ---------------- */
					?>
					<?elseif($fieldInfo["type"] == 'list'):?>
						<div class="field-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"av:form.select", "av_corp",
									[
									"NAME"  => $fieldInfo["id"].'[]',
									"TITLE" => $fieldInfo["name"],
									"LIST"  => $fieldInfo["items"],
									"VALUE" => $arResult["FILTER"][$fieldInfo["id"]][0]
									]
								);
							?>
						</div>
					<?
					/* ---------------- */
					/*  iblock element  */
					/* ---------------- */
					?>
					<?elseif($fieldInfo["type"] == 'E' && $fieldInfo["value"]["LINK_IBLOCK_ID"]):?>
						<div class="field-cell">
							<?
							if(!isset($list)) $list = [];
							if(!isset($list[$fieldInfo["value"]["LINK_IBLOCK_ID"]]))
								{
								$list[] = [$fieldInfo["value"]["LINK_IBLOCK_ID"]];
								$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $fieldInfo["value"]["LINK_IBLOCK_ID"]], false, false, ["ID", "NAME"]);
								while($queryElement = $queryList->GetNext()) $list[$fieldInfo["value"]["LINK_IBLOCK_ID"]][$queryElement["ID"]] = $queryElement["NAME"];
								}

							$APPLICATION->IncludeComponent
								(
								"av:form.select", "av_corp",
									[
									"NAME"  => $fieldInfo["id"],
									"TITLE" => $fieldInfo["name"],
									"LIST"  => $list[$fieldInfo["value"]["LINK_IBLOCK_ID"]],
									"VALUE" => $arResult["FILTER"][$fieldInfo["id"]]
									]
								);
							?>
						</div>
					<?
					/* ---------------- */
					/* ----- input ---- */
					/* ---------------- */
					?>
					<?else:?>
						<div class="field-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"av:form.input", "av_corp",
									[
									"NAME"        => $fieldInfo["id"],
									"TITLE"       => $fieldInfo["name"],
									"PLACEHOLDER" => $fieldInfo["name"],
									"VALUE"       => $arResult["FILTER"][$fieldInfo["id"]]
									]
								);
							?>
						</div>
					<?endif?>
				<?endforeach?>
			</div>
			<?endforeach?>
		</div>
		<?
		/* ---------------------------- */
		/* ---------- buttons --------- */
		/* ---------------------------- */
		?>
		<div class="buttons-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp",
					[
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'filter',
					"TITLE"       => GetMessage("AVCTLF_BUTTON_APPLY"),
					"PLACEHOLDER" => GetMessage("AVCTLF_BUTTON_APPLY_TITLE"),
					"ATTR"        => ["data-avat" => 'apply-button']
					]
				);
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp_alt2",
					[
					"BUTTON_TYPE" => 'label',
					"TITLE"       => GetMessage("AVCTLF_BUTTON_CANCEL"),
					"PLACEHOLDER" => GetMessage("AVCTLF_BUTTON_CANCEL_TITLE"),
					"ATTR"        =>
						[
						"data-clear-filter" => '',
						"data-avat"         => 'cancel-button'
						]
					]
				);
			?>
		</div>
	</div>
</form>