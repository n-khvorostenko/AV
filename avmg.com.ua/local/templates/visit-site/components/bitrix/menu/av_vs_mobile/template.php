<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;

$previousLevel  = 0;
$currentPageUrl = $APPLICATION->GetCurPage(false);
/* -------------------------------------------------------------------- */
/* ----------------------------- icon bar ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-menu-mobile-call-button">
	<span></span>
	<span></span>
	<span></span>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- menu ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<ul class="av-menu-mobile">
	<?
	/* ------------------------------------------- */
	/* --------------- menu array ---------------- */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult as $arItem):?>
		<?
		/* ---------------------------- */
		/* -------- variables --------- */
		/* ---------------------------- */
		$linkTag = str_replace('index.php', '', explode('?', $arItem["LINK"])[0]) != $currentPageUrl && !($arItem["IS_PARENT"] && $arItem["PERMISSION"] == 'D') ? 'a' : 'div';

		$linkClasses = [];
		if($arItem["DEPTH_LEVEL"] <= 1) $linkClasses[] = 'main-link';
		else                            $linkClasses[] = 'sub-link';
		if($arItem["SELECTED"])         $linkClasses[] = 'selected-item';

		$linkAttr = '';
		if($linkTag == 'a') $linkAttr = 'href="'.$arItem["LINK"].'" rel="nofollow"';

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
		<?if($arItem["IS_PARENT"]):?>
			<li>
				<?=$linkHtml?>
				<div class="open-child-menu"></div>
				<ul>
		<?elseif($arItem["PERMISSION"] != 'D'):?>
			<li><?=$linkHtml?></li>
		<?endif?>
		<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* --------------- tag closing --------------- */
	/* ------------------------------------------- */
	?>
	<?if($previousLevel > 1):?>
	<?=str_repeat('</ul></li>', ($previousLevel-1))?>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- auth form ---------------- */
	/* ------------------------------------------- */
	?>
	<li class="auth-row">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:visit_site.user.panel", "mobile",
				[
				"PROFILE_URL"         => '/user/info/index.php',
				"FORGOT_PASSWORD_URL" => '/user/forgot_password/',
				"BASKET_URL"          => ''
				]
			)
		?>
	</li>
</ul>