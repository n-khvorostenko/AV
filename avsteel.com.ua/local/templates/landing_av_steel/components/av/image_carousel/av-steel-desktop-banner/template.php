<div id="av-steel-banner">
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["jquery"]);
$APPLICATION->SetAdditionalCss($templateFolder."/slick.css");
$APPLICATION->SetAdditionalCss($templateFolder."/styles.css");
$APPLICATION->AddHeadScript($templateFolder."/slick.min.js");
?>
<br><br>
<div class="av-center">

<?foreach($arResult["IMAGES_INFO"] as $arrayInfo):?>
	<div>
		<h2><?=$arrayInfo["link"]?></h2>
		<img src="<?=$arrayInfo["url"]?>" alt="<?=$arrayInfo["alt"]?>" title="<?=$arrayInfo["title"]?>">
	</div>
<?endforeach?>
</div>
</div>