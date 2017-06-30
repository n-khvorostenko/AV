<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$moreElements = false;
/* -------------------------------------------------------------------- */
/* ------------------------------ items ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?ob_start()?>
<?foreach($arResult["QUERY"] as $letter => $arrayInfo):?>
	<?if($arrayInfo["more_elements"]) $moreElements = true?>

	<?foreach($arrayInfo["elements"] as $elementInfo):?>
	<li data-element-id="<?=$elementInfo["ID"]?>">
		<a href="<?=$elementInfo["LINK"]?>"><?=$elementInfo["NAME"]?></a>
	</li>
	<?endforeach?>
<?endforeach?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
$RESULT =
	[
	"result"       => ob_get_contents(),
	"more_element" => $moreElements
	];
ob_end_clean();
exit(json_encode($RESULT));
?>