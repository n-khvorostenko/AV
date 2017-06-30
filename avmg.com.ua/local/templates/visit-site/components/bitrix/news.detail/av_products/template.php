<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-products-detail" id="<?=$this->GetEditAreaId($arParams["ELEMENT_ID"])?>">
	<?
	/* ------------------------------------------- */
	/* ------------------ image ------------------ */
	/* ------------------------------------------- */
	?>
	<img
		src="<?=($arResult["DETAIL_PICTURE"]["SRC"] ? $arResult["DETAIL_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
		alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
		title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
	>
	<?
	/* ------------------------------------------- */
	/* ------------------ info ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="info-block">
		<div><?=$arResult["FIELDS"]["DETAIL_TEXT"]?></div>
		<div class="buttons-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site_alt",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arResult["LIST_PAGE_URL"],
					"TITLE"       => GetMessage("AV_PRODUCTS_VIEW_BACK_LINK")
					]
				);
			foreach($arParams["ADDITIONAL_LINKS"] as $index => $link)
				$APPLICATION->IncludeComponent
					(
					"av:form_elements", "av_site_alt",
						[
						"TYPE"        => 'button',
						"BUTTON_TYPE" => 'link',
						"LINK"        => $link,
						"TITLE"       => $arParams["ADDITIONAL_LINKS_TITLES"][$index]
						]
					);
			?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ---------------- web form ----------------- */
	/* ------------------------------------------- */
	?>
	<?if($arParams["WEBFORM_ID"]):?>
	<div class="web-form">
		<h3><?=GetMessage("AV_PRODUCTS_VIEW_FEADBACK_FORM")?></h3>
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:form.result.new", $arParams["WEBFORM_TEMPLATE"],
				[
				"AJAX_MODE"              => 'Y',
				"AJAX_OPTION_JUMP"       => 'N',
				"AJAX_OPTION_STYLE"      => 'N',
				"AJAX_OPTION_HISTORY"    => 'N',

				"SEF_MODE"               => 'N',
				"VARIABLE_ALIASES"       => ["action" => 'action'],

				"WEB_FORM_ID"            => $arParams["WEBFORM_ID"],
				"RESULT_ID"              => '',

				"START_PAGE"             => 'new',
				"SHOW_LIST_PAGE"         => 'N',
				"SHOW_EDIT_PAGE"         => 'N',
				"SHOW_VIEW_PAGE"         => 'N',
				"SUCCESS_URL"            => $APPLICATION->GetCurPage(false),

				"SHOW_ANSWER_VALUE"      => 'N',
				"SHOW_ADDITIONAL"        => 'N',
				"SHOW_STATUS"            => 'N',
				"EDIT_ADDITIONAL"        => 'N',
				"EDIT_STATUS"            => 'N',
				"IGNORE_CUSTOM_TEMPLATE" => 'N',
				"USE_EXTENDED_ERRORS"    => 'N'
				]
			);
		?>
	<?endif?>
	</div>
</div>