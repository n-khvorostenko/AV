<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;

$previousLevel  = 0;
$currentPageUrl = $APPLICATION->GetCurPage(false);
?>
<ul class="av-menu" data-av-at-avmg-main-menu="menu">
	<?
	/* ------------------------------------------- */
	/* --------------- menu array ---------------- */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult as $index => $arItem):?>
		<?
		/* ---------------------------- */
		/* -------- variables --------- */
		/* ---------------------------- */
		$linkTag     = str_replace('index.php', '', explode('?', $arItem["LINK"])[0]) != $currentPageUrl && !($arItem["IS_PARENT"] && $arItem["PERMISSION"] == 'D') ? 'a' : 'div';
		$linkClasses = [];
		$linkAttr    = ["data-av-at-avmg-main-menu" => 'link'];
		$linkAttrStr = '';

		if($arItem["DEPTH_LEVEL"] <= 1)
			{
			$linkClasses[] = 'main-link';
			$linkAttr["data-av-at-avmg-main-menu"] .= ' main';
			}
		else
			{
			$linkClasses[] = 'sub-link';
			$linkAttr["data-av-at-avmg-main-menu"] .= ' sub';
			}
		if($arItem["SELECTED"])
			{
			$linkClasses[] = 'selected-item';
			$linkAttr["data-av-at-avmg-main-menu"] .= ' selected';
			}
		if($arItem["PARAMS"]["top_menu_bottom_line"] == 'Y')
			$linkClasses[] = 'bottom-line';
		if($arItem["IS_PARENT"])
			$linkAttr["data-av-at-avmg-main-menu"] .= ' parent-'.$index;

		if($linkTag == 'a')
			{
			$linkAttr["href"] = $arItem["LINK"];
			if($currentPageUrl != '/') $linkAttr["rel"] = 'nofollow';
			}
		foreach($linkAttr as $attrIndex => $attrValue)
			$linkAttrStr .= $attrIndex.'="'.$attrValue.'"" ';

		$linkHtml = '<'.$linkTag.' class="'.implode(' ', $linkClasses).'" '.$linkAttrStr.'>'.$arItem["TEXT"].'</'.$linkTag.'>';
		/* ---------------------------- */
		/* ------- tag closing -------- */
		/* ---------------------------- */
		?>
		<?if($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat('</ul></li>', ($previousLevel - $arItem["DEPTH_LEVEL"]))?>
		<?endif?>
		<?
		/* ---------------------------- */
		/* ---------- items ----------- */
		/* ---------------------------- */
		?>
		<?if($arItem["IS_PARENT"]):?>
			<li>
				<?=$linkHtml?>
				<ul data-av-at-avmg-main-menu="submenu-<?=$index?>">
		<?elseif($arItem["PERMISSION"] != 'D'):?>
			<?if($arItem["DEPTH_LEVEL"] == 1 && $arItem["PARAMS"]["important_link"] == 'Y'):?>
				<li>
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form_elements", "av_site",
							[
							"TYPE"        => 'button',
							"BUTTON_TYPE" => 'link',
							"TITLE"       => $arItem["TEXT"],
							"LINK"        => $arItem["LINK"]
							]
						);
					?>
			<?else:?>
				<li><?=$linkHtml?></li>
			<?endif?>
		<?endif?>
		<?$previousLevel = $arItem["DEPTH_LEVEL"]?>
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* --------------- tag closing --------------- */
	/* ------------------------------------------- */
	?>
	<?if($previousLevel > 1):?>
	<?=str_repeat('</ul></li>', ($previousLevel-1))?>
	<?endif?>
</ul>