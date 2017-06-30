<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ filter ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<form class="av-learning-list-search-form" action="search.php">
	<h3><?=$arParams["LIST_TITLE"]?></h3>
	<div>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av_corp_learning_search",
				[
				"NAME"         => 'q',
				"TITLE"        => GetMessage("AV_LEARNING_LIST_SEARCH_TITLE"),
				"PLACEHOLDER"  => GetMessage("AV_LEARNING_LIST_SEARCH_PLACEHOLDER"),
				"SEARCH_TITLE" => GetMessage("AV_LEARNING_LIST_SEARCH_BUTTON_TITLE")
				]
			);
		?>
	</div>
	<input name="s" type="submit">
</form>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-learning-list">
	<?foreach($arResult["COURSES"] as $courseInfo):?>
	<?
	$courseInfo["NAME"]         = htmlspecialchars_decode($courseInfo["NAME"]);
	$courseInfo["PREVIEW_TEXT"] = strip_tags($courseInfo["PREVIEW_TEXT"]);
	$titleCutLength = 80;
	$textCutLength  = 320;
	?>
	<div>
		<div class="image">
			<img
				src="<?=($courseInfo["PREVIEW_PICTURE_ARRAY"]["SRC"] ? $courseInfo["PREVIEW_PICTURE_ARRAY"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
				alt="<?=$courseInfo["NAME"]?>"
				title="<?=$courseInfo["NAME"]?>"
			>
		</div>
		<div class="content">
			<a
				class="title"
				href="<?=$courseInfo["COURSE_DETAIL_URL"]?>"
				title="<?=str_replace(["\"", "'"], '', $courseInfo["NAME"])?>"
			>
				<?if(strlen($courseInfo["NAME"]) > $titleCutLength):?><?=substr($courseInfo["NAME"], 0, ($titleCutLength - 5))?>...
				<?else:?><?=$courseInfo["NAME"]?>
				<?endif?>
			</a>

			<div class="separator"></div>

			<div class="info-block">
				<?foreach($arResult["TEST"][$courseInfo["ID"]] as $testInfo):?>
				<div class="test-info-row">
					<?
					$infoArray = [];
					if($testInfo["TIME_LIMIT"])        $infoArray[] = GetMessage("AV_LEARNING_TESTS_TIME_LIMIT",    ["#MINUTES#"  => $testInfo["TIME_LIMIT"]]);
					if($testInfo["ATTEMPT_LIMIT"])     $infoArray[] = GetMessage("AV_LEARNING_TESTS_ATTEMPT_LIMIT", ["#ATTEMPTS#" => $testInfo["ATTEMPT_LIMIT"]]);
					if($testInfo["PASSAGE_TYPE"] == 2) $infoArray[] = GetMessage("AV_LEARNING_TESTS_PASSAGE_TYPE_CHANGE_ANSWER_YES");
					else                               $infoArray[] = GetMessage("AV_LEARNING_TESTS_PASSAGE_TYPE_CHANGE_ANSWER_NO");
					?>
					<?=implode(' / ', $infoArray)?>
				</div>
				<?$textCutLength -= 70?>
				<?endforeach?>

				<div class="text">
					<?if(strlen($courseInfo["PREVIEW_TEXT"]) > $textCutLength):?><?=substr($courseInfo["PREVIEW_TEXT"], 0, ($textCutLength - 5))?>...
					<?else:?><?=$courseInfo["PREVIEW_TEXT"]?>
					<?endif?>
				</div>
			</div>
		</div>
	</div>
	<?endforeach?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?=$arResult["NAV_STRING"]?>