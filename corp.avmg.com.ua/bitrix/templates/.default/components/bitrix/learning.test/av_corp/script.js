/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	var
		$nextButtonPopup   = $(),
		$submitButtonPopup = $();

	$(document)
		/* ------------------------------------------- */
		/* ----------- next button behavior ---------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-learning-test-detail [data-next-button-type]', function()
			{
			var
				functionType        = $(this).attr("data-next-button-type"),
				alertMessage        = BX.message($(this).attr("data-next-button-alert-mesage")),
				$formInputes        = $('[name="answer[]"]'),
				sortQuestionAnswers = {},
				result              = false;

			if(!$formInputes.length)                                   $formInputes = $('[name="answer"]');
			if(!$formInputes.length || !alertMessage || !functionType) return true;

			if(functionType == 'check-sorting')
				{
				$.each($formInputes, function(key, input) {sortQuestionAnswers[input.value] = true});
				delete sortQuestionAnswers[0];
				if(Object.keys(sortQuestionAnswers).length == $formInputes.length) result = true;
				}
			else if(functionType == 'check-for-empty')
				$.each($formInputes, function(key, input)
					{
					     if(input.type == 'textarea' && input.value.length > 0) result = true;
					else if(input.selected || input.checked)                    result = true;
					});

			if(!result)
				{
				AvBlurScreen("on", 900);
				$nextButtonPopup = CreateAvAlertPopup
					(
					'<div class="av-learning-test-detail-popup next-button">'+
						$('.av-learning-test-detail-popup-content').html()
							.replace('#TEXT#',        alertMessage)
							.replace('#CANCEL_TEXT#', BX.message("AV_LEARNING_TEST_SKIP_QUESTION_CANCEL"))
							.replace('#ACCEPT_TEXT#', BX.message("AV_LEARNING_TEST_SKIP_QUESTION_CONFIRM"))+
					'</div>'
					)
					.positionCenter(1000)
					.on("remove", function() {AvBlurScreen("off")});
				return false;
				}

			return true;
			})
		/* ------------------------------------------- */
		/* ---------- finish button behavior --------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-learning-test-detail [name="finish"]:not([confirmed])', function()
			{
			AvBlurScreen("on", 900);
			$submitButtonPopup = CreateAvAlertPopup
				(
				'<div class="av-learning-test-detail-popup finish-button">'+
					$('.av-learning-test-detail-popup-content').html()
						.replace('#TEXT#',        BX.message("AV_LEARNING_TEST_FINISH_TEST"))
						.replace('#CANCEL_TEXT#', BX.message("AV_LEARNING_TEST_FINISH_TEST_CANCEL"))
						.replace('#ACCEPT_TEXT#', BX.message("AV_LEARNING_TEST_FINISH_TEST_CONFIRM"))+
				'</div>'
				)
				.positionCenter(1000)
				.on("remove", function() {AvBlurScreen("off")});
			return false;
			})
		/* ------------------------------------------- */
		/* -------------- popup behavior ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-learning-test-detail-popup [data-cancel-button]', function()
			{
			$nextButtonPopup  .remove();
			$submitButtonPopup.remove();
			})
		.on("vclick", '.av-learning-test-detail-popup.next-button [data-apply-button]', function()
			{
			$('.av-learning-test-detail [data-next-button-type]').removeAttr("data-next-button-type").click();
			$nextButtonPopup.remove();
			})
		.on("vclick", '.av-learning-test-detail-popup.finish-button [data-apply-button]', function()
			{
			$('.av-learning-test-detail [name="finish"]').attr("confirmed", true).click();
			$submitButtonPopup.remove();
			})
		/* ------------------------------------------- */
		/* --------------- form submit --------------- */
		/* ------------------------------------------- */
		.on("submit", '.av-learning-test-detail form', function()
			{
			AvWaitingScreen("on");
			})
		.on("vclick", '.av-learning-test-detail .buttons-block a', function()
			{
			AvWaitingScreen("on");
			})
		/* ------------------------------------------- */
		/* ------------- on click hiding ------------- */
		/* ------------------------------------------- */
		.on("vclick", function()
			{
			if(!$nextButtonPopup.isClicked()   && !$('.av-learning-test-detail [data-next-button-type]').isClicked()) $nextButtonPopup  .remove();
			if(!$submitButtonPopup.isClicked() && !$('.av-learning-test-detail [name="finish"]')        .isClicked()) $submitButtonPopup.remove();
			});
		/* ------------------------------------------- */
		/* -------------- scroll/resize -------------- */
		/* ------------------------------------------- */
	$(window)
		.scroll(function()
			{
			$nextButtonPopup  .positionCenter();
			$submitButtonPopup.positionCenter();
			})
		.resize(function()
			{
			$nextButtonPopup  .positionCenter();
			$submitButtonPopup.positionCenter();
			});
	});
/* -------------------------------------------------------------------- */
/* ------------------------------- timer ------------------------------ */
/* -------------------------------------------------------------------- */
setInterval(function()
	{
	var
		$timer            = $('.av-learning-test-detail .timer'),
		timerValueExplode = $timer.length ? $timer.attr("data-limit").split(":").reverse() : [],
		SecondsToEnd      =
			(timerValueExplode[0] ? parseInt(timerValueExplode[0]) : 0)
			+
			(timerValueExplode[1] ? parseInt(timerValueExplode[1]) : 0)*60
			+
			(timerValueExplode[2] ? parseInt(timerValueExplode[2]) : 0)*3600
			- 1,
		hours             = Math.floor(SecondsToEnd/3600),
		minutes           = Math.floor((SecondsToEnd - hours*3600)/60),
		seconds           = SecondsToEnd - hours*3600 - minutes*60;
	if(!$timer.length || SecondsToEnd < 0) return;

	if(hours > 0)   hours   = hours   < 10 ? '0'+hours   : hours;
	else            hours   = '00';
	if(minutes > 0) minutes = minutes < 10 ? '0'+minutes : minutes;
	else            minutes = '00';
	if(seconds > 0) seconds = seconds < 10 ? '0'+seconds : seconds;
	else            seconds = '00';

	if(SecondsToEnd <= 15) $timer.addClass("failed");
	else                   $timer.removeClass("failed");

	$timer.attr("data-limit", hours+':'+minutes+':'+seconds);
	$timer.children(':nth-child(1)').text(hours);
	$timer.children(':nth-child(3)').text(minutes);
	$timer.children(':nth-child(5)').text(seconds);
	}, 1000);