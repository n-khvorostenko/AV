<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["ITEMS"]))                                  return;
$bracketLevel = 0;
/* -------------------------------------------------------------------- */
/* ------------------------------- tree ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<ul class="av-learning-course-tree">
	<?foreach($arResult["ITEMS"] as $itemInfo):?>
		<?
		if($itemInfo["DEPTH_LEVEL"] <= $bracketLevel)
			{
			$deltaLevel = $bracketLevel - $itemInfo["DEPTH_LEVEL"] + 1;
			echo str_repeat("</ul></li>", $deltaLevel);
			$bracketLevel -= $deltaLevel;
			}
		$paddingLeftValue  = ($itemInfo["DEPTH_LEVEL"] == 1 ? 5 : ($itemInfo["DEPTH_LEVEL"] - 1)*25).'px';
		$paddingRightValue = ($itemInfo["DEPTH_LEVEL"] == 1 ? 5 : 23)                               .'px';
		/* ------------------------------------------- */
		/* ----------------- chapter ----------------- */
		/* ------------------------------------------- */
		?>
		<?if($itemInfo["TYPE"] == 'CH'):?>
			<?$bracketLevel++?>
			<li class="
				chapter
				<?if($itemInfo["CHAPTER_OPEN"]):?>open<?endif?>
				<?if($itemInfo["SELECTED"]):?>selected<?endif?>
				"
			>
				<div>
					<a
						href="<?=$itemInfo["URL"]?>"
						title="<?=$itemInfo["NAME"]?>"
						style="
							padding-left: <?=$paddingLeftValue?>;
							width: calc(100% - 19px - <?=$paddingLeftValue?>);
							"
					><?=$itemInfo["NAME"]?></a>
					<div class="arrow"></div>
				</div>
				<ul>
		<?
		/* ------------------------------------------- */
		/* ----------------- lesson ------------------ */
		/* ------------------------------------------- */
		?>
		<?elseif($itemInfo["TYPE"] == 'LE' || $itemInfo["TYPE"] == 'CD'):?>
			<li class="
				lesson
				<?if($itemInfo["TYPE"] == 'CD'):?>index<?endif?>
				<?if($itemInfo["SELECTED"]):?>selected<?endif?>
				"
			>
				<a
					href="<?=$itemInfo["URL"]?>"
					title="<?=$itemInfo["NAME"]?>"
					<?if($itemInfo["DEPTH_LEVEL"] > 1):?>
					style="
						padding-left:  <?=$paddingLeftValue?>;
						padding-right: <?=$paddingRightValue?>;
						width: calc(100% - <?=$paddingLeftValue?> - <?=$paddingRightValue?>);
						"
					<?endif?>
				>
					<?=$itemInfo["NAME"]?>
				</a>
			</li>
		<?
		/* ------------------------------------------- */
		/* ------------------ tests ------------------ */
		/* ------------------------------------------- */
		?>
		<?elseif($itemInfo["TYPE"] == 'TL'):?>
			<li class="test-list">
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av_corp",
						[
						"BUTTON_TYPE" => 'link',
						"LINK"        => $itemInfo["URL"],
						"TITLE"       => GetMessage("AV_LEARNING_COURSE_TREE_TESTS").' ( '.preg_replace("/[^0-9]/", '', $itemInfo["NAME"]).' )',
						"PLACEHOLDER" => GetMessage("AV_LEARNING_COURSE_TREE_TESTS")
						]
					);
				?>
			</li>
		<?endif?>
	<?endforeach?>
</ul>