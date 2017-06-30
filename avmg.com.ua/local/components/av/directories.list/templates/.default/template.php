<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult["QUERY"] as $letter => $arrayInfo)
	if(!count($arrayInfo["elements"]))
		unset($arResult["QUERY"][$letter]);
?>
<div class="av-directories-list">
	<?
	/* -------------------------------------------------------------------- */
	/* ---------------------------- page title ---------------------------- */
	/* -------------------------------------------------------------------- */
	$pageTitle = GetMessage("AV_DIRECTORIES_LIST_MAIN_TITLE");
	if(count($arParams["IBLOCK_ID"]) == 1)                                                            $pageTitle = $arResult["IBLOCKS_INFO"][$arParams["IBLOCK_ID"][0]]["NAME"];
	elseif(count($arParams["IBLOCK_ID"]) > 1 && count($arResult["APPLIED_FILTER"]["IBLOCK_ID"]) == 1) $pageTitle = $arResult["IBLOCKS_INFO"][$arResult["APPLIED_FILTER"]["IBLOCK_ID"][0]]["NAME"];
	?>
	<h3 class="main-title" data-component-params="<?=base64_encode(serialize($arParams))?>">
		<?=$pageTitle?>
	</h3>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------ items ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<?foreach($arResult["QUERY"] as $letter => $arrayInfo):?>
	<div class="letter-block">
		<div><?=$letter?></div>
		<ul>
			<?foreach($arrayInfo["elements"] as $elementInfo):?>
			<?
			$this->AddEditAction  ($elementInfo["ID"], $elementInfo["EDIT_LINK"],   CIBlock::GetArrayByID($elementInfo["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($elementInfo["ID"], $elementInfo["DELETE_LINK"], CIBlock::GetArrayByID($elementInfo["IBLOCK_ID"], "ELEMENT_DELETE"));
			?>
			<li data-element-id="<?=$elementInfo["ID"]?>" id="<?=$this->GetEditAreaId($elementInfo["ID"])?>">
				<a href="<?=$elementInfo["LINK"]?>"><?=$elementInfo["NAME"]?></a>
			</li>
			<?endforeach?>
		</ul>

		<?if($arrayInfo["more_elements"]):?>
		<a><?=GetMessage("AV_DIRECTORIES_LIST_SHOW_MORE_LINK")?></a>
		<?endif?>
	</div>
	<?endforeach?>
	<?
	/* -------------------------------------------------------------------- */
	/* ---------------------------- empty page ---------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<?if(!count($arResult["QUERY"])):?>
	<b><?=GetMessage("AV_DIRECTORIES_LIST_EMPTY_TITLE")?></b>
	<div><?=GetMessage("AV_DIRECTORIES_LIST_EMPTY_TEXT")?></div>
	<?endif?>
</div>