<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arResult)                                                  return;

$output     = '';
$itemsCount = count($arResult);

foreach($arResult as $index => $itemInfo)
	{
	if($itemInfo["LINK"] && $index != $itemsCount-1) $output .= '<a href="'.$itemInfo["LINK"].'" title="'.$itemInfo["TITLE"].'">'.$itemInfo["TITLE"].'</a>';
	else                                             $output .= '<span>'.$itemInfo["TITLE"].'</span>';
	if($index != $itemsCount-1)                      $output .= '<div>/</div>';
	}

return '<div class="av-breadcrumb">'.$output.'</div>';
