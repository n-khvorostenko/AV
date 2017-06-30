<?
use Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if($USER->IsAuthorized())                                       die();

CJSCore::Init(["av_site"]);
Asset::getInstance()->addString('<script>AvSocAuthAjaxFile = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$this->GetFolder().'/ajax/user_login.php";</script>');
Asset::getInstance()->addString('<script>BX.message({"AV_SOC_UNAVAILABLE_RESOURCE"   : "'.GetMessage("AV_SOC_UNAVAILABLE_RESOURCE").'"});   </script>');
Asset::getInstance()->addString('<script>BX.message({"AV_SOC_AUTH_ERROR_TITLE"       : "'.GetMessage("AV_SOC_AUTH_ERROR_TITLE").'"});       </script>');
Asset::getInstance()->addString('<script>BX.message({"AV_SOC_AUTH_ERROR_TEXT_DEFAULT": "'.GetMessage("AV_SOC_AUTH_ERROR_TEXT_DEFAULT").'"});</script>');
?>
<div class="av-soc-auth-form">
<?foreach($arParams["AUTH_SERVICES"] as $service => $arrayInfo):?>
	<?
	/* ------------------------------------------- */
	/* ---------------- FACEBOOK ----------------- */
	/* ------------------------------------------- */
	?>
	<?if($service == 'Facebook'):?>
		<?
		Asset::getInstance()->addString('<script>AvSocAuthFacebookAppid = "'.CSocServFacebook::GetOption("facebook_appid").'";</script>');
		Asset::getInstance()->addJs($this->GetFolder().'/facebook.js');
		?>
		<div class="call-button facebook"></div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ------------------- VK -------------------- */
	/* ------------------------------------------- */
	?>
	<?if($service == 'VKontakte'):?>
		<?
		Asset::getInstance()->addString('<script>AvSocAuthVkAppid = "'.CSocServVKontakte::GetOption("vkontakte_appid").'";</script>');
		Asset::getInstance()->addJs($this->GetFolder().'/vk.js');
		?>
		<span id="vk_api_transport"></span>
		<div class="call-button vk"></div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ----------------- GOOGLE ------------------ */
	/* ------------------------------------------- */
	?>
	<?if($service == 'GooglePlusOAuth' && GOOGLE_API_KEY):?>
		<?
		Asset::getInstance()->addString('<script>AvSocAuthGoogleAPIKey = "'.GOOGLE_API_KEY.'";</script>');
		Asset::getInstance()->addString('<script>AvSocAuthGoogleAppid = "'.CSocServGooglePlusOAuth::GetOption("google_appid").'";</script>');
		Asset::getInstance()->addJs($this->GetFolder().'/gplus.js');
		?>
		<div class="call-button google-plus"></div>
	<?endif?>
<?endforeach?>
</div>