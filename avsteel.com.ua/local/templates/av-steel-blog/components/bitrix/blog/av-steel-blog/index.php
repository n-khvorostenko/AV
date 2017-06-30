<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="body-blog">
<div class="blog-mainpage">
<?$APPLICATION->IncludeComponent(
	"bitrix:blog.menu",
	"",
	Array(
			"BLOG_VAR"				=> $arResult["ALIASES"]["blog"],
			"POST_VAR"				=> $arResult["ALIASES"]["post_id"],
			"USER_VAR"				=> $arResult["ALIASES"]["user_id"],
			"PAGE_VAR"				=> $arResult["ALIASES"]["page"],
			"PATH_TO_BLOG"			=> $arResult["PATH_TO_BLOG"],
			"PATH_TO_USER"			=> $arResult["PATH_TO_USER"],
			"PATH_TO_BLOG_EDIT"		=> $arResult["PATH_TO_BLOG_EDIT"],
			"PATH_TO_BLOG_INDEX"	=> $arResult["PATH_TO_BLOG_INDEX"],
			"PATH_TO_DRAFT"			=> $arResult["PATH_TO_DRAFT"],
			"PATH_TO_POST_EDIT"		=> $arResult["PATH_TO_POST_EDIT"],
			"PATH_TO_USER_FRIENDS"	=> $arResult["PATH_TO_USER_FRIENDS"],
			"PATH_TO_USER_SETTINGS"	=> $arResult["PATH_TO_USER_SETTINGS"],
			"PATH_TO_GROUP_EDIT"	=> $arResult["PATH_TO_GROUP_EDIT"],
			"PATH_TO_CATEGORY_EDIT"	=> $arResult["PATH_TO_CATEGORY_EDIT"],
			"BLOG_URL"				=> $arResult["VARIABLES"]["blog"],
			"SET_NAV_CHAIN"			=> $arResult["SET_NAV_CHAIN"],
			"GROUP_ID" 			=> $arParams["GROUP_ID"],
		),
	$component
);?>
	<?if($USER->IsAuthorized() && CBlog::CanUserCreateBlog($USER->GetID()))
	{
		if(!CBlog::GetByOwnerID($USER->GetID(), $arParams["GROUP_ID"]))
		{
			?>
		<div class="blog-mainpage-create-blog">
		<a href="<?=$arResult["PATH_TO_NEW_BLOG"]?>" class="blog-author-icon"></a>&nbsp;<a href="<?=$arResult["PATH_TO_NEW_BLOG"]?>"><?=GetMessage("BLOG_CREATE_BLOG")?></a>
		</div>
			<?
		}
	}

?>
<script>
<!--
function BXBlogTabShow(id, type)
{
	if(type == 'post')
	{
		
		document.getElementById('new-posts').style.display = 'inline';
		document.getElementById('popular-posts').style.display = 'inline';
		document.getElementById('commented-posts').style.display = 'inline';
		
		document.getElementById('new-posts-title').style.display = 'none';
		document.getElementById('popular-posts-title').style.display = 'none';
		document.getElementById('commented-posts-title').style.display = 'none';
		
		document.getElementById('new-posts-content').style.display = 'none';
		document.getElementById('popular-posts-content').style.display = 'none';
		document.getElementById('commented-posts-content').style.display = 'none';

		document.getElementById(id).style.display = 'none';
		document.getElementById(id+'-title').style.display = 'inline';
		document.getElementById(id+'-content').style.display = 'block';
	}
	else if(type == 'blog')
	{
		document.getElementById('new-blogs').style.display = 'inline-block';
		document.getElementById('popular-blogs').style.display = 'inline-block';
		
		document.getElementById('new-blogs-title').style.display = 'none';
		document.getElementById('popular-blogs-title').style.display = 'none';
		
		document.getElementById('new-blogs-content').style.display = 'none';
		document.getElementById('popular-blogs-content').style.display = 'none';

		document.getElementById(id).style.display = 'none';
		document.getElementById(id+'-title').style.display = 'inline-block';
		document.getElementById(id+'-content').style.display = 'block';
	}

}
//-->
</script>
		<?
$APPLICATION->IncludeComponent(
		"bitrix:blog.new_posts.list", 
		"", 
		Array(
			"MESSAGE_PER_PAGE"		=> $arResult["MESSAGE_COUNT"],
			"PATH_TO_BLOG"		=>	$arResult["PATH_TO_BLOG"],
			"PATH_TO_POST"		=>	$arResult["PATH_TO_POST"],

			"PATH_TO_GROUP_BLOG_POST"		=>	$arResult["PATH_TO_GROUP_BLOG_POST"],
			"PATH_TO_USER"		=>	$arResult["PATH_TO_USER"],
			"PATH_TO_BLOG_CATEGORY"	=> 	7,
			"PATH_TO_SMILE"		=>	$arResult["PATH_TO_SMILE"],
			"CACHE_TYPE"		=>	$arResult["CACHE_TYPE"],
			"CACHE_TIME"		=>	$arResult["CACHE_TIME"],
			"BLOG_VAR"			=>	$arResult["ALIASES"]["blog"],
			"POST_VAR"			=>	$arResult["ALIASES"]["post_id"],
			"USER_VAR"			=>	$arResult["ALIASES"]["user_id"],
			"PAGE_VAR"			=>	$arResult["ALIASES"]["page"],
			"DATE_TIME_FORMAT"	=> $arResult["DATE_TIME_FORMAT"],
			"GROUP_ID" 			=> $arParams["GROUP_ID"],
			"SET_TITLE" => $arResult["SET_TITLE"],
			"SEO_USER"			=> $arParams["SEO_USER"],
			"NAME_TEMPLATE" 	=> $arParams["NAME_TEMPLATE"],
			"SHOW_LOGIN" 		=> $arParams["SHOW_LOGIN"],
			"PATH_TO_CONPANY_DEPARTMENT" 	=> $arParams["PATH_TO_CONPANY_DEPARTMENT"],
			"PATH_TO_SONET_USER_PROFILE" 	=> $arParams["PATH_TO_SONET_USER_PROFILE"],
			"PATH_TO_MESSAGES_CHAT" 	=> $arParams["PATH_TO_MESSAGES_CHAT"],
			"PATH_TO_VIDEO_CALL" 		=> $arParams["PATH_TO_VIDEO_CALL"],
			"NAV_TEMPLATE"		=> $arParams["NAV_TEMPLATE"],
			"POST_PROPERTY_LIST"=> $arParams["POST_PROPERTY_LIST"],
			"USE_SHARE" 		=> $arParams["USE_SHARE"],
			"SHARE_HIDE" 		=> $arParams["SHARE_HIDE"],
			"SHARE_TEMPLATE" 	=> $arParams["SHARE_TEMPLATE"],
			"SHARE_HANDLERS" 	=> $arParams["SHARE_HANDLERS"],
			"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
			"SHARE_SHORTEN_URL_KEY" 	=> $arParams["SHARE_SHORTEN_URL_KEY"],	
			"SHOW_RATING" => $arParams["SHOW_RATING"],
			"IMAGE_MAX_WIDTH" => $arParams["IMAGE_MAX_WIDTH"],
			"IMAGE_MAX_HEIGHT" => $arParams["IMAGE_MAX_HEIGHT"],
			"ALLOW_POST_CODE" => $arParams["ALLOW_POST_CODE"],
			"RATING_TYPE" => $arParams["RATING_TYPE"],
		),
		$component 
	);
?>



</div>


</div>
<div class="blog-clear-float"></div>

<?
if($arResult["SET_TITLE"]=="Y")
	$APPLICATION->SetTitle(GetMessage("BLOG_TITLE"));
?>
</div>
</div>