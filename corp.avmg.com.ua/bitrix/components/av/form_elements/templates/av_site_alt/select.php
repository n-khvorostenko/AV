<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arParams["LIST"]))                                   return;
?>
<div class="av-form-elements-av_site_alt-select">
	<div class="title">
		<div><?=$arParams["VALUE"] ? $arParams["LIST"][$arParams["VALUE"]] : $arParams["TITLE"]?></div>
		<div></div>
	</div>

	<div class="list">
	<?foreach($arParams["LIST"] as $link => $title):?>
		<?if($link == $arParams["VALUE"]):?><div class="list-item selected"><?=$title?></div>
		<?else:?>                           <a class="list-item" href="<?=$link?>"><?=$title?></a>
		<?endif?>
	<?endforeach?>
	</div>
</div>