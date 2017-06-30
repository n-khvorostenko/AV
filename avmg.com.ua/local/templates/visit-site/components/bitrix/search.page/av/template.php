<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-search-page">
	<form method="get">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "",
				[
				"TYPE"  => 'element_search',
				"NAME"  => 'q',
				"VALUE" => $arResult["REQUEST"]["QUERY"],
				"ATTR"  => 'size="40" autocomplete="off"'
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form_elements", "av_site",
				[
				"TYPE"        => 'button',
				"BUTTON_TYPE" => 'submit',
				"TITLE"       => GetMessage("AV_SEARCH_PAGE_SEARCH")
				]
			);
		?>
		<input type="hidden" name="how" value="<?=$arResult["REQUEST"]["HOW"] == 'd' ? 'd': 'r'?>">
	</form>

	<?if($arParams["DISPLAY_TOP_PAGER"] == 'Y' && count($arResult["SEARCH"])):?>
	<div class="pagger-cell top">
		<?=$arResult["NAV_STRING"]?>
	</div>
	<?endif?>

	<?if(!count($arResult["SEARCH"])):?>
		<?=GetMessage("AV_SEARCH_PAGE_EMPTY")?>
		<?if($arParams["PRODUCTS_LINK"]):?>
		<div class="products-link-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site_alt",
					[
					"TYPE"        => 'button',
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arParams["PRODUCTS_LINK"],
					"TITLE"       => GetMessage("AV_SEARCH_PRODUCTS_LINK")
					]
				);
			?>
		</div>
		<?endif?>
	<?endif?>

	<?if(count($arResult["SEARCH"])):?>
	<div class="items-list">
		<?foreach($arResult["SEARCH"] as $arItem):?>
		<div>
			<b><a href="<?=$arItem["URL_WO_PARAMS"]?>"><?=strip_tags($arItem["TITLE_FORMATED"])?></a></b>
			<div><?=$arItem["BODY_FORMATED"]?></div>
		</div>
		<?endforeach?>
	</div>
	<?endif?>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"] == 'Y' && count($arResult["SEARCH"])):?>
	<div class="pagger-cell bottom">
		<?=$arResult["NAV_STRING"]?>
	</div>
	<?endif?>
</div>