<?
CJSCore::Init(["jquery"]);
$APPLICATION->AddHeadString('<script>AvSteelCSAjaxElement2 = "'.($_SERVER["HTTPS"] && $_SERVER["HTTPS"] != 'off' ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME'].$templateFolder.'/ajax_element.php";</script>');
$APPLICATION->AddHeadString('<script>AvSteelCSAjaxElement5 = "'.($_SERVER["HTTPS"] && $_SERVER["HTTPS"] != 'off' ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME'].$templateFolder.'/ajax_element2.php";</script>');
$APPLICATION->AddHeadScript($templateFolder."/slick.min.js");

$APPLICATION->SetAdditionalCss($templateFolder."/style.css");

$GLOBALS["AV_STEEL_CATALOG_FILTER_WALL"]["PROPERTY_type_profnastila"] = 334;
$GLOBALS["AV_STEEL_CATALOG_FILTER_MAIN"]["PROPERTY_type_profnastila"] = 335;
$GLOBALS["AV_STEEL_CATALOG_FILTER_ROOF"]["PROPERTY_type_profnastila"] = 336;?>
<?foreach($arResult["ITEMS"] as $arElement):?>
<div class="text-center av-steel-catalog-wrap" element-id="<?=$arElement["ID"]?>" element-name="<?=$arResult["NAME"]?> - <?=$arElement["NAME"]?>">
	<div id="catalog-img"  style="background: url('<? echo $arElement['PREVIEW_PICTURE']['SRC']; ?>') no-repeat center center;width: 90%; height: 140px;background-size: contain;margin: 0 auto"></div>
	<span name><?=$arElement["NAME"]?></span>
	<p><?=$arElement["PREVIEW_TEXT"]?></p>
	<table bordercolor="#838383" border="1" cellspacing="0" style="width: 95%; margin: 0 auto;">
		<tr>
			<td>толщина металла</td>
			<td colspan="2">высота волны</td>
			<td colspan="1">длина</td>
		</tr>
		<tr>
			<td><?=$arElement["PROPERTIES"]["tolshina_metalla"]["VALUE"]?></td>
			<td colspan="2"><?=$arElement["PROPERTIES"]["visota_volni"]["VALUE"]?></td>
			<td><?=$arElement["PROPERTIES"]["dlina"]["VALUE"]?></td>
		</tr>
		<tr>
			<td>ЦЕНА ОТ:</td>
			<td colspan="3"><strong><span red-text=""><?=$arElement["PRICES"]["BASE"]["VALUE"]?>
			<?
			if($arElement["PRICES"]["BASE"]["CURRENCY"] == "UAH"){
			echo("грн");
			}
			if($arElement["PRICES"]["BASE"]["CURRENCY"] == "RUB"){
			echo("руб");
			}
			if($arElement["PRICES"]["BASE"]["CURRENCY"] == "USD"){
			echo("$");
			}
		  ?>
			/<?echo($arElement["CATALOG_MEASURE_NAME"]); ?></span></strong></td>
		</tr>
	</table>
	<div class="text-uppercase catalog-btn" id="catalog-btn">заказать</div> 
</div>
<?endforeach?>