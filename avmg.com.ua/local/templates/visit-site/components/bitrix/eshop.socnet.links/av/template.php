<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["SOCSERV"]))                                return;
?>
<div class="av-soc-links">
	<?foreach($arResult["SOCSERV"] as $socServType => $socServInfo):?>
	<a target="_blank" href="<?=$socServInfo["LINK"]?>" rel="nofollow">
		<?
		$imgName     = '';
		$socServType = strtolower($socServType);
		switch($socServType)
			{
			case "facebook" : $imgName = 'facebook.svg';break;
			case "vkontakte": $imgName = 'vk.svg';      break;
			case "twitter"  : $imgName = 'twitter.svg'; break;
			case "google"   : $imgName = 'google.svg';  break;
			}
		if(!$imgName) continue;
		?>
		<img
			src="<?=$this->GetFolder()?>/images/<?=$imgName?>"
			alt="<?=$socServType?>"
			title="<?=$socServType?>"
		>
	</a>
	<?endforeach?>
</div>