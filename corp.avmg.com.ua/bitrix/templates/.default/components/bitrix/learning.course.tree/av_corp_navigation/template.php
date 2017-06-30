<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$selectedItemIndex = false;
foreach($arResult["ITEMS"] as $index => $itemInfo)
	if($itemInfo["SELECTED"])
		{
		$selectedItemIndex = $index;
		break;
		}
/* -------------------------------------------------------------------- */
/* ---------------------------- navigation ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($selectedItemIndex):?>
	<div class="av-learning-course-navigation">
		<?if(isset($arResult["ITEMS"][$selectedItemIndex-1]) && $selectedItemIndex > 1):?>
		<div class="back-arrow"></div>
		<a class="back-link" href="<?=$arResult["ITEMS"][$selectedItemIndex-1]["URL"]?>">
			<?=$arResult["ITEMS"][$selectedItemIndex-1]["NAME"]?>
		</a>
		<div class="separator">|</div>
		<?endif?>

		<div class="current-page">
			<?=$arResult["ITEMS"][$selectedItemIndex]["NAME"]?>
		</div>

		<?if (isset($arResult["ITEMS"][$selectedItemIndex+1])):?>
		<div class="separator">|</div>
		<a class="next-link" href="<?=$arResult["ITEMS"][$selectedItemIndex+1]["URL"]?>">
			<?=$arResult["ITEMS"][$selectedItemIndex+1]["NAME"]?>
		</a>
		<div class="next-arrow"></div>
		<?endif?>
	</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- start button --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?else:?>
	<?
	$APPLICATION->IncludeComponent
		(
		"av:form.button", "av_corp_alt3",
			[
			"BUTTON_TYPE" => 'link',
			"LINK"        => $arResult["ITEMS"][1]["URL"],
			"TITLE"       => GetMessage("AV_LEARNING_COURSE_NAVIGATION_START"),
			"PLACEHOLDER" => GetMessage("AV_LEARNING_COURSE_NAVIGATION_START")
			]
		);
	?>
<?endif?>
