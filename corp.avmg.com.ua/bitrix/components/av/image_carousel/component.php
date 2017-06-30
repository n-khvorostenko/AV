<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!\Bitrix\Main\Loader::includeModule("catalog"))              return;
/* -------------------------------------------------------------------- */
/* ---------------------------- переменные ---------------------------- */
/* -------------------------------------------------------------------- */
$imagesUrl   = array_values(array_diff($arParams["IMAGE_URL"],  ['', 0]));
$imagesTitle = array_values(array_diff($arParams["IMAGE_NAME"], ['', 0]));
$imagesLink  = array_values(array_diff($arParams["IMAGE_LINK"], ['', 0]));
$imagesAlt   = array_values(array_diff($arParams["IMAGE_ALT"],  ['', 0]));

$imagesInfo  = [];
foreach($imagesUrl as $index => $url)
	$imagesInfo[] =
		[
		"url"   => $url,
		"title" => $imagesTitle[$index],
		"link"  => $imagesLink[$index],
		"alt"   => $imagesAlt[$index]
		];
/* -------------------------------------------------------------------- */
/* ----------------------- подключение шаблона ------------------------ */
/* -------------------------------------------------------------------- */
$arResult =
	[
	"IMAGES_INFO" => $imagesInfo
	];
$this->IncludeComponentTemplate();
?>