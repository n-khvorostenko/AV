<div id="bottom-slider-wrap">
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["jquery"]);
$APPLICATION->SetAdditionalCss($templateFolder."/slick.css");
$APPLICATION->SetAdditionalCss($templateFolder."/styles.css");
$APPLICATION->AddHeadScript($templateFolder."/slick.min.js");
?>
<br class="hidden-sm hidden-xs">
	<div class="center-slider-title text-uppercase"><strong red-text>Часто задаваемые вопросы</strong></div>
<br class="hidden-sm hidden-xs">
<div class="multiple-items small-img">

<?foreach($arResult["IMAGES_INFO"] as $arrayInfo):?>

	<div> 
			<svg version="1.1" id="Layer_1" x="0px" y="0px"
			viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
			<circle fill="#D3D3D3" cx="17.5" cy="17.5" r="17.3"/>
			<g>
			<path fill="#FFFFFF" d="M17.5,26.8c-1.3,0-2.4,1-2.4,2.1c0,1.2,1.1,2.1,2.4,2.1c1.3,0,2.4-1,2.4-2.1C19.9,27.7,18.8,26.8,17.5,26.8
			z"/>
			</g>
			<g>
			<path fill="#FFFFFF" d="M17.9,4.3c3.5,0,7,2.3,7,7.8c0,5.1-4.1,7.1-5,8.9c-0.7,1.4-0.4,3.3-2.2,3.3c-1.2,0-1.8-1.4-1.8-2.6
			c0-4.7,4.8-5.7,4.8-9.6c0-2.1-1-3.4-2.6-3.4c-3.5,0-2.1,5.2-4.8,5.2c-1,0-1.8-0.8-1.8-2.4C11.5,7.7,14.5,4.3,17.9,4.3z M17.5,26.8
			c1.3,0,2.3,1,2.3,2.3c0,1.3-1.1,2.3-2.3,2.3s-2.3-1-2.3-2.3C15.2,27.8,16.2,26.8,17.5,26.8z"/>
			</g>
			</svg>

	<span class="text-uppercase"><?=$arrayInfo["title"]?></span>
	<br>
		<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
		<circle fill="#D3D3D3" cx="17.5" cy="17.5" r="17.3"/>
		<g>
		<path fill="#FFFFFF" d="M17.5,25.6c1.1,0,2.1-0.8,2.2-1.8l1.5-15.9c0.1-0.9-0.3-1.8-1-2.5c-0.7-0.7-1.7-1.1-2.7-1.1
		c-1,0-2,0.4-2.7,1.1c-0.7,0.7-1,1.6-1,2.5l1.5,15.9C15.4,24.8,16.4,25.6,17.5,25.6z"/>
		<path fill="#FFFFFF" d="M17.5,26.8c-1.3,0-2.4,1-2.4,2.1c0,1.2,1.1,2.1,2.4,2.1c1.3,0,2.4-1,2.4-2.1C19.9,27.7,18.8,26.8,17.5,26.8
		z"/>
		</g>
		</svg>

		<span><?=$arrayInfo["link"]?></span>
	</div>
<?endforeach?>
</div>
</div>