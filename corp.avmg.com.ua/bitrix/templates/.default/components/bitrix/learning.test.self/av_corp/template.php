<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- alert message -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["ERROR_MESSAGE"]):?>
<div class="av-learning-test-self-alert-message"><?=$arResult["ERROR_MESSAGE"]?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-learning-test-self">
	<?
	/* ------------------------------------------- */
	/* ----------------- content ----------------- */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult["QUESTIONS"] as $index => $questionInfo):?>
	<div class="question-block <?=$questionInfo["QUESTION_TYPE"]?>">
		<?
		/* ---------------------------- */
		/* ------- question block ----- */
		/* ---------------------------- */
		?>
		<div class="question">
			<div class="title"><?=$questionInfo["NAME"]?></div>

			<?if($arResult["QUESTION"]["DESCRIPTION"]):?>
			<div class="description"><?=$questionInfo["DESCRIPTION"]?></div>
			<?endif?>

			<?if($questionInfo["FILE"]["SRC"]):?>
			<img src="<?=$questionInfo["FILE"]["SRC"]?>" title="<?=$questionInfo["FILE"]["DESCRIPTION"]?>">
			<?endif?>
		</div>
		<?
		/* ---------------------------- */
		/* ------- answer block ------- */
		/* ---------------------------- */
		?>
		<form>
			<?if($questionInfo["QUESTION_TYPE"] == 'R'):?>
				<?
				$questionList = [];
				foreach($questionInfo["ANSWERS"] as $answerInfo) $questionList[$answerInfo["ID"]] = $answerInfo["ANSWER"];
				?>
				<?for($i = 0; $i < count($questionInfo["ANSWERS"]); $i++):?>
				<div class="answer-variant" data-correct-value="<?=$questionInfo["ANSWERS_ORIGINAL"][$i]["ID"]?>">
					<div><?=($i+1)?>.</div>
					<div>
						<?
						$APPLICATION->IncludeComponent
							(
							"av:form.select", "av_corp",
								[
								"NAME"        => 'answer[]',
								"LIST"        => $questionList,
								"EMPTY_TITLE" => GetMessage("AV_LEARNING_TEST_SELF_SORTING_EMPTY_TITLE")
								]
							);
						?>
					</div>
				</div>
				<?endfor?>
			<?elseif($questionInfo["QUESTION_TYPE"] == 'M'):?>
				<?foreach($questionInfo["ANSWERS"] as $answerInfo):?>
				<div class="answer-variant" data-correct-value="<?=$answerInfo["CORRECT"]?>">
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.checkbox", "av_corp",
							[
							"NAME"  => 'answer',
							"VALUE" => $answerInfo["ID"],
							"TITLE" => $answerInfo["ANSWER"],
							"ATTR"  => ["data-correct-value" => $answerInfo["CORRECT"]]
							]
						);
					?>
				</div>
				<?endforeach?>
			<?elseif($questionInfo["QUESTION_TYPE"] == 'S'):?>
				<?foreach($questionInfo["ANSWERS"] as $answerInfo):?>
				<div class="answer-variant" data-correct-value="<?=$answerInfo["CORRECT"]?>">
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.checkbox", "av_corp_radio",
							[
							"NAME"  => 'answer',
							"VALUE" => $answerInfo["ID"],
							"TITLE" => $answerInfo["ANSWER"],
							"ATTR"  => ["data-correct-value" => $answerInfo["CORRECT"]]
							]
						);
					?>
				</div>
				<?endforeach?>
			<?endif?>
		</form>
		<?
		/* ---------------------------- */
		/* ------- buttons block ------ */
		/* ---------------------------- */
		?>
		<div class="buttons-block">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp",
					[
					"BUTTON_TYPE" => 'label',
					"TITLE"       => GetMessage("AV_LEARNING_TEST_SELF_SUBMIT_NAME"),
					"PLACEHOLDER" => GetMessage("AV_LEARNING_TEST_SELF_SUBMIT_TITLE"),
					"ATTR"        => 'data-submit-button'
					]
				);
			?>
		</div>
	</div>
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* -------------- questions bar -------------- */
	/* ------------------------------------------- */
	?>
	<div class="questions-bar">
		<div class="title">
			<?=GetMessage("AV_LEARNING_TEST_SELF_QUESTIONS_COUNT", ["#COUNT#" => count($arResult["QUESTIONS"])])?>
		</div>

		<div class="bar">
			<?foreach($arResult["QUESTIONS"] as $index => $questionInfo):?>
			<div <?if(!$index):?>class="current"<?endif?>>
				<?=($index + 1)?>
			</div>
			<?endforeach?>
		</div>
	</div>
</div>