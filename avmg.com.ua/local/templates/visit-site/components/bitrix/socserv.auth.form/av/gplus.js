/* -------------------------------------------------------------------- */
/* ---------------------------- API upload ---------------------------- */
/* -------------------------------------------------------------------- */
(function()
	{
	var po = document.createElement('script'), s;
	po.type  = 'text/javascript';
	po.async = true;
	po.src   = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
	s        = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(po, s);
	})();

function onLoadCallback()
	{
	gapi.client.setApiKey(AvSocAuthGoogleAPIKey);
	gapi.client.load('plus', 'v1',function() {});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- auth init ---------------------------- */
/* -------------------------------------------------------------------- */
function avSocAuthGooglePlus(authResponse)
	{
	if(authResponse)
		gapi.client.plus.people
			.get({"userId": 'me'})
			.execute(function(userInfo)
				{
				if(userInfo)
					avSocAuth
					({
					"service_type": 'gplus',
					"token"       : authResponse.access_token,
					"expires"     : authResponse.expires_in,
					"id"          : userInfo.id,
					"first_name"  : userInfo.name      ? userInfo.name.givenName  : '',
					"last_name"   : userInfo.name      ? userInfo.name.familyName : '',
					"email"       : userInfo.emails[0] ? userInfo.emails[0].value : '',
					"photo"       : userInfo.image     ? userInfo.image.url       : ''
					});
				});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-soc-auth-form > .call-button.google-plus', function()
			{
			gapi.auth.signIn
				({
				"clientid"      : AvSocAuthGoogleAppid,
				"cookiepolicy"  : 'single_host_origin',
				"callback"      : 'avSocAuthGooglePlus',
				"approvalprompt": 'force',
				"scope"         : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
				});
			});
	});