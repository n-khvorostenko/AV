<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-learning-course-chapter">
	<h3 class="title"><?=$arResult["CHAPTER"]["NAME"]?></h3>
	<?=$arResult["CHAPTER"]["DETAIL_TEXT"]?>
	<?if($arResult["CHAPTER"]["SELF_TEST_EXISTS"]):?>
	<div class="test-link">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av_corp_alt3",
				[
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arResult["CHAPTER"]["SELF_TEST_URL"],
				"TITLE"       => GetMessage("AV_LEARNING_COURSE_CHAPTER_PAST_TEST"),
				"PLACEHOLDER" => GetMessage("AV_LEARNING_COURSE_CHAPTER_PAST_TEST")
				]
			);
		?>
	</div>
	<?endif?>
</div>