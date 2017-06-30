<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-carousel-parthners">
	<?foreach($arResult["IMAGES_INFO"] as $arrayInfo):?>
	<img src="<?=$arrayInfo["url"]?>" alt="<?=$arrayInfo["title"]?>" title="<?=$arrayInfo["title"]?>">
	<?endforeach?>
</div>
