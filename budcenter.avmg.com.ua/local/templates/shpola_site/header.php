<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
CJSCore::RegisterExt("bootstrap", ["css" => "/bitrix/css/av_site/bootstrap.supermin.css"]);
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- HEAD ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<head>


		<title><?$APPLICATION->ShowTitle()?></title>
		<link rel="icon" type="image/x-icon" href="/favicon.ico" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, width=device-width">
		<?$APPLICATION->ShowHead();
		CJSCore::Init(["jquery","av_site", "bootstrap"]);
		$APPLICATION->AddHeadScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyA46WZQVEJSS2zf5hZPQW3-oV6P5RSCUDQ&callback=initMap');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/script.js');
		?>

	</head>

	<body id="av-shpola">
<div xmlns:v="http://rdf.data-vocabulary.org/#" hidden>
<span typeof="v:Breadcrumb"><a href="http://budсenter.avmg.com.ua/" rel="v:url" property="v:title">budсenter.avmg.com.ua</a> › </span>
<span typeof="v:Breadcrumb"><a href="http://budсenter.avmg.com.ua/#content" rel="v:url" property="v:title">Будівельний маркет №1 м. Шпола</a> › </span>
<span typeof="v:Breadcrumb">Текущая категория</span>
</div>
<div id="panel"><?$APPLICATION->ShowPanel()?></div>



<?$APPLICATION->IncludeComponent(
	"av:image_carousel", 
	"av-shpola-desctope", 
	array(
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"IMAGE_ALT" => array(
		),
		"IMAGE_LINK" => array(
		),
		"IMAGE_NAME" => array(
		),
		"IMAGE_URL" => array(
			0 => "/upload/av_site/landings/av-shpola/fon_shpola_new.jpg",
			1 => "",
		),
		"COMPONENT_TEMPLATE" => "av-shpola-desctope"
	),
	false
);?>




