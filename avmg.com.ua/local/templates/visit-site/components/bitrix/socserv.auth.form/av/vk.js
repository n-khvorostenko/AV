/* -------------------------------------------------------------------- */
/* ---------------------------- API upload ---------------------------- */
/* -------------------------------------------------------------------- */
window.vkAsyncInit = function()
	{
	VK.init
		({
		apiId: AvSocAuthVkAppid
		});
	};

setTimeout(function()
	{
	var el   = document.createElement("script");
	el.type  = "text/javascript";
	el.src   = "https://vk.com/js/api/openapi.js?142";
	el.async = true;
	document.getElementById("vk_api_transport").appendChild(el);
	}, 0);
/* -------------------------------------------------------------------- */
/* ----------------------------- auth init ---------------------------- */
/* -------------------------------------------------------------------- */
function avSocAuthVk(authResponse)
	{
	if(authResponse)
		VK.Api.call
			(
			'users.get',
				{
				"user_ids" : authResponse.mid,
				"fields"   : 'photo_id, verified, sex, bdate, city, country, home_town, has_photo, photo_50, photo_100, photo_200_orig, photo_200, photo_400_orig, photo_max, photo_max_orig, online, domain, has_mobile, contacts, site, education, universities, schools, status, last_seen, followers_count, common_count, occupation, nickname, relatives, relation, personal, connections, exports, wall_comments, activities, interests, music, movies, tv, books, games, about, quotes, can_post, can_see_all_posts, can_see_audio, can_write_private_message, can_send_friend_request, is_favorite, is_hidden_from_feed, timezone, screen_name, maiden_name, crop_photo, is_friend, friend_status, career, military, blacklisted, blacklisted_by_me'
				},
			function(userInfo)
				{
				var mainUserInfo = userInfo.response[0];
				if(mainUserInfo)
					avSocAuth
						({
						"service_type": 'vk',
						"token"       : authResponse.mid,
						"expires"     : authResponse.expire,
						"id"          : authResponse.mid,
						"first_name"  : mainUserInfo.first_name,
						"last_name"   : mainUserInfo.last_name,
						"email"       : mainUserInfo.email,
						"gender"      : mainUserInfo.sex,
						"birthday"    : mainUserInfo.bdate,
						"photo"       : mainUserInfo.photo_max_orig
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
		.on("vclick", '.av-soc-auth-form > .call-button.vk', function()
			{
			var connectionInfo = '';
			VK.Auth.getLoginStatus(function(response) {connectionInfo = response});

			if(connectionInfo && connectionInfo.status === 'connected')
				avSocAuthVk(connectionInfo.session);
			else
				VK.Auth.login(function(response)
					{
					console.log(response);
					if(response.status === 'connected')
						avSocAuthVk(response.session);
					});
			});
	});