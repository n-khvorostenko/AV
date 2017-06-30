<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["jquery"]);
$APPLICATION->SetAdditionalCss($templateFolder."/slick.css");
$APPLICATION->AddHeadScript($templateFolder."/slick.min.js");
?>

<div class="desctopeWrap">
    <div class="conta text-center" style="background: url(<?=$arResult['IMAGES_INFO'][0]['url']?>) no-repeat  center; background-size: cover;">
        <div class="logoTextWrap">

            <div class="secondWrapBG">
				<div class="textWrap text-center"><img src="/upload/av_site/landings/av-shpola/logo_Shpola.png" alt="" />

				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/ShpolaH1Text.php"
				)
			);?>
                    <a id="products" class="red-btn text-uppercase" style="z-index: 999999">нашi напрямки</a>
                    <a id="map" class="red-btn text-uppercase" style="z-index: 999999">як дiстатися</a>
                </div>

            </div>
        </div>

        <div id="pageIndicator" class="hidden-sm hidden-xs">
            <div id="page0" class="active"><span>1</span></div>
            <div id="page1"><span>2</span></div>
            <div id="page2"><span>3</span></div>
            <div id="page3"><span>4</span></div>
        </div>

		<div class="containerArrow down" id="arrow">
			<span class="circle">
			<i class="fa fa-arrow-down"></i>
			</span>
		</div>
    </div>



	<div class="col-md-6  pull-right carusel2 active">
		<div class="single-item1 ">
			<div class="img3">
				<div id="map_canvas" class="imageClass imageClassMap"></div>
			</div>
			<div class="img1">
				<div class="sliderTextRight sliderText text-center">
					<h2 class="text-uppercase">Послуга доставки</h2>
					<p>АВ метал груп надає послуги доставки придбаних будівельних матеріалів та металопрокату.<br>Габаритний вантаж до 6м.</p>
				</div>
				<div id="img1" class="imageClass"></div>
			</div>
			<div class="img2">
				<div class="sliderTextRight sliderText text-center">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_BydMaterial.php"
				)
			);?>
				</div>
				<div id="img4" class="imageClass"></div>
			</div>
			<div class="imageClass" ></div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12 pull-left carusel1 active">
			<div class="single-item2 ">
			<div class="imageClass"></div>
            <div class="img4">
                <div class="sliderTextLeft sliderText text-center">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Metaloprocat.php"
				)
			);?>
				</div>
				<div id="img2" class="imageClass"></div>
			</div>
			<div class="img5">
				<div class="sliderTextLeft sliderText text-center">
					<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/include/Shpola_Rezka.php"
					)
				);?>
                    </div>
                <div id="img5" class="imageClass"></div>
            </div>

            <div class="img6">
                <div class="sliderTextLeft sliderText  text-center">
                    <div>
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Work_Place.php"
				)
			);?>

                    </div>
                    <div class="text-left">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Work_Hours.php"
				)
			);?>
                        <br>
                    </div>

						<div class="text-left" id="socialImg">

				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Socials.php"
				)
			);?>
                        <br>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<?/*if(count($arResult["IMAGES_INFO"][0])):?>
<div class="big-img">
	<img src ='<?=$arResult["IMAGES_INFO"][0]["url"]?>' height="auto" >
</div>
<?endif?>
<br>

<div class="multiple-items small-img">
<?foreach($arResult["IMAGES_INFO"] as $arrayInfo):?>
	<img src="<?=$arrayInfo["url"]?>" alt="<?=$arrayInfo["title"]?>" >

	<?endforeach*/?>
	<div class="mobileWrap">
	<div class=" conta text-center" style="background: url(<?=$arResult['IMAGES_INFO'][0]['url']?>) no-repeat center; background-size: cover;">
		<a id="up"></a>
		<div class="logoTextWrap">
			<div class="secondWrapBG">
				<div class="textWrap text-center"><img src="/upload/av_site/landings/av-shpola/logo_Shpola.png" alt="" />
                <?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/ShpolaH1Text.php"
				)
			);?>
					<a id="products" class="red-btn text-uppercase">нашi напрямки</a>
					<a id="map" class="red-btn text-uppercase">як дiстатися</a>
				</div>
			</div>
		</div>
			<div class="containerArrow down" id="arrow" style="top: 16.6%;">
				<span class="circle">
				<i class="fa fa-arrow-down"></i>
				</span>
			</div>
	</div>
	<div class="img4">

		<div class=" sliderText text-center">
           <?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_BydMaterial.php"
				)
			);?>
		</div>
		<div id="img4" class="imageClass"></div>
			<div class="containerArrow down" id="arrow">
				<span class="circle">
				<i class="fa fa-arrow-down"></i>
				</span>
			</div>
	</div>
	<div class="img5">
		<div class=" sliderText text-center">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Metaloprocat.php"
				)
			);?>
		</div>
		<div id="img5" class="imageClass"></div>
			<div class="containerArrow down" id="arrow">
				<span class="circle">
				<i class="fa fa-arrow-down"></i>
				</span>
			</div>
    </div>
    <div class="img1">

        <div class=" sliderText text-center">
			<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => "/include/Shpola_Rezka.php"
			)
			);?>
        </div>
        <div id="img1" class="imageClass"></div>
			<div class="containerArrow down" id="arrow">
				<span class="circle">
				<i class="fa fa-arrow-down"></i>
				</span>
			</div>
    </div>
    <div class="img2">

        <div class=" sliderText text-center">
            <h2 class="text-uppercase">Послуга доставки</h2>
			<p>АВ метал груп надає послуги доставки придбаних будівельних матеріалів та металопрокату</p>
        </div>
        <div id="img2" class="imageClass"></div>
			<div class="containerArrow down" id="arrow">
				<span class="circle">
				<i class="fa fa-arrow-down"></i>
				</span>
			</div>
    </div>
<div class=" imageClassMap text-center">
<div class="col-sm-12 col-xs-12" id="mapText">
	<div class="col-sm-6 col-xs-12">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Work_Place_Mobile.php"
				)
			);?>
		</div>
	<div class="col-sm-6 col-xs-12">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Work_Hours.php"
				)
			);?>
		</div>


</div>
<div id="map_canvas2" class=""></div>

	<div class="col-sm-12 col-xs-12" id="socialImg">
				<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/Shpola_Socials-Mobile.php"
				)
			);?>
	</div>

</div>
</div>

