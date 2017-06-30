/* -------------------------------------------------------------------- */
/* ---------------------------- API upload ---------------------------- */
/* -------------------------------------------------------------------- */
window.fbAsyncInit = function()
	{
	FB.init
		({
		appId   : AvSocAuthFacebookAppid,
		cookie  : true,
		xfbml   : true,
		version : 'v2.8'
		});
	};

(function(d, s, id)
	{
	var js, fjs = d.getElementsByTagName(s)[0];
	if(d.getElementById(id)) return;

	js     = d.createElement(s);
	js.id  = id;
	js.src = "https://connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
	} (document, 'script', 'facebook-jssdk'));
/* -------------------------------------------------------------------- */
/* ----------------------------- auth init ---------------------------- */
/* -------------------------------------------------------------------- */
function avSocAuthFacebook(authResponse)
	{
	if(authResponse)
		FB.api
			(
			'/me', 'get',
				{
				"fields":
					[
					"first_name", "last_name", "middle_name", "email",
					"gender", "birthday", "cover", "hometown"
					]
				},
			function(userInfo)
				{
				if(userInfo)
					avSocAuth
					({
					"service_type": 'facebook',
					"token"       : authResponse.accessToken,
					"expires"     : authResponse.expiresIn,
					"id"          : userInfo.id,
					"first_name"  : userInfo.first_name,
					"last_name"   : userInfo.last_name,
					"email"       : userInfo.email,
					"gender"      : userInfo.gender,
					"birthday"    : userInfo.birthday,
					"photo"       : userInfo.cover ? userInfo.cover.source : ''
					});
				}
			);
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", '.av-soc-auth-form > .call-button.facebook', function()
			{
			var connectionInfo = '';
			FB.getLoginStatus(function(response) {connectionInfo = response});

			if(connectionInfo && connectionInfo.status === 'connected')
				avSocAuthFacebook(connectionInfo.authResponse);
			else
				FB.login(function(response)
					{
					if(response.status === 'connected')
						avSocAuthFacebook(response.authResponse);
					});
			});
	});