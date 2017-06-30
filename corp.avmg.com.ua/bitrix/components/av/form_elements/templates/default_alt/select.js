$(function()
	{
	$(document)
		.on("vclick", '.av-form-elements-select-def-alt [data-label-value]', function()
			{
			var
				$block  = $(this).closest('.av-form-elements-select-def-alt'),
				$select = $block.find('select'),
				value   = $(this).attr("data-label-value");

			$select.find('option')       .removeAttr("selected");
			$block .find('[value-label]').removeClass("selected");

			if(value)
				{
				$select.find('option[value="'+value+'"]').attr("selected", true);
				$(this).addClass("selected");
				}

			$select.trigger("change");
			});
	});