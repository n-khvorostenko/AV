<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ filter ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<form class="av-learning-search-form" method="get" action="<?=$arParams["SEARCH_PAGE"]?>">
	<?if($arParams["COURSE_ID"] && $arParams["SEF_MODE"] != 'Y'):?>
	<input type="hidden" name="COURSE_ID" value="<?=$arParams["COURSE_ID"]?>">
	<input type="hidden" name="SEARCH"    value="Y">
	<?endif?>
	<?if($arResult["how"] == 'd'):?>
	<input type="hidden" name="how"       value="d">
	<?endif?>

	<h3><?=GetMessage("AV_LEARNING_SEARCH_TITLE")?>: <span><?=$arResult["q"]?></span></h3>

	<div class="selector">
		<?
		/*
		$arResult["WHERE"]["C"] = GetMessage("AV_LEARNING_SEARCH_LIST_COURSE");
		$arResult["WHERE"]["H"] = GetMessage("AV_LEARNING_SEARCH_LIST_CHAPTER");
		$arResult["WHERE"]["L"] = GetMessage("AV_LEARNING_SEARCH_LIST_LESSON");

		$APPLICATION->IncludeComponent
			(
			"av:form.select", "av_corp_learning",
				[
				"NAME"        => 'where',
				"LIST"        => $arResult["WHERE"],
				"VALUE"       => $arResult["where"],
				"EMPTY_TITLE" => GetMessage("AV_LEARNING_SEARCH_LIST_DEFAULT")
				]
			);
		*/
		?>
	</div>

	<div class="searcher">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av_corp_learning_search",
				[
				"NAME"         => 'q',
				"VALUE"        => $arResult["q"],
				"TITLE"        => GetMessage("AV_LEARNING_LIST_SEARCH_TITLE"),
				"PLACEHOLDER"  => GetMessage("AV_LEARNING_LIST_SEARCH_PLACEHOLDER"),
				"SEARCH_TITLE" => GetMessage("AV_LEARNING_LIST_SEARCH_BUTTON_TITLE")
				]
			);
		?>
	</div>
</form>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["SEARCH_RESULT"])):?>
	<div class="av-learning-search-list">
		<?foreach($arResult["SEARCH_RESULT"] as $itemInfo):?>
		<div class="item">
			<a href="<?=$itemInfo["URL"]?>"><?=$itemInfo["TITLE_FORMATED"]?></a>
			<div><?=$itemInfo["BODY_FORMATED"]?></div>
		</div>
		<?endforeach?>
	</div>

	<?if($arResult["NAV_STRING"]):?>
	<div class="av-learning-search-navigation">
		<?=$arResult["NAV_STRING"]?>
	</div>
	<?endif?>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- empty result --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?else:?>
	<div class="av-learning-search-empty">
		<?=GetMessage("AV_LEARNING_SEARCH_EMPTY_RESULT")?>
	</div>
<?endif?>