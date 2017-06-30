<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog"):
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/blue/style.css');
endif;
	$GLOBALS['CATEGORY_POST_ID'] = $arResult["Post"]["ID"];
?>

<?CUtil::InitJSCore(array("image"));?>

		<div class="hidden-lg hidden-md hidden-sm" id="h1Blog-Mobile-bg">
			<div>
				<h1 class="blog-post-title text-uppercase"><?=$arResult["Post"]["TITLE"]?></h1><br><br>
				<span class="blog-post-date-formated "><?=$arResult["Post"]["DATE_PUBLISH_FORMATED"]?></span>

			</div>
		</div>
<div class="blog-post-current col-md-9 pull-left">
<?
if(strlen($arResult["MESSAGE"])>0)
{
	?>
	<div class="blog-textinfo blog-note-box">
		<div class="blog-textinfo-text">
			<?=$arResult["MESSAGE"]?>
		</div>
	</div>
	<?
}
if(strlen($arResult["ERROR_MESSAGE"])>0)
{
	?>
	<div class="blog-errors blog-note-box blog-note-error">
		<div class="blog-error-text">
			<?=$arResult["ERROR_MESSAGE"]?>
		</div>
	</div>
	<?
}
if(strlen($arResult["FATAL_MESSAGE"])>0)
{
	?>
	<div class="blog-errors blog-note-box blog-note-error">
		<div class="blog-error-text">
			<?=$arResult["FATAL_MESSAGE"]?>
		</div>
	</div>
	<?
}
elseif(strlen($arResult["NOTE_MESSAGE"])>0)
{
	?>
	<div class="blog-textinfo blog-note-box">
		<div class="blog-textinfo-text">
			<?=$arResult["NOTE_MESSAGE"]?>
		</div>
	</div>
	<?
}
else
{
	if(!empty($arResult["Post"])>0)
	{
		$className = "blog-post";
		$className .= " blog-post-first";
		$className .= " blog-post-alt";
		$className .= " blog-post-year-".$arResult["Post"]["DATE_PUBLISH_Y"];
		$className .= " blog-post-month-".IntVal($arResult["Post"]["DATE_PUBLISH_M"]);
		$className .= " blog-post-day-".IntVal($arResult["Post"]["DATE_PUBLISH_D"]);
		?>

		<div class="<?=$className?>" id="blg-post-<?=$arResult["Post"]["ID"]?>">
		<h1 class="blog-post-title hidden-xs"><?=$arResult["Post"]["TITLE"]?></h1>
		<div class="blog-post-info-back blog-post-info-top hidden-xs">

				<div class="blog-post-info-bottom hidden-md hidden-sm hidden-lg">
					<div class="blog-post-date ">
					<span class="blog-post-day"><?=$arResult["Post"]["DATE_PUBLISH_DATE"]?></span><span class="blog-post-time"><?=$arResult["Post"]["DATE_PUBLISH_TIME"]?></span><span class="blog-post-date-formated"><?=$arResult["Post"]["DATE_PUBLISH_FORMATED"]?></span></div>
					</div>

				<div class="blog-post-meta-util">
						<div class="blog-post-date  hidden-xs">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
						<g>
							<path fill="#36505B" d="M486.4,34.1h-59.7V8.5c0-4.7-3.8-8.5-8.5-8.5h-59.7c-4.7,0-8.5,3.8-8.5,8.5v25.6H162.1V8.5
								c0-4.7-3.8-8.5-8.5-8.5H93.9c-4.7,0-8.5,3.8-8.5,8.5v25.6H25.6c-4.7,0-8.5,3.8-8.5,8.5v93.9v366.9c0,4.7,3.8,8.5,8.5,8.5h460.8
								c4.7,0,8.5-3.8,8.5-8.5V136.5V42.7C494.9,37.9,491.1,34.1,486.4,34.1z M366.9,17.1h42.7v25.6v25.6h-42.7V42.7V17.1z M102.4,17.1
								h42.7v25.6v25.6h-42.7V42.7V17.1z M34.1,51.2h51.2v25.6c0,4.7,3.8,8.5,8.5,8.5h59.7c4.7,0,8.5-3.8,8.5-8.5V51.2h187.7v25.6
								c0,4.7,3.8,8.5,8.5,8.5h59.7c4.7,0,8.5-3.8,8.5-8.5V51.2h51.2V128H34.1V51.2z M34.1,494.9V145.1h443.7v349.9H34.1z"></path>
							<path fill="#36505B" d="M324.3,196.3h-59.7h-17.1h-59.7h-17.1H93.9v76.8v17.1v59.7v17.1v76.8h76.8h17.1h59.7h17.1h59.7h17.1h76.8
								v-76.8v-17.1v-59.7v-17.1v-76.8h-76.8H324.3z M264.5,213.3h59.7v59.7h-59.7V213.3z M324.3,349.9h-59.7v-59.7h59.7V349.9z
								 M187.7,290.1h59.7v59.7h-59.7V290.1z M187.7,213.3h59.7v59.7h-59.7V213.3z M110.9,213.3h59.7v59.7h-59.7V213.3z M110.9,290.1h59.7
								v59.7h-59.7V290.1z M170.7,426.7h-59.7v-59.7h59.7V426.7z M247.5,426.7h-59.7v-59.7h59.7V426.7z M324.3,426.7h-59.7v-59.7h59.7
								V426.7z M401.1,426.7h-59.7v-59.7h59.7V426.7z M401.1,349.9h-59.7v-59.7h59.7V349.9z M401.1,213.3v59.7h-59.7v-59.7H401.1z"></path>
						</g>
						</svg>
						<span class="blog-post-day"><?=$arResult["Post"]["DATE_PUBLISH_DATE"]?></span><span class="blog-post-date-formated"><?=$arResult["Post"]["DATE_PUBLISH_FORMATED"]?></span></div>
					<span class="blog-post-views-link hidden-xs"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
<g>
	<path fill="#36505B" d="M441.6,186.5c-102.8-102.8-270.1-102.8-372.9,0L0,255.1l70.4,70.4c51.4,51.4,118.9,77.1,186.5,77.1
		s135.1-25.7,186.5-77.1l68.7-68.7L441.6,186.5z M431.1,313.3c-96.1,96.1-252.4,96.1-348.5,0l-58.2-58.2l56.4-56.4
		c96.1-96.1,252.4-96.1,348.5,0l58.2,58.2L431.1,313.3z"/>
	<path fill="#36505B" d="M247.1,186.6c-33.4,0-60.5,27.2-60.5,60.5c0,4.8,3.9,8.6,8.6,8.6c4.8,0,8.6-3.9,8.6-8.6
		c0-23.8,19.4-43.2,43.2-43.2c4.8,0,8.6-3.9,8.6-8.6C255.8,190.4,251.9,186.6,247.1,186.6z"/>
	<path fill="#36505B" d="M255.8,143.3c-62,0-112.4,50.4-112.4,112.4s50.4,112.4,112.4,112.4s112.4-50.4,112.4-112.4
		S317.8,143.3,255.8,143.3z M255.8,350.9c-52.5,0-95.1-42.7-95.1-95.1s42.7-95.1,95.1-95.1s95.1,42.7,95.1,95.1
		S308.2,350.9,255.8,350.9z"/>
</g>
						</svg><span class="blog-post-link-counter"><?=IntVal($arResult["Post"]["VIEWS"])?></span> <span class="blog-post-link-caption text-uppercase"><?=GetMessage("BLOG_BLOG_BLOG_VIEWS")?></span></a></span>
					<?if($arResult["Post"]["ENABLE_COMMENTS"] == "Y"):?>

						<a href="#commentLink"><span class="blog-post-comments-link hidden-xs"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
<g>
	<path fill="#36505B" d="M102.4,145.1h128c4.7,0,8.5-3.8,8.5-8.5s-3.8-8.5-8.5-8.5h-128c-4.7,0-8.5,3.8-8.5,8.5
		S97.7,145.1,102.4,145.1z"/>
	<path fill="#36505B" d="M392.5,196.3H102.4c-4.7,0-8.5,3.8-8.5,8.5c0,4.7,3.8,8.5,8.5,8.5h290.1c4.7,0,8.5-3.8,8.5-8.5
		C401.1,200.1,397.3,196.3,392.5,196.3z"/>
	<path fill="#36505B" d="M392.5,264.5H102.4c-4.7,0-8.5,3.8-8.5,8.5c0,4.7,3.8,8.5,8.5,8.5h290.1c4.7,0,8.5-3.8,8.5-8.5
		S397.3,264.5,392.5,264.5z"/>
	<path fill="#36505B" d="M460.8,17.1H51.2C23.4,17.1,0,40.5,0,68.3v281.6c0,27.8,23.4,51.2,51.2,51.2h243.7l82.8,91.1
		c1.6,1.8,4,2.8,6.3,2.8c1,0,2.1-0.2,3.1-0.6c3.3-1.3,5.5-4.4,5.5-8v-85.3h68.3c27.8,0,51.2-23.4,51.2-51.2V68.3
		C512,40.5,488.6,17.1,460.8,17.1z M494.9,349.9c0,18.5-15.6,34.1-34.1,34.1H384c-4.7,0-8.5,3.8-8.5,8.5v71.8L305,386.8l0,0
		l-42.5-49.4c-3.1-3.6-8.4-4-12-0.9c-3.6,3.1-4,8.5-0.9,12l30.5,35.5H51.2c-18.5,0-34.1-15.6-34.1-34.1V68.3
		c0-18.5,15.6-34.1,34.1-34.1h409.6c18.5,0,34.1,15.6,34.1,34.1V349.9z"/>
</g>
							</svg><span class="blog-post-link-counter"><?=IntVal($arResult["Post"]["NUM_COMMENTS"])?></span> <span class="blog-post-link-caption text-uppercase"><?=GetMessage("BLOG_BLOG_BLOG_COMMENTS")?></span></span></a>
					<?endif;?>
				</div>
			</div>

		<div class="blog-post-content">
			<div class="blog-post-avatar"><?=$arResult["BlogUser"]["AVATAR_img"]?></div>
			<?
			echo htmlspecialchars_decode($arResult["Post"]["textFormated"]);
			?>

			<?if($arResult["images"])
			{
				?>
				<div class="feed-com-files">
					<div class="feed-com-files-title"><?=GetMessage("BLOG_PHOTO")?></div>
					<div class="feed-com-files-cont">
						<?
						foreach($arResult["images"] as $val)
						{
							?><span class="feed-com-files-photo"><img src="<?=$val["small"]?>" alt="" border="0" data-bx-image="<?=$val["full"]?>"></span><?
						}
						?>
					</div>
				</div>
				<?
			}?>
			<?if($arResult["POST_PROPERTIES"]["SHOW"] == "Y"):
				$eventHandlerID = false;
				$eventHandlerID = AddEventHandler('main', 'system.field.view.file', Array('CBlogTools', 'blogUFfileShow'));
				?>
				<div>
				<?foreach ($arResult["POST_PROPERTIES"]["DATA"] as $FIELD_NAME => $arPostField):?>
				<?if(!empty($arPostField["VALUE"])):?>
					<?=($FIELD_NAME=='UF_BLOG_POST_DOC' ? "" : "<b>".$arPostField["EDIT_FORM_LABEL"].":</b>&nbsp;")?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:system.field.view",
								$arPostField["USER_TYPE"]["USER_TYPE_ID"],
								array("arUserField" => $arPostField), null, array("HIDE_ICONS"=>"Y"));?><br />
				<?endif;?>
				<?endforeach;?>
				</div>
				<?
				if ($eventHandlerID !== false && ( intval($eventHandlerID) > 0 ))
					RemoveEventHandler('main', 'system.field.view.file', $eventHandlerID);
			endif;?>
		</div>

		</div>
		<?
	}
	else
		echo GetMessage("BLOG_BLOG_BLOG_NO_AVAIBLE_MES");
}
?>
		<div class="hidden-lg hidden-md" id="blog-post-form-mobile">
<br>
		<?$APPLICATION->IncludeComponent(
			"bitrix:form",
			"av-steel-blog",
			array(
				"AJAX_MODE" => "Y",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_SHADOW" => "Y",
				"AJAX_OPTION_STYLE" => "N",
				"CACHE_TIME" => "3600",
				"CACHE_TYPE" => "N",
				"CALL_ITEM_TITLE" => $_POST["element_name"],
				"CHAIN_ITEM_LINK" => "",
				"CHAIN_ITEM_TEXT" => "",
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"EDIT_ADDITIONAL" => "N",
				"EDIT_STATUS" => "N",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"NOT_SHOW_FILTER" => array(
					0 => "",
					1 => "",
				),
				"NOT_SHOW_TABLE" => array(
					0 => "",
					1 => "",
				),
				"RESULT_ID" => $_REQUEST[RESULT_ID],
				"SEF_MODE" => "N",
				"SHOW_ADDITIONAL" => "N",
				"SHOW_ANSWER_VALUE" => "N",
				"SHOW_EDIT_PAGE" => "N",
				"SHOW_LIST_PAGE" => "N",
				"SHOW_STATUS" => "N",
				"SHOW_VIEW_PAGE" => "N",
				"START_PAGE" => "new",
				"SUCCESS_URL" => "",
				"USE_EXTENDED_ERRORS" => "N",
				"WEB_FORM_ID" => "13",
				"COMPONENT_TEMPLATE" => "av-steel-form-blog",
				"VARIABLE_ALIASES" => array(
					"action" => "action",
				)
			),
			false
		);?><br></div>
<?if(!empty($arResult["Category"]))
				{
					?>
					<div class="blog-post-tag">
						<noindex>
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
							<g>
								<g>
									<path fill="#36505B" d="M478.7,0H296.9c-9.1,0-18.2,3-24.2,9.1L9.1,272.7C3,278.7,0,287.8,0,296.9c0,9.1,3,18.2,9.1,24.2
										l181.8,181.8c6.1,6.1,15.1,9.1,24.2,9.1c6.1,0,15.1-3,24.2-9.1l263.6-263.6c6.1-6.1,9.1-15.1,9.1-24.2V33.3
										C512,15.1,496.9,0,478.7,0z M478.7,221.2L215.1,484.7h-3L27.3,299.9c0-3,0-6.1,0-6.1L293.9,27.3v6.1h181.8c3,0,3,0,3,3
										L478.7,221.2L478.7,221.2z"/>
									<path fill="#36505B" d="M369.6,96.9c-12.1,12.1-12.1,30.3,0,42.4c6.1,6.1,12.1,9.1,21.2,9.1c9.1,0,15.1-3,21.2-9.1
										c12.1-12.1,12.1-30.3,0-42.4C399.9,84.8,381.7,84.8,369.6,96.9z"/>
								</g>
							</g>
							</svg>
						   <b><?=GetMessage("BLOG_BLOG_BLOG_CATEGORY")?></b>
						<?
						$i=0;
						foreach($arResult["Category"] as $v)
						{
							if($i!=0)
								echo ",";
							?> <?/*<a href="<?=$v["urlToCategory"]?>" rel="nofollow">*/?><?=$v["NAME"]?><?/*</a>*/?><?
							$i++;
						}
						?>
						</noindex>
						<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
						<script src="//yastatic.net/share2/share.js"></script>
						<br class="hidden-lg hidden-md"><span class="pull-right text-uppercase" id="share-social" style="align-items: center;display:flex;"><b>поделиться:</b><div class="ya-share2 " data-services="vkontakte,facebook,gplus,twitter">  </div></span><br><br>
					</div>
					<?
				}
				?>


	<?if(strLen($arResult["urlToHide"])>0):?>
		<span class="blog-post-hide-link"><a href="javascript:if(confirm('<?=GetMessage("BLOG_MES_HIDE_POST_CONFIRM")?>')) window.location='<?=$arResult["urlToHide"]."&".bitrix_sessid_get()?>'"><span class="blog-post-link-caption"><?=GetMessage("BLOG_MES_HIDE")?></span></a></span>
	<?endif;?>
	<?if(strLen($arResult["urlToEdit"])>0):?>
		<span class="blog-post-edit-link"><a href="<?=$arResult["urlToEdit"]?>"><span class="blog-post-link-caption"><?=GetMessage("BLOG_BLOG_BLOG_EDIT")?></span></a></span>
	<?endif;?>
	<?if(strLen($arResult["urlToDelete"])>0):?>
		<span class="blog-post-delete-link"><a href="javascript:if(confirm('<?=GetMessage("BLOG_MES_DELETE_POST_CONFIRM")?>')) window.location='<?=$arResult["urlToDelete"]."&".bitrix_sessid_get()?>'"><span class="blog-post-link-caption"><?=GetMessage("BLOG_BLOG_BLOG_DELETE")?></span></a></span>
	<?endif;?>

	</div>
</div>



<div class="col-md-3 hidden-sm hidden-xs pull-right left-col-post">
<?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"av-steel-blog",
	array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"CALL_ITEM_TITLE" => $_POST["element_name"],
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "N",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NOT_SHOW_FILTER" => array(
			0 => "",
			1 => "",
		),
		"NOT_SHOW_TABLE" => array(
			0 => "",
			1 => "",
		),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "13",
		"COMPONENT_TEMPLATE" => "av-steel-form-blog",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?>
<br><br><a href="/" id="picture-right-bg-href">
<div id="picture-right-bg">
<div id="title-form-1" class="text-center text-uppercase">Национальный производитель профнастила и металлочерепицы</div>
<img src="/upload/av_site/landings/av-steel/img-blog-right.jpg" alt="" />
	<div class="text-center text-uppercase" id="post-button">Узнать больше</div>
	</div></a>
</div>





