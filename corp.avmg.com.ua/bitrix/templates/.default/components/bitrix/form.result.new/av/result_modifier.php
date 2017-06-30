<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["FIELDS"] = [];
foreach($arResult["QUESTIONS"] as $fieldCode => $question)
	{
	if($question["STRUCTURE"][0]["FIELD_TYPE"] == 'hidden')
		$arResult["FORM_HEADER"] .= $question["HTML_CODE"];
	else
		foreach($question["STRUCTURE"] as $field)
			{
			$listTypeProp = in_array($field["FIELD_TYPE"], ["radio", "dropdown", "checkbox", "multiselect"]) ? true : false;
			if(!$arResult["FIELDS"][$fieldCode])
				{
				$inputName = $listTypeProp ? 'form_'.$field["FIELD_TYPE"].'_'.$fieldCode : 'form_'.$field["FIELD_TYPE"].'_'.$field["ID"];
				$arResult["FIELDS"][$fieldCode] =
					[
					"NAME"       => $inputName,
					"TYPE"       => $field["FIELD_TYPE"],
					"VALUE"      => $arResult["arrVALUES"][$inputName],
					"TITLE"      => $question["CAPTION"],
					"REQUIRED"   => $question["REQUIRED"],
					"VALIDATORS" => CFormValidator::GetList($field["FIELD_ID"])->arResult
					];
				}
			if($listTypeProp)
				$arResult["FIELDS"][$fieldCode]["LIST"][$field["ID"]] = $field["MESSAGE"];
			}
	}
?>