function removeElement(arr, sElement)
{
	var tmp = new Array();
	for (var i = 0; i<arr.length; i++) if (arr[i] != sElement) tmp[tmp.length] = arr[i];
	arr=null;
	arr=new Array();
	for (var i = 0; i<tmp.length; i++) arr[i] = tmp[i];
	tmp = null;
	return arr;
}

function SectionClick(id)
{
	var div = document.getElementById('user_div_'+id);
	if (div.className == "profile-block-hidden")
	{
		opened_sections[opened_sections.length]=id;
	}
	else
	{
		opened_sections = removeElement(opened_sections, id);
	}

	document.cookie = cookie_prefix + "_user_profile_open=" + opened_sections.join(",") + "; expires=Thu, 31 Dec 2020 23:59:59 GMT; path=/;";
	div.className = div.className == 'profile-block-hidden' ? 'profile-block-shown' : 'profile-block-hidden';
}

$(function() {
	$('#downloadPhoto').on("vclick", function() {
		$('input[name="PERSONAL_PHOTO"]').click();
	});

$('.userPhotoSection')
  .change(function () {
$('[submit-button]').click();
});

$('#deletePhoto').on("vclick", function() {
	$('.userPhotoSection [type="checkbox"]').prop("checked", true);
	$('[submit-button]').click();
});


});



$(function()
	{
	SetFormElementsCurrentLibrary("av_site");
	/* -------------------------------------------------------------------- */
	/* ---------------------------- обработчики --------------------------- */
	/* -------------------------------------------------------------------- */
	$(document)
		/* ------------------------------------------- */
		/* -------------- submit формы --------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-user-profile [submit-button]', function()
			{
			var formValidation = true;

			$(this).closest('form').getFormElememt().each(function()
				{
				$(this).setFormElememtParam("alert", "off");
				if($(this).getFormElememtParam("required") && !$(this).getFormElememtParam("value"))
					{
					$(this).setFormElememtParam("alert", "on");
					formValidation = false;
					}
				});

			if(!formValidation)
				{
				$avPropfileAlertPopup = CreateAvAlertPopup("!!!", "alert").positionCenter(1000);
				return false;
				}
			})
		/* ------------------------------------------- */
		/* ------------ скрытие элементов ------------ */
		/* ------------------------------------------- */
		.on("vclick", function()
			{
			if(typeof $avPropfileAlertPopup !== 'undefined' && $avPropfileAlertPopup.length && !$avPropfileAlertPopup.isClicked()) $avPropfileAlertPopup.remove();
			});
	/* -------------------------------------------------------------------- */
	/* ------------------------------ ресайз ------------------------------ */
	/* -------------------------------------------------------------------- */
	$(window).resize(function()
		{
		if(typeof $avPropfileAlertPopup !== 'undefined' && $avPropfileAlertPopup.length) $avPropfileAlertPopup.positionCenter();
		});
	});