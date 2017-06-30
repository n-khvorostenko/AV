<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$_POST["iblock_id"] || !$_POST["value"])                    die();

$result = [];

if($_POST["search_type"] == 'section')
	{
	$queryList = CIBlockSection::GetList
		(
		["NAME" => 'ASC'],
			[
			"IBLOCK_ID"  => $_POST["iblock_id"],
			"NAME"       => $_POST["value"].'%',
			"ACTIVE"     => 'Y',
			"SECTION_ID" => $_POST["parent_section"] ? $_POST["parent_section"] : false
			],
		false,
		["nTopCount" => '5'],
		["ID", "NAME"]
		);
	while($queryInfo = $queryList->GetNext()) $result[$queryInfo["ID"]] = $queryInfo["NAME"];
	}
else
	{
	$queryList = CIBlockElement::GetList
		(
		["NAME" => 'ASC'],
			[
			"IBLOCK_ID" => $_POST["iblock_id"],
			"NAME"      => $_POST["value"].'%',
			"ACTIVE"    => 'Y'
			],
		false,
		["nTopCount" => '5'],
		["ID", "NAME"]
		);
	while($queryInfo = $queryList->GetNext()) $result[$queryInfo["ID"]] = $queryInfo["NAME"];
	}

if(!count($result)) $result = [0 => $_POST["empty_value"]];
?>

<?foreach($result as $value => $title):?>
<li value="<?=$value?>"><?=$title?></li>
<?endforeach?>