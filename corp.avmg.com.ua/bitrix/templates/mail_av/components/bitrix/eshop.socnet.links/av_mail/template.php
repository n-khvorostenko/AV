<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$index         = 0;
$socServsCount = count($arResult["SOCSERV"]);
if(!$socServsCount) die();
?>
<?foreach($arResult["SOCSERV"] as $socServType => $socServInfo):?>
	<?$index++?>
	<a
		target="_blank"
		href="<?=$socServInfo["LINK"]?>"
		style=
			"
			<?if($index < $socServsCount):?>margin-right: 8px;<?endif?>
			display: inline-block;
			text-decoration: none;
			width: 32px;
			height: 32px;
			"
	>
		<?
		$imgName     = '';
		$socServType = strtolower($socServType);
		switch($socServType)
			{
			case "facebook" : $imgName = 'facebook.png';break;
			case "vkontakte": $imgName = 'vk.png';      break;
			case "twitter"  : $imgName = 'twitter.png'; break;
			case "google"   : $imgName = 'google.png';  break;
			}
		if(!$imgName) continue;
		?>
		<img
			src="<?=CURRENT_PROTOCOL?>://<?=SITE_SERVER_NAME?><?=$this->GetFolder()?>/images/<?=$imgName?>"
			alt="<?=$socServType?>"
			title="<?=$socServType?>"
		>
	</a>
<?endforeach?>