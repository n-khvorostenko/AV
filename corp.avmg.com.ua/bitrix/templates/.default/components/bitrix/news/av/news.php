<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use
	Bitrix\Main\Page\Asset,
	Bitrix\Main\Localization\Loc;
/* -------------------------------------------------------------------- */
/* -------------------------- naked markup ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["MARKUP_TYPE"] == 'STANDART' && !$arResult["FILTER_HTML"]):?>
	<?=$arResult["LIST_HTML"]?>
	<?$APPLICATION->IncludeComponent("bitrix:main.include", "", ["AREA_FILE_SHOW" => 'page'])?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------- standart markup -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["MARKUP_TYPE"] == 'STANDART' && $arResult["FILTER_HTML"]):?>
	<?
	CJSCore::Init(["bootstrap"]);
	Asset::getInstance()->addCss($this->GetFolder().'/standart_markup.css');
	?>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 av-news-filter-col">
		<?=$arResult["FILTER_HTML"]?>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 av-news-list-col">
		<?if($arResult["LIST_DESCRIPTION"]):?>
			<?=$arResult["LIST_DESCRIPTION"]?>

			<?if($arResult["SHARING_HTML"]):?>
			<div class="share-block">
				<span><?=Loc::getMessage("AV_NEWS_SHARE_BLOCK_TITLE")?>:</span>
				<?=$arResult["SHARING_HTML"]?>
			</div>
			<?endif?>
		<?endif?>

		<?=$arResult["LIST_HTML"]?>
	</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ----------------------- two columns markup ------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["MARKUP_TYPE"] == 'TWO_COLUMNS'):?>
	<?
	CJSCore::Init(["bootstrap"]);
	Asset::getInstance()->addCss($this->GetFolder().'/two_columns_markup.css');
	?>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-news-two-columns-first-col">
		<h3><?=$arParams["MARKUP_TYPE_FIRST_COLUMN_TITLE"]?></h3>
		<?if($arResult["FILTER_HTML"]):?>
		<div class="filter-cell"><?=$arResult["FILTER_HTML"]?></div>
		<?endif?>
		<?=$arResult["LIST_HTML"]?>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-news-two-columns-second-col">
		<h3><?=$arParams["MARKUP_TYPE_SECOND_COLUMN_TITLE"]?></h3>
		<?=$arResult["LIST_DESCRIPTION"]?>
	</div>
<?endif?>