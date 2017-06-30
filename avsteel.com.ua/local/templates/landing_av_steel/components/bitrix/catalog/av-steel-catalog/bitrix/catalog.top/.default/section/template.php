<pre>
<? print_r($arResult['ITEMS'][4]["PROPERTIES"]["type_profnastila"]["VALUE_ENUM"][0]) ?>
</pre>

<?foreach ($arResult['ITEMS'] as $arreyInfo ):?>
<?if($arreyInfo["PROPERTIES"]["type_profnastila"]["VALUE_ENUM"][0] == Стеновой):?>
	<div class="catalog-main-wrap col-md-4 text-center">
		<?=$arreyInfo["NAME"]?><br>
		<div id="catalog-img"  style="background: url('<? echo $arreyInfo['PREVIEW_PICTURE']['SRC']; ?>') no-repeat center center;"></div>
		<table border="1" cellspacing="0" >
					  <tbody><tr>
						<td>ширина<br>метала</td>
						<td>высота <br>волны</td>
						<td colspan="2">длина</td>
					  </tr>
					<tr>
						<td><?=$arreyInfo["PROPERTIES"]["tolshina_metalla"]["VALUE"]?></td>
						<td><?=$arreyInfo["PROPERTIES"]["visota_volni"]["VALUE"]?></td>
						<td><?=$arreyInfo["PROPERTIES"]["dlina"]["VALUE"]?></td>
					  </tr>
					  <tr>
						  <td><strong>ЦЕНА ОТ:</strong></td>
						  <td colspan="2"><strong> <span red-text=""><?=$arreyInfo["PRICES"]["BASE"]["PRINT_VALUE_NOVAT"] ?></span>
							</strong></td>
					  </tr>
							</tbody></table>
				<div class="text-uppercase" id="catalog-btn">заказать</div> 
	</div>
<?endif?>
<?endforeach ?>































