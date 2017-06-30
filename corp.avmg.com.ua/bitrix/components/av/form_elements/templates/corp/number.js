$(function()
	{
	$(document)
		.on("change keyup input click", '.av-form-elements-corp-input.number',  function()
			{
			this.value = this.value
				.replace(/[^\d,.]*/g, '')
				.replace(/([,.])[,.]+/g, '$1')
				.replace(/^[^\d]*(\d+([.,]\d{0,5})?).*$/g, '$1');
			});
	});