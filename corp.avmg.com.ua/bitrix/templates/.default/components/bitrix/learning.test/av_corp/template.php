<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$currentQuestion = $arResult["NAV"]["PAGE_NUMBER"];
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_LEARNING_TEST_FINISH_TEST"           : '<?=GetMessage("AV_LEARNING_TEST_FINISH_TEST")?>'});
	BX.message({"AV_LEARNING_TEST_FINISH_TEST_CONFIRM"   : '<?=GetMessage("AV_LEARNING_TEST_FINISH_TEST_CONFIRM")?>'});
	BX.message({"AV_LEARNING_TEST_FINISH_TEST_CANCEL"    : '<?=GetMessage("AV_LEARNING_TEST_FINISH_TEST_CANCEL")?>'});

	BX.message({"AV_LEARNING_TEST_INVALID_SORT_CONFIRM"  : '<?=GetMessage("AV_LEARNING_TEST_INVALID_SORT_CONFIRM")?>'});
	BX.message({"AV_LEARNING_TEST_EMPTY_RESPONSE_CONFIRM": '<?=GetMessage("AV_LEARNING_TEST_EMPTY_RESPONSE_CONFIRM")?>'});
	BX.message({"AV_LEARNING_TEST_NO_RESPONSE_CONFIRM"   : '<?=GetMessage("AV_LEARNING_TEST_NO_RESPONSE_CONFIRM")?>'});
	BX.message({"AV_LEARNING_TEST_SKIP_QUESTION_CONFIRM" : '<?=GetMessage("AV_LEARNING_TEST_SKIP_QUESTION_CONFIRM")?>'});
	BX.message({"AV_LEARNING_TEST_SKIP_QUESTION_CANCEL"  : '<?=GetMessage("AV_LEARNING_TEST_SKIP_QUESTION_CANCEL")?>'});
</script>

<div class="av-learning-test-detail-popup-content">
	<div class="popup-content">#TEXT#</div>
	<div class="popup-buttons">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av_corp",
				[
				"BUTTON_TYPE" => 'label',
				"TITLE"       => '#CANCEL_TEXT#',
				"ATTR"        => 'data-cancel-button'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av_corp_alt3",
				[
				"BUTTON_TYPE" => 'label',
				"TITLE"       => '#ACCEPT_TEXT#',
				"ATTR"        => 'data-apply-button'
				]
			);
		?>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- errors block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["ACCESS_ERRORS"])):?>
	<?foreach($arResult["ACCESS_ERRORS"] as $error):?>
	<div><?=$error?></div>
	<?endforeach?>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- question page -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?elseif(count($arResult["QUESTION"])):?>
	<div class="av-learning-test-detail">
		<?
		/* ------------------------------------------- */
		/* ----------------- content ----------------- */
		/* ------------------------------------------- */
		?>
		<div>
			<?
			/* ---------------------------- */
			/* -------- alert block ------- */
			/* ---------------------------- */
			?>
			<?if(is_array($arResult["INCORRECT_QUESTION"])):?>
			<div class="incorrect-message">
				<?if($arResult["INCORRECT_QUESTION"]["ID"] != $arResult["QUESTION"]["ID"]):?>
				<?=GetMessage("AV_LEARNING_TEST_INCORRECT_QUESTION_TITLE", ["#NAME#" => $arResult["INCORRECT_QUESTION"]["NAME"]])?><br>
				<?endif?>
				<?=GetMessage("AV_LEARNING_TEST_INCORRECT_QUESTION_TEXT", ["#TEXT#" => $arResult["INCORRECT_QUESTION"]["INCORRECT_MESSAGE"]])?><br>
			</div>
			<?endif?>
			<?
			/* ---------------------------- */
			/* ------- question block ----- */
			/* ---------------------------- */
			?>
			<div class="question">
				<div class="title"><?=$arResult["QUESTION"]["NAME"]?></div>

				<?if($arResult["QUESTION"]["DESCRIPTION"]):?>
				<div class="description"><?=$arResult["QUESTION"]["DESCRIPTION"]?></div>
				<?endif?>

				<?if($arResult["QUESTION"]["FILE"]["SRC"]):?>
				<img src="<?=$arResult["QUESTION"]["FILE"]["SRC"]?>" title="<?=$arResult["QUESTION"]["FILE"]["DESCRIPTION"]?>">
				<?endif?>
			</div>

			<form name="learn_test_answer" action="<?=$arResult["ACTION_PAGE"]?>" method="post">
				<?=bitrix_sessid_post()?>
				<input type="hidden" name="TEST_RESULT"                            value="<?=$arResult["QBAR"][$currentQuestion]["ID"]?>">
				<input type="hidden" name="<?=$arParams["PAGE_NUMBER_VARIABLE"]?>" value="<?=($currentQuestion + 1)?>">
				<input type="hidden" name="back_page"                              value="<?=$arResult["SAFE_REDIRECT_PAGE"]?>">
				<input type="hidden" name="ANSWERED"                               value="Y">
				<?
				/* ---------------------------- */
				/* ------- answer block ------- */
				/* ---------------------------- */
				?>
				<div class="answer">
					<?if($arResult["QUESTION"]["QUESTION_TYPE"] == 'T'):?>
						<?
						$APPLICATION->IncludeComponent
							(
							"av:form.textarea", "av_corp",
								[
								"NAME"  => 'answer',
								"VALUE" => $arResult["QBAR"][$currentQuestion]["RESPONSE"][0]
								]
							);
						?>
					<?elseif($arResult["QUESTION"]["QUESTION_TYPE"] == 'R'):?>
						<?
						$list = [];
						foreach($arResult["QUESTION"]["ANSWERS"] as $answerInfo) $list[$answerInfo["ID"]] = $answerInfo["ANSWER"];
						?>
						<?foreach($arResult["QUESTION"]["ANSWERS"] as $index => $answerInfo):?>
						<div class="sorting-variant-row">
							<div><?=($index + 1)?>.</div>
							<div>
								<?
								$APPLICATION->IncludeComponent
									(
									"av:form.select", "av_corp",
										[
										"NAME"        => 'answer[]',
										"LIST"        => $list,
										"VALUE"       => $arResult["QBAR"][$currentQuestion]["RESPONSE"][$index],
										"EMPTY_TITLE" => GetMessage("AV_LEARNING_TEST_SELF_SORTING_EMPTY_TITLE")
										]
									);
								?>
							</div>
						</div>
						<?endforeach?>
					<?elseif($arResult["QUESTION"]["QUESTION_TYPE"] == 'M'):?>
						<?foreach($arResult["QUESTION"]["ANSWERS"] as $answerInfo):?>
						<div>
							<?
							$APPLICATION->IncludeComponent
								(
								"av:form.checkbox", "av_corp",
									[
									"NAME"    => 'answer[]',
									"VALUE"   => $answerInfo["ID"],
									"TITLE"   => $answerInfo["ANSWER"],
									"CHECKED" => in_array($answerInfo["ID"], $arResult["QBAR"][$currentQuestion]["RESPONSE"]) ? 'Y' : 'N'
									]
								);
							?>
						</div>
						<?endforeach?>
					<?elseif($arResult["QUESTION"]["QUESTION_TYPE"] == 'S'):?>
						<?foreach($arResult["QUESTION"]["ANSWERS"] as $answerInfo):?>
						<div>
							<?
							$APPLICATION->IncludeComponent
								(
								"av:form.checkbox", "av_corp_radio",
									[
									"NAME"    => 'answer',
									"VALUE"   => $answerInfo["ID"],
									"TITLE"   => $answerInfo["ANSWER"],
									"CHECKED" => in_array($answerInfo["ID"], $arResult["QBAR"][$currentQuestion]["RESPONSE"]) ? 'Y' : 'N'
									]
								);
							?>
						</div>
						<?endforeach?>
					<?endif?>
				</div>
				<?
				/* ---------------------------- */
				/* ------- buttons block ------ */
				/* ---------------------------- */
				?>
				<div class="buttons-block">
					<?
					$nextButtonParams =
						[
						"BUTTON_TYPE" => 'submit',
						"NAME"        => 'next',
						"TITLE"       => GetMessage("AV_LEARNING_TEST_NAVIGATION_NEXT_NAME"),
						"PLACEHOLDER" => GetMessage("AV_LEARNING_TEST_NAVIGATION_NEXT_TITLE")
						];
					if($arResult["TEST"]["PASSAGE_TYPE"] == 0)
						{
						if($arResult["QUESTION"]["QUESTION_TYPE"] == 'R') $nextButtonParams["ATTR"]["data-next-button-type"] = 'check-sorting';
						else                                              $nextButtonParams["ATTR"]["data-next-button-type"] = 'check-for-empty';

							if($arResult["QUESTION"]["QUESTION_TYPE"] == 'R') $nextButtonParams["ATTR"]["data-next-button-alert-mesage"] = 'AV_LEARNING_TEST_INVALID_SORT_CONFIRM';
						elseif($arResult["QUESTION"]["QUESTION_TYPE"] == 'T') $nextButtonParams["ATTR"]["data-next-button-alert-mesage"] = 'AV_LEARNING_TEST_EMPTY_RESPONSE_CONFIRM';
						else                                                  $nextButtonParams["ATTR"]["data-next-button-alert-mesage"] = 'AV_LEARNING_TEST_NO_RESPONSE_CONFIRM';
						}

					$APPLICATION->IncludeComponent("av:form.button", "av_corp", $nextButtonParams);

					if($arResult["TEST"]["PASSAGE_TYPE"] > 0 && $arResult["NAV"]["PREV_QUESTION"])
						$APPLICATION->IncludeComponent
							(
							"av:form.button", "av_corp_alt3",
								[
								"BUTTON_TYPE" => 'link',
								"LINK"        => $arResult["QBAR"][$arResult["NAV"]["PREV_QUESTION"]]["URL"],
								"TITLE"       => GetMessage("AV_LEARNING_TEST_NAVIGATION_PREV_NAME"),
								"PLACEHOLDER" => GetMessage("AV_LEARNING_TEST_NAVIGATION_PREV_TITLE")
								]
							);

					$APPLICATION->IncludeComponent
						(
						"av:form.button",
						$arResult["TEST"]["PASSAGE_TYPE"] > 0 && $arResult["NAV"]["PREV_QUESTION"] ? 'av_corp_alt4' : 'av_corp_alt3',
							[
							"BUTTON_TYPE" => 'submit',
							"NAME"        => 'finish',
							"TITLE"       => GetMessage("AV_LEARNING_TEST_NAVIGATION_FINISH_NAME"),
							"PLACEHOLDER" => GetMessage("AV_LEARNING_TEST_NAVIGATION_FINISH_TITLE")
							]
						);
					?>
				</div>
			</form>
		</div>
		<?
		/* ------------------------------------------- */
		/* -------------- questions bar -------------- */
		/* ------------------------------------------- */
		?>
		<div>
			<div class="title">
				<?=GetMessage("AV_LEARNING_TEST_QUESTIONS_COUNT", ["#COUNT#" => count($arResult["QBAR"])])?>
			</div>

			<div class="bar">
			<?foreach($arResult["QBAR"] as $page => $pageInfo):?>
				<?if($page == $currentQuestion):?>
					<a
						class="current"
						title="<?=GetMessage("AV_LEARNING_TEST_CURRENT_QUESTION")?>"
					>
						<?=$page?>
					</a>
				<?elseif($pageInfo["ANSWERED"] == 'Y'):?>
					<a
						class="answered"
						title="<?=GetMessage("AV_LEARNING_TEST_ANSWERED_QUESTION")?>"
						<?if($arResult["TEST"]["PASSAGE_TYPE"] == 2):?>
						href="<?=$pageInfo["URL"]?>"
						<?endif?>
					>
						<?=$page?>
					</a>
				<?else:?>
					<a
						title="<?=GetMessage("AV_LEARNING_TEST_NOANSWERED_QUESTION")?>"
						<?if($arResult["TEST"]["PASSAGE_TYPE"] != 0):?>
						href="<?=$pageInfo["URL"]?>"
						<?endif?>
					>
						<?=$page?>
					</a>
				<?endif?>
			<?endforeach?>
			</div>

			<?if($arResult["TEST"]["TIME_LIMIT"] > 0 && $arParams["SHOW_TIME_LIMIT"] == 'Y'):?>
			<?$timerExplode = explode(':', $arResult["SECONDS_TO_END_STRING"])?>
			<div
				class="timer"
				title="<?=GetMessage("AV_LEARNING_TEST_TIME_LIMIT")?>"
				data-limit="<?=$arResult["SECONDS_TO_END_STRING"]?>"
			>
				<div><?=$timerExplode[0]?></div>
				<div>:</div>
				<div><?=$timerExplode[1]?></div>
				<div>:</div>
				<div><?=$timerExplode[2]?></div>
			</div>
			<?endif?>

			<?if($arResult["TEST"]["CURRENT_INDICATION_PERCENT"] == 'Y'):?>
			<div class="current-result">
				<?=GetMessage("AV_LEARNING_TEST_CURRENT_RIGHT_COUNT")?>:<br>
				<b><?=$arResult["COMPLETE_PERCENT"]?>%</b>
			</div>
			<?endif?>
		</div>
	</div>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- result page --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?elseif($arResult["TEST_FINISHED"]):?>
	<div class="av-learning-test-detail-result">
		<?
		/* ------------------------------------------- */
		/* -------------- alert message -------------- */
		/* ------------------------------------------- */
		?>
		<?if($arResult["ERROR_MESSAGE"]):?>
		<div class="alert-message"><?=$arResult["ERROR_MESSAGE"]?></div>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* -------------- result message ------------- */
		/* ------------------------------------------- */
		?>
		<?if($arResult["ATTEMPT"]["COMPLETED"]):?>
		<div class="
			result-message
			<?if($arResult["ATTEMPT"]["COMPLETED"] == 'N'):?>failed
			<?elseif($arResult["ATTEMPT"]["COMPLETED"] == 'Y'):?>success
			<?endif?>
			"
		>
			<?if($arResult["ATTEMPT"]["COMPLETED"] == 'N'):?><?=GetMessage("AV_LEARNING_TEST_RESULT_FAILED")?>
			<?elseif($arResult["ATTEMPT"]["COMPLETED"] == 'Y'):?><?=GetMessage("AV_LEARNING_TEST_RESULT_SUCCESS")?>
			<?endif?>
		</div>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* --------------- result table -------------- */
		/* ------------------------------------------- */
		?>
		<?if(intval($arResult["TEST"]["FINAL_INDICATION"]) > 0):?>
		<table class="result-table">
			<?if($arResult["TEST"]["FINAL_INDICATION_CORRECT_COUNT"] == 'Y'):?>
			<tr>
				<th><?=GetMessage("AV_LEARNING_TEST_RESULT_TABLE_QUESTIONS_COUNT")?>:</th>
				<td><?=$arResult["ATTEMPT"]["QUESTIONS"]?></td>
			</tr>
			<tr>
				<th><?=GetMessage("AV_LEARNING_TEST_RESULT_TABLE_RIGHT_QUESTIONS_COUNT")?>:</th>
				<td><?=$arResult["ATTEMPT"]["CORRECT_COUNT"]?></td>
			</tr>
			<?endif?>

			<?if($arResult["TEST"]["FINAL_INDICATION_SCORE"] == 'Y'):?>
			<tr>
				<th><?=GetMessage("AV_LEARNING_TEST_RESULT_TABLE_RESULT_SCORE")?>:</th>
				<td><?=round($arResult["ATTEMPT"]["SCORE"]/$arResult["ATTEMPT"]["MAX_SCORE"]*100, 2)?>%</td>
			</tr>
			<?endif?>
		</table>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* -------------- gradebook link ------------- */
		/* ------------------------------------------- */
		if($arResult["GRADEBOOK_URL"])
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp_alt3",
					[
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arResult["GRADEBOOK_URL"],
					"TITLE"       => GetMessage("AV_LEARNING_TEST_RESULT_TABLE_PROFILE_LINK_NAME"),
					"PLACEHOLDER" => GetMessage("AV_LEARNING_TEST_RESULT_TABLE_PROFILE_LINK_TITLE")
					]
				);
		?>
	</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- restart page --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?else:?>
	<div class="av-learning-test-restart">
		<h3><?=$arResult["TEST"]["NAME"]?></h3>

		<?if($arResult["TEST"]["ATTEMPT_LIMIT"]):?>
		<div>
			<?=GetMessage("AV_LEARNING_TEST_RESTART_ATTEMPT_LIMIT")?>: <b><?=$arResult["TEST"]["ATTEMPT_LIMIT"]?></b>
		</div>
		<?endif?>

		<?if($arResult["TEST"]["TIME_LIMIT"]):?>
		<div>
			<?=GetMessage("AV_LEARNING_TEST_RESTART_TIME_LIMIT")?>: <b><?=$arResult["TEST"]["TIME_LIMIT"]?></b> <?=GetMessage("AV_LEARNING_TEST_RESTART_TIME_LIMIT_MIN")?>
		</div>
		<?endif?>

		<div>
			<?=GetMessage("AV_LEARNING_TEST_RESTART_PASSAGE_TYPE")?>:
			<?if($arResult["TEST"]["PASSAGE_TYPE"] == 2):?>    <?=GetMessage("AV_LEARNING_TEST_RESTART_PASSAGE_FOLLOW_EDIT")?>
			<?elseif($arResult["TEST"]["PASSAGE_TYPE"] == 1):?><?=GetMessage("AV_LEARNING_TEST_RESTART_PASSAGE_FOLLOW_NO_EDIT")?>
			<?else:?>                                          <?=GetMessage("AV_LEARNING_TEST_RESTART_PASSAGE_NO_FOLLOW_NO_EDIT")?>
			<?endif?>
		</div>

		<?if($arResult["TEST"]["PREVIOUS_TEST_ID"] && $arResult["TEST"]["PREVIOUS_TEST_SCORE"] && $arResult["TEST"]["PREVIOUS_TEST_LINK"]):?>
		<div class="important">
			<?=str_replace
				(
				["#TEST_LINK#", "#TEST_SCORE#"],
				[$arResult["TEST"]["PREVIOUS_TEST_LINK"], $arResult["TEST"]["PREVIOUS_TEST_SCORE"]],
				GetMessage("AV_LEARNING_TEST_RESTART_PREV_TEST_REQUIRED")
				)
			?>
		</div>
		<?endif?>

		<form name="learn_test_start" action="<?=$arResult["ACTION_PAGE"]?>" method="post">
			<?=bitrix_sessid_post()?>
			<input type="hidden" name="back_page" value="<?=$arResult["SAFE_REDIRECT_PAGE"]?>">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_corp_alt3",
					[
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'next',
					"TITLE"       => GetMessage("AV_LEARNING_TEST_RESTART_START")
					]
				);
			?>
		</form>
	</div>
<?endif?>