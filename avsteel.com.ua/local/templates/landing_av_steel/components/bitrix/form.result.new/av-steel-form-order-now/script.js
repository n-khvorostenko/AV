$(function()
{

	$('.av-form-wrap-4  input,.av-form-wrap-4 textarea').each(function() {
		if($(this).val()) {$(this).prev(".av-form-wrap-4 span[title]").attr("up", true)}
	});

	$('body').on('focus', '.av-form-wrap-4  input, .av-form-wrap-4 textarea', function() { 
		$(this).prev(".av-form-wrap-4 span[title]").attr("up", true); 
	});

	$('body').on('focusout', '.av-form-wrap-4 input, .av-form-wrap-4 textarea', function() { 
		if(!$(this).val()){ $(this).prev(".av-form-wrap-4 span[title]").removeAttr("up")}
	});

	$('.av-form-wrap-4 [title]').on('click', function() {
		$(this).next().focus();
	});


// проверка формы на заполненность////////
	$('body').on('click', '.av-form-wrap-4 [name=web_form_submit]', function(event)
	{
		$('[form-input-error]').remove();
		var
			$form     = $(this).closest('form'),
			formError = false,
			t = 0;
		$form.find('[form-error]').removeAttr("form-error");
		$form.find('[required] input[type=text], [required] textarea ').each(function()
			{
			if(!$(this).val())
				{
				$(this).attr("form-error","true" );
				formError = true;
				}
			});

		if(formError != false){
			event.preventDefault();
			$('[form-input-error-123]').addClass("show");
			}
		else {
			$(this).attr("disable", true);
		}
	});

//---------------------------УДАЛЕНИЕ КРАСНЫХ ПОЛЕЙ ПРИ ВВОДЕ В INPUT-------------------------// 
	$('body').on('input', '.av-form-wrap-4 [required] input, .av-form-wrap-4 form [required] textarea', function()
		{
		if($(this).val().length > 0 ) $(this).removeAttr("form-error");
		else                          $(this).attr("form-error", true);
		});
//---------------------------ОТМЕНА ВВОДА КИРИЛЛИЦИ В ПОЛЕ ЕMAIL-------------------------// 
	$('body').on('input', '.av-form-wrap-4 [required][field-types=email] input', function()
		{
  var reg = /[а-яА-ЯёЁ]/g;
    if (this.value.search(reg) !=  -1) {
        this.value  =  this.value.replace(reg, '');
    }
	});

});



function afterError() {
	$('.av-form-wrap-4  input,.av-form-wrap-4 textarea').each(function() {
		if($(this).val()) {$(this).prev(".av-form-wrap-4 span[title]").attr("up-quick", true)}
	});
}

/*--------------------------- МЕНЯЕМ URL ----------------------*/
function changeUrl() {
var stateObj = { foo: "bar" }; 
history.pushState(stateObj, "page 1", "https://www.avsteel.com.ua");
};


function InvalidMsg(textbox) {

     if(textbox.validity.patternMismatch){
        textbox.setCustomValidity('Введите корретный email');
    }    
    else {
        textbox.setCustomValidity('');
    }
    return true;
}