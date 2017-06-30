<link rel="canonical" href="https://www.avsteel.com.ua/blog/" />
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="text-center">
<h1><? foreach($arResult["POST"]["0"]["CATEGORY"] as $ind => $CurPost) {
		if ($CurPost["ID"] == $_GET["category"]) {
			echo($CurPost["NAME"]);}} ?></h1>
</div>

<?
if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog"):
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/blue/style.css');
endif;
?>
<?CUtil::InitJSCore(array("image"));?>
<div id="blog-posts-content" >
<?
if(!empty($arResult["OK_MESSAGE"]))
{
	?>
	<div class="blog-notes blog-note-box">
		<div class="blog-note-text">
			<ul>
				<?
				foreach($arResult["OK_MESSAGE"] as $v)
				{
					?>
					<li><?=$v?></li>
					<?
				}
				?>
			</ul>
		</div>
	</div>
	<?
}
if(!empty($arResult["MESSAGE"]))
{
	?>
	<div class="blog-textinfo blog-note-box">
		<div class="blog-textinfo-text">
			<ul>
				<?
				foreach($arResult["MESSAGE"] as $v)
				{
					?>
					<li><?=$v?></li>
					<?
				}
				?>
			</ul>
		</div>
	</div>
	<?
}
if(!empty($arResult["ERROR_MESSAGE"]))
{
	?>
	<div class="blog-errors blog-note-box blog-note-error">
		<div class="blog-error-text">
			<ul>
				<?
				foreach($arResult["ERROR_MESSAGE"] as $v)
				{
					?>
					<li><?=$v?></li>
					<?
				}
				?>
			</ul>
		</div>
	</div>
	<?
}

if(count($arResult["POST"])>0)
{
	foreach($arResult["POST"] as $ind => $CurPost)
	{
		$className = "blog-post col-md-6";
		if($ind == 0)
			$className .= " blog-post-first";
		elseif(($ind+1) == count($arResult["POST"]))
			$className .= " blog-post-last";
		if($ind%2 == 0)
			$className .= " blog-post-alt";
		$className .= " blog-post-year-".$CurPost["DATE_PUBLISH_Y"];
		$className .= " blog-post-month-".IntVal($CurPost["DATE_PUBLISH_M"]);
		$className .= " blog-post-day-".IntVal($CurPost["DATE_PUBLISH_D"]);
		?>



			<div class="<?=$className?>" id="blg-post-<?=$CurPost["ID"]?>">
				<div class="blog-post-date"><span class="blog-post-day"><?=$CurPost["DATE_PUBLISH_DATE"]?></span><span class="blog-post-date-formated"><?=$CurPost["DATE_PUBLISH_FORMATED"]?></span></div><br>
				<h2 class="blog-post-title"><a href="<?=$CurPost["urlToPost"]?>" title="<?=$CurPost["TITLE"]?>"><?=$CurPost["TITLE"]?></a></h2>

				<div class="blog-post-content">

					<?=$CurPost["TEXT_FORMATED"]?>
					<?
					if ($CurPost["CUT"] == "Y")
					{
						?><p><a class="blog-postmore-link" href="<?=$CurPost["urlToPost"]?>"><?=GetMessage("BLOG_BLOG_BLOG_MORE")?></a></p><?
					}
					?>
					<?if(!empty($CurPost["arImages"]))
					{
						?>
						<div class="feed-com-files">
							<div class="feed-com-files-title"><?=GetMessage("BLOG_PHOTO")?></div>
							<div class="feed-com-files-cont">
								<?
								foreach($CurPost["arImages"] as $val)
								{
									?><span class="feed-com-files-photo"><img src="<?=$val["small"]?>" alt="" border="0" data-bx-image="<?=$val["full"]?>"></span><?
								}
								?>
							</div>
						</div>
						<?
					}?>
					<?if($CurPost["POST_PROPERTIES"]["SHOW"] == "Y"):
						$eventHandlerID = false;
						$eventHandlerID = AddEventHandler('main', 'system.field.view.file', Array('CBlogTools', 'blogUFfileShow'));
						?>
						<?foreach ($CurPost["POST_PROPERTIES"]["DATA"] as $FIELD_NAME => $arPostField):?>
						<?if(!empty($arPostField["VALUE"])):?>
						<div>
						<?=($FIELD_NAME=='UF_BLOG_POST_DOC' ? "" : "<b>".$arPostField["EDIT_FORM_LABEL"].":</b>&nbsp;")?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:system.field.view", 
								$arPostField["USER_TYPE"]["USER_TYPE_ID"], 
								array("arUserField" => $arPostField), null, array("HIDE_ICONS"=>"Y"));?>
						</div>
						<?endif;?>
						<?endforeach;?>
						<?
						if ($eventHandlerID !== false && ( intval($eventHandlerID) > 0 ))
							RemoveEventHandler('main', 'system.field.view.file', $eventHandlerID);
					endif;?>
			</div>
				





			</div>
		<?
	}
	if(strlen($arResult["NAV_STRING"])>0)
		echo $arResult["NAV_STRING"];
}
elseif(!empty($arResult["BLOG"]))
	echo GetMessage("BLOG_BLOG_BLOG_NO_AVAIBLE_MES");
?>	
</div>
