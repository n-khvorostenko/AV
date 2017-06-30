<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["MENU_ARRAY"]))                             return;

$tabletArray = [];
foreach($arResult["MENU_ARRAY"] as $index => $menuInfo)
	if($menuInfo["PERMISSION"] != 'D')
		$tabletArray[($menuInfo["PARAMS"]["subcatagory"] ? $menuInfo["PARAMS"]["subcatagory"] : 'main')][] = $menuInfo;
?>
<?foreach($tabletArray as $title => $blockArray):?>
	<?if($title != 'main'):?>
	<div class="av-menu-tablet-title"><?=$title?></div>
	<?endif?>

	<div class="av-menu-tablet" data-count="<?=count($blockArray)?>">
		<?foreach($blockArray as $menuInfo):?>
		<div>
			<a href="<?=$menuInfo["LINK"]?>" rel="nofollow">
				<img
					src="<?=($menuInfo["IMAGE"] ? $menuInfo["IMAGE"] : $this->GetFolder().'/images/section_bg.png')?>"
					alt="<?=$menuInfo["TITLE"]?>"
					title="<?=$menuInfo["TITLE"]?>"
				>
			</a>
			<a href="<?=$menuInfo["LINK"]?>">
				<?=$menuInfo["TITLE"]?>
			</a>
		</div>
		<?endforeach?>
	</div>
<?endforeach?>