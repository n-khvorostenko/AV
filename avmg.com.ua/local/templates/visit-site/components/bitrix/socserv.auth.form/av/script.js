function avSocAuth(params)
	{
	var userParams = $.extend
		(
			{
			"service_type": '', "token"     : '', "expires"  : '',
			"id"          : '', "first_name": '', "last_name": '',
			"email"       : '', "gender"    : '', "birthday" : '', "photo" : ''
			},
		params
		);

	AvWaitingScreen("on");
	$.ajax
		({
		type    : 'POST',
		url     : AvSocAuthAjaxFile,
		data    : userParams,
		success : function(scriptResult)
			{
			var
				scriptResultObj      = $.parseJSON(scriptResult),
				scriptResultStatus   = scriptResultObj && scriptResultObj.status  ? scriptResultObj.status  : 'error',
				scriptResultMessage  = scriptResultObj && scriptResultObj.message ? scriptResultObj.message : BX.message("AV_SOC_AUTH_ERROR_TEXT_DEFAULT"),
				$avSocAuthAlertPopup = $();

			if(scriptResultStatus == 'success')
				location.reload();
			else if(scriptResultStatus == 'error')
				$avSocAuthAlertPopup =
					CreateAvAlertPopup('<b>'+BX.message("AV_SOC_AUTH_ERROR_TITLE")+'</b><br>'+scriptResultMessage, "alert")
						.positionCenter(3000);

			$(document)
				.on("vclick", function()
					{
					$avSocAuthAlertPopup.remove();
					});
			$(window)
				.scroll(function()
					{
					$avSocAuthAlertPopup.positionCenter();
					})
				.resize(function()
					{
					$avSocAuthAlertPopup.positionCenter();
					});
			},
		complete: function() {AvWaitingScreen("off")}
		});
	}