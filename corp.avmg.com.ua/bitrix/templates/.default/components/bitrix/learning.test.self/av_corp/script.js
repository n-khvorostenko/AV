$(function()
	{
	$(document)
		.on("vclick", '.av-learning-test-self .questions-bar .bar > *', function()
			{
			var index = $(this).index() + 1;

			$(this).closest('.av-learning-test-self').find('.question-block')
				.hide()
				.filter(':nth-child('+index+')').show();
			$(this).parent().children()
				.removeClass("current")
				.filter(':nth-child('+index+')').addClass("current");
			})
		.on("change", '.av-learning-test-self .question-block :checkbox, .av-learning-test-self .question-block :radio', function()
			{
			var
				$questionBlock = $(this).closest('.question-block'),
				$buttonsBlock  = $questionBlock.find('.buttons-block');

			if($questionBlock.find(':checkbox:checked, :radio:checked').length) $buttonsBlock.show();
			else                                                                $buttonsBlock.hide();
			})
		.on("change", '.av-learning-test-self .question-block select', function()
			{
			var
				$questionBlock = $(this).closest('.question-block'),
				$buttonsBlock  = $questionBlock.find('.buttons-block'),
				showButtons    = true;

			$questionBlock.find('select').each(function()
				{
				if(!$(this).val()) showButtons = false;
				});

			if(showButtons) $buttonsBlock.show();
			else            $buttonsBlock.hide();
			})
		.on("vclick", '.av-learning-test-self .question-block [data-submit-button]', function()
			{
			$(this).closest('.question-block')
				.addClass("answered")
				.find('.answer-variant').each(function()
					{
					var answer = $(this).attr("data-correct-value");
					if(answer == 'Y' || answer == $(this).find('select').val()) $(this).removeClass("incorrect").addClass("correct");
					else                                                        $(this).removeClass("correct")  .addClass("incorrect");
					});
			});
	});