<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;

$previousLevel = 0;
$mainMenuCount = 0;
?>
<ul class="av-menu-bottom">
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
		$linkTag = str_replace('index.php', '', explode('?', $arItem["LINK"])[0]) != $APPLICATION->GetCurPage(false) && $arItem["PERMISSION"] != 'D' ? 'a' : 'div';

		$linkClasses = [];
		if($arItem["DEPTH_LEVEL"] <= 1)           $linkClasses[] = 'main-link';
		else                                      $linkClasses[] = 'sub-link';
		if($arItem["PARAMS"]["important"] == 'Y') $linkClasses[] = 'important-link';

		$linkAttr = '';
		if($linkTag == 'a') $linkAttr .= 'href="'.$arItem["LINK"].'" rel="nofollow"';

		$linkHtml = '<'.$linkTag.' class="'.implode(' ', $linkClasses).'" '.$linkAttr.'>'.$arItem["TEXT"].'</'.$linkTag.'>';
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
		<?if($arItem["PARAMS"]["space"] == 'top'):?><li>&nbsp;</li><?endif?>
		<?if($arItem["IS_PARENT"] || $arItem["DEPTH_LEVEL"] <= 1):?>
			<?
			$mainMenuCount++;
			$previousLevel = 0;
			if($mainMenuCount > 4) break;
			?>
			<li>
				<?=$linkHtml?>
				<ul>
		<?elseif($arItem["PERMISSION"] != 'D'):?>
			<li><?=$linkHtml?></li>
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