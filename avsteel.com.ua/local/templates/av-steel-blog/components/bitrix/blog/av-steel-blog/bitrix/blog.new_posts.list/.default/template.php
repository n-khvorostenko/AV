		<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
		<?
		if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog"):
			$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
			$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/blue/style.css');
		endif;
		?>
		<?CUtil::InitJSCore(array("image"));?>
		<div id="blog-new-posts-content">
		<?
		if(count($arResult["POSTS"])>0)
		{
			foreach($arResult["POSTS"] as $ind => $CurPost)
			{
				$className = "blog-post col-md-6 col-sm-12 col-sx-12";
				if($ind == 0)
					$className .= " blog-post-first";
				elseif(($ind+1) == count($arResult["POSTS"]))
					$className .= " blog-post-last";
				if($ind%2 == 0)
					$className .= " blog-post-alt";
				$className .= " blog-post-year-".$CurPost["DATE_PUBLISH_Y"];
				$className .= " blog-post-month-".$CurPost["DATE_PUBLISH_M"];
				$className .= " blog-post-day-".$CurPost["DATE_PUBLISH_D"];
				?>

					<div class="<?=$className?>" id="blg-post-<?=$CurPost["ID"]?>">


							<div class="blog-post-date"><span class="blog-post-day"><?=$CurPost["DATE_PUBLISH_DATE"]?></span><span class="blog-post-date-formated"><?=$CurPost["DATE_PUBLISH_FORMATED"]?></span></div>
						<a class="post-link-title" href="<?=$CurPost["urlToPost"]?>" title="<?=$CurPost["TITLE"]?>"><h2 class="blog-post-title text-uppercase"><?=$CurPost["TITLE"]?></h2></a>
			
						<div class="blog-post-content">


							<span id="text-preview" class="text-full"><?=$CurPost["TEXT_FORMATED"]?></span>
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

						<div class="blog-post-meta">
							<div class="blog-post-info-bottom">
								<div class="blog-post-info">

									<div class="blog-post-date"><span class="blog-post-day"><?=$CurPost["DATE_PUBLISH_DATE"]?></span><span class="blog-post-time"><?=$CurPost["DATE_PUBLISH_TIME"]?></span><span class="blog-post-date-formated"><?=$CurPost["DATE_PUBLISH_FORMATED"]?></span></div>
								</div>
							</div>
						</div>
						</div>


				<?
			}

			if(strlen($arResult["NAV_STRING"])>0)
				echo $arResult["NAV_STRING"];
		}
		?>
		</div>