<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["av_site"]);
AvComponentsIncludings::getInstance()->setIncludings("av", "visit_site.user.panel");
?>
<div class="av-auth-alt">
	<div class="title"><?=GetMessage("AV_AUTH_ALT_TITLE")?></div>
	<div class="text"><?=GetMessage("AV_AUTH_ALT_TEXT")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AV_AUTH_ALT_LINK"),
				"ATTR"        => 'data-login-form-link'
				]
			);
		?>
	</div>
</div>
