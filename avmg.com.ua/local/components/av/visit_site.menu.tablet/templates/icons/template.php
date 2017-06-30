<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["MENU_ARRAY"]))                             return;
use Bitrix\Main\Application;
?>
<div class="av-menu-tablet-icons-title"><?=$arParams["TITLE"]?></div>
<div class="av-menu-tablet-icons">
	<?foreach($arResult["MENU_ARRAY"] as $menuInfo):?>
	<?
	$svgPath          = file_exists(Application::getDocumentRoot().$menuInfo["ICON"]) ? $menuInfo["ICON"] : $this->GetFolder().'/images/default_icon.svg';
	$svgContent       = file_get_contents(Application::getDocumentRoot().$svgPath);
	$svgViewboxParams = explode(' ', simplexml_load_string($svgContent)->attributes()["viewBox"]);
	$height           = 44;
	$width            = ($height*$svgViewboxParams[2])/$svgViewboxParams[3];
	?>
	<a
		href="<?=$menuInfo["LINK"]?>"
		title="<?=$menuInfo["TITLE"]?>"
		style="width: <?=$width?>px;height: <?=$height?>px"
	>
		<?=$svgContent?>
	</a>
	<?endforeach?>
</div>

<div class="av-menu-tablet-icons-mobile-title">
	<div><?=$arParams["TITLE"]?></div>
	<div></div>
</div>
<div class="av-menu-tablet-icons-mobile">
	<?foreach($arResult["MENU_ARRAY"] as $menuInfo):?>
	<a href="<?=$menuInfo["LINK"]?>" title="<?=$menuInfo["TITLE"]?>">
		<?=$menuInfo["TITLE"]?>
	</a>
	<?endforeach?>
</div>