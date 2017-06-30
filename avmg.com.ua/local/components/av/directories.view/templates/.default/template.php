<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-directories-detail" id="<?=$this->GetEditAreaId($arParams["ELEMENT_ID"])?>">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------ image ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<img
		src="<?=($arResult["ELEMENT_INFO"]["DETAIL_PICTURE"]["SRC"] ? $arResult["ELEMENT_INFO"]["DETAIL_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
		alt="<?=$arResult["ELEMENT_INFO"]["DETAIL_PICTURE"]["ALT"]?>"
		title="<?=$arResult["ELEMENT_INFO"]["DETAIL_PICTURE"]["TITLE"]?>"
	>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- info ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<div class="info-block">
		<?if($arResult["SEO_INFO"]["ELEMENT_PAGE_TITLE"]):?>
		<h2><?=$arResult["SEO_INFO"]["ELEMENT_PAGE_TITLE"]?></h2>
		<?endif?>

		<?if($arResult["ELEMENT_INFO"]["DETAIL_TEXT"]):?><?=$arResult["ELEMENT_INFO"]["DETAIL_TEXT"]?>
		<?else:?>                                        <?=GetMessage("AV_DIRECTORIES_VIEW_EMPTY_TEXT")?>
		<?endif?>

		<div class="back-link-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site_alt",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arParams["PATH_TO_LIST"],
					"TITLE"       => GetMessage("AV_DIRECTORIES_VIEW_BACK_LINK")
					]
				);
			?>
		</div>
	</div>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------ relative elements ------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<form method="post" class="relative-elements-block">
		<div><?=GetMessage("AV_DIRECTORIES_VIEW_RELATIVE_ELEMENTS")?></div>

		<?if($arParams["PATH_TO_LIST"]):?>
		<button name="<?=$arResult["IBLOCK_FILTER_BUTTON_NAME"]?>">
			<?=$arResult["IBLOCK_INFO"]["NAME"]?>
		</button>
		<?endif?>

		<?foreach($arResult["RELATIVE_ELEMENTS_LINK"] as $arrayInfo):?>
		<a href="<?=$arrayInfo["link"]?>"><?=$arrayInfo["title"]?></a>
		<?endforeach?>
	</form>
</div>