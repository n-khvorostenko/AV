<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$displayValue    = '';
$voteContainerId = 'vote_'.$arResult["ID"];

if($arParams["DISPLAY_AS_RATING"] == "vote_avg")
	{
	if($arResult["PROPERTIES"]["vote_count"]["VALUE"]) $displayValue = round($arResult["PROPERTIES"]["vote_sum"]["VALUE"]/$arResult["PROPERTIES"]["vote_count"]["VALUE"], 2);
	else                                               $displayValue = 0;
	}
else
	$displayValue = $arResult["PROPERTIES"]["rating"]["VALUE"];
?>
<div class="av-iblock-rating<?if(!$arResult["VOTED"] && $arParams["READ_ONLY"]!=="Y"):?> vote-available<?endif?>" id="<?=$voteContainerId?>">
	<?foreach ($arResult["VOTE_NAMES"] as $index => $name):?>
	<i
		id="<?=$voteContainerId?>_<?=$index?>"
		title="<?=$name?>"
		<?if($displayValue && round($displayValue) > $index):?>class="active"<?endif?>

		<?if(!$arResult["VOTED"] && $arParams["READ_ONLY"]!=="Y"):?>
		onclick="AvIblockVote(this, '<?=$voteContainerId?>', <?=$arResult["AJAX_PARAMS"]?>)"
		<?endif?>
	></i>
	<?endforeach?>
</div>