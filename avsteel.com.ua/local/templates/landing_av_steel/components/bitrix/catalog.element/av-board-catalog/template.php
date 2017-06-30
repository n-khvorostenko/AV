<div class=" av-steel-catalog-wrap" element-id="<?=$arElement["ID"]?>">
	<div class="text-uppercase text-center "><span name><strong><?=$arResult["SECTION"]["NAME"]?><br><?=$arResult["NAME"]?></strong></span></div>
			<div id="catalog-img"  style="background: url('<? echo $arResult['PREVIEW_PICTURE']['SRC']; ?>') no-repeat center center;width: 100%;margin-bottom: 15px;"></div>

			<table border="1" cellspacing="0" style="width: 95%; margin: 0 auto;" class="text-center">
					<tr>
						<td>толщина<br>металла</td>
						<td>высота <br>волны</td>
						<td colspan="2">длина</td>
					  </tr>
					<tr>
						<td><?=$arResult["PROPERTIES"]["tolshina_metalla"]["VALUE"]?></td>
						<td><?=$arResult["PROPERTIES"]["visota_volni"]["VALUE"]?></td>
						<td><?=$arResult["PROPERTIES"]["dlina"]["VALUE"]?></td>
					  </tr>
					  <tr>
						  <td>ЦЕНА ОТ:</td>
						  <td colspan="2"><strong> <span red-text=""><? echo $arResult["PRICE_MATRIX"]["MATRIX"]["1"]["0"]["PRICE"] ?>
						<?
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["0"]["CURRENCY"] == "UAH"){
						echo("грн");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["0"]["CURRENCY"] == "RUB"){
						echo("руб");
						}
						if($arResult["PRICE_MATRIX"]["MATRIX"]["1"]["0"]["CURRENCY"] == "USD"){
						echo("$");
						}
						?>/<? echo($arResult["CATALOG_MEASURE_NAME"]); ?>
							</span>
							</strong></td>
						</tr>
					</table>
</div>

