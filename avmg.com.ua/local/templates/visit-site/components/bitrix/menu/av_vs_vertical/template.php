<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
use Bitrix\Main\Application;
/* -------------------------------------------------------------------- */
/* ---------------------------- menu title ---------------------------- */
/* -------------------------------------------------------------------- */
$menuTitle   = '';
$currentPage = $APPLICATION->GetCurPage(false);
include Application::getDocumentRoot().'/.top.menu.php';
foreach($aMenuLinks as $menuInfo)
	if(strstr($currentPage, $menuInfo[1]))
		{
		$menuTitle = $menuInfo[0];
		break;
		}
/* -------------------------------------------------------------------- */
/* --------------------------- menu blockes --------------------------- */
/* -------------------------------------------------------------------- */
$menuBlocks = [];
foreach($arResult as $arItem)
	$menuBlocks[$arItem["PARAMS"]["subcatagory"] ? $arItem["PARAMS"]["subcatagory"] : $menuTitle][] = $arItem;
/* -------------------------------------------------------------------- */
/* ------------------------------- menu ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?foreach($menuBlocks as $title => $menuArray):?>
<div class="av-menu-vertical">
	<h3><?=$title?></h3>
	<ul>
	<?foreach($menuArray as $arItem):?>
		<?if($arItem["DEPTH_LEVEL"] < 2 && $arItem["PERMISSION"] != 'D'):?>
		<li>
			<?
			$linkTag = $arItem["SELECTED"] ? 'div' : 'a';

			$linkClasses = ["main-link"];
			if($arItem["SELECTED"])                               $linkClasses[] = 'selected-item';
			if($arItem["PARAMS"]["left_menu_bottom_line"] == 'Y') $linkClasses[] = 'bottom-line';

			$linkAttr = '';
			if($linkTag == 'a') $linkAttr = 'href="'.$arItem["LINK"].'"';

			$linkHtml = '<'.$linkTag.' class="'.implode(' ', $linkClasses).'" '.$linkAttr.'>'.$arItem["TEXT"].'</'.$linkTag.'>';
			?>
			<?=$linkHtml?>
		</li>
		<?endif?>
	<?endforeach?>
	</ul>
</div>
<?endforeach?>