<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ popup ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["MESSAGE"]):?>
<script>
	AvBlurScreen("on", 1000);
	var $subscibeLinePopup =
		CreateAvAlertPopup
			(
			'<div class="av-subscribe-form-line-popup-text">'+
				'<b><?=GetMessage("AV_SUBSCRIBE_LINE_RESULT_".$arResult["MESSAGE"]["TYPE"])?></b>'+
				'<span><?=$arResult["MESSAGE"]["TEXT"]?></span>'+
			'</div>',
			'<?=$arResult["MESSAGE"]["TYPE"] == "ERROR" ? "alert" : "ok"?>'
			)
			.positionCenter(1100);

	$(function()
		{
		$(document)
			.on("vclick", function()
				{
				$subscibeLinePopup.remove();
				AvBlurScreen("off");
				});
		$(window)
			.resize(function()
				{
				$subscibeLinePopup.positionCenter();
				});
		});
</script>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<form class="av-subscribe-form-line" method="post" action="<?=$arResult["FORM_ACTION"]?>">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="sender_subscription" value="add">

	<span class="title"><?=GetMessage("AV_SUBSCRIBE_LINE_GREATINGS")?></span>
	<input
		type="email"
		name="SENDER_SUBSCRIBE_EMAIL"
		value="<?=$arResult["EMAIL"]?>"
		placeholder="<?=GetMessage("AV_SUBSCRIBE_LINE_EMAIL_TITLE")?>"
		autocomplete="off"
	>
	<?
	$APPLICATION->IncludeComponent
		(
		"av:form_elements", "av_site",
			[
			"TYPE"  => 'button',
			"NAME"  => 'submit',
			"TITLE" => GetMessage("AV_SUBSCRIBE_LINE_SUBMIT_BUTTON"),
			"ATTR"  => ["id" => 'bx_subscribe_btn_'.$this->randString()]
			]
		);
	?>
</form>