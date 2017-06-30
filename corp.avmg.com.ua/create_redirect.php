<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$redirectsArray = [];
$queryList = CIBlockElement::GetList([], ["IBLOCK_ID" => 58], false, false, ["ID", "CODE", "IBLOCK_SECTION_ID"]);
while($queryElement = $queryList->GetNext())
	{
	                                       $querySection       = CIBlockSection::GetList([], ["ID" => $queryElement["IBLOCK_SECTION_ID"]], false, ["ID", "CODE", "IBLOCK_SECTION_ID"])->GetNext();
	if($querySection["IBLOCK_SECTION_ID"]) $queryParentSection = CIBlockSection::GetList([], ["ID" => $querySection["IBLOCK_SECTION_ID"]],        false, ["ID", "CODE"])              ->GetNext();
	if($queryParentSection["ID"]) $redirectsArray[] = 'Redirect 301 /metallobaza/'.$queryParentSection["CODE"].'/'.$queryElement["CODE"].'/ https://avmg.com.ua/metallobaza/'.$queryParentSection["CODE"].'/'.$querySection["CODE"].'/'.$queryElement["CODE"].'/';
	}

$file = fopen("redirects.txt", "w");
fwrite($file, implode("\n", $redirectsArray));
fclose($file);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");