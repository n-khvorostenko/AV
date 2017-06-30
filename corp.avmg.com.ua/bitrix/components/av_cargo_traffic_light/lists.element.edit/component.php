<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!CModule::IncludeModule('lists'))                             return ShowError(GetMessage("CC_BLEE_MODULE_NOT_INSTALLED"));

require_once($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/iblock/admin_tools.php');
$APPLICATION->AddHeadScript("/bitrix/js/iblock/iblock_edit.js");
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$arResult["IBLOCK_TYPE"] = $arParams["~IBLOCK_TYPE_ID"];
$arResult["IBLOCK_ID"]   = intval($arParams["~IBLOCK_ID"]);
$arResult["ELEMENT_ID"]  = intval($arParams["~ELEMENT_ID"]);
$arResult["SECTION_ID"]  = intval($arParams["~SECTION_ID"]);

$socnetGroupId     = intval($arParams["~SOCNET_GROUP_ID"]);
$socnetGroupClosed = false;
$listPermissions   = CListPermissions::CheckAccess($USER, $arResult["IBLOCK_TYPE"], $arResult["IBLOCK_ID"], $socnetGroupId);

if($socnetGroupId && CModule::IncludeModule("socialnetwork"))
	{
	$arSonetGroup = CSocNetGroup::GetByID($socnetGroupId);
	if
		(
		is_array($arSonetGroup) && $arSonetGroup["CLOSED"] == 'Y' && !CSocNetUser::IsCurrentUserModuleAdmin()
		&&
		($arSonetGroup["OWNER_ID"] != $USER->GetID() || COption::GetOptionString("socialnetwork", "work_with_closed_groups", "N") != 'Y')
		)
	$socnetGroupClosed = true;
	}


if($listPermissions < 0)
	switch($listPermissions)
		{
		case CListPermissions::WRONG_IBLOCK_TYPE:
			ShowError(GetMessage("CC_BLEE_WRONG_IBLOCK_TYPE"));
			return;
		case CListPermissions::WRONG_IBLOCK:
			ShowError(GetMessage("CC_BLEE_WRONG_IBLOCK"));
			return;
		case CListPermissions::LISTS_FOR_SONET_GROUP_DISABLED:
			ShowError(GetMessage("CC_BLEE_LISTS_FOR_SONET_GROUP_DISABLED"));
			return;
		default:
			ShowError(GetMessage("CC_BLEE_UNKNOWN_ERROR"));
			return;
		}
elseif
	(
		($arResult["ELEMENT_ID"]  && $listPermissions < CListPermissions::CAN_READ && !CIBlockElementRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"], "element_read"))
	||
		(!$arResult["ELEMENT_ID"] && $listPermissions < CListPermissions::CAN_READ && !CIBlockSectionRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["SECTION_ID"], "section_element_bind"))
	)
	{
	ShowError(GetMessage("CC_BLEE_ACCESS_DENIED"));
	return;
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ rights ------------------------------ */
/* -------------------------------------------------------------------- */
$arParams["CAN_EDIT"] =
	!$socnetGroupClosed
	&&
		(
			(
			$arResult["ELEMENT_ID"]
			&&
			($listPermissions >= CListPermissions::CAN_WRITE || CIBlockElementRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"], "element_edit"))
			)
		||
			(
			!$arResult["ELEMENT_ID"]
			&&
			($listPermissions >= CListPermissions::CAN_WRITE || CIBlockSectionRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["SECTION_ID"], "section_element_bind"))
			)
		);

$arResult["CAN_EDIT_RIGHTS"] =
	!$socnetGroupClosed
	&&
		(
			($arResult["ELEMENT_ID"]  && CIBlockElementRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"], "element_rights_edit"))
		||
			(!$arResult["ELEMENT_ID"] && CIBlockSectionRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["SECTION_ID"], "element_rights_edit"))
		);

$arResult["CAN_ADD_ELEMENT"]    = !$socnetGroupClosed &&                            ($listPermissions >  CListPermissions::CAN_READ  || CIBlockSectionRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["SECTION_ID"], "section_element_bind"));
$arResult["CAN_DELETE_ELEMENT"] = !$socnetGroupClosed && $arResult["ELEMENT_ID"] && ($listPermissions >= CListPermissions::CAN_WRITE || CIBlockElementRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"], "element_delete"));
$arResult["CAN_FULL_EDIT"]      = !$socnetGroupClosed && $arResult["ELEMENT_ID"] && ($listPermissions >= CListPermissions::IS_ADMIN  ||        CIBlockRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["IBLOCK_ID"],  "iblock_edit"));

$arIBlock = CIBlock::GetArrayByID(intval($arParams["~IBLOCK_ID"]));
$arResult["IBLOCK"] = htmlspecialcharsex($arIBlock);
$arResult["IBLOCK_ID"] = $arIBlock["ID"];

$arResult["GRID_ID"] = "lists_list_elements_".$arResult["IBLOCK_ID"];
if ($arResult["ELEMENT_ID"])
	$arResult["FORM_ID"] = "lists_element_edit_".$arResult["IBLOCK_ID"];
else
	$arResult["FORM_ID"] = "lists_element_add_".$arResult["IBLOCK_ID"];

$arResult["~LISTS_URL"] = str_replace(
	array("#group_id#"),
	array($socnetGroupId),
	$arParams["~LISTS_URL"]
);
$arResult["LISTS_URL"] = htmlspecialcharsbx($arResult["~LISTS_URL"]);

$arResult["~LIST_URL"] = CHTTP::urlAddParams(str_replace(
	array("#list_id#", "#section_id#", "#group_id#"),
	array($arResult["IBLOCK_ID"], 0, $socnetGroupId),
	$arParams["~LIST_URL"]
), array("list_section_id" => ""));
$arResult["LIST_URL"] = htmlspecialcharsbx($arResult["~LIST_URL"]);

$arResult["~LIST_SECTION_URL"] = str_replace(
	array("#list_id#", "#section_id#", "#group_id#"),
	array($arResult["IBLOCK_ID"], intval($arParams["~SECTION_ID"]), $socnetGroupId),
	$arParams["~LIST_URL"]
);
if(isset($_GET["list_section_id"]) && strlen($_GET["list_section_id"]) == 0)
	$arResult["~LIST_SECTION_URL"] = CHTTP::urlAddParams($arResult["~LIST_SECTION_URL"], array("list_section_id" => ""));

$arResult["LIST_SECTION_URL"] = htmlspecialcharsbx($arResult["~LIST_SECTION_URL"]);

if($arResult["ELEMENT_ID"])
{
	$copy_id = 0;
	$arResult["LIST_COPY_ELEMENT_URL"] = CHTTP::urlAddParams(str_replace(
			array("#list_id#", "#section_id#", "#element_id#", "#group_id#"),
			array($arResult["IBLOCK_ID"], intval($arResult["SECTION_ID"]), 0, $socnetGroupId),
			$arParams["~LIST_ELEMENT_URL"]
		),
		array("copy_id" => $arResult["ELEMENT_ID"]),
		array("skip_empty" => true, "encode" => true)
	);
	if(isset($_GET["list_section_id"]) && strlen($_GET["list_section_id"]) == 0)
		$arResult["LIST_COPY_ELEMENT_URL"] = CHTTP::urlAddParams($arResult["LIST_COPY_ELEMENT_URL"], array("list_section_id" => ""));
}
else
{
	if (isset($_REQUEST["copy_id"]) && $_REQUEST["copy_id"] > 0)
		$copy_id = intval($_REQUEST["copy_id"]);
}

$arResult["COPY_ID"] = $copy_id;

$obList = new CList($arIBlock["ID"]);

$arResult["FIELDS"] = $obList->GetFields();
if(CModule::IncludeModule("bizproc") && CBPRuntime::isFeatureEnabled() && $arIBlock["BIZPROC"] != 'N')
	$arSelect = array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "CREATED_BY", "BP_PUBLISHED");
else
	$arSelect = array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID");

$arProps = array();
foreach($arResult["FIELDS"] as $FIELD_ID => $arField)
{
	$arResult["FIELDS"][$FIELD_ID]["~NAME"] = $arResult["FIELDS"][$FIELD_ID]["NAME"];
	$arResult["FIELDS"][$FIELD_ID]["NAME"] = htmlspecialcharsbx($arResult["FIELDS"][$FIELD_ID]["NAME"]);

	if($obList->is_field($FIELD_ID))
		$arSelect[] = $FIELD_ID;
	else
		$arProps[] = $FIELD_ID;

	if($FIELD_ID == "CREATED_BY")
		$arSelect[] = "CREATED_USER_NAME";

	if($FIELD_ID == "MODIFIED_BY")
		$arSelect[] = "USER_NAME";
}

$rsElement = CIBlockElement::GetList
	(
	[],
		[
		"IBLOCK_ID" => $arResult["IBLOCK_ID"],
		"=ID"       => $copy_id ? $copy_id : $arResult["ELEMENT_ID"],
		"SHOW_NEW"  => $arResult["CAN_FULL_EDIT"] ? 'Y' : 'N'
		],
	false, false, $arSelect
	);
$arResult["ELEMENT"] = $rsElement->GetNextElement();

if(is_object($arResult["ELEMENT"]))
	$arResult["ELEMENT_FIELDS"] = $arResult["ELEMENT"]->GetFields();
else
	$arResult["ELEMENT_FIELDS"] = array();

if(is_object($arResult["ELEMENT"]) && !$copy_id)
	$arResult["ELEMENT_ID"] = intval($arResult["ELEMENT_FIELDS"]["ID"]);
else
	$arResult["ELEMENT_ID"] = 0;

$arResult["ELEMENT_PROPS"] = array();
if(is_object($arResult["ELEMENT"]) && count($arProps))
{
	$rsProperties = CIBlockElement::GetProperty(
		$arResult["IBLOCK_ID"],
		$copy_id? $copy_id: $arResult["ELEMENT_ID"],
		array(
			"sort"=>"asc",
			"id"=>"asc",
			"enum_sort"=>"asc",
			"value_id"=>"asc",
		),
		array(
			"ACTIVE"=>"Y",
			"EMPTY"=>"N",
		)
	);
	while($arProperty = $rsProperties->Fetch())
	{
		$prop_id = $arProperty["ID"];
		if(!array_key_exists($prop_id, $arResult["ELEMENT_PROPS"]))
		{
			$arResult["ELEMENT_PROPS"][$prop_id] = $arProperty;
			unset($arResult["ELEMENT_PROPS"][$prop_id]["DESCRIPTION"]);
			unset($arResult["ELEMENT_PROPS"][$prop_id]["VALUE_ENUM_ID"]);
			unset($arResult["ELEMENT_PROPS"][$prop_id]["VALUE_ENUM"]);
			unset($arResult["ELEMENT_PROPS"][$prop_id]["VALUE_XML_ID"]);
			$arResult["ELEMENT_PROPS"][$prop_id]["FULL_VALUES"] = array();
			$arResult["ELEMENT_PROPS"][$prop_id]["VALUES_LIST"] = array();
		}

		$arResult["ELEMENT_PROPS"][$prop_id]["FULL_VALUES"][$arProperty["PROPERTY_VALUE_ID"]] = array(
			"VALUE" => $arProperty["VALUE"],
			"DESCRIPTION" => $arProperty["DESCRIPTION"],
		);
		$arResult["ELEMENT_PROPS"][$prop_id]["VALUES_LIST"][$arProperty["PROPERTY_VALUE_ID"]] = $arProperty["VALUE"];
	}
}

$arSection = false;
if($arResult["SECTION_ID"])
{
	$rsSection = CIBlockSection::GetList(array(), array(
		"IBLOCK_ID" => $arIBlock["ID"],
		"ID" => $arResult["SECTION_ID"],
		"GLOBAL_ACTIVE" => "Y",
		"CHECK_PERMISSIONS" => "N",
	));
	$arSection = $rsSection->GetNext();
}
$arResult["SECTION"] = $arSection;
if($arResult["SECTION"])
{
	$arResult["SECTION_ID"] = $arResult["SECTION"]["ID"];
	$arResult["SECTION_PATH"] = array();
	$rsPath = CIBlockSection::GetNavChain($arResult["IBLOCK_ID"], $arResult["SECTION_ID"]);
	while($arPath = $rsPath->Fetch())
	{
		$arResult["SECTION_PATH"][] = array(
			"NAME" => htmlspecialcharsex($arPath["NAME"]),
			"URL" => str_replace(
					array("#list_id#", "#section_id#", "#group_id#"),
					array($arIBlock["ID"], intval($arPath["ID"]), $socnetGroupId),
					$arParams["LIST_URL"]
			),
		);
	}
}
else
{
	$arResult["SECTION_ID"] = false;
}


$tab_name = $arResult["FORM_ID"]."_active_tab";

//Assume there was no error
$bVarsFromForm = false;
$arResult["LIST_UNIQUE_ETYPE"] = array('E:ECrm');
/* -------------------------------------------------------------------- */
/* -------------------------- form submitted -------------------------- */
/* -------------------------------------------------------------------- */
if
	(
	$_SERVER["REQUEST_METHOD"] == 'POST' && check_bitrix_sessid() && !$socnetGroupClosed
	&&
		(
		$arParams["CAN_EDIT"]
		||
		($arResult["ELEMENT_ID"] && CIBlockElementRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"], "element_delete"))
		)
	)
	{
	$obList->ActualizeDocumentAdminPage(str_replace(["#list_id#", "#group_id#"], [$arResult["IBLOCK_ID"], $socnetGroupId], $arParams["~LIST_ELEMENT_URL"]));
	/* ------------------------------------------- */
	/* ----------------- delete ------------------ */
	/* ------------------------------------------- */
	if($arResult["ELEMENT_ID"] && isset($_POST["delete"]))
		{
		if($listPermissions >= CListPermissions::CAN_WRITE || CIBlockElementRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"], "element_delete"))
			{
			$DB->StartTransaction();
			$APPLICATION->ResetException();
			$obElement = new CIBlockElement;
			if(!$obElement->Delete($arResult["ELEMENT_ID"]))
				{
				$DB->Rollback();
				ShowError(GetMessage("CC_BLEE_DELETE_ERROR").' '.($APPLICATION->GetException() ? $APPLICATION->GetException()->GetString() : GetMessage("CC_BLEE_UNKNOWN_ERROR")));
				$bVarsFromForm = true;
				}
			else
				{
				$DB->Commit();
				LocalRedirect($arResult["~LIST_SECTION_URL"]);
				}
			}
		else
			{
			ShowError(GetMessage("CC_BLEE_DELETE_ERROR").' '.GetMessage("CC_BLEE_UNKNOWN_ERROR"));
			$bVarsFromForm = true;
			LocalRedirect($arResult["~LIST_SECTION_URL"]);
			}
		}
	/* ------------------------------------------- */
	/* ------------------ edit ------------------- */
	/* ------------------------------------------- */
	elseif((isset($_POST["save"]) || isset($_POST["apply"])) && $arParams["CAN_EDIT"])
		{
		$strError  = [];
		$arElement =
			[
			"IBLOCK_ID"         => $arResult["IBLOCK_ID"],
			"IBLOCK_SECTION_ID" => $_POST["IBLOCK_SECTION_ID"],
			"NAME"              => $_POST["NAME"],
			"MODIFIED_BY"       => $USER->GetID()
			];
		/* ---------------------------- */
		/* ---------- fields ---------- */
		/* ---------------------------- */
		unset($arResult["FIELDS"]["MODIFIED_BY"], $arResult["FIELDS"]["TIMESTAMP_X"]);
		foreach($arResult["FIELDS"] as $FIELD_ID => $arField)
			{
			// picture
			if($FIELD_ID == 'PREVIEW_PICTURE' || $FIELD_ID == 'DETAIL_PICTURE')
				{
				$arElement[$FIELD_ID] = $_FILES[$FIELD_ID];
				if(isset($_POST[$FIELD_ID.'_del']) && $_POST[$FIELD_ID.'_del'] == 'Y') $arElement[$FIELD_ID]["del"] = 'Y';
				}
			// preview/detail text
			elseif($FIELD_ID == 'PREVIEW_TEXT' || $FIELD_ID == 'DETAIL_TEXT')
				{
				if(isset($arField["SETTINGS"]) && is_array($arField["SETTINGS"]) && $arField["SETTINGS"]["USE_EDITOR"] == 'Y') $arElement[$FIELD_ID.'_TYPE'] = 'html';
				else                                                                                                           $arElement[$FIELD_ID.'_TYPE'] = 'text';
				$arElement[$FIELD_ID] = $_POST[$FIELD_ID];
				}
			elseif($obList->is_field($FIELD_ID))
				$arElement[$FIELD_ID] = $_POST[$FIELD_ID];
			// file
			elseif($arField["PROPERTY_TYPE"] == 'F')
				{
				$arDel                                        = isset($_POST[$FIELD_ID."_del"]) ? $_POST[$FIELD_ID."_del"] : [];
				$arElement["PROPERTY_VALUES"][$arField["ID"]] = [];
				CFile::ConvertFilesToPost($_FILES[$FIELD_ID], $arElement["PROPERTY_VALUES"][$arField["ID"]]);
				foreach($arElement["PROPERTY_VALUES"][$arField["ID"]] as $file_id => $arFile)
					if
						(
						isset($arDel[$file_id])
						&&
							(
								(!is_array($arDel[$file_id]) && $arDel[$file_id] == 'Y')
							||
								(is_array($arDel[$file_id]) && $arDel[$file_id]["VALUE"] == 'Y'))
							)
						{
						if(!$arFile["VALUE"]["error"]) continue;
						if(isset($arElement["PROPERTY_VALUES"][$arField["ID"]][$file_id]["VALUE"])) $arElement["PROPERTY_VALUES"][$arField["ID"]][$file_id]["VALUE"]["del"] = 'Y';
						else                                                                        $arElement["PROPERTY_VALUES"][$arField["ID"]][$file_id]["del"]          = 'Y';
						}
				}
			// number
			elseif($arField["PROPERTY_TYPE"] == 'N')
				{
				$arElement["PROPERTY_VALUES"][$arField["ID"]] = [];
				if(!is_array($_POST[$FIELD_ID])) $_POST[$FIELD_ID] = [$_POST[$FIELD_ID]];

				foreach(is_array($_POST[$FIELD_ID]) ? $_POST[$FIELD_ID] : [$_POST[$FIELD_ID]] as $valueArray)
					{
					$value = 0;
					if(is_array($valueArray))   $value = $valueArray["VALUE"];
					elseif(strlen($valueArray)) $value = $valueArray;
					if(!$value) continue;

					$value = str_replace(" ", "", str_replace(",", ".", $value));
					if(!is_numeric($value)) $strError[] = GetMessage('CC_BLEE_VALIDATE_FIELD_ERROR', ['#NAME#'=>$arField['NAME']]);
					$arElement["PROPERTY_VALUES"][$arField["ID"]][] = doubleval($value);
					}
				}
			// other
			else
				$arElement["PROPERTY_VALUES"][$arField["ID"]] = $_POST[$FIELD_ID];
			}
		/* ---------------------------- */
		/* -------- rights mode ------- */
		/* ---------------------------- */
		if($arResult["IBLOCK"]["RIGHTS_MODE"] === 'E' && $arResult["CAN_EDIT_RIGHTS"])
			{
			$arElement["RIGHTS"] = [];
			$postRights          = is_array($_POST["RIGHTS"]) ? CIBlockRights::Post2Array($_POST["RIGHTS"]) : [];
			$rightsObj           = $arResult["ELEMENT_ID"]
				? new CIBlockElementRights($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"])
				: new CIBlockSectionRights($arResult["IBLOCK_ID"], $arResult["SECTION_ID"]);

			foreach($rightsObj->GetRights() as $rightId => $right)
				if(array_key_exists($rightId, $postRights))
					$arElement["RIGHTS"][$rightId] = $right;
			foreach($postRights as $rightId => $right)
				$arElement["RIGHTS"][$rightId] = $right;
			}
		/* ---------------------------- */
		/* ---------- saving ---------- */
		/* ---------------------------- */
		if(!count($strError))
			{
			$obElement = new CIBlockElement;

			if($arResult["ELEMENT_ID"])
				{
				$updateResult = $obElement->Update($arResult["ELEMENT_ID"], $arElement, true, true, true);
				if(!$updateResult) $strError[] = $obElement->LAST_ERROR;
				}
			else
				{
				$creatingResult = $obElement->Add($arElement, true, true, true);
				if($creatingResult) $arResult["ELEMENT_ID"] = $creatingResult;
				else                $strError[] = $obElement->LAST_ERROR;
				}
			}
		/* ---------------------------- */
		/* ---------- success --------- */
		/* ---------------------------- */
		if(!count($strError))
			{
			if
				(
				isset($_POST["save"])
				||
					(
					$listPermissions < CListPermissions::CAN_READ
					&&
					!CIBlockElementRights::UserHasRightTo($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"], "element_read")
					)
				)
				LocalRedirect($arResult["~LIST_SECTION_URL"]);
			else
				{
				$url = CHTTP::urlAddParams
					(
					str_replace
						(
						["#list_id#", "#section_id#", "#element_id#", "#group_id#"],
						[$arResult["IBLOCK_ID"], intval($_POST["IBLOCK_SECTION_ID"]), $arResult["ELEMENT_ID"], $socnetGroupId],
						$arParams["~LIST_ELEMENT_URL"]
						),
					[$tab_name => $_POST[$tab_name]],
					["skip_empty" => true, "encode" => true]
				);
				if(isset($_GET["list_section_id"]) && strlen($_GET["list_section_id"]) == 0)
					$url = CHTTP::urlAddParams($url, ["list_section_id" => '']);
				LocalRedirect($url);
				}
			}
		/* ---------------------------- */
		/* ---------- failed ---------- */
		/* ---------------------------- */
		else
			{
			ShowError(implode('<br>', $strError));
			$bVarsFromForm = true;
			}
		}
	else
	{
		//Go to list section page
		LocalRedirect($arResult["~LIST_SECTION_URL"]);
	}
}

$arResult["ELEMENT_URL"] = str_replace(
	array("#list_id#", "#section_id#", "#element_id#", "#group_id#"),
	array($arResult["IBLOCK_ID"], intval($arParams["~SECTION_ID"]), $arResult["ELEMENT_ID"], $socnetGroupId),
	$arParams["LIST_ELEMENT_URL"]
);

$data = array();
if($bVarsFromForm)
{//There was an error so display form values
	$data["NAME"] = $_POST["NAME"];
	$data["IBLOCK_SECTION_ID"] = $_POST["IBLOCK_SECTION_ID"];
}
elseif($arResult["ELEMENT_ID"] || $copy_id)
{//Edit existing field
	$data["NAME"] = $arResult["ELEMENT_FIELDS"]["NAME"];
	$data["IBLOCK_SECTION_ID"] = $arResult["ELEMENT_FIELDS"]["IBLOCK_SECTION_ID"];
}
else
{//New one
	$data["NAME"] = GetMessage("CC_BLEE_FIELD_NAME_DEFAULT");
	$data["IBLOCK_SECTION_ID"] = $arResult["SECTION_ID"]? $arResult["SECTION_ID"]: "";
}

foreach($arResult["FIELDS"] as $FIELD_ID => $arField)
{
	if($obList->is_field($FIELD_ID))
	{
		if($FIELD_ID == "ACTIVE_FROM")
		{
			if($bVarsFromForm)
				$data[$FIELD_ID] = $_POST[$FIELD_ID];
			elseif($arResult["ELEMENT_ID"])
				$data[$FIELD_ID] = $arResult["ELEMENT_FIELDS"]["~".$FIELD_ID];
			elseif($arField["DEFAULT_VALUE"] === "=now")
				$data[$FIELD_ID] = ConvertTimeStamp(time()+CTimeZone::GetOffset(), "FULL");
			elseif($arField["DEFAULT_VALUE"] === "=today")
				$data[$FIELD_ID] = ConvertTimeStamp(time()+CTimeZone::GetOffset(), "SHORT");
			else
				$data[$FIELD_ID] = "";
		}
		elseif($FIELD_ID == "PREVIEW_PICTURE" || $FIELD_ID == "DETAIL_PICTURE")
		{
			if($arResult["ELEMENT_ID"])
				$data[$FIELD_ID] = $arResult["ELEMENT_FIELDS"]["~".$FIELD_ID];
			else
				$data[$FIELD_ID] = "";
		}
		else
		{
			if($bVarsFromForm)
				$data[$FIELD_ID] = $_POST[$FIELD_ID];
			elseif($arResult["ELEMENT_ID"] || $copy_id)
				$data[$FIELD_ID] = $arResult["ELEMENT_FIELDS"]["~".$FIELD_ID];
			else
				$data[$FIELD_ID] = $arField["DEFAULT_VALUE"];
		}
	}
	elseif(is_array($arField["PROPERTY_USER_TYPE"]) && array_key_exists("GetPublicEditHTML", $arField["PROPERTY_USER_TYPE"]))
	{
		if($bVarsFromForm)
		{
			$data[$FIELD_ID] = $_POST[$FIELD_ID];
		}
		elseif($arResult["ELEMENT_ID"] || $copy_id)
		{
			if(isset($arResult["ELEMENT_PROPS"][$arField["ID"]]))
			{
				$data[$FIELD_ID] = $arResult["ELEMENT_PROPS"][$arField["ID"]]["FULL_VALUES"];
				if($arField["MULTIPLE"] == "Y")
					$data[$FIELD_ID]["n0"] = array("VALUE" => "", "DESCRIPTION" => "");
			}
			else
			{
				$data[$FIELD_ID]["n0"] = array("VALUE" => "", "DESCRIPTION" => "");
			}
		}
		else
		{
			$data[$FIELD_ID] = array(
				"n0" => array(
					"VALUE" => $arField["DEFAULT_VALUE"],
					"DESCRIPTION" => "",
				)
			);
		}
	}
	elseif($arField["PROPERTY_TYPE"] == "L")
	{
		if($bVarsFromForm)
		{
			$data[$FIELD_ID] = $_POST[$FIELD_ID];
		}
		elseif($arResult["ELEMENT_ID"] || $copy_id)
		{
			if(isset($arResult["ELEMENT_PROPS"][$arField["ID"]]))
				$data[$FIELD_ID] = $arResult["ELEMENT_PROPS"][$arField["ID"]]["VALUES_LIST"];
			else
				$data[$FIELD_ID] = array();
		}
		else
		{
			$data[$FIELD_ID] = array();
			$prop_enums = CIBlockProperty::GetPropertyEnum($arField["ID"]);
			while($ar_enum = $prop_enums->Fetch())
				if($ar_enum["DEF"] == "Y")
					$data[$FIELD_ID][] =$ar_enum["ID"];
		}
	}
	elseif($arField["PROPERTY_TYPE"] == "F")
	{
		if($arResult["ELEMENT_ID"])
		{
			if(isset($arResult["ELEMENT_PROPS"][$arField["ID"]]))
			{
				$data[$FIELD_ID] = $arResult["ELEMENT_PROPS"][$arField["ID"]]["FULL_VALUES"];
				if($arField["MULTIPLE"] == "Y")
					$data[$FIELD_ID]["n0"] = array("VALUE" => $arField["DEFAULT_VALUE"], "DESCRIPTION" => "");
			}
			else
			{
				$data[$FIELD_ID]["n0"] = array("VALUE" => $arField["DEFAULT_VALUE"], "DESCRIPTION" => "");
			}
		}
		else
		{
			$data[$FIELD_ID] = array(
				"n0" => array("VALUE" => $arField["DEFAULT_VALUE"], "DESCRIPTION" => ""),
			);
		}
	}
	elseif($arField["PROPERTY_TYPE"] == "G" || $arField["PROPERTY_TYPE"] == "E")
	{
		if($bVarsFromForm)
		{
			$data[$FIELD_ID] = $_POST[$FIELD_ID];
		}
		elseif($arResult["ELEMENT_ID"] || $copy_id)
		{
			if(isset($arResult["ELEMENT_PROPS"][$arField["ID"]]))
				$data[$FIELD_ID] = $arResult["ELEMENT_PROPS"][$arField["ID"]]["VALUES_LIST"];
			else
				$data[$FIELD_ID] = array();
		}
		else
		{
			$data[$FIELD_ID] = array($arField["DEFAULT_VALUE"]);
		}
	}
	else//if($arField["PROPERTY_TYPE"] == "S" || $arField["PROPERTY_TYPE"] == "N")
	{
		if($bVarsFromForm)
		{
			$data[$FIELD_ID] = $_POST[$FIELD_ID];
		}
		elseif($arResult["ELEMENT_ID"] || $copy_id)
		{
			if(isset($arResult["ELEMENT_PROPS"][$arField["ID"]]))
			{
				$data[$FIELD_ID] = $arResult["ELEMENT_PROPS"][$arField["ID"]]["FULL_VALUES"];
				if($arField["MULTIPLE"] == "Y")
					$data[$FIELD_ID]["n0"] = array("VALUE" => "", "DESCRIPTION" => "");
			}
			else
			{
				$data[$FIELD_ID]["n0"] = array("VALUE" => "", "DESCRIPTION" => "");
			}
		}
		else
		{
			$data[$FIELD_ID] = array(
				"n0" => array("VALUE" => $arField["DEFAULT_VALUE"], "DESCRIPTION" => ""),
			);
			if($arField["MULTIPLE"] == "Y")
			{
				if(is_array($arField["DEFAULT_VALUE"]) || strlen($arField["DEFAULT_VALUE"]))
					$data[$FIELD_ID]["n1"] = array("VALUE" => "", "DESCRIPTION" => "");
			}
		}
	}
}

$arResult["LIST_SECTIONS"] = array(
	"" => GetMessage("CC_BLEE_UPPER_LEVEL"),
);
$rsSections = CIBlockSection::GetTreeList(array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "CHECK_PERMISSIONS"=>"N"));
while($arSection = $rsSections->Fetch())
	$arResult["LIST_SECTIONS"][$arSection["ID"]] = str_repeat(" . ", $arSection["DEPTH_LEVEL"]).$arSection["NAME"];

if(
	$arResult["IBLOCK"]["RIGHTS_MODE"] == 'E'
	&& $arResult["CAN_EDIT_RIGHTS"]
)
{
	$arResult["RIGHTS"] = array();
	if($arResult["ELEMENT_ID"])
		$objectRights = new CIBlockElementRights($arResult["IBLOCK_ID"], $arResult["ELEMENT_ID"]);
	else
		$objectRights = new CIBlockSectionRights($arResult["IBLOCK_ID"], intval($data["IBLOCK_SECTION_ID"]));

	$arResult["RIGHTS"] = $objectRights->GetRights(array("parents" => array($data["IBLOCK_SECTION_ID"])));
	$arResult["TASKS"] = CIBlockRights::GetRightsList();
}

$arResult["VARS_FROM_FORM"] = $bVarsFromForm;
$arResult["FORM_DATA"] = array();
foreach($data as $key => $value)
{
	$arResult["FORM_DATA"]["~".$key] = $value;
	if(is_array($value))
	{
		foreach($value as $key1 => $value1)
		{
			if(is_array($value1))
			{
				foreach($value1 as $key2 => $value2)
					if(!is_array($value2))
						$value[$key1][$key2] = htmlspecialcharsbx($value2);
			}
			else
			{
				$value[$key1] = htmlspecialcharsbx($value1);
			}
		}
		$arResult["FORM_DATA"][$key] = $value;
	}
	else
	{
		$arResult["FORM_DATA"][$key] = htmlspecialcharsbx($value);
	}
}

$arResult['RAND_STRING'] = $this->randString();

$this->IncludeComponentTemplate();

if($arResult["ELEMENT_ID"])
	$APPLICATION->SetTitle($arResult["IBLOCK"]["ELEMENT_NAME"].": ".$arResult["ELEMENT_FIELDS"]["NAME"]);
else
	$APPLICATION->SetTitle($arResult["IBLOCK"]["ELEMENT_NAME"]);

$APPLICATION->AddChainItem($arResult["IBLOCK"]["NAME"], $arResult["~LIST_URL"]);
if($arResult["SECTION"])
{
	foreach($arResult["SECTION_PATH"] as $arPath)
	{
		$APPLICATION->AddChainItem($arPath["NAME"], $arPath["URL"]);
	}
}