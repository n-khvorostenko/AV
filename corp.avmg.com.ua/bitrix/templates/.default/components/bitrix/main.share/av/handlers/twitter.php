<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
__IncludeLang(dirname(__FILE__).'/lang/'.LANGUAGE_ID.'/twitter.php');

$name              = 'twitter';
$icon_url_template = "
	<a
		href=\"http://twitter.com/home/?status=#PAGE_URL_ENCODED#+#PAGE_TITLE_UTF_ENCODED#\"
		onclick=\"window.open(this.href,'','toolbar=0,status=0,width=711,height=437');return false;\"
		target=\"_blank\"
		class=\"twitter\"
		title=\"".GetMessage("BOOKMARK_HANDLER_TWITTER")."\"
		rel=\"nofollow\"
	></a>";
?>