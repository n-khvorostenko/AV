<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$inputId     = $arParams["~INPUT_ID"]     ? $arParams["~INPUT_ID"]     : 'title-search-input';
$containerId = $arParams["~CONTAINER_ID"] ? $arParams["~CONTAINER_ID"] : 'title-search';
?>
<?if($arParams["SHOW_INPUT"] != 'N'):?>
<form id="<?=$containerId?>" action="<?=$arResult["FORM_ACTION"]?>" class="av-search-title">
	<div><?=GetMessage("AV_SEARCH_TITLE_INPUT_PLACEHOLDER")?></div>
	<input id="<?=$inputId?>" type="text" name="q" autocomplete="off">
	<input name="s" type="submit" hidden>
</form>
<?endif?>

<script>
	BX.ready(function()
		{
		new JCTitleSearch
			({
			"AJAX_PAGE"    : '<?=CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			"CONTAINER_ID" : '<?=$containerId?>',
			"INPUT_ID"     : '<?=$inputId?>',
			"MIN_QUERY_LEN": 2
			});
		});
</script>