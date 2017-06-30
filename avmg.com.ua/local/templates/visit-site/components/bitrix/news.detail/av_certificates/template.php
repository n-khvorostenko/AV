<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-certificates-detail">
	<img
		src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
		title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
		alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
	>

	<div class="content">
		<div class="date"><?=explode(' ', $arResult["DATE_CREATE"])[0]?></div>
		<div class="name"><?=$arResult["NAME"]?></div>
		<div class="text"><?=strip_tags($arResult["DETAIL_TEXT"], '<br>')?></div>
	</div>

	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site_alt",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'label',
				"TITLE"       => GetMessage("AV_CERTIFICATES_DETAIL_CLOSE"),
				"ATTR"        => $arParams["CLOSE_FORM_ATTR"]
				]
			);
		if($arResult["DETAIL_PICTURE"]["SRC"])
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"TITLE"       => GetMessage("AV_CERTIFICATES_DETAIL_UPLOAD"),
					"LINK"        => $arResult["DETAIL_PICTURE"]["SRC"],
					"ATTR"        => 'download target=_blank'
					]
				);
		?>
	</div>
</div>