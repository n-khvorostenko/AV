<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
__IncludeLang(dirname(__FILE__).'/lang/'.LANGUAGE_ID.'/pinterest.php');

$name              = 'pinterest';
$icon_url_template = "
	<a
		data-pin-do=\"buttonPin\"
		data-pin-config=\"above\"
		href=\"https://www.pinterest.com/pin/create/button/?url=#PAGE_URL_ENCODED#&description=#PAGE_TITLE_UTF_ENCODED#\"
		onclick=\"window.open(this.href,'','toolbar=0,status=0,width=750,height=561');return false;\"
		target=\"_blank\"
		class=\"pinterest\"
		title=\"".GetMessage("BOOKMARK_HANDLER_PINTEREST")."\"
		rel=\"nofollow\"
	></a>";
?>